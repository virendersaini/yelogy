<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Tag</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <form id="tags_type">
            <div class="modal-body">
                <div class="row">
                   <div class="col-sm-12">
                    <?php //print_r($tag);die; ?>
                      <input type="hidden" name="id" value="{{$tag['id']}}">
                        <label class=" form-control-label">Tag Name</label>
                        <input type="text" name="name" value="{{$tag['name']}}" class="name form-control">
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
