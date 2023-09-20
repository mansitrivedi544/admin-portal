<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-2">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Product</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('productList') }}"> Back</a>
                </div>
            </div>
        </div>

        <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Product Name">
                        @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Description:</strong>
                        <input type="text" name="description" class="form-control" placeholder="Product Description">
                        @error('description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Mrp:</strong>
                        <input type="text" name="mrp" class="form-control" placeholder="Product MRP">
                        @error('mrp')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Price:</strong>
                        <input type="text" name="price" class="form-control" placeholder="Product Price">
                        @error('price')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>

        </form>

</body>

</html>