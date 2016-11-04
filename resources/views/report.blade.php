<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">

    {!!HTML::style(asset('/assets')."/css/bootstrap.min.css")!!}
	<style type="text/css">
		table thead tr{
			background: #21c3ef;
		}
		table thead  th{
			text-transform: uppercase;
		}
		table thead  th{
			color:white;
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
		<table 	width="100%" class="table table-bordered">
			<thead>
				<tr>
					<th width="5%">Name</th>
					<th width="5%">Email</th>
					<th width="15%">Address</th>
					<th width="5%">Phone</th>
					<th width="5%">Country</th>
					<th width="8%">Subject</th>
					<th width="10%">Province</th>
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
							<td>{!!$val->subject!!}</td>
							<td>{!!$val->user->province!!}</td>
							<td>{!!$val->contents!!}</td>
						</tr>
					@endforeach
			</tbody>
		</table>
	</div>

</body>
</html>