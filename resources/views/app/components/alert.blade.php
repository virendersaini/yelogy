<div class="alertable alert alert-dismissible alert-{{$type}}">
  <button type="button" class="close" data-dismiss="alert">×</button>
  {{ $slot }}
</div>

@push("scripts")
	<script type="text/javascript">
		//$(".alertable").delay(10000).fadeOut(400);
	</script>
@endpush