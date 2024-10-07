@extends("layout.header")
@section('content')
<body>

    <div class="content-wrapper ">
        <h6 class="font-weight-bold">Employee Management</h6>
        <div class="container bg-white">

            <div class="text-right mb-3">
                <a href="{{ route('employee.create') }}"><button type="button" class="btn button-outline">Add Employee</button></a>
            </div>
            <table class="table data-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Dob</th>
                        <th>Skill</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script defer src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function() {
        $.fn.dataTable.ext.errMode = 'none';
        var table = $('.data-table').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route('employee.index') }}"
            , columns: [{
                    data: 'name'
                    , name: 'name'
                },
                {
                    data: 'address'
                    , name: 'address'
                }
                , {
                    data: 'dob'
                    , name: 'dob'
                }
                , {
                    data: 'skill'
                    , name: 'skill'
                }
                , {
                    data: 'image'
                    , name: 'image'
                    , render: function(data, type, full, meta) {
                        // Assuming 'image' column contains the image URL
                        return '<img src="{{ url('/upload/emp_image/') }}/' + data + '" style="max-width:50px; max-height:50px;" />';
                    }
                }
                , {
                    data: 'status'
                    , name: 'status'
                }
                , {
                    data: 'action'
                    , name: 'action'
                    , orderable: false
                    , searchable: false
                }
            , ]
        });
    });

</script>

</html>
@endsection