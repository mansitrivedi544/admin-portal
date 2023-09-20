<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Company</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-2">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Company</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('companyList') }}" enctype="multipart/form-data"> Back</a>
                </div>
            </div>
        </div>

        <form action="{{ route('updateCompany') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$company->id}}">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        <input type="text" name="name" value="{{ $company->name }}" class="form-control" placeholder="Company name">
                        @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Company Email" value="{{ $company->email }}" readonly> 
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Company Website:</strong>
                        <input type="text" name="website" value="{{ $company->website }}" class="form-control" placeholder="Company Website">
                        @error('website')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Logo:</strong><br>
                        <input type="file" name="logo" class="custom-file-input" id="customFile">
                        <label class="custom-file-label mt-4 ml-3" for="customFile">Choose file</label>
                        <label>{{$company->logo}}</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>

            </div>

        </form>
    </div>

</body>

</html>