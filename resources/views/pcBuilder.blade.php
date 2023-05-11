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
    font-size: 12px;
    color: #333333;
    font-weight: 600;
    margin-left: 10px;
}

.price{
    font-size: 17px;
    color: #000000;
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

.close {
  font-size: 40;
  font-weight: 200;
  color: rgb(0, 0, 0);
  padding-left: 36px;

}


.component-info {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

</style>
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" href="assets/css/PCBuilder.css">
<link rel="stylesheet" href="assets/css/table.css">

<div >
  <span><img src="assets/images/SMC Banner.jpg" ></span>

    
</div>
<div class="row">
<div class="row" style="    ">
    <div class="col-md-5 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s cart-table "> 
        
        
        <table class="table" style=" width: 147% !important ; margin-top: 20px;">
            <tr>
              <td><b>Processor</b></td>
              <td id="empty-cpu"> 
                <div class="component-info">
                <img id="add-component-img" src="assets/images/cpu.png" width="100" height="100">
                <span class="smallname" id="add-component-name"></span>
                <span class="price" id="add-component-price"></span>
                <span id="add-component-wattage-input"></span><span id="add-component-brand-input"></span>
                <span class="price" id="add-component-price-input"></span>
              </div></td>
              <td id="parent-element-id"><button class="btn " id="add-cpu-btn" style="background-color: #e59053"><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Motherboard</b></td>
              <td id="empty-mbd"><div class="component-info"><span><img id="add-mbd-component-img" src="assets/images/mbd.png" width="100" height="100"></span><span class="smallname"id="add-mbd-component-name"></span>
                <span class="price" id="add-mbd-component-price"></span><span id="add-mbd-component-wattage-input"></span><span id="add-mbd-component-compatibility-input"></span><span class="price" id="add-mbd-component-price-input"></span></div></td>
              <td id="parent-element-id2"><button class="btn " id="add-mbd-btn"style="background-color: #e59053" ><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Graphic card</b></td>
              <td id="empty-gpu"><div class="component-info"><span><img id="add-gpu-component-img" src="assets/images/gpu.png" width="100" height="100"></span><span class="smallname"id="add-gpu-component-name"></span>
                <span class="price" id="add-gpu-component-price"></span><span id="add-gpu-component-wattage-input"></span><span class="price" id="add-gpu-component-price-input"></span></div></td>
              <td id="parent-element-id3"><button class="btn " id="add-gpu-btn"style="background-color: #e59053" ><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Memory</b></td>
              <td id="empty-ram"><div class="component-info"><span><img id="add-ram-component-img" src="assets/images/ram.png"width="100" height="100"></span><span class="smallname"id="add-ram-component-name"></span>
                <span class="price" id="add-ram-component-price"></span><span class="price" id="add-ram-component-price-input"></span></div></td>
              <td id="parent-element-id4"><button class="btn " id="add-ram-btn" style="background-color: #e59053"><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Storage</b></td>
              <td id="empty-storage"><div class="component-info"><span><img id="add-storage-component-img" src="assets/images/ssd.png" width="100" height="100"></span><span class="smallname"id="add-storage-component-name"></span>
                <span class="price" id="add-storage-component-price"></span><span class="price" id="add-storage-component-price-input"></span></div></td>
              <td id="parent-element-id5"><button class="btn " id="add-storage-btn"style="background-color: #e59053" ><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Cooling</b></td>
              <td id="empty-cooling"><div class="component-info"><span><img id="add-cooler-component-img" src="assets/images/cooler.png" width="100" height="100"></span><span class="smallname"id="add-cooler-component-name"></span>
                <span class="price" id="add-cooler-component-price"></span><span class="price" id="add-cooler-component-price-input"></span></div></td>
              <td id="parent-element-id6"><button class="btn " id="add-cooling-btn" style="background-color: #e59053"><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Case</b></td>
              <td id="empty-case"><div class="component-info"><span><img id="add-case-component-img" src="assets/images/case.png" width="100" height="100"></span><span class="smallname"id="add-case-component-name"></span>
                <span class="price" id="add-case-component-price"></span><span class="price" id="add-case-component-price-input"></span></div></td>
              <td id="parent-element-id7"><button class="btn " id="add-case-btn"style="background-color: #e59053" ><b>Add </b></button></td>
            </tr>
            <tr>
              <td><b>Power supply</b></td>
              <td id="empty-psu"><div class="component-info"><span><img id="add-psu-component-img" src="assets/images/psu.png"width="100" height="100"></span><span class="smallname"id="add-psu-component-name"></span>
                <span class="price" id="add-psu-component-price"></span><span class="price" id="add-psu-component-price-input"></span></div></td>
              <td id="parent-element-id8"><button class="btn CPU" id="add-psu-btn" style="background-color: #e59053"><b>Add </b></button></td>
            </tr>
          </table>
        
          
    </div>
    <div class="col-md-5 offset-md-2 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s">
      <table style="width: 487px !important; margin-top:10px;">
        <tbody>
          <tr>
          <th style="background-color: #efd9bb ;    ">
            <h2 class="title-3  "  style="margin-left: 16px;">Estimated Wattage  <p class=" estimated-wattage-needed" style="font-size: 30">0W</p></h2>
             </th>
             <th style="background-color: #efd9bb ;    ">
              <h2 class="title-3  "  style="margin-left: 16px;">total price  <p class="total-pc-build-price" style="font-size: 30">$00.00</p></h2>
               </th>
          </tr>
        </tbody>
      </table>
        
      
              <form action="/contact" style="    width: 487px;margin-top: 14px;" method='post' class="checkout-form">
                <div class="row">

                  <div class="col-md-6 col-12 mb-20">
                      <label>First Name*</label>
                      <input type="text" placeholder="First Name" class="name" name="name">
                      <span id="name_error" class="text-danger"></span>
                  </div>

                  <div class="col-md-6 col-12 mb-20">
                      <label>Last Name*</label>
                      <input type="text" placeholder="Last Name" class="lastname" name="lastname">
                      <span id="lname_error" class="text-danger"></span>
                  </div>

                  <div class="col-md-6 col-12 mb-20">
                      <label>Email Address*</label>
                      <input type="email" placeholder="Email Address" class="email" name="email">
                      <span id="email_error" class="text-danger"></span>
                  </div>

                  <div class="col-md-6 col-12 mb-20">
                      <label>Phone no*</label>
                      <input type="text" placeholder="Phone number" class="phone" name="phone">
                      <span id="phone_error" class="text-danger"></span>
                  </div>



                  <div class="col-12 mb-20">
                      <label>Address*</label>
                      <input type="text" placeholder="Address line 1" class="address1" name="address1">
                      <span id="address1_error" class="text-danger"></span>
                      <input type="text" placeholder="Address line 2" class="address2" name="address2">
                      <span id="address2_error" class="text-danger"></span>
                  </div>



                  <div class="col-md-6 col-12 mb-20">
                      <label>State*</label>
                      <input type="text" placeholder="State" class="state" name="state">
                      <span id="state_error" class="text-danger"></span>

                  </div>

                  <div class="col-md-6 col-12 mb-20">
                      <label>Zip Code*</label>
                      <input type="text" placeholder="Zip Code" class="zipcode" name="zipcode">
                      <span id="zipcode_error" class="text-danger"></span>
                  </div>

                 

              </div>
              </form>
              <div class="col-12 mb-60">
                               
                <h4 class="checkout-title">Payment Method</h4>
        
                <div class="checkout-payment-method" style="width:487px">
                 <div class="single-method">
                     <input type="radio" id="payment_cash" name="payment-method" value="cash" onclick="togglePaymentButtons()">
                     <label for="payment_cash">Cash on Delivery</label>
                     <p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                 </div>
             
                 <div class="single-method">
                     <input type="radio" id="payment_paypal" name="payment-method" value="paypal" onclick="togglePaymentButtons()">
                     <label for="payment_paypal">Paypal</label>
                 </div>
             
                 <button  class=" btn " id="place-order-btn" style="display:none; shape:pill ; background-color: #e59053" >Place order</button>
                 <div id="paypal-button-container"  style="display:none; margin-top: 5px"></div>
             </div>
              
        
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
        <div class="modal-body cart-table">
          <table class="table">
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
    function togglePaymentButtons() {
        var cashRadio = document.getElementById("payment_cash");
        var paypalRadio = document.getElementById("payment_paypal");
        var placeOrderBtn = document.getElementById("place-order-btn");
        var paypalBtnContainer = document.getElementById("paypal-button-container");
    
        if (cashRadio.checked) {
            placeOrderBtn.style.display = "block";
            paypalBtnContainer.style.display = "none";
        } else if (paypalRadio.checked) {
            placeOrderBtn.style.display = "none";
            paypalBtnContainer.style.display = "block";
        }
    }
    </script>


     

