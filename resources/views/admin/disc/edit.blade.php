<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Disc Fields</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <form id="disc_edit">
            <div class="modal-body">
                <div class="row">
                   <div class="col-sm-6">
                   		<input type="hidden" name="id" value="{{$disc->id}}">
                        <?php $options = array("active" => "Active", "inactive" => "Inactive") ?>
                       <label for="tag_type" class=" form-control-label">Status</label>
                       {!!Form::select('status', $options, $disc->status, ['class' => "form-control status"])!!}
                       <span class="error"></span>
                   </div>
                   <div class="col-sm-6">
                        <label class=" form-control-label">Name</label>
                        <input type="text" name="name" value="{{$disc->name}}" class="tag_name form-control">
                        <span class="error"></span>
                   </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success editloading">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>