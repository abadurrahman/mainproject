@extends('layouts.app')
@section('content')
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<div class="product-easy">
    <div class="container">
        
        <script src="{{asset('fontend/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#horizontalTab').easyResponsiveTabs({
                                    type: 'default', //Types: default, vertical, accordion           
                                    width: 'auto', //auto or any width like 600px
                                    fit: true   // 100% fit in a container
                                });
                            });
                            
        </script>
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Products</span></li> 
                </ul>                    
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                         @foreach($products as $row)
                        <div class="col-md-3 product-men yes-marg">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{asset($row->image_one)}}" alt="" class="pro-image-front">
                                    <img src="{{asset($row->image_one)}}" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}" class="link-product-add-cart">Quick View</a>
                                            </div>
                                          </div>
                                         <!--  wishlist -->
                                 <!-- <a href="{{ URL::to('add/wishlist/'.$row->id) }}" class="product-top"><span class="glyphicon glyphicon-heart" aria-hidden="true"></a> -->
                                 <a href="#" class="product-top addwishlist" data-id="{{ $row->id }}"><span class="glyphicon glyphicon-heart" aria-hidden="true"></a>
                                         
                                  @if($row->discount_price == NULL)
                                     <span class="product-new-top">New</span>
                                    @else
                                    
                                     @php
                                      $amount=$row->selling_price - $row->discount_price;
                                      $discount=$amount/$row->selling_price * 100;
                                     @endphp 
                                                 
                                      <span style="background: #441235; none repeat scroll 0 0; color: #fff; display: inline-block; right: 0; padding: 0 10px 1px; position: absolute; text-transform: lowercase; top: 0; z-index: 10;"> 
                                      {{ intval($discount) }}%</span>
                                    @endif 
                                        
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="single.html">{{$row->product_name}}</a></h4>
                                    <div class="info-product-price">
                                    @if($row->discount_price == NULL)
                                    <span class="item_price">${{$row->selling_price}}</span>
                                    @else
                                    <div class="info-product-price">
                                    <span class="item_price">${{$row->discount_price}}</span>
                                    <del>${{$row->selling_price}}</del>
                                    </div>
                                    @endif
                                    </div>
                                    <div class="product_extras">
                                        <a href="#" id="{{ $row->id }}" class="product_cart_button item_add single-item hvr-outline-out button2 addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to cart</a>
                                       <!-- <button class="product_cart_button item_add single-item hvr-outline-out button2 addcart" data-id="{{$row->id}}">Add To Cart</button>  -->
                                                 
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                         @endforeach
                        <div class="clearfix"></div>
                    </div>

                  
                </div>  
            </div>
        </div>
    </div>
</div>
<!-- //product-nav -->


<script type="text/javascript">
    function productview(id){
          $.ajax({
                     url: "{{  url('/cart/product/view/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       $('#pname').text(data.product.product_name);
                       $('#pimage').attr('src',data.product.image_one);
                       $('#pcode').text(data.product.product_code);
                       $('#product_id').val(data.product.id);

                        var d =$('select[name="size"]').empty();
                         $.each(data.size, function(key, value){
                             $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
                              if (data.size == "") {
                                     $('#sizediv').hide();   
                              }else{
                                    $('#sizediv').show();
                              } 
                         });

                        var d =$('select[name="color"]').empty();
                         $.each(data.color, function(key, value){
                             $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
                               if (data.color == "") {
                                     $('#colordiv').hide();
                              } else{
                                   $('#colordiv').show();
                              }
                         });
             }
      })
    }
</script>



<!-- <script type="text/javascript">
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

</script> -->

<script type="text/javascript">
      $(document).ready(function() {
            $('.addwishlist').on('click', function(){  
              var id = $(this).data('id');
              if(id) {
                 $.ajax({
                     url: "{{  url('/add/wishlist/') }}/"+id,
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