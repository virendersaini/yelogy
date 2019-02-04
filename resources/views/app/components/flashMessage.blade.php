<div class="row">
	@if(session()->has("success"))
	<div class="col-sm-12">
		@alert(['type' => 'success'])
		   {{ session()->get("success") }}
		@endalert
	</div>
	@endif
	@if(session()->has("error"))
	<div class="col-sm-12">
		@alert(['type' => 'danger'])
		   {{ session()->get("error") }}
		@endalert
	</div>
	@endif
</div>