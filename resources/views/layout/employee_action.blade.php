<div class="d-flex">

        <a href="{{route('employee.edit', $data->id)}}"><i class="fas fa-pencil-alt" title="Edit"></i></a>&nbsp;&nbsp;
        <a href="javascript:void(0)"><i class="fa fa-trash delete" id="{{$data->id}}" title="Delete"></i></a>&nbsp;&nbsp;
        <a href="javascript:void(0);" class="toggle-link" id="{{$data->id}}">
    @if($data->status == 'active')
        <i class="fas fa-toggle-on" data-state="{{$data->status}}" title="Status" id="toggleIconId"></i></a>
    @else
    <i class="fas fa-toggle-off" data-state="{{$data->status}}" title="Status" id="toggleIconId"></i></a>
    @endif

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    $(document).ready(function() {
        $(document).on("click", ".delete", function() {
            swal({
                    title: " Delete Employee"
                    , text: "Are you sure you want to delete this Employee ?"
                    , icon: "warning"
                    , buttons: true
                    , dangerMode: true
                    , showCancelButton: true
                , })
                .then((willDelete) => {
                    if (willDelete) {
                        var id = $(this).attr("id");
                        $.ajax({
                            url: "{{url('employee')}}" + "/" + id
                            , type: 'post'
                            , data: {
                                '_token': '{{ csrf_token() }}'
                                , '_method': 'DELETE'
                            }
                            , success: function(result) {
                                swal({
                                    icon: "success",
                                     text: "Deleted successfully.",
                                    buttons: false, // Hide buttons

                                 });
                                setInterval(function() {
                                    window.location.reload();
                                }, 1000);
                            }
                        });

                    }
                });
        });
    });

    // Only for status

    $(document).ready(function() {
        $(document).on("click", ".toggle-link", function(e) {
            var currentStatus = $(this).find('i').data("state");
            var newStatus = (currentStatus === 'active') ? 'inactive' : 'active';
            var titleText = newStatus.charAt(0).toUpperCase() + newStatus.slice(1)

            swal({
                    title: "Employee " + titleText + " ?"
                    , text: "Are you sure you want to " + titleText + " this Employee !"
                    , icon: "warning"
                    , buttons: true
                    , dangerMode: true
                    , showCancelButton: true
                , })
                .then((willDelete) => {
                    if (willDelete) {
                        var id = $(this).attr("id");
                        $.ajax({
                            url: "{{url('employee-status')}}" + "/" + id
                            , type: 'post'
                            , data: {
                                '_token': '{{ csrf_token() }}'
                            , }
                            , success: function(result) {
                                swal({
                                    icon: "success"
                                    , text: "Status updated successfully.",
                                    buttons: false, // Hide buttons
                                 });
                                setInterval(function() {
                                    window.location.reload();
                                }, 1000);
                            }
                        });

                    }
                });
        });
    });

</script>