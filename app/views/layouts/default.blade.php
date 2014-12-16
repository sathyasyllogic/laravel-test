<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<title>{{$page_title}} - BIKA Health </title>
	@include('includes.templates.page.head')
</head>
<body>
<div id="wrapper">
<!-- start header -->
	<header>
		@include('includes.templates.page.header')
		
	</header>
<!-- end header -->
	<section id="inner-headline">
		@include('includes.templates.page.breadcrumbs')
	</section>
	<section id="content">
		<div class="container">
			<div class="row">
				@yield('content')
				
			</div>
		</div>
	</section>
    <footer>	
	@include('includes.templates.page.footer')
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

</body>
</html>
