<!DOCTYPE html>
<html>

<head>
  <title>Product List</title>

  <!-- Meta -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>
@include('message')
<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row float-right">
    <div class="col-xs-6 col-sm-6 col-md-6 ml-4 mt-2">
      <div class="form-group">
        <input type="file" name="file" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="form-group">
        <button class="btn btn-primary btn-sm m-2">Import Products</button>
      </div>
    </div>
  </div>
</form>
<a href="{{route('companyDashboard')}}" class="btn btn-info btn-sm mr-1 float-right m-2 ">Back</a>
<body>
  <a href="{{route('createProduct')}}" class="btn btn-info btn-sm mr-1 float-right m-2 "><i class="fa-solid fa-plus"></i></a>
  <table class="table table-bordered productTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>MRP</th>
        <th>Price</th>
        <th width="100px">Action</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <!-- Script -->
  <script type="text/javascript">
    var table = $('.productTable').DataTable({
      stateSave: true,
      processing: true,
      serverSide: true,
      ajax: "{{ route('productList') }}",
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'mrp',
          name: 'mrp'
        },
        {
          data: 'price',
          name: 'price'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ],


    });



    $('body').on('click', '.delete', function() {

      if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');

        // ajax
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "POST",
          url: "{{ route('deleteProduct') }}",
          data: {
            id: id
          },
          dataType: 'json',
          success: function(res) {
            table.draw();

          }
        });
      }

    });
  </script>
</body>

</html>