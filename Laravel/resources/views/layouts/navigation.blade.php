<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Examen</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{ route('products') }}" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="{{ route('products.add') }}" class="nav-link">New Product</a></li>
        <li class="nav-item"><a href="{{ route('products.list') }}" class="nav-link">List Products</a></li>
        <li class="nav-item"><a href="{{ route('category.list') }}" class="nav-link">List Categories</a></li>
        <li class="nav-item"><a href="{{ route('category.new') }}" class="nav-link">New Category</a></li>
      </ul>
</header>