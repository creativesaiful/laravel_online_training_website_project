

$(document).ready(function () {
    $('#visitorTable').DataTable().destroy();
    $('#visitorTable').DataTable({ 'order': false });
    $('#visitorTable').addClass('bs-select');
});


//To get services data from database
function getServiceData() {
    axios.get('/getServicesData')
        .then(function (response) {

            if (response.status == 200) {
                $('#ServiceSection').removeClass('d-none');
                $('#LoaderService').addClass('d-none');


                // Destroy data table before loading
                $('#serviceTable').DataTable().destroy();

                // empty service table befor load
                $('#service_table').empty();




                var jsonData = response.data;

                $.each(jsonData, function (i, item) {

                    $('<tr>').html(
                        "<td> <img src='" + jsonData[i].service_img + "' width='60px'> </td>" +
                        "<td>" + jsonData[i].service_name + "</td>" +
                        "<td>  " + jsonData[i].service_des + " </td>" +
                        "<td> <a class='serviceeditbtn' data-id='" + jsonData[i].id + "'> <i class='fas fa-edit'></i> </a>  </td>" +
                        "<td> <a class='servicedeletebtn' data-id='" + jsonData[i].id + "'> <i class='fas fa-trash-alt'> </i>  </a> </td>"
                    ).appendTo('#service_table');
                });


                //service  delete icon cick action

                $('.servicedeletebtn').click(function () {
                    var id = $(this).data('id');

                    $('#deleteid').html(id);
                    $('#deleteModal').modal('show');
                })






                //service  Edit icon cick action

                $('.serviceeditbtn').click(function () {
                    var id = $(this).data('id');

                    $('#editid').html(id);
                    $('#editModal').modal('show');

                    getSingleService(id);
                })


                // Add data table method
                $('#serviceTable').DataTable({ 'order': false });
                $('.datatables_length').addClass('bs-select');








            } else {
                $('#LoaderService').addClass('d-none');
                $('#WrongService').removeClass('d-none');
            }


        }).catch(function (error) {

        })
}


//Service delete confirm buttom action

$('#deleteConfirmBtn').click(function () {
    var id = $('#deleteid').html();


    deleteService(id);
    $('#deleteConfirmBtn').html("<div class='spinner-border' role='status'>  </div>");
})

//delete service
function deleteService(deleteId) {
    axios.post('/deleteServicesData', { id: deleteId })
        .then(function (response) {

            var id = $('#deleteid').html("");

            if (response.data == 1) {

                $('#deleteConfirmBtn').html("Delete");
                $('#deleteModal').modal('hide');
                toastr.success("data deleted");
                getServiceData();
            } else {

                $('#deleteModal').modal('hide');
                toastr.error("Fail to delete data");
                getServiceData();
            }


        }).catch(function (error) {

        })
}




//Single service details for edit


function getSingleService(detaisId) {
    axios.post('/editservice', { id: detaisId })
        .then(function (response) {

            var singleServiceData = response.data;

            if (response.status == 200) {

                $('#editserviceId').val(singleServiceData[0].id);
                $('#editImgLink').val(singleServiceData[0].service_img);
                $('#editSeriviceName').val(singleServiceData[0].service_name);
                $('#editServiceDes').val(singleServiceData[0].service_des);
            }




        }).catch(function (error) {

        })
}


//Service update confirm buttom action

$('#serviceUpdatConfirBtn').click(function () {
    var id = $('#editserviceId').val();
    var serviceImg = $('#editImgLink').val();
    var serviceName = $('#editSeriviceName').val();
    var ServiceDes = $('#editServiceDes').val();



    updateService(id, serviceImg, serviceName, ServiceDes);
})


//service update

function updateService(updateid, serviceImg, serviceName, serviceDes) {

    if (serviceImg.length == 0) {
        toastr.error("Image not found");
    } else if (serviceName == 0) {
        toastr.error("Name should not be empty");
    } else if (serviceDes == 0) {
        toastr.error("Description should not be empty");
    } else {

        $('#serviceUpdatConfirBtn').html("<div class='spinner-border' role='status'>    </div>")
        axios.post('/updateservice', { id: updateid, service_img: serviceImg, service_name: serviceName, service_des: serviceDes })
            .then(function (response) {

                if (response.status == 200) {

                    if (response.data == 1) {
                        toastr.success("data Updated successfully");
                        $('#editModal').modal('hide');
                        getServiceData();
                        $('#serviceUpdatConfirBtn').html('Update');
                    } else {
                        toastr.error("Update Failed");
                        $('#editModal').modal('hide');
                        $('#serviceUpdatConfirBtn').html('Update');
                        getServiceData();
                    }




                } else {
                    toastr.error("Somthing went wrong");
                    $('#editModal').modal('hide');
                }
            }).catch(function (error) {

            })
    }

}



