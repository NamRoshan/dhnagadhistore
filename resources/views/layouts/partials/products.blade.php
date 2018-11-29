    <div class="row">
                <div class="col-md-3">
<div class="nav-link">
  <ul>
    <li><a href="">Categories</a></li>
    <ul class="dropdown">

      @if($categories->count() > 0)
      @foreach($categories as $category)
        @if($category->childrens()->count() > 0)
        <li><a href="#">{{$category->title}}</a>
        @foreach($category->childrens as $children)
          <ul>
            <li><a href="#">{{$children->title}}</a></li>
          </ul>
        @endforeach
      </li>
      @else
        <li><a href="#">{{$category->title}}</a>
      @endif
      @endforeach
    @endif
    </ul>
  </ul>
</div>

                 
                </div>
                          <div class="col-md-9">
                    @if(session()->has('message'))
                        <p class="alert alert-success">
                            {{ session()->get('message') }}
                        </p>
                    @endif
                    <div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      @foreach($products as $product)
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top img-thumbnail" src="{{ asset('storage/'. $product->thumbnail)}}">
          <div class="card-body">
            <h4 class="card-title">{{ $product->tittle }}</h4>
            <p class="card-text">{!! substr($product->description,0, 30 ) !!}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('products.single', $product)}}">View Product</a>
                <a type="button" href="{{route('products.addToCart', $product)}}" class="btn btn-sm btn-outline-secondary">Add to Cart</a>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
      <div class="row">
        <div class="col-md-12">
          {{ $products->links() }}
        </div>
      </div>
  </div>
</div>

               
                </div>
              </div>
