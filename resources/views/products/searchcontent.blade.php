@extends('dashboard.master')
@section('search')

<div class="container">
    <div class="row">
<div class="col-xs-12 col-sm-8 col-md-9">
     <div id="content-shop" class="categori-content">
                                
                                    <h1 class="page-heading product-listing"><span class="cat-name">Products Only</span><span class="heading-counter"></span>
                  </h1>

                                    <!-- End catagori short -->
                                     <div id="my-tab-content" class="tab-content">
                                        <!-- Start categori grid view -->
                                        <div id="grid" class="tab-pane active categoti-grid-view row">
                                             @if ((count($products)>0))
    @foreach($products as $product)
                                            <!-- Start featured item -->
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="featured-inner">
                                                    <div class="featured-image">
                                                        <a href="single-product.html">
                                                            <img src="{{asset('storage/'. $product->thumbnail)}}" alt="">
                                                        </a>
                                                    </div>
                                                                         
                                                    <div class="featured-info">
                                                        <a href="single-product.html">{{$product ->tittle}}</a>
                                                        <p class="reating">
                                                            <span class="rate">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </span>
                                                        </p>
                                                        <span class="price">$16.51</span>
                                                        <div class="featured-button">
                                                            <a href="wishlists.html" class="wishlist"><i class="fa fa-heart"></i></a>
                                                            <a href="#" class="fetu-comment"><i class="fa fa-signal"></i></a>
                                                            <a href="cart.html" class="add-to-card"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                        </div>
                                                    </div>
                                                 

                                                </div>                                  


                                            </div>
                                               @endforeach @endif
                                            <!-- End featured item -->
                                            <!-- Start featured item -->
                                 
                                                </div>
                                            </div>

                                           
                                        </div>



                                    </div>
                       
                                    <!-- End categori show item -->
                                </div>
                            </div>
</div></div>


<!-- 	@if ((count($products)>0))
	@foreach($products as $product)
	{{ $product->id}}
	{{$product ->tittle}}
	@endforeach
	@endif -->


@endsection