//add service


$('#addServicebtn').click(function () {
    $('#addModal').modal('show');


    $("#addServiceConfirmBtn").click(function () {
        var addServiceName = $('#AddSeriviceName').val();
        var addServiceDes = $('#AddServiceDes').val();
        var addServiceImg = $('#addImageLink').val();


        addService(addServiceName, addServiceDes, addServiceImg)


    })

})


function addService(addServiceName, addServiceDes, addServiceImg) {

    if (addServiceName.length == 0) {
        toastr.error("Name should not be empty");
    } else if (addServiceDes.length == 0) {
        toastr.error("Description should not be empty");
    } else if (addServiceImg.length == 0) {
        toastr.error("Img link should not be empty");
    } else {
        axios.post('/addservice', { service_name: addServiceName, service_des: addServiceDes, service_img: addServiceImg })
            .then(function (response) {
                $('#addServiceConfirmBtn').html("<div class='spinner-border' role='status'>  </div>");

                if (response.status == 200) {

                    if (response.data == 1) {

                        toastr.success("data added successfully");
                        $('#addModal').modal('hide');
                        getServiceData();
                        $('#addServiceConfirmBtn').html('Add');

                    } else {

                        toastr.error("add Failed");
                        $('#addModal').modal('hide');
                        getServiceData();
                        $('#addServiceConfirmBtn').html('Add');

                    }

                } else {
                    toastr.error("Somthing went wrong");
                    $('#editModal').modal('hide');
                }
            }).catch(function (error) {

            })
    }

}



// Courses section are goes to here


//Show All course in admin panel
function getCourseData() {
    axios.get('/getcourses')
        .then(function (response) {
            if (response.status == 200) {
                var allCouseInfo = response.data;

                $("#CourseSection").removeClass("d-none");
                $("#LoaderCourses").addClass("d-none");

                //data table destroy
                $('#CourseTable').DataTable().destroy();

                //Empty course table befor loading
                $("#course_table").empty();


                $.each(allCouseInfo, function (i, item) {
                    $("<tr>").html(
                        "<td>" + allCouseInfo[i].course_name + "</td>" +
                        "<td>" + allCouseInfo[i].course_des + " </td>" +
                        "<td> " + allCouseInfo[i].course_fee + "</td>" +
                        "<td> " + allCouseInfo[i].course_totall_enroll + "</td>" +
                        "<td>" + allCouseInfo[i].course_totall_class + " </td>" +
                        "<td> <a class='EditSingleCourse' data-id='" + allCouseInfo[i].id + "'>  <i class='fas fas fa-edit'> </i> </a> </td>" +
                        "<td> <a class='DeleteSingleCourse' data-id='" + allCouseInfo[i].id + "'> <i class='fas fa-trash-alt' > </i> </a></td>"
                    ).appendTo("#course_table");
                });





                //Delete singel course icon action

                $('.DeleteSingleCourse').click(function () {
                    var delId = $(this).data('id');

                    $("#DeleteCourseId").html(delId);
                    $("#CourseDeleteModal").modal('show');
                })


                //Edit singel course icon action

                $('.EditSingleCourse').click(function () {
                    var editCourseId = $(this).data('id');

                    $("#EditCourseId").html(editCourseId);
                    $("#editCourseModal").modal('show');

                    singleCourseData(editCourseId);
                })


                //Add data table metnod
                $('#CourseTable').DataTable();
                $('.datatables_length').addClass('bs-select');





            } else {
                $("WrongCourse").removeClass('d-none');
            }

        }).catch(function (error) {

        });


}

//Add new course

$("#addCourseBtn").click(function () {
    $("#addCourseModal").modal('show');


})

$("#addCourseConfirmBtn").click(function () {
    var courseName = $("#AddCourseName").val();
    var courseDes = $("#AddCourseDes").val();
    var coursefee = $("#AddCoursefee").val();
    var TotalCourseEnroll = $("#AddtotalEnroll").val();
    var TotalCourseClass = $("#AddCourseClass").val();
    var courseLink = $("#AddCourseLink").val();
    var courseImg = $("#addCourseImage").val();

    addNewCoures(courseName, courseDes, coursefee, TotalCourseEnroll, TotalCourseClass, courseLink, courseImg);
})


