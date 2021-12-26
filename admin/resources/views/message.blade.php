@extends('layout.app')

@section('content')
<div class="container my-5" id="ContactUsMessageSection">


    <table class="table table-striped table-bordered" id="ContactUstable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Message</th>

                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="ContactUsMessage_table">


        </tbody>
    </table>
</div>



  <!--Delete Modal -->
  <div class="modal fade" id="MessagedeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body mt-3">
          Do you want to delete?

          <h6 id="Messagedeleteid" class="d-none"></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
          <button id="MessageDeleteConfirmBtn"  type="button" class="btn btn-danger btn-sm">Yes</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('script')
<script>
getContactUsMessage();
</script>
@endsection
