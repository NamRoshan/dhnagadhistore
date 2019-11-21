
@extends('dashboard.master')
@section('sub-home')
            <!-- Start page content -->
            <div class="page-content">
                <!-- Start breadcume area -->
                <div class="breadcume-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="breadcrumb">
                                    <a title="Return to Home" href="index.html" class="home"><i class="fa fa-home"></i></a>
                                    <span class="navigation-pipe">&gt;</span>
                                    <a title="Automotive &amp; Motorcycle" href="index.html">Products</a>
                                    <span class="navigation-pipe">&gt;</span>
                                    {{$slug->title}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End breadcume area -->
                <!-- Start shop area -->
                <div class="shop-area">
                    <div class="container">
                        <div class="row">
                            <!-- Start shop categori area -->

                   <!-- Start categori area -->
            <div class="categori-area">
                <div class="container">
                    <div class="row">
                        <!-- Start categori menu -->
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="categori-menu">
                                <div class="sidebar-menu-title">
                                    <h2><i class="fa fa-th-list"></i>Categories</h2>
                                </div>
 
                                <div class="sidebar-menu">
                                                               
     <ul>



<!-- ##################################################################################### -->
       <!--  this is for first item show -->
  @if($categories->count() > 0)
      @foreach($categories as $category)
        @if($category->childrens()->count() > 0)
           @foreach($category->childrens as $children)
            @endforeach
            @if($category->parents()->count() > 0)
            @foreach($category->parents as $parent)
       
            @endforeach
           @else
           <input type="hidden" name="" value="{{$val= $category->id}}">
                       <!-- this is for second item show -->
                  @php               
     $conn=new mysqli("localhost","root","Roshan12!@","laravel_dhangadhi_store");
      if(!$conn){
        echo'Error on Database';
      }
      $sqln="select *from category_parent where parent_id=$val";
      $resultn=$conn->query($sqln);
      if($resultn->num_rows>0){
       while ($rown=$resultn->fetch_assoc()){
    @endphp
     <input type="hidden" name="" value="{{ $val=  $rown['category_id'] }}">
            <!-- this is for second item show -->
                  @php               
     $con=new mysqli("localhost","root","Roshan12!@","laravel_dhangadhi_store");
      if(!$con){
        echo'Error on Database';
      }
      $sql="select *from category_parent where parent_id=$val";
      $result=$con->query($sql);
      if($result->num_rows>0){
       while ($row=$result->fetch_assoc()){
    @endphp
     <input type="hidden" name="" value="{{ $vals=  $row['category_id'] }}">
                                                                      @php 
     $cons=new mysqli("localhost","root","Roshan12!@","laravel_dhangadhi_store");
      if(!$cons){
        echo'Error on Database';
      }
      $sqls="select *from categories where id=$vals";
      $results=$cons->query($sqls);
      if($results->num_rows>0){
       while ($rows=$results->fetch_assoc()){
              @endphp


                                        <li><a href="{{route('cart.single', $rows['slug'])}}">{{$rows['title']}}</a>
                      <!--                       <div class="megamenudown-sub">



                                                <div class="mega-top">
                                                    <div class="mega-item-menu">
                                                        <a href="shop-grid.html" class="title"><span>category 1</span></a>
                                                        <a href="shop-grid.html"><span>day</span></a>
                                                        <a href="shop-grid.html"><span>evening</span></a>
                                                        <a href="shop-grid.html"><span>night</span></a>
                                                    </div>
                                        
                                                </div>
                                            </div> -->
                                        </li>

@php }} @endphp @php }} @endphp  @php }} @endphp



                                            @endif
      @else
      @endif
      @endforeach
    @endif
                                     
                                    </ul>

                  </div>



                            </div>




          <!--  ########################################################## -->          
        </div>















                            <!-- Start categori content -->
                            <div class="col-xs-12 col-sm-8 col-md-9">
                                <div id="content-shop" class="categori-content">
                                    <div class="categori-baner">
                                        <img src="img/shop/sports-outdoors.jpg" alt="">
                                    </div>
                                    <h1 class="page-heading product-listing"><span class="cat-name">{{$val= $slug->title }}</span><span class="heading-counter">There are 17 products.</span>
                                    </h1>
                                    <!-- Start catagori short -->
                                    <div class="catagori-short">
                                        <ul id="gridlist" class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active"><a href="#grid" data-toggle="tab"><i class="fa fa-th-large"></i></a></li>
                                            <li><a href="#list" data-toggle="tab"><i class="fa fa-th-list"></i></a></li>
                                        </ul>
                                        <div class="chose-box">
                                            <p class="selector1 hidden-xs">
                                                <label>Sort by</label>
                                                <select class="selectProductSort form-control" id="selectProductSort1">
                                                    <option selected="selected" value="position:asc">--</option>
                                                    <option value="price:asc">Price: Lowest first</option>
                                                    <option value="price:desc">Price: Highest first</option>
                                                    <option value="name:asc">Product Name: A to Z</option>
                                                    <option value="name:desc">Product Name: Z to A</option>
                                                    <option value="quantity:desc">In stock</option>
                                                    <option value="reference:asc">Reference: Lowest first</option>
                                                    <option value="reference:desc">Reference: Highest first</option>
                                                </select>
                                            </p>
                                            <p class="selector1 selector2">
                                                <label>Show</label>
                                                <select class="selectProductSort form-control" id="selectProductSort2">
                                                    <option selected="selected" value="position:asc">12</option>
                                                    <option value="price:asc">24</option>
                                                </select>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- End catagori short -->

                
              
                                        <!-- Start categori grid view -->
                                        <div id="grid" class="tab-pane active categoti-grid-view row">
                     




                                   <input type="hidden" name="" value="{{$val= $slug->id }}"> 
                       <div id="my-tab-content" class="tab-content">
                                                                   @php
     $consss=new mysqli("localhost","root","Roshan12!@","laravel_dhangadhi_store");
      if(!$consss){
        echo'Error on Database';
      }
      $sqlsss="select *from category_product where category_id=$val";
      $resultsss=$consss->query($sqlsss);
      if($resultsss->num_rows>0){
       while ($rowsss=$resultsss->fetch_assoc()){
    @endphp
    <input type="hidden" name="" value="{{$uid=$rowsss['product_id'] }}">
                                                               @php
     $con=new mysqli("localhost","root","Roshan12!@","laravel_dhangadhi_store");
      if(!$con){
        echo'Error on Database';
      }
      $sql="select *from products where id=$uid";
      $result=$con->query($sql);
      if($result->num_rows>0){
       while ($row=$result->fetch_assoc()){
    @endphp
                            <!-- Start featured item -->
                       <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="featured-inner">
                      <div class="featured-image">
                          <a href="{{route('allview', $row['slug'])}}">
                              <img src="{{ asset('storage/'. $row['thumbnail'])}}" alt="">
                          </a>
                      </div>
                      <div class="featured-info">
                          <a href="single-product.html">{{ $row['tittle'] }}</a>
                          <p class="reating">
                              <span class="rate">
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                              </span>
                          </p>
                          <span class="price">Rs.{{ $row['price'] }}</span>
                          <div class="featured-button">
                              <a href="wishlists.html" class="wishlist"><i class="fa fa-heart"></i></a>
                              <a href="#" class="fetu-comment"><i class="fa fa-signal"></i></a>
                              <a href="{{route('products.addToCart', $row['slug'])}}" class="add-to-card"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                          </div>
                      </div>
                  </div>
              </div>
                                            
                                            @php }} @endphp
@php }} @endphp
                                            <!-- End featured item -->
                                          </div>


                          
                                            <!-- End featured item -->

        <!-- extra -->

</div>
</div>
</div>













                                        <!-- End categori grid view -->
                     
                                    </div>

                                    <!-- End categori show item -->
                                </div>
                            </div>
                            <!-- Start categori content -->
                        </div>
                    </div>
                </div>
                <!-- End shop area -->
            </div>
            @endsection