function addNewCoures(courseName, courseDes, coursefee, TotalCourseEnroll, TotalCourseClass, courseLink, courseImg) {

    if (courseName.length == 0) {
        toastr.error("Course Name is empty !");
    } else if (courseDes.length == 0) {
        toastr.error("Course Description is empty !");
    } else if (coursefee.length == 0) {
        toastr.error("Course Fee is empty !");
    } else if (TotalCourseEnroll.length == 0) {
        toastr.error("Course Enroll number is empty !");
    } else if (TotalCourseClass.length == 0) {
        toastr.error("Course Class Number is empty !");
    } else if (courseLink.length == 0) {
        toastr.error("Course Link is empty !");
    } else if (courseImg.length == 0) {
        toastr.error("Course Image link is empty !");
    } else {
        axios.post("/addcourse", { course_name: courseName, course_des: courseDes, course_fee: coursefee, course_totall_enroll: TotalCourseEnroll, course_totall_class: TotalCourseClass, course_link: courseLink, course_img: courseImg })
            .then(function (response) {

                if (response.status == 200) {
                    if (response.data == 1) {
                        toastr.success("Course Added successfully");
                        getCourseData();
                        $("#addCourseModal").modal('hide');
                    } else {
                        toastr.error("Sorry!! Try Again Please");
                        getCourseData();
                        $("#addCourseModal").modal('hide');
                    }
                } else {
                    toastr.error("Somthing went wrong!!");
                    getCourseData();
                    $("#addCourseModal").modal('hide');
                }

            }).catch(function (error) {
                toastr.error(error);
                getCourseData();
                $("#addCourseModal").modal('hide');
            })
    }


}



//Delete Singel Course confirm


$("#CourseDeleteConfirmBtn").click(function () {
    var deleteId = $("#DeleteCourseId").html();
    deleteCourse(deleteId);
})


function deleteCourse(deleteId) {
    axios.post("/deletecourse", { delete_id: deleteId })
        .then(function (response) {
            if (response.status == 200) {
                if (response.data == 1) {
                    toastr.success("Course Deleted successfully");
                    getCourseData();
                    $("#CourseDeleteModal").modal('hide');
                } else {
                    toastr.error("Course Deleted successfully");
                    getCourseData();
                    $("#CourseDeleteModal").modal('hide');
                }
            } else {
                toastr.error("Somthing went Worng");
                getCourseData();
                $("#CourseDeleteModal").modal('hide');
            }
        }).catch(function (error) {
            toastr.error(error);
            getCourseData();
            $("#CourseDeleteModal").modal('hide');
        })
}



// Edit Single Course

//Befor edit view single post in edit form

function singleCourseData(EditId) {
    axios.post("/viewsinglecourse", { EditId })
        .then(function (response) {
            if (response.status == 200) {
                var singleCourseJson = response.data;

                $("#EditCourseid").val(response.data[0].id);
                $("#EditCourseName").val(response.data[0].course_name);
                $("#editCourseDes").val(response.data[0].course_des);
                $("#editCoursFee").val(response.data[0].course_fee);
                $("#editCourseEnroll").val(response.data[0].course_totall_enroll);
                $("#editCourseTotalClass").val(response.data[0].course_totall_class);
                $("#editCoursLink").val(response.data[0].course_link);
                $("#editCoursImg").val(response.data[0].course_img);




            } else {
                toastr.error('Somthing went wrong');
            }
        }).catch(function (error) {
            toastr.error(error);
        })
}



// Update couser data

$("#CourseUpdatConfirmBtn").click(function () {

    var updateCourseId = $("#EditCourseid").val();

    var updateCourseName = $("#EditCourseName").val();

    var updateCourseDes = $("#editCourseDes").val();

    var updateCourseFee = $("#editCoursFee").val();

    var updateCourseEnroll = $("#editCourseEnroll").val();

    var updateCouseClass = $("#editCourseTotalClass").val();

    var updateCouseLink = $("#editCoursLink").val();

    var updateCourseImg = $("#editCoursImg").val();


    updateCourseData(updateCourseId, updateCourseName, updateCourseDes, updateCourseFee, updateCourseEnroll, updateCouseClass, updateCouseLink, updateCourseImg);
})


