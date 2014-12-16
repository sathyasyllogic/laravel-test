@extends('layouts.default')
@section('content')
<div class="col-lg-8 col-lg-offset-2">
	<form id="defaultForm" method="post" class="form-horizontal" action="<?php echo URL::to('/users/login'); ?>">
		<h1>Login</h1>

		<!-- if there are login errors, show them here -->
		@if (Session::get('loginError'))
			<div class="alert alert-danger">{{ Session::get('loginError') }}</div>
		@endif
        <p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
		</p>
           <div class="form-group">
			<label class="col-lg-3 control-label">
				 <label class="col-lg-3 control-label">
					Email Address
				</label>
			</label>
			<div class="col-lg-5">
				
				<input type="text" name="email" id ="email" class="form-control" />
			</div>
        </div>
           <div class="form-group">
			<label class="col-lg-3 control-label">
				 <label class="col-lg-3 control-label">
					Password
				</label>
			</label>
			<div class="col-lg-5">
				<input type="password" name="password" id ="password" class="form-control" />
			</div>
        </div>
		
		<p>{{ Form::submit('Submit!') }}</p>
	</form>
  </div>
@stop
