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
	        <form name="search-order-form" method="get" action="/of">
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
	        	<th>User</th>
	        	<th>Start</th>
	        	<th>End</th>
	        	<th>Books</th>
	        	<th>Status</th>
	            <th><a href='/o' title='New' data-toggle='tooltip'><i class='fa fa-plus'>New</i></a></td>
	            </tr>
	        @isset($orders)
	        @foreach ($orders as $order)
	        <tr>
	            <td>
	            <a href='/o{{$order->id}}' title='Edit' data-toggle='tooltip'><i class='fa fa-edit'>{{$order->id}}</i></a>
	            </td>
	            <td>
	            <a href='/o{{$order->id}}' title='Edit' data-toggle='tooltip'><i class='fa fa-edit'>{{$order->code}}</i></a>
	            </td>
	            <td>
	            <a href='/u{{$order->user->id}}' title='Edit' data-toggle='tooltip'><i class='fa fa-edit'>{{$order->user->email}}</i></a>
	            </td>
	            <td>{{$order->start}}</td>
	            <td>{{$order->end}}</td>
	            <td>
	            @isset($order->books)
	            	@foreach ($order->books as $book)
	            	+ 
	            	<a href='/b{{$book->id}}' title='Edit' data-toggle='tooltip'><i class='fa fa-edit'>[{{$book->code}}] {{$book->name}}</i></a>
	            	</br>
	            	@endforeach
	            @endisset
	            </td>
	            <td>{{($order->status == 0) ? 'Active' : 'Inactive'}}</td>
	            <td>
	            	<a href='/o{{$order->id}}' title='Edit' data-toggle='tooltip'><i class='fa fa-edit'>Edit</i></a>
	            	<a href='/os{{$order->id}}' title='Delete' data-toggle='tooltip'><i class='fa fa-trash'>Delete</i></a>
	            </td>
	        </tr>
	        @endforeach
	        @endisset
	        </table>
	        </div>
    </body>
</html>
