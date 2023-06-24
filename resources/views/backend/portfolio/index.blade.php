@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Portfolio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Portfolio</li>
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
                            <h3 class="card-title float-left">Portfolio</h3>
                            <div class="card-action float-right">
                                <a href="{{route('admin.portfolio.create')}}" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Add Work Sample</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($portfolio as $s)

                                    <tr>
                                        <td>{{@$s->category}}</td>
                                        <td>
                                            @if($s->image)
                                            <img src="{{ asset($s->image) }}" alt="Image" width="50" height="50">
                                        @else
                                            No Image
                                        @endif
                                        </td>

                                        <td>{!! Str::limit(@$s->description,110) !!}</td>
                                        <td>
                                            <a href="{{route('admin.portfolio.edit',$s->id)}}" class="btn btn-success">Edit</a>
                                            <a href="{{route('admin.portfolio.destroy',$s->id)}}" class="btn btn-danger deleteBtn">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Category</th>
                                        <th>Image</th>
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

@endsection

