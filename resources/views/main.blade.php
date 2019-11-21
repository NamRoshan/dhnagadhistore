@extends('dashboard.master')
@section('home-main')

<div class="slider-area">
  <div id="slider" class="nivoSlider">
      <img style ="display:none" src="img/slider/1.jpg"  data-thumb="img/slider/1.jpg"  alt="" title="#htmlcaption1"/>      
      <img style ="display:none" src="img/slider/2.jpg"  data-thumb="img/slider/2.jpg"  alt="" title="#htmlcaption2"/>
  </div>
  <div id="htmlcaption1" class="pos-slideshow-caption nivo-html-caption nivo-caption">
      <div class="timing-bar"></div>
      <div class="pos-slideshow-info pos-slideshow-info1">
          <div class="container">
              <div class="pos_description hidden-xs hidden-sm">
                  <div class="title1"><span class="txt">Arduino Small Car</span></div>
                  <div class="title2"><span class="txt">Brand Projectsaathi</span></div>
                  <div class="pos-slideshow-readmore">
                      <!-- <a href="http://bootexperts.com/" title="Shop now">Shop now</a>    -->
                  </div>
              </div>
          </div>
      </div>
  </div>
    <div id="htmlcaption2" class="pos-slideshow-caption nivo-html-caption nivo-caption">
        <div class="timing-bar"></div>
        <div class="pos-slideshow-info pos-slideshow-info2">
            <div class="container">
                <div class="pos_description hidden-xs hidden-sm">
                    <div class="title1"><span class="txt">Arduino Uno Smart Robot</span></div>
                    <div class="title2"><span class="txt">"Machine Learning Concept</span></div>
                    <div class="pos-slideshow-readmore">
                       <!--  <a href="#" title="Shop now">Shop now</a>  -->  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- End slider area -->
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

  <li><a href="">{{$category->title}} 
      <input type="hidden" name="" value="{{ $val= $category->id}}"> </a>
                                            <div class="megamenudown-sub">
                                                <div class="mega-top">

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


                          <div class="mega-item-menu">


                          <a href="{{route('cart.single', $rows['slug'])}}" class="title"><span> {{$rows['title']}}</span></a>
               

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
     <input type="hidden" name="" value="{{ $va=  $row['category_id'] }}">
     @php
     $conss=new mysqli("localhost","root","Roshan12!@","laravel_dhangadhi_store");
      if(!$conss){
        echo'Error on Database';
      }
      $sqlss="select *from category_parent where parent_id=$va";
      $resultss=$conss->query($sqlss);
      if($resultss->num_rows>0){
       while ($rowss=$resultss->fetch_assoc()){
    @endphp
    <input type="hidden" name="" value="{{$valsss=$rowss['category_id']}}">
       @php
     $consss=new mysqli("localhost","root","Roshan12!@","laravel_dhangadhi_store");
      if(!$consss){
        echo'Error on Database';
      }
      $sqlsss="select *from categories where id=$valsss";
      $resultsss=$consss->query($sqlsss);
      if($resultsss->num_rows>0){
       while ($rowsss=$resultsss->fetch_assoc()){
    @endphp


          <a href="{{route('cart.single', $rowsss['slug'])}}" class="title"><span> {{$rowsss['title']}}</span></a>
                         @php }} @endphp


                                  @php }} @endphp     
                                               
     @php }} @endphp
 @php }} @endphp
                                  @php }} @endphp

                                                    </div>
                                          

                                       















                                                </div>
                                            </div>
                                        </li>
                                             @endif
      @else
      @endif
      @endforeach
    @endif
  </ul>
</div>
</div>
</div>


<!--  -->
        <!-- feature product -->

<div class="col-xs-12 col-sm-8 col-md-9">
     <div id="content-shop" class="categori-content">
                                
 <div class="col-xs-12 col-sm-12">
                            <div class="area-title">
                                <h3>Featured Products</h3>
                            </div>
                        </div>
                                    <!-- End catagori short -->
                                     <div id="my-tab-content" class="tab-content">
                                        <!-- Start categori grid view -->
                                        <div id="grid" class="tab-pane active categoti-grid-view row">
                                  @if($featured->count() > 0)
      @foreach($featured as $featureds)

                    <!-- Start featured item -->
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="featured-inner">
                            <div class="featured-image">
                                <a href="{{route('allview',$featureds->slug)}}">
                                    <img src="{{asset('storage/'. $featureds->thumbnail)}}" alt="">
                                </a>
                            </div>
                                                 
                            <div class="featured-info">
                                <a href="single-product.html">  {{$featureds->tittle}}</a>
                                <p class="reating">
                                    <span class="rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </p>
                                <span class="price">Rs. {{$featureds->price}}</span>
                                <div class="featured-button">
                                    <a href="wishlists.html" class="wishlist"><i class="fa fa-heart"></i></a>
                                    <a href="#" class="fetu-comment"><i class="fa fa-signal"></i></a>
                                    <a href="{{route('products.addToCart', $featureds->slug)}}" class="add-to-card"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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



        <!-- extra -->

</div>
</div>
</div>
@endsection


