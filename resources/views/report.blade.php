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
		table thead  th, table tbody td{
			padding:5px;
			font-size:12px;
			padding:10px;
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
		<table border="1" cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-condensed table-bordered">
			<thead>
				<tr>
					<th width="5%">Name</th>
					<th width="10%">Email</th>
					<th width="15%">Address</th>
					<th width="10%">Phone</th>
					<th width="15%">Country</th>
					<th width="15%">Province</th>
					<th>Content</th>
				</tr>
			</thead>
			<tbody>
					@foreach($data as $val)
						<tr>
							<td>{!!$val->name!!}</td>
							<td>{!!$val->email!!}</td>
							<td>{!!$val->user->address!!}</td>
							<td>{!!$val->phone!!}</td>
							<td>{!!$val->user->country!!}</td>
							<td>{!!$val->user->province!!}</td>
							<td>{!!$val->contents!!}</td>
						</tr>
					@endforeach
			</tbody>
		</table>
	</div>

</body>
</html>