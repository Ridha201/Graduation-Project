@extends('theme')
@section('content')
<style>
 .modal-header {
  background-color: #f8f9fa;
  border-bottom: none;
}

/* Style the modal title */
.modal-title {
  color: #343a40;
}

/* Style the modal body */
.modal-body {
  padding: 20px;
}

/* Style the form labels */
.form-group label {
  font-weight: bold;
  color: #343a40;
}

/* Style the form input fields */
.form-control {
  border: 1px solid #ced4da;
}

/* Style the modal footer */
.modal-footer {
  border-top: none;
}
</style>

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
                             <div class="">
                                <div class="col-12 mb-30"><input type="text" id="email" type="email" placeholder="Type your username or email address" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>











                            <div class="col-12 mb-30">
                                <input id="password" type="password" placeholder="Enter your password"class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-15">
                                
                                <input type="checkbox" id="remember_me" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember_me">Remember me</label>
                                
                                <a href="{{ route('email') }}" >Forgotten password?</a>
                                
                                
                                
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
                    <a href="{{ route('login.google') }}" class="google-plus-login">Login with <i class="fa fa-google"></i></a>
                    <a href="{{ route('login.twitter') }}" class="twitter-login">Login with <i class="fa fa-twitter"></i></a>
                    <a href="{{ route('login.facebook') }}" class="facebook-login">Login with <i class="fa fa-facebook"></i></a>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade " id="passwordResetModal" tabindex="-1" role="dialog" aria-labelledby="passwordResetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="passwordResetModalLabel">Reset Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
  
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" name="email" id="email2" class="form-control" required autofocus>
            </div>
  
            <div class="modal-footer">
              
              <button type="submit" class="btn " style="background-color: #e59053">Send Password Reset Link</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>

<script>
    $(document).ready(function() {
      $('body').on('click', '[data-toggle="modal"]', function() {
        var targetModal = $(this).data('target');
        $(targetModal).modal('show');
      });
    });
  </script>