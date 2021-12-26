@extends('layout.app')

@section('content')

<div class="container my-5 d-none" id="ServiceSection">

    <button class="btn btn-danger btn-sm mb-3" id="addServicebtn">Add Service</button>
    <table class="table table-striped table-bordered" id="serviceTable">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="service_table">


        </tbody>
    </table>
</div>



<div class="container mt-5" id="LoaderService">
    <div class="m-auto text-center">

        <img class="mt-5" src="images/Rhombus.gif" alt="">
    </div>
</div>


<div class="container d-none mt-5" id="WrongService">
    <div class=" w-25 m-auto">

        <h4>Somthing went wrong</h4>
    </div>
</div>







  <!--Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body mt-3">
          Do you want to delete?

          <h6 id="deleteid" class="d-none"></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
          <button id="deleteConfirmBtn"  type="button" class="btn btn-danger btn-sm">Yes</button>
        </div>
      </div>
    </div>
  </div>




   <!--Edit Modal -->
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body mt-3 p-5">
            <input type="hidden" id="editserviceId" class="form-control" /> <br>
            <input type="text" id="editImgLink" class="form-control" placeholder="Image Link"/> <br>
            <input type="text" id="editSeriviceName" class="form-control" placeholder="Service Name"/> <br>
            <input type="text" id="editServiceDes" class="form-control" placeholder="Service Des"/> <br>

          <h6 id="editid" class="d-none"></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancle</button>
          <button id="serviceUpdatConfirBtn"  type="button" class="btn btn-danger btn-sm">Update</button>
        </div>
      </div>
    </div>
  </div>



   <!--Add Modal -->
   <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body mt-3 p-5">

            <h4>Add a service</h4>


            <input type="text" id="AddSeriviceName" class="form-control" placeholder="Service Name"/> <br>
            <input type="text" id="AddServiceDes" class="form-control" placeholder="Service Des"/> <br>
            <input type="text" id="addImageLink" class="form-control" placeholder="Image Link"/> <br>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancle</button>
          <button id="addServiceConfirmBtn"  type="button" class="btn btn-danger btn-sm">Update</button>
        </div>
      </div>
    </div>
  </div>


@endsection


@section('script')
<script>

getServiceData();


</script>
@endsection




