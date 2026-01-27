@extends('layouts.products')
@section('content')
<div class="card">
    <div class="card-body">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
        <form action="{{ route('products.add') }}" method="post" enctype="multipart/form-data">
          @csrf
            <h2>Upload Product</h2>
            <select name="category_id" class="form-control">
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                
              @endforeach
            </select>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" class="form-control">
            <label for="img">Subir Documento (IMG):</label>
            <input type="file" name="img" id="img" class="form-control">
            <div class="col-auto mt-3">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection
