<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-2">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Product</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('productList') }}" enctype="multipart/form-data"> Back</a>
                </div>
            </div>
        </div>

        <form action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$product->id}}">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Name:</strong>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Product name">
                        @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Description:</strong>
                        <input type="text" name="description" class="form-control" placeholder="Product Description" value="{{ !empty($product->description)?$product->description:'' }}"> 
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Mrp:</strong>
                        <input type="text" name="mrp" value="{{ $product->mrp }}" class="form-control" placeholder="Product mrp">
                        @error('mrp')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Price:</strong>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Product Price">
                        @error('price')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>

            </div>

        </form>
    </div>

</body>

</html>