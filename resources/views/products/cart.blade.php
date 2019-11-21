@extends('dashboard.master')
@section('view')

@if(isset($cart) && $cart->getContents())
<div class="well well-small" style="margin-bottom:100px;margin-top: 50px;">
<div class="container">
   <div class="card shopping-cart">
   	        <h3 class="text-center">Shooping Cart</h3>
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Shipping cart
                <a href="" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
                <div class="clearfix"></div>
            </div>
            	@foreach($cart->getContents() as $slug => $product)

            <div class="card-body row-fluid">
                    <!-- PRODUCT -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="{{asset('storage/'.$product['product']->thumbnail)}}" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>{{$product['product']->tittle}}</strong></h4>
                            <h4>
                                <small style="font-size: 15px;">{!!$product['product']->description!!}</small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top:5px">
                                <h6><strong style="font-size: 15px;">Rs.{{$product['product']->price}} each<span class="text-muted"></span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                           <form method="POST" action="{{route('cart.update', $slug)}}" >
							@csrf
                                <div class="quantity" >
					<input type="number" class="qty" name="qty" id="qty" class="form-control text-center" min="0" max="99" value="{{$product['qty']}}" style="background: white;border: 1px solid #a6a6a6;
    border-radius: 20em;">				
                                </div>
                             <div class="quantity" style="margin-top: 5px;">
								<input type="submit" name="update" value="Update" class="btn btn-block btn-outline-success btn-round qty"
								style="box-sizing: border-box;
    display: inline-block;
    position: relative;
    text-align: center;
    line-height: normal;
    cursor: pointer;
    -webkit-appearance: none;
    -moz-appearance: none;
    padding: -1px 1.5em;
    border: 1px solid #a6a6a6;
    border-radius: 20em;
    background-color: #f2f1eb;
    background-image: -webkit-linear-gradient(top,#f6f6f3,#e7e7df);
    background-image: linear-gradient(to bottom,#f6f6f3,#e7e7df);
    color: #333;
    text-decoration: none;
    text-shadow: 0 1px hsla(0,0%,100%,0.6);
    font-weight: 600;
    font-size: 14px;
    font-size: 0.875rem;
    -webkit-transition: all 0.1s;
    transition: all 0.1s;
    -webkit-font-smoothing: antialiased;">			
                                </div>
                              </form>  

                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                            <form action="{{route('cart.remove', $slug)}}" method="POST" accept-charset="utf-8">
							@csrf

							<button type="submit" class="btn btn-outline-danger btn-xs" name="remove">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</button> 
							</form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- END PRODUCT -->
                    <!-- PRODUCT -->
                    
            
                    <!-- END PRODUCT -->
                <div class="pull-right">
                    <a href="" class="btn btn-outline-secondary pull-right">
                        Update shopping cart
                    </a>
                </div>
            </div>
            @endforeach
            <div class="card-footer">
     
                <div class="pull-right" style="margin: 10px">
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-success pull-right">Checkout</a>
                    @else
                    <a href="{{url('checkout')}}" class="btn btn-success pull-right">Checkout</a>
                    @endguest
                    <div class="pull-right" style="margin: 5px">
                        Total Quantity: <b>{{$cart->getTotalQty()}}</b>
                    </div>
                </div>
                   <div class="pull-right" style="margin: 10px">
                    <div class="pull-right" style="margin: 5px">
                        Total price: <b>{{$cart->getTotalPrice()}}</b>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>

@else
<div class="container" style="height: 200px;">
    <div class="row">
    	<div class="co-md-12">
    		<h1 class="text-center">sorry no cart found</h1>
    	</div>
    </div>
</div>

	@endif
		@endsection