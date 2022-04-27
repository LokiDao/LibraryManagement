<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Library Management</title>

        <link href="~/../libs/fontawesome/css/font-awesome.css" rel="stylesheet" />    
    <link rel="stylesheet" href="~/../libs/bootstrap.css"> 
    <script src="~/../libs/jquery.min.js"></script>
    <script src="~/../libs/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    </head>
    <body class="antialiased">
        <div>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
		</div>
		<div>
            <a href='/os' title='Order Management' data-toggle='tooltip'><i class='fa fa-plus'>Order</i></a>
            | 
            <a href='/bs' title='Book Management' data-toggle='tooltip'><i class='fa fa-plus'>Book</i></a>
            | 
            <a href='/us' title='User Management' data-toggle='tooltip'><i class='fa fa-plus'>User</i></a>
	        </div>
            <div>
            Add Book 
	        </div>
	        <span class="help-block">@isset($msg) {{$msg}} @endisset</span>
	        <form name="add-book-form" method="post" action="/b">
	        @csrf
                        <div class="form-group">
                            <label>Code</label>
                            <input name="code" class="form-control" required value="">
                            <span class="help-block"> </span>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" class="form-control" required value="">
                            <span class="help-block"> </span>
                        </div>
                        <input type="submit" name="addbtn" class="btn btn-primary" value="Submit">
                        <a href="/bs" class="btn btn-default">Cancel</a>
	        </form>
    </body>
</html>
