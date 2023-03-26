@extends('theme')
@section('content')
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" href="assets/css/PCBuilder.css">

<div style="padding: 40px; text-align: center; margin-top: 80px;" class="row">
    <h1 style="font-size: 48px; margin-bottom: 20px; font-weight: bold; margin-left: 30px;">PC BUILDER</h1>
    <p style="font-size: 24px; color: #333333; margin-left: 30px;">With our intelligent configurator, and its compatibility engine,
        Create your PC with one click, according to your needs and your budget.</p>
</div>
<div class="row">
<div class="row" style="    ">
    <div class="col-md-5 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s"> 
        <ul style="margin-top: 20px; padding-left: 40px">
        <li> <span class="title-3" style="margin-top: 100px;">Component</span> <span class="title-3">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp product</span> </li>
        </ul>
        <div class="prod-info2 white-clr">
            <ul style="margin-bottom: 80px;">
                <li style="display: flex; align-items: center ; background-color:#efd9bb"> <span class="title-2" style="margin-top: 7px;">Processor:</span> <span class="fs-16"><button class="add-btn2 "><b>Add Component</b></button></span> </li>
                <li style="display: flex; align-items: center; background-color:#efd9bb"> <span class="title-2" style="margin-top: 7px;">motherboard:</span> <span class="fs-16"><button class="add-btn2 "><b>Add Component</b></button></span> </li>
                <li style="display: flex; align-items: center; background-color:#efd9bb"> <span class="title-2" style="margin-top: 7px;">Graphic Card:</span> <span class="fs-16"><button class="add-btn2 "><b>Add Component</b></button></span> </li>
                <li style="display: flex; align-items: center; background-color:#efd9bb"> <span class="title-2" style="margin-top: 7px;">memory:</span> <span class="fs-16"><button class="add-btn2 "><b>Add Component</b></button></span> </li>
                <li style="display: flex; align-items: center; background-color:#efd9bb"> <span class="title-2" style="margin-top: 7px;">storage :</span> <span class="fs-16 theme-clr"><button class="add-btn2 "><b>Add Component</b></button></span> </li>
                <li style="display: flex; align-items: center; background-color:#efd9bb"> <span class="title-2" style="margin-top: 7px;">case:</span> <span class="fs-16"><button class="add-btn2 "><b>Add Component</b></button></span> </li>
                <li style="display: flex; align-items: center; background-color:#efd9bb"> <span class="title-2" style="margin-top: 7px;">cooling:</span> <span class="fs-16"><button class="add-btn2 "><b>Add Component</b></button></span> </li>
                <li style="display: flex; align-items: center; background-color:#efd9bb"> <span class="title-2" style="margin-top: 7px;">psu:</span> <span class="fs-16"><button class="add-btn2 "><b>Add Component</b></button></span> </li>
            </ul>
        </div>
        <div class="estimated-wattage">
            <h2 class="title-3">Estimated Wattage</h2>
            <p>500W</p>
          </div>
    </div>
    <div class="col-md-5 offset-md-2 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s">
        <span class="title-3" style="margin-top: 1px;">totale price : $2000 </span> 
        <span><a href="#" class="checkout-btn"><b>Checkout</b></a></span> 
        <img src="assets\images\ezgif-1-de0a1c59ac.gif" alt="Italian Trulli" style="float: left; display: inline-block;">
        <img src="assets\images\pc5_standard_rgb_1_1.png" alt="" style="float: left; display: inline-block; margin-left: 10px;">
        <img style="margin-top:20px" src="assets\images\1658893740-our-brand-partners-primary-mobile.png" alt="Italian Trulli">
        </div>
    </div>
</div>
@endsection

