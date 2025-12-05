<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>
    <div class="container-fluid text-center bg-dark text-white p-3 mb-3 ">
        <h1>Product Details</h1>
    </div>
    <div class="text-right mb-3 mr-lg-5">
        <a href="{{ route('products.create') }}" class="btn btn-secondary">Add Product</a>
    </div>
    <div class="container">
            <table border="2" class="table table-bordered table-striped mt-3">
        <thead class="text-center m-2  p-2 bg-dark text-white">
            <tr>
                <th>S.No</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($products as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price * $product->quantity }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}"> <button><i class="bi bi-eye"></i></button></a>
                    <a href="{{ route('products.edit', $product->id) }}" > <button><i class="bi bi-pencil"></i></button></a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"> <i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
  
</body>
</html>
