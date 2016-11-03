<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="ROBOT" content="NO FOLLOW, NO INDEX">
	{!!HTML::style(env('PATH_FRONTEND')."/css/404.css")!!}

	<title>404 Page</title>
</head>
<body>
	<div class="wrapper row2">
	  <div id="container" class="clear">
	    <!-- ####################################################################################################### -->
	    <!-- ####################################################################################################### -->
	    <!-- ####################################################################################################### -->
	    <!-- ####################################################################################################### -->
	    <section id="fof" class="clear">
	      <!-- ####################################################################################################### -->
	      <div class="hgroup">
	        <h1><span><strong>4</strong></span><span><strong>0</strong></span><span><strong>4</strong></span></h1>
	        <h2>Error ! <span>Page Not Found</span></h2>
	      </div>
	      {{-- <p>Bạn thấy trang này bởi vì trang bạn đang tìm kiếm không có trên server chúng tôi.</p> --}}
	      <p><a class="btn" href="javascript:history.go(-1)">&laquo; Go Back</a> <a class="btn" href="{!!url('/')!!}">Go Home &raquo;</a></p>
	      <!-- ####################################################################################################### -->
	    </section>
	    <!-- ####################################################################################################### -->
	    <!-- ####################################################################################################### -->
	    <!-- ####################################################################################################### -->
	    <!-- ####################################################################################################### -->
	  </div>
	</div>
</body>
</html>