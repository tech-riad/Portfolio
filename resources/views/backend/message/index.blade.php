@extends('backend.layouts.app')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Message</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title float-left">Message</h3>
                            {{-- <div class="card-action float-right">
                                <a href="{{route('tag.create')}}" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Add Tag</a>
                            </div> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $s)
                                    <tr>
                                        <td>{{@$s->name}}</td>
                                        <td>{{@$s->email}}</td>
                                        <td>{{@$s->phone}}</td>
                                        <td>{{@$s->message}}</td>
                                        <td>
                                            @if ($s->status == 1)
                                            <span class="badge badge-primary">Read</span>
                                            @else
                                            <span class="badge badge-danger">Unread</span>
                                            @endif
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-primary status" data-id="{{$s->id}}" value="1"   name="status" data-toggle="modal"
                                                data-target="#exampleModal">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="{{route('admin.message.destroy',$s->id)}}" class="btn btn-danger deleteBtn">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="shiftModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="shiftModalLabel">Message</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" class="form-control" name="name" id="sessionTitle" value="{{@$s->name}}">

                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                        <input type="text" class="form-control" name="name" id="sessionTitle" value="{{@$s->email}}">

                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Phone:</label>
                                        <input type="text" class="form-control" name="name" id="sessionTitle" value="{{@$s->email}}">

                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Message:</label>
                                        <textarea class="form-control" name="" id="" cols="30" rows="8">{{@$s->message}}</textarea>
                                    </div>
                                    <div class="modal-footer" style="border-top: none;">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection

@push('js')
<script>
    $(document).on('click', '.status', function(e) {
    e.preventDefault();
    let message_id = $(this).data("id");
    let csrf_token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "{{ route('admin.message.update') }}",
        type: "PUT",
        data: {
            message_id: message_id
        },
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        success: function(data) {
            console.log(data);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log(xhr.responseText);
        }
    });
});


</script>

@endpush

