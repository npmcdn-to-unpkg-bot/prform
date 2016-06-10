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


                    <h4 class="log-heading text-center">Add a New User</h4>

                    <form method="POST" action="{{ url('/register') }}" class="form-horizontal">
                    	<input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <div class="log-box">
                            <div class="log-box-body">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label for="username">Full Name</label>
                                        <input required type="text" value="{{Request::old('full_name')}}" class="form-control" name="full_name" placeholder="Your Name">
                                    </div>                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label for="username">Username</label>
                                        <input required type="text" value="{{Request::old('user_name')}}" class="form-control" name="user_name" placeholder="your_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label for="username">Email</label>
                                        <input required type="email" value="{{Request::old('email')}}" class="form-control" name="email" placeholder="name@mail.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label for="userpassword">Password</label>
                                        <input required type="password" class="form-control"name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label for="userpassword">Retype Password</label>
                                        <input required type="password" class="form-control"name="password_confirmation" placeholder="Give Password Again">
                                    </div>
                                </div>
                            </div>
                            <div class="log-box-footer">
                                <button type="submit" class="btn btn-danger btn-block">Register New Account</button>
                            </div>
                        </div>

                        <div class="text-right mt-20">
                            <a class="forgt-pass" href="">Forgot password?</a>
                        </div>
                    </form>

@stop