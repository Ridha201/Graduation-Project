<!DOCTYPE html>
<html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
	<title>Order Confirmation</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			padding: 20px;
		}
		.container {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
			max-width: 500px;
			margin: 0 auto;
			padding: 20px;
		}
		h1 {
			text-align: center;
			margin-top: 0;
		}
		button {
			background-color : #e59053;
			border: 1px solid #f18327;
			line-height: 24px;
            padding: 10px 30px;
            font-size: 14px;
            font-weight: 700;
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
			display: block;
			margin: 0 auto;
			margin-top: 20px;
			text-transform: uppercase;
            color: #202020;
            overflow: hidden;
            position: relative;
			-webkit-transition: all 0.3s ease 0s;
             transition: all 0.3s ease 0s;
			 z-index: 1;
	
		}

		button:hover {
             color: var(--bs-btn-hover-color);
             background-color: var(--bs-btn-hover-bg);
             border-color: var(--bs-btn-hover-border-color);
			 color: #e59053;
			 text-decoration: none;
			 color: #e59053;
			 background-color: #fff;
			 border-color: #f18327;
			 -webkit-transition: all 0.3s ease 0s;
			 transition: all 0.3s ease 0s;

}
		
	</style>
</head>
<body>
	<div class="container">
		@foreach($orders as $order)
		<input type="hidden" id="order_id" value="{{$order->id}}">
		<h1>{{$order->ordernumber}}</h1>
		<p>Thank you for your order. To confirm your order, please click the button below:</p>
		<button class="confirm-order">Confirm Order</button>
		@endforeach
	</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.confirm-order').click(function(e){
        e.preventDefault();
        var order_id = $('#order_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method : "POST",
            url : "/set-order-status",
            data : {
                order_id : order_id,
				status : 'confirmed'
            },
            success : function(response){
				console.log(response);
				if(response.status == 'success'){
					window.location.href = '/placed';
				}
			}
        });
    });
	
</script>
