@extends('layout.app')

@section('content')

<div class="container my-5" id="ProjectSection">

    <button class="btn btn-danger btn-sm mb-3" id="addProjectbtn">Add Project</button>
    <table class="table table-striped table-bordered d-none" id="ProjectTable">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Project Descriton</th>
                <th>Project Link</th>
                <th>Project Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="project_table">


        </tbody>
    </table>
</div>




<div class="container mt-5" id="LoaderProject">
    <div class="m-auto text-center">

        <img class="mt-5" src="images/Rhombus.gif" alt="">
    </div>
</div>








   <!--Add Modal -->
   <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body mt-3 p-5">

            <h4>Add a Project</h4>


            <input type="text" id="AddProjectName" class="form-control" placeholder="Project Name"/> <br>
            <input type="text" id="AddProjectDes" class="form-control" placeholder="Project Des"/> <br>
            <input type="text" id="AddProjectLink" class="form-control" placeholder="Project link"/> <br>
            <input type="text" id="AddProjectImage" class="form-control" placeholder="Image Link"/> <br>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancle</button>
          <button id="AddProjectCofirmBtn"  type="button" class="btn btn-danger btn-sm">Add Project</button>
        </div>
      </div>
    </div>
  </div>









   <!--Edit Modal -->
   <div class="modal fade" id="editProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body mt-3 p-5">
            <input type="text" id="editprojectId" class="form-control d-none" /> <br>
            <input type="text" id="edtiProjectName" class="form-control" placeholder="Project Name"/> <br>
            <input type="text" id="edtiProjectDes" class="form-control" placeholder="Project Des"/> <br>
            <input type="text" id="edtiProjectLink" class="form-control" placeholder="Project link"/> <br>
            <input type="text" id="edtiProjectimg" class="form-control" placeholder="Project Img"/> <br>

          <h6 id="editid" class="d-none"></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancle</button>
          <button id="projectUpdateConfirmBtn"  type="button" class="btn btn-danger btn-sm">Update</button>
        </div>
      </div>
    </div>
  </div>



  <!--Delete Modal -->
  <div class="modal fade" id="projectdeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body mt-3">
          Do you want to delete?

          <h6 id="projectdeleteid" class="d-none"></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
          <button id="projectDeleteConfirmBtn"  type="button" class="btn btn-danger btn-sm">Yes</button>
        </div>
      </div>
    </div>
  </div>


@endsection


@section('script')
<script>
    getProjectData();
</script>

@endsection
