@extends('theme')
@section('content')
<div class="register-section section mt-40 mb-50">
    <div class="container">
        <div class="row">
            
            <!-- Register -->
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12 d-flex">
                <div class="ee-register">
                    
                    <h3 style="font-size: 48px;  font-weight: bold">Contact Us</h3>
                    <h3>How we can help you today  ?</h3>
                    
                    <!-- Register Form -->
                    <form action="/contact" style="" method='post'>
                        <div class="row">
                            @csrf
                            <div class="col-12 mb-30"><input type="text"name="name"  placeholder="Your name here"></div>
                            <div class="col-12 mb-30"><input type="email" name="email" placeholder="Your email here"></div>
                            <div class="col-12 mb-30"><input type="text" name="subject" placeholder="Subject"></div>
                            <div class="col-12 mb-30"><textarea name="message" rows="10" cols="30" placeholder="Message"></textarea></div>
                            
                            <div class="col-12"><input type="submit" value="Submit"></div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="col-md-2"></div>
        
            

        </div>
    </div>
</div>
@endsection
