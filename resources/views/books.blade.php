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
            List User 
	        </div>
	        <form name="search-book-form" method="get" action="/bf">
	        @csrf
                            <input name="key" class="form-control" value="">
                            <span class="help-block"> </span>
                        <input type="submit" name="searchbtn" class="btn btn-primary" value="Search">
	        </form>
	        <br/>
	        <div>
	        <span class="help-block">@isset($msg) {{$msg}} @endisset</span>
	        <table class="center", border=1>
        	   <tr>
	        	<th>ID</th>
	        	<th>Code</th>
	        	<th>Name</th>
	        	<th>Status</th>
	            <th><a href='/b' title='New' data-toggle='tooltip'><i class='fa fa-plus'>New</i></a></td>
	            </tr>
	        @isset($books)
	        @foreach ($books as $book)
	        <tr>
	            <td>
	            <a href='/b{{$book->id}}' title='Edit' data-toggle='tooltip'><i class='fa fa-edit'>{{$book->id}}</i></a>
	            </td>
	            <td>
	            <a href='/b{{$book->id}}' title='Edit' data-toggle='tooltip'><i class='fa fa-edit'>{{$book->code}}</i></a>
	            </td>
	            <td>{{$book->name}}</td>
	            <td>{{($book->status == 0) ? 'Active' : 'Inactive'}}</td>
	            <td>
	            	<a href='/b{{$book->id}}' title='Edit' data-toggle='tooltip'><i class='fa fa-edit'>Edit</i></a>
	            	<a href='/bs{{$book->id}}' title='Delete' data-toggle='tooltip'><i class='fa fa-trash'>Delete</i></a>
	            </td>
	        </tr>
	        @endforeach
	        @endisset
	        </table>
	        </div>
    </body>
</html>