function updateCourseData(updateCourseId, updateCourseName, updateCourseDes, updateCourseFee, updateCourseEnroll, updateCouseClass, updateCouseLink, updateCourseImg) {

    if (updateCourseName.length == 0) {
        toastr.error("Course Name is empty !");
    } else if (updateCourseDes.length == 0) {
        toastr.error("Course Des is empty !");
    } else if (updateCourseFee.length == 0) {
        toastr.error("Course Fee is empty !");
    } else if (updateCourseEnroll.length == 0) {
        toastr.error("Course Enroll number is empty !");
    } else if (updateCouseClass.length == 0) {
        toastr.error("Course Class Number is empty !");
    } else if (updateCouseLink.length == 0) {
        toastr.error("Course Link is empty !");
    } else if (updateCourseImg.length == 0) {
        toastr.error("Course image is empty !");
    } else {

        axios.post("/updatecourse", { id: updateCourseId, course_name: updateCourseName, course_des: updateCourseDes, course_fee: updateCourseFee, course_totall_enroll: updateCourseEnroll, course_totall_class: updateCouseClass, course_link: updateCouseLink, course_img: updateCourseImg })
            .then(function (response) {

                // alert(response.data);

                if (response.status == 200) {
                    if (response.data == 1) {
                        toastr.success("Course updated successfully");
                        getCourseData();
                        $("#editCourseModal").modal('hide');
                    } else {
                        toastr.error("Sorry!! Try Again");
                        getCourseData();
                        $("#editCourseModal").modal('hide');
                    }
                } else {
                    toastr.error("Somthing went wrong");
                    getCourseData();
                    $("#editCourseModal").modal('hide');
                }
            }).catch(function (error) {
                toastr.error(error);
                getCourseData();
                $("#editCourseModal").modal('hide');
            })
    }
}






//Project admin controll

function getProjectData() {
    axios.get("/projectsdata")
        .then(function (response) {
            if (response.status == 200) {

                $('#ProjectTable').DataTable().destroy();
                $("#project_table").empty();

                $("#ProjectTable").removeClass('d-none');
                $("#LoaderProject").addClass('d-none');


                var projectData = response.data;

                $.each(projectData, function (i, item) {
                    $("<tr>").html(
                        "<td>" + projectData[i].project_name + " </td>" +
                        "<td>" + projectData[i].project_des + " </td>" +
                        "<td>" + projectData[i].project_link + " </td>" +
                        "<td> <img src='" + projectData[i].project_img + "' width='80px'> </td>" +
                        "<td> <a class='projectEdit' data-id='" + projectData[i].id + "' > <i class='fas fa-edit' > </i>  </a>  </td>" +
                        "<td> <a class='projectDelete' data-id='" + projectData[i].id + "' > <i class='fas fa-trash-alt' > </i>  </a>  </td>"

                    ).appendTo("#project_table");
                });



                //Project Edit icon action

                $(".projectEdit").click(function () {

                    var EditProjectId = $(this).data('id');
                    $("#editProject").modal('show');
                    SinglProject(EditProjectId);
                });


                //project Delete icon action
                $(".projectDelete").click(function () {

                    var delterProjectId = $(this).data('id');
                    $("#projectdeleteModal").modal('show');

                    $("#projectdeleteid").html(delterProjectId);

                });



                //data table added

                $('#ProjectTable').DataTable({ 'order': false });
                $('.datatables_length').addClass('bs-select');




            } else {
                toastr.error(response.status);
            }
        }).catch(function (error) {
            toastr.error(error);
        })
}


// add Projcet link click action
$("#addProjectbtn").click(function () {
    $("#addProjectModal").modal("show");
})

// add Projcet confirm Button click action
$("#AddProjectCofirmBtn").click(function () {
    var projectName = $("#AddProjectName").val();
    var projectDes = $("#AddProjectDes").val();
    var projectLink = $("#AddProjectLink").val();
    var projectImg = $("#AddProjectImage").val();

    addNewProject(projectName, projectDes, projectLink, projectImg);
})


function addNewProject(projectName, projectDes, projectLink, projectImg) {
    axios.post('/addproject', { project_name: projectName, project_des: projectDes, project_link: projectLink, project_img: projectImg })
        .then(function (response) {
            if (response.status == 200) {

                if (response.data == 1) {
                    toastr.success("Project Added successfully");
                    getProjectData();
                    $("#addProjectModal").modal("hide");

                } else {
                    toastr.error("Sorry!! Please try again");
                    getProjectData();
                    $("#addProjectModal").modal("hide");
                }
            } else {
                toastr.error(response.status);
                getProjectData();
                $("#addProjectModal").modal("hide");
            }
        }).catch(function (error) {
            toastr.error(error);
            getProjectData();
            $("#addProjectModal").modal("hide");

        })
}


//Show Singe project info for edit

function SinglProject(EditProjectId) {
    axios.post('getsingelproject', { id: EditProjectId })
        .then(function (response) {
            if (response.status == 200) {
                var singleprojectInfo = response.data;

                $("#editprojectId").val(singleprojectInfo[0].id);
                $("#edtiProjectName").val(singleprojectInfo[0].project_name);

                $("#edtiProjectDes").val(singleprojectInfo[0].project_des);
                $("#edtiProjectLink").val(singleprojectInfo[0].project_link);
                $("#edtiProjectimg").val(singleprojectInfo[0].project_img);
            }
        })
}









//edit project
$("#projectUpdateConfirmBtn").click(function () {
    var edtiProjectid = $("#editprojectId").val();
    var edtiProjectName = $("#edtiProjectName").val();
    var edtiProjectDes = $("#edtiProjectDes").val();
    var edtiProjectLink = $("#edtiProjectLink").val();
    var edtiProjectimg = $("#edtiProjectimg").val();

    updateProject(edtiProjectid, edtiProjectName, edtiProjectDes, edtiProjectLink, edtiProjectimg)
})


//update Project

function updateProject(edtiProjectid, edtiProjectName, edtiProjectDes, edtiProjectLink, edtiProjectimg) {
    axios.post("/updateproject", { id: edtiProjectid, project_name: edtiProjectName, project_des: edtiProjectDes, project_link: edtiProjectLink, project_img: edtiProjectimg })
        .then(function (response) {
            if (response.status == 200) {
                if (response.data == 1) {
                    toastr.success('Project Updated successfully');
                    getProjectData();
                    $("#editProject").modal("hide");
                } else {
                    toastr.error('Sorry!! try Again');

                    getProjectData();
                    $("#editProject").modal("hide");
                }
            } else {
                toastr.error('Somthing Went wrong');
                getProjectData();
                $("#editProject").modal("hide");
            }
        }).catch(function (error) {
            toastr.error(error);
            getProjectData();
            $("#editProject").modal("hide");
        })
}



// Delete Project


$("#projectDeleteConfirmBtn").click(function () {
    var deleteporjectId = $("#projectdeleteid").html();
    axios.post("/deleteproject", { id: deleteporjectId })
        .then(function (response) {
            if (response.status == 200) {
                if (response.data == 1) {

                    toastr.success('Project Deleted successfully');
                    getProjectData();
                    $("#projectdeleteModal").modal("hide");

                } else {

                    toastr.error('Sorry!! Try Again');
                    getProjectData();
                    $("#projectdeleteModal").modal("hide");

                }
            } else {
                toastr.error('Somthing Went Wrong');
                getProjectData();
                $("#projectdeleteModal").modal("hide");
            }
        }).catch(function (error) {
            toastr.error(error);
            getProjectData();
            $("#projectdeleteModal").modal("hide");
        })
})


//Contact US section

function getContactUsMessage() {
    axios.get('/contactus')
        .then(function (response) {
            if (response.status == 200) {

                var allmessage = response.data;

                $("#ContactUstable").DataTable().destroy();
                $("#ContactUsMessage_table").empty();


                $.each(allmessage, function (i, item) {
                    $("<tr>").html(
                        "<td>" + allmessage[i].name + "</td>" +
                        "<td>" + allmessage[i].mobile + "</td>" +
                        "<td>" + allmessage[i].email + "</td>" +
                        "<td>" + allmessage[i].massage + "</td>" +
                        "<td> <a class='messagedelete' data-id='" + allmessage[i].id + "'>  <i class='fas fa-trash-alt' > </i> </a> </td>"
                    ).appendTo('#ContactUsMessage_table');


                    //Message delete icon action


                });


                $(".messagedelete").click(function () {
                    var messageId = $(this).data('id');
                    $("#MessagedeleteModal").modal("show");

                    $("#Messagedeleteid").html(messageId);
                });


                //add datatable

                $("#ContactUstable").DataTable({'order':false})
                $('.datatables_length').addClass('bs-select');



            }
        })
}


$("#MessageDeleteConfirmBtn").click(function () {
    var deleteMsgId = $("#Messagedeleteid").html();
    axios.post("/deletemessage", { id: deleteMsgId })
        .then(function (response) {
            if (response.status == 200) {
                if (response.data == 1) {
                    toastr.success("Message Deleted successfully");
                    getContactUsMessage();
                    $("#MessagedeleteModal").modal("hide");

                } else {
                    toastr.success("Sorry!! Try Again");
                    getContactUsMessage();
                    $("#MessagedeleteModal").modal("hide");

                }
            }else{
                toastr.success("Somthing Went Wrong");
                getContactUsMessage();
                $("#MessagedeleteModal").modal("hide");
            }
        }).catch(function(error){
            toastr.success(error);
            getContactUsMessage();
            $("#MessagedeleteModal").modal("hide");
        })
})

