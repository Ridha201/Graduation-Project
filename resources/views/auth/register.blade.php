@extends('theme')
@section('content')
<div class="register-section section mt-40 mb-50">
    <div class="container">
        <div class="row">
            
            <!-- Register -->
            <div class="col-md-6 col-12 d-flex">
                <div class="ee-register">
                    
                    <h3>We will need for your registration</h3>
                    <p>E&E provide how all this mistaken idea of denouncing pleasure and sing pain born an will give you a complete account of the system, and expound</p>
                    
                    <!-- Register Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class=" ">
                                
    
                                <div class="col-12 mb-30">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your name here" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class=" ">
                                
    
                                <div class="col-12 mb-30">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your email here" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class=" ">
                               
    
                                <div class="col-12 mb-30">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Enter passward" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="">
                              
    
                                <div class="col-12 mb-30">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Conform password" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-12"><input type="submit" value="register"></div>
                        </div>
                    </form>
                    
                </div>
            </div>
            
            <div class="col-md-1 col-12 d-flex">
                
                <div class="login-reg-vertical-boder"></div>
                
            </div>
            
            <!-- Account Image -->
            <div class="col-md-5 col-12 d-flex">
                
                <div class="ee-account-image">
                    <h3>Upload your Image</h3>
                    
                    <img src="assets/images/account-image-placeholder.jpg" alt="Account Image Placeholder" class="image-placeholder">
                    
                    <div class="account-image-upload">
                        <input type="file" name="chooseFile" id="account-image-upload">
                        <label class="account-image-label" for="account-image-upload">Choose your image</label>
                    </div>
                    
                    <p>jpEG 250x250</p>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div>
@endsection