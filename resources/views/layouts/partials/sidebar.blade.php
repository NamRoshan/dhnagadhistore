<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      @foreach($products as $productss)
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <h4 class="card-title">{{ $productss->tittle }}</h4>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>