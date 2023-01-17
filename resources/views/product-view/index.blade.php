@extends('product-view.show')
     
@section('content')

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