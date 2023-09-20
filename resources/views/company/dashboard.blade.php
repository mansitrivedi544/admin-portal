<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Company Dashboard</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
     
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto ">
                        <div class="auth-form-light text-center py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                            </div>
                            <h3 class="font-weight-light">Dashboard</h3>
                            <a class="font-weight-light" href="{{route('companyLogout')}}">Logout</a>
                            <a class="font-weight-light" href="{{route('productList')}}">Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>