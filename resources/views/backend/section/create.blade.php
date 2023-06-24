@extends('backend.layouts.app')
@section('content')

<div  class="content-wrapper">
    <div class="card new-table">
        <div class="card-header">
            <h5 class="card-title">Section</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ isset($sections)? route('admin.section.update',$sections->id) : route('admin.section.store') }}" method="post">
                        @csrf
                        @if(isset($sections))
                        @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="section_header" class="form-label">Section Name</label>
                                    <input type="text" class="form-control" name="section_header" id="section_header" value="{{@$sections->section_header ?? old('section_header')}}">
                                    @if($errors->has('section_header'))
                                    <div class="error">{{ $errors->first('section_header') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="section_message" class="form-label">Section Message</label>
                                    <input type="text" class="form-control" name="section_message" id="section_message" value="{{@$sections->section_message ?? old('section_message')}}">
                                    @if($errors->has('section_message'))
                                    <div class="error">{{ $errors->first('section_message') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if(isset($sections))
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
