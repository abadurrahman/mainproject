@extends('layouts.app')
@section('content')



<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>Your Wishlist</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Image</th>
						<th>Product Name</th>
						<th>color</th>
						<th>size</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach($product as $row)
					<tr class="rem1">
						<td class="invert-image"><a href="single.html"><img style="width: 120px" src="{{asset($row->image_one)}}" alt=" " class="img-responsive" /></a></td>
                       
						<td class="invert">{{$row->product_name}}</td>
						<td class="invert">{{$row->product_color}}</td>
						<td class="invert">{{$row->product_size}}</td>
						<td class="invert">
							<button class="product_cart_button item_add single-item hvr-outline-out button2 addcart" data-id="{{$row->id}}">Add To Cart</button>
						</td>

					</tr>
					@endforeach
					
								
			</table>
		</div>
		<br>
		

	</div>
</div>	
<!-- //check out -->

<script type="text/javascript">
      $(document).ready(function() {
            $('.addcart').on('click', function(){  
              var id = $(this).data('id');
              if(id) {
                 $.ajax({
                     url: "{{  url('/add/to/cart/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000
                        })

                       if($.isEmptyObject(data.error)){
                            Toast.fire({
                              type: 'success',
                              title: data.success
                            })
                       }else{
                             Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                       }

                     },
                    
                 });
             } else {
                 alert('danger');
             }
              e.preventDefault();
         });
     });

</script>

@endsection