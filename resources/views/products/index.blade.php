@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-2" >
            <div class="pull-left">
                <h2>Products:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="table-container">
            <div class="container">
                <table class= "table table-bordered" id='ProductTable'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Price</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->detail }}</td>
                                <td>{{ $product->price }}</td>

                                <td>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    {{ $products->links() }}

    <script>
        $(document).ready( function () {
        $('#ProductTable').DataTable();
        } );
    </script>


@endsection
