@if (!empty($actions))
	@foreach ($actions as $action)
		<td>
			@if(array_has($action,'delete_route') && $action['delete_route'] === true)
				<a 
					class="btn tbl-action-btn btn-{{ $action['type'] ?? 'primary' }}" 
					onclick="if(confirm('Are you sure, want to delete this item')){
						$('#action_form_{{ $action['id'] ?? str_encrypt($action['href']) }}').submit();
					}" >
					<i class="fa fa-trash"></i>
				</a>
				<form method="post" id="action_form_{{ $action['id'] ?? str_encrypt($action['href']) }}" action="{{ $action['href'] }}">
					@csrf
					@method('DELETE')
				</form>
			@else
				<a data-id="{{$action['id']}}"  class="edit btn tbl-action-btn btn-{{ $action['type'] ?? 'primary' }}" href="{{ $action['href'] ?? '#' }}">
					<i class="fa fa-edit"></i>
				</a>
			@endif
		</td>
	@endforeach
@endif