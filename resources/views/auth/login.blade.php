{{-- View For URL- /login --}}

@extends('auth.master')

@section('title', 'Log In')

@section('content')

	@if($errors->has())

		<div role="alert" class="alert alert-danger alert-base alert-dismissible fade in">
			<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
			<h4>Oh snap! You got Some Error!</h4>
			<ul class="error-list">
			{{-- <li><span>Password</span> are required</li> --}}
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif


	<h4 class="log-heading text-center">You must login to access</h4>

	<form method="POST" action="{{ url('/login') }}" class="form-horizontal">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<div class="log-box">
			<div class="log-box-body">
				<div class="form-group">
					<div class="col-sm-12">
						<label for="user-name">Username</label>
						<input required type="text" value="{{Request::old('user_name')}}" class="form-control" name="user_name" placeholder="your_name">
					</div>                                    
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label for="password">Password</label>
						<input required type="password" value="{{Request::old('password')}}" class="form-control"name="password" placeholder="Password">
					</div>
				</div>
			</div>
			<div class="log-box-footer">
			<button type="submit" class="btn btn-danger btn-block">login to my account</button>
			</div>
		</div>
        
    <div class="col-sm-12">    
        <div class="mt-20 col-sm-6">
			<a class="forgt-pass" href="{{url('/register')}}">Create New Account</a>
		</div>
		<div class="text-right mt-20 col-sm-6">
			<a class="forgt-pass" href="">Forgot password?</a>
		</div>
    </div>		
	</form>

@stop