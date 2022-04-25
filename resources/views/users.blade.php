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
            List User 
	        </div>
	        <span class="help-block">@isset($msg) ? {{$msg}} : '' @endisset</span>
	        <table class="center", border=1>
        	   <tr>
	        	<th>ID</th>
	        	<th>Email</th>
	        	<th>Name</th>
	        	<th>Role</th>
	        	<th>Status</th>
	            <th><a href='/u' title='New' data-toggle='tooltip'><i class='fa fa-plus'>New</i></a></td>
	            </tr>
	        @foreach ($users as $user)
	        <tr>
	            <td>{{$user->id}}</td>
	            <td>{{$user->email}}</td>
	            <td>{{$user->name}}</td>
	            <td>{{($user->role == 0) ? 'Student' : 'Admin'}}</td>
	            <td>{{($user->status == 0) ? 'Active' : 'Inactive'}}</td>
	            <td>
	            	<a href='/u{{$user->id}}' title='Edit' data-toggle='tooltip'><i class='fa fa-edit'>Edit</i></a>
	            	<a href='/us{{$user->id}}' title='Delete' data-toggle='tooltip'><i class='fa fa-trash'>Delete</i></a>
	            </td>
	        </tr>
	        @endforeach
	        </table>
    </body>
</html>
