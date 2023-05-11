@extends('theme')
@section('content')
<style>
    .modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}
.smallname{
    font-size: 16px;
    color: #333333;
    font-weight: 600;
    margin-left: 10px;
}

.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

table {
  border-collapse: collapse;
  width: 100%;
}

 td {
  text-align: left;
  padding: 8px;
  color: black
}

th {
  background-color: #e59053;
  color: black;
}
.close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  width: 30px;
  height: 30px;
  background-color: #e59053;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

.close-btn:hover {
  background-color: #555;
}
.modal-body {
  height: 500px; /* set the height of the modal body */
  overflow-y: scroll; /* enable vertical scrolling */
}

::-webkit-scrollbar {
  width: 10px; /* set the width of the scrollbar */
}

::-webkit-scrollbar-track {
  background: #f1f1f1; /* set the background color of the scrollbar track */
}

::-webkit-scrollbar-thumb {
  background: #888; /* set the background color of the scrollbar thumb */
}

::-webkit-scrollbar-thumb:hover {
  background: #555; /* set the background color of the scrollbar thumb when hovered */
}


</style>
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" href="assets/css/PCBuilder.css">
<link rel="stylesheet" href="assets/css/table.css">

<div style="padding: 40px; text-align: center; margin-top: 80px;" class="row">
    <h1 style="font-size: 48px; margin-bottom: 20px; font-weight: bold; margin-left: 30px;">PC BUILDER</h1>
    <p style="font-size: 24px; color: #333333; margin-left: 30px;">With our intelligent configurator, and its compatibility engine,
        Create your PC with one click, according to your needs and your budget.</p>
</div>
<div class="row">
<div class="row" style="    ">
    <div class="col-md-5 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s"> 
        
        
        <table>
            
            <tr>
              <th>Component</th>
              <th colspan="2">Product</th>
              
            </tr>
            <tr>
              <td><b>Processor</b></td>
              <td></span><img id="add-component-img" src="assets/images/cpu.png" width="80" height="80"></span><span class="smallname"id="add-component-name"></span>
                <span class="smallname" id="add-component-price"></span><span id="add-component-wattage-input"></span><span id="add-component-brand-input"></td>
              <td><button class="btn CPU" id="add-cpu-btn" style="background-color: #e59053"><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Motherboard</b></td>
              <td></span><img id="add-component-img" src="assets/images/mbd.png" width="80" height="80"></span><span class="smallname"id="add-component-name"></span>
                <span class="smallname" id="add-component-price"></span><span id="add-component-wattage-input"></span><span id="add-component-brand-input"></td>
              <td><button class="btn CPU" id="add-mbd-btn"style="background-color: #e59053" ><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Graphic card</b></td>
              <td></span><img id="add-component-img" src="assets/images/gpu.png" width="80" height="80"></span><span class="smallname"id="add-component-name"></span>
                <span class="smallname" id="add-component-price"></span><span id="add-component-wattage-input"></span><span id="add-component-brand-input"></td>
              <td><button class="btn CPU" id="add-gpu-btn"style="background-color: #e59053" ><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Memory</b></td>
              <td></span><img id="add-component-img" src="assets/images/ram.png"width="80" height="80"></span><span class="smallname"id="add-component-name"></span>
                <span class="smallname" id="add-component-price"></span><span id="add-component-wattage-input"></span><span id="add-component-brand-input"></td>
              <td><button class="btn CPU" id="add-ram-btn" style="background-color: #e59053"><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Storage</b></td>
              <td></span><img id="add-component-img" src="assets/images/ssd.png" width="80" height="80"></span><span class="smallname"id="add-component-name"></span>
                <span class="smallname" id="add-component-price"></span><span id="add-component-wattage-input"></span><span id="add-component-brand-input"></td>
              <td><button class="btn CPU" id="add-storage-btn"style="background-color: #e59053" ><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Cooling</b></td>
              <td></span><img id="add-component-img" src="assets/images/cooler.png" width="80" height="80"></span><span class="smallname"id="add-component-name"></span>
                <span class="smallname" id="add-component-price"></span><span id="add-component-wattage-input"></span><span id="add-component-brand-input"></td>
              <td><button class="btn CPU" id="add-cooling-btn" style="background-color: #e59053"><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Case</b></td>
              <td></span><img id="add-component-img" src="assets/images/case.png" width="80" height="80"></span><span class="smallname"id="add-component-name"></span>
                <span class="smallname" id="add-component-price"></span><span id="add-component-wattage-input"></span><span id="add-component-brand-input"></td>
              <td><button class="btn CPU" id="add-case-btn"style="background-color: #e59053" ><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Power supply</b></td>
              <td></span><img id="add-component-img" src="assets/images/psu.png" width="80" height="80"></span><span class="smallname"id="add-component-name"></span>
                <span class="smallname" id="add-component-price"></span><span id="add-component-wattage-input"></span><span id="add-component-brand-input"></td>
              <td><button class="btn CPU" id="add-psu-btn" style="background-color: #e59053"><b>Add </b></button></td>
            </tr>
            <tr>
            <th colspan="3">
              <h2 class="title-3">Estimated Wattage</h2><p>500W</p></th>
            </tr>
            
          </table>
        
          
    </div>
    <div class="col-md-5 offset-md-2 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s">
        <span class="title-3" style="margin-top: 1px;">totale price : $2000 </span> 
        <span><a href="#" class="checkout-btn"><b>Checkout</b></a></span> 
        <img src="assets\images\ezgif-1-de0a1c59ac.gif" alt="Italian Trulli" style="float: left; display: inline-block;">
        <img src="assets\images\pc5_standard_rgb_1_1.png" alt="" style="float: left; display: inline-block; margin-left: 10px;">
        <img style="margin-top:20px" src="assets\images\1658893740-our-brand-partners-primary-mobile.png" alt="Italian Trulli">
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
        <div class="modal-body">
          <table>
            <thead>
              <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><img src="product1.jpg"></td>
                <td>Product 1</td>
                <td>$100</td>
              </tr>
            </tbody>
          </table>
          </div>
          <button class="close-btn" aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
</div>
@endsection
<script>

</script>


     

