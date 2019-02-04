@extends('admin.layout.app')

@push('title')

Tag Listing

@endpush

@push('breadcrumbs')
<li><a href="">Home</a></li>
<li class="active">Tag Listing</li>
@endpush
    
@section('content')
<div class="row">
    <div class="col-sm-12">
        @formErrors {{-- Form Validation Errors --}}
        @endformErrors
    </div>
</div>
@flashMessage() {{-- Session Flash Messages --}}
@endflashMessage

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
           <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('tag-manager.create')}}?key=type&map={{request()->query('map')}}&type={{request()->query('type')}}"  class="btn btn-primary pull-right" ><i class="fa fa-plus-circle"></i>Add Tag Type</a>&nbsp;&nbsp;
                        <a href="{{route('tag-manager.create')}}?key=tag&map=house&type=bathroom"  class="btn btn-primary pull-right" style="margin: 0px 5px 0px 0px;"><i class="fa fa-plus-circle"></i>Add Tag</a>
                    </div>
                    <div class="card-body tagsmanager">                          
                       <div class="table-responsive">
                            {!! $dataTable->table() !!}                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div> <!-- .content -->

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Product Type </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form id="producttype">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <label class=" form-control-label">Name</label>
                            <input type="text" name="name" value="" class="name form-control">
                            <span class="error"></span>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success addLoading">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="edit_model">
</div>

@endsection
@push('scripts')
{!! $dataTable->scripts() !!} 
<script type="text/javascript">	
    function format ( data ) {
        var tblhead = '<table cellpadding="5" width="90%" cellspacing="0" border="0" style="    margin-left: 25px;">'+
            '<tbody>';

        var tblend = '</tbody></table>';
        var tblbody = "";
        $.each(data, function(index, tag){
            console.log(tag);
            tblbody += '<tr>'+
                '<td>'+tag.id+'</td>'+
                '<td>'+tag.tag_name+'</td>'+
                '<td><a href="javascript:void(0)" name="1" id="edit_1" class="text-primary"><i class="fa fa-edit"></i> '+
                ' <a href="javascript:void(0)" -button-type="delete" class="deletemen delete-alert text-danger"><i class="fa fa-trash"></i></a>'+
                    '<form  method="POST" name="delete" class="dispfr">'
                        '{{csrf_field()}}'
                        '{{method_field("DELETE")}}'                    
                    '</form>'+
                '</td>'+
            '</tr>';
        });
        return  tblhead + tblbody + tblend;
    }
	$(document).ready(function() {
        var table =$('#dataTableBuilder').dataTable().api();
        $('#dataTableBuilder tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
     
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data().tag_manager)).show();
                tr.addClass('shown');
            }
        });
        
    });
   
    $(document).on('click', ".edit", function(e){
        console.log(e.target)
        e.preventDefault();
        var id = $(this).attr('data-id'),
        url = $(this).attr('href');
        axios.get(url).then(function (response) {
            $('#edit_model').html(response.data);
            $('#edit_model').modal('toggle').addClass('show');            
            return false;
          }).catch(function (error) {
            console.log(error);
          });
    });
    $(document).on('submit', '#tags_type', function (event) {
        event.preventDefault();
        $('.editloading').LoadingOverlay("show");
        $('.error').empty();
        var id = $('[name=id]').val();
        var url = window.app.url+'/admin/tag-manager/'+id;
        axios.put(url, $(this).serialize()).then(function (response) {
                $('#edit_model').modal('hide');
                $('.editloading').LoadingOverlay("hide"); 
                setTimeout(function(){
                location.reload();}, 2000);   
        }).catch(function (error) {
            $('.editloading').LoadingOverlay("hide"); 
            $.each(error.response.data.errors, function (key, value) {
                $("#tags_type").find("." + key).next("span.error").css({"color" : "red","font-size" : "85%"}).text(value)
            });
        });
    });
</script>
@endpush

@push('scripts')
<script type="text/javascript">	
	$(document).on('click','.deletemen',function(e){		
		if(confirm('Are you sure, you want to delete this item ?')){
			$("#delete").submit();
		}else{
			e.preventDefault();
		}
	});
	$('.alert').fadeOut(4000);
</script>
@endpush