<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EDU</title>

        <!-- CSRF Token -->    
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <!--link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"-->
		<link rel="stylesheet" type="text/css" href="{{asset('css/education.css')}}"/>

        <!-- Styles -->
    </head>
    <body>
        <div id="app">
			<edu-Header></edu-Header>
			<edu-Main></edu-Main>
			<edu-Footer></edu-Footer>
		</div>
        <script src="{{asset('js/course.js')}}"></script>
        <script src="{{ URL::asset('js/spark-md5.min.js') }}"></script><!--需要引入spark-md5.min.js--> 
        <script src="//cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script><!--需要引入jquery.min.js--> 
        <script src="{{ URL::asset('js/aetherupload.js') }}"></script><!--需要引入aetherupload.js--> 
    </body>
</html>
