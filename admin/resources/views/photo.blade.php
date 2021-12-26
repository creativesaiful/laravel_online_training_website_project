@extends('layout.app')

@section('title', 'Photo Gallery')

@section('content')

<div class="container my-5" id="ServiceSection">

    <button class="btn btn-danger btn-sm mb-3" id="addPhotoBtn">Add Photo</button>

</div>



 <!--Add Modal -->
 <div class="modal fade" id="AddPhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content py-3">
        <div class="modal-header">
            <h4 class="modal-title">Add New Photo</h4>
        </div>
        <div class="modal-body mt-3">


            <input type="file" name="photo" id="imgImput" class="form-control"> <br> <br>
            <img src="" id="previewImage" height="200px" >


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
          <button id="addPhotocConfirmBnt"  type="button" class="btn btn-danger btn-sm">Yes</button>
        </div>
      </div>
    </div>
  </div>





@endsection

@section('script')

<script>

$("#addPhotoBtn").click(function(){
    $("#AddPhotoModal").modal('show');
})

$("#uploadPhoto").change(function(){
    var reader = new FileReader();
    reader.readAsDataURL(this.files[0]);

    reader.onload=function(event){
       var imageSource =  event.target.result;

       $("#previewImage").attr('src', imageSource);
    }

})


$("#addPhotocConfirmBnt").click(function(){
    var upimg = $("#imgImput").prop('files')[0];

    var formData = new FormData();
    formData.append('photo',upimg);

    axios.post('/uploadphoto',formData)
    .then(function(response){
        if(response.status==200){
            if(response.data==1){
                $('#AddPhotoModal').modal('hide');
                toastr.success("File Uploaded successfully");

            }else{
                $('#AddPhotoModal').modal('hide');
                toastr.error("Sorry!! Try again");
            }
        }else{
            $('#AddPhotoModal').modal('hide');
                toastr.error("Somthing went wrong");
        }
    }).catch(function(error){
            $('#AddPhotoModal').modal('hide');
                toastr.error(error);
        })

})
</script>

@endsection
