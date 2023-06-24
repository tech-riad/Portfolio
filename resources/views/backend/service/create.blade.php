@extends('backend.layouts.app')
@section('content')

<div  class="content-wrapper">
    <div class="card new-table">
        <div class="card-header">
            <h5 class="card-title">Service</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ isset($services)? route('admin.service.update',$services->id) : route('admin.service.store') }}" method="post">
                        @csrf
                        @if(isset($services))
                        @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{@$services->name ?? old('name')}}">
                                    @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="icon_tag" class="form-label">Icon Class</label>
                                    <input type="text" class="form-control" name="icon_tag" id="icon_tag" value="{{@$services->icon_tag ?? old('icon_tag')}}">
                                    @if($errors->has('icon_tag'))
                                    <div class="error">{{ $errors->first('icon_tag') }}</div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="editor" class="form-label">Desctiption</label>
                                    <textarea class="form-control" id="editor" name="description"
                                        rows="3">{{@$services->description ?? old('description')}}</textarea>
                                    @if($errors->has('description'))
                                    <div class="error">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if(isset($services))
                        <button type="submit" class="btn btn-primary">Update</button>
                        @else
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @endif
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
