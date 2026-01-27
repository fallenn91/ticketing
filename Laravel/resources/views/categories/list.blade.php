@extends('layouts.products')
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Categories</h6>
    @foreach($categories as $category)
    <div class="d-flex text-body-secondary pt-3">
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
                <a href="{{ route('category.product', $category->id) }}"><strong class="text-gray-dark">Categoria {{ $category->name }}</strong></a>
                
                <form method="POST" action="{{ route('category.destroy', $category->id) }}">
                  @csrf
                  @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">DELETE</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection