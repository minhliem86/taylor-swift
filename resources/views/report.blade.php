<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
	
    {!!HTML::style(env('PATH_FRONTEND')."/css/bootstrap.min.css")!!}
	<style type="text/css">
		table thead tr{
			background: #21c3ef;
		}
		table thead  th{
			text-transform: uppercase;
		}
		table thead  th, table thead td{
			padding:5px;
			font-size:12px;
		}
		.wrap-table{
			padding:15px;
		}
		.top-table{
			margin-bottom: 15px;
		}

	</style>
	<title>Report</title>

</head>
<body>
	<div class="wrap-table">
		<div class="top-table text-right">
			<a href="{!!route('parfarome-download')!!}" class="btn btn-success">Download Report</a>
		</div>
		<table width="100%" class="table table-striped table-condensed table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Profile</th>
					<th>Province</th>
					<th>Feedback</th>
					<th>Created At</th>
				</tr>
			</thead>
			<tbody>
					@foreach($xml as $val)
						<tr>
							<td>{!!$val->name!!}</td>
							<td>{!!$val->email!!}</td>
							<td>{!!$val->address!!}</td>
							<td>{!!$val->phone!!}</td>
							<td>{!!$val->profile!!}</td>
							<td>{!!$val->province!!}</td>
							<td>{!!$val->feedback!!}</td>
							<td>{!!$val->created!!}</td>
						</tr>
					@endforeach
			</tbody>
		</table>
	</div>
	
</body>
</html>