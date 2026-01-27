@extends('layouts.products')
@section('content')
    
<div class="card">
    <div class="card-body">
        <form action="{{ route('category.new') }}" method="post" enctype="multipart/form-data">
          @csrf
            <h2>Add Category</h2>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="col-auto mt-3">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection
