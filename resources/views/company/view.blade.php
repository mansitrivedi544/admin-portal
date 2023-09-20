<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Company</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-2">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>View Company</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('companyList') }}" enctype="multipart/form-data"> Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    <input type="text" name="name" value="{{ $company->name }}" class="form-control" placeholder="Company name" readonly>

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
                    <strong>Company website:</strong>
                    <input type="text" name="website" value="{{ $company->website }}" class="form-control" placeholder="Company Website" readonly>
                </div>
            </div>

        </div>

    </div>

</body>

</html>