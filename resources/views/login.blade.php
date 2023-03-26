@extends('theme')
@section('content')
<div class="login-section section mt-40 mb-50">
    <div class="container">
        <div class="row">
            
            <!-- Login -->
            <div class="col-md-6 col-12 d-flex">
                <div class="ee-login">
                    
                    <h3>Login to your account</h3>
                    <p>E&E provide how all this mistaken idea of denouncing pleasure and sing pain born an will give you a complete account of the system, and expound</p>
                    
                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @if(Session::has('success'))
					    <div class="alert alert-success">{{Session::get('success')}}</div>
				     	@endif
					    @if(Session::has('fail'))
				     	<div class="alert alert-danger">{{Session::get('fail')}}</div>
				     	@endif
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-30"><input type="text" id="email" type="email" placeholder="Type your username or email address" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></div>
                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror

                            <div class="col-12 mb-20"><input type="password" id="password" type="password" placeholder="Enter your passward" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="col-12 mb-15">
                                
                                <input type="checkbox" id="remember_me" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember_me">Remember me</label>
                                
                                <a href="#">Forgotten password?</a>
                                
                            </div>
                            <div class="col-12"><input type="submit" value="LOGIN"></div>
                        </div>
                    </form>
                    <h4>Don’t have account? please click <a href="register">Register</a></h4>
                    
                </div>
            </div>
            
            <div class="col-md-1 col-12 d-flex">
                
                <div class="login-reg-vertical-boder"></div>
                
            </div>
            
            <!-- Login With Social -->
            <div class="col-md-5 col-12 d-flex">
                
                <div class="ee-social-login">
                    <h3>Also you can login with...</h3>
                    
                    <a href="#" class="facebook-login">Login with <i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter-login">Login with <i class="fa fa-twitter"></i></a>
                    <a href="#" class="google-plus-login">Login with <i class="fa fa-google-plus"></i></a>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection