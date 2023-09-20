<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Company</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-2">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Company</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('companyList') }}"> Back</a>
                </div>
            </div>
        </div>

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('storeCompany') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Company Name">
                        @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Company Email">
                        @error('email')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company Website:</strong>
                        <input type="text" name="website" class="form-control" placeholder="Company Website">
                        @error('website')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company Password:</strong>
                        <input type="text" name="password" class="form-control" placeholder="Company Address">
                        @error('password')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Logo:</strong><br>
                        <input type="file" name="logo" class="custom-file-input" id="customFile">
                        <label class="custom-file-label mt-4 ml-3" for="customFile">Choose file</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>

        </form>

</body>

</html>