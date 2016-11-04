<div class="selectBox">
	<select name="shop" id="" class="makeMeFancy form-control">
		<option value="0" selected="selected" data-skip="1">Choose Your Product</option>
		@foreach($arr_data as $data)
		<option value="{!!$data['client']!!}" data-html-text="<p>{!!$data['client']!!}</p><p>{!!$data['address']!!}</p>">{!!$data['client']!!}</option>
		@endforeach
	</select>
</div>

	{!!HTML::script(asset('/assets')."/js/jquery-1.11.2.min.js")!!}
	{!!HTML::script(asset('assets/js/select-list/js/script.js'))!!}
