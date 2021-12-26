@extends('layout.app')

@section('content')
<div class="container my-5 d-none " id="CourseSection">

    <button class="btn btn-danger btn-sm mb-3" id="addCourseBtn">Add Courses</button>
    <table class="table table-striped table-bordered" id="CourseTable">
        <thead>
            <tr>
                <th >Coures Name</th>
                <th>Course Des</th>
                <th>Course fee</th>
                <th>Course Total Enroll</th>
                <th>Course Class</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody id="course_table">


        </tbody>
    </table>
</div>

<div class="container mt-5" id="LoaderCourses">
    <div class="m-auto text-center">

        <img class="mt-5" src="images/Rhombus.gif" alt="">
    </div>
</div>


<div class="container mt-5 d-none" id="WrongCourse">
    <div class=" w-25 m-auto">

        <h4>Somthing went wrong</h4>
    </div>
</div>




   <!--Courese Add Modal -->
   <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body mt-3 p-5">

            <h4>Add a Course</h4>


            <input type="text" id="AddCourseName" class="form-control" placeholder="Coures Name"/> <br>
            <input type="text" id="AddCourseDes" class="form-control" placeholder="Coures Des"/> <br>
            <input type="text" id="AddCoursefee" class="form-control" placeholder="Coures Fee"/> <br>
            <input type="text" id="AddtotalEnroll" class="form-control" placeholder="Total Enroll"/> <br>
            <input type="text" id="AddCourseClass" class="form-control" placeholder="Total Class"/> <br>
            <input type="text" id="AddCourseLink" class="form-control" placeholder="Coures Link"/> <br>

            <input type="text" id="addCourseImage" class="form-control" placeholder="Image Link"/> <br>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancle</button>
          <button id="addCourseConfirmBtn"  type="button" class="btn btn-danger btn-sm">Add Course</button>
        </div>
      </div>
    </div>
  </div>




     <!--Courese Delete Modal -->


  <div class="modal fade" id="CourseDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body pt-5 text-center">
         <h5> Do You want to delete? </h5>
         <h5 id="DeleteCourseId" class="d-none"></h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancle</button>
          <button type="button" id="CourseDeleteConfirmBtn" class="btn btn-danger btn-sm">Confirm Delete</button>
        </div>
      </div>
    </div>
  </div>




   <!--Course Edit Modal -->
   <div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body mt-3 py-2 px-5">

            <h4>Edit Course</h4>



                    <input type="hidden" id="EditCourseid" class="form-control" placeholder="Course Id"/> <br>

                    <input type="text" id="EditCourseName" class="form-control" placeholder="Course Name"/> <br>

                    <input type="text" id="editCourseDes" class="form-control" placeholder="Course Des"/> <br>

                    <input type="text" id="editCoursFee" class="form-control" placeholder="Courese Fee"/> <br>




                    <input type="text" id="editCourseEnroll" class="form-control" placeholder="Course Total Enroll	"/> <br>
                    <input type="text" id="editCourseTotalClass" class="form-control" placeholder="Course Class	"/> <br>
                    <input type="text" id="editCoursLink" class="form-control" placeholder="Courese Link"/> <br>
                    <input type="text" id="editCoursImg" class="form-control" placeholder="Courese Image"/> <br>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancle</button>
          <button id="CourseUpdatConfirmBtn"  type="button" class="btn btn-danger btn-sm">Update</button>
        </div>
      </div>
    </div>
  </div>



@endsection



@section('script')
<script>

getCourseData();


</script>
@endsection
