<!DOCTYPE html>
<!--
Site: Onextrapixel
URL: http://www.onextrapixel.com
-->
<html>
	<head>
		<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		{!!HTML::style(asset('/assets')."/css/bootstrap.min.css")!!}
		{!!HTML::script(asset('assets/js/select-list/js/script.js'))!!}

	</head>
	<body>
		<div class='selectBox'>
			<form action="">
				<select name="" id="" class="makeMeFancy form-control">
				 	<option value="0" selected="selected" data-skip="1">Choose Your Product</option>
					<option value="1" data-html-text="<p>Iphone 4 </p><p>128 LE QUang Dinh</p>">Iphone 4</option>
					<option value="2" data-html-text="<p>Iphone 5 </p><p>128 LE QUang Dinh</p>">Iphone 5</option>
					<option value="3" data-html-text="<p>Iphone 6 </p><p>128 LE QUang Dinh</p>">Iphone 6</option>
				</select>
			</form>
		</div>
	</body>
</html>