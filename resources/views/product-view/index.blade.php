@extends('product-view.show')

@section('content')
<style>
.dropbtn {
    background-color: black;
    font-weight:500;
    text-transform:uppercase;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    display: flex;
    justify-content: center;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 55px;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
<div class="container">
    <div class="breacrumb-section">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center my-1 bg-black">
                    @foreach ($categories as $item)
                    <div class="dropdown">
                        <button class="dropbtn">{{$item->name}}</button>
                        <div class="dropdown-content">
                            @foreach($item->subCategories as $category)
                            <a href="#">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center my-3">
            <h2>Products List</h2>
        </div>
        <div class="text-end my-3">
            <a class="btn btn-outline-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr class="bg-dark text-white">
        <th>No</th>
        <th>Product Name</th>
        <th>Details</th>
        <th>SKU</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->detail }}</td>
        <td>{{ $product->sku }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                <a class="btn btn-outline-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>



{!! $products->links() !!}

@endsection