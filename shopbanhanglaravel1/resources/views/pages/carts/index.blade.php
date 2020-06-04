@extends('layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12" id="display_cart">
			
		</div>
	</div>
</div>                 
@endsection
@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			var cartItems = (localStorage.getItem('cartItems') == null) ? [] : JSON.parse(localStorage.getItem('cartItems'));
			$.ajax({
				url: "{{route('cart.display')}}",
				type: "GET",
				data: {
					cartItems: cartItems
				},
				success: function(result){
					$('#display_cart').html(result);
				}
			})

		})
	</script>
@endsection