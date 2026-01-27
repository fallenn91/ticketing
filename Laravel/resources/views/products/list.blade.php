@extends('layouts.products')
@section('content')
<div class="col-lg-6 col-md-8 mx-auto">
    <h1 class="fw-light">
        {{ $category ? 'Productes de ' . $category->name : 'Tots els productes' }}
    </h1>
</div>
@if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif
@if($products->isEmpty())
  <p class="text-center">No hi ha productes per mostrar.</p>
@else
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  @foreach($products as $product)
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{ asset('storage/' . $product->img )}}" style="width: 500px" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail">
            <div class="card-body">
                <p class="card-text">Product Name: {{ $product->name }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection