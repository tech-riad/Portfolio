@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="card new-table">
        <div class="card-header">
            <h6>Setting Edit</h6>
        </div>
        <div class="card-body">

            <form action="{{route('admin.setting.update',1)}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" name="name" type="text " class="form-control"
                                value="{{@$setting->name ?? @old('name')}}" class="@error('name') is-invalid @enderror">

                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label for="customFile">Logo</label>
                        <div class="custom-file">
                            <input type="file" name="logo" class="custom-file-input" id="customFile"
                                onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])"
                                class="@error('logo') is-invalid @enderror">
                            <label class="custom-file-label" for="customFile">Choose logo</label>

                            @if($errors->has('logo'))
                            <div class="error">{{ $errors->first('logo') }}</div>
                            @endif
                        </div>
                        <img class="mt-2" id="logo" alt="logo" width="100" height="100" />

                        @if (isset($setting) && $setting->logo)
                            <div class="old_logo mt-2">
                                <label class="mb-0" for="">Old logo:</label><br>
                                <img class="mt-2" id="oldlogo" src="{{ asset($setting->logo) }}"
                                    alt="logo" width="100" height="100" />
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="customFile">Slider Image</label>
                        <div class="custom-file">
                            <input type="file" name="slider_image" class="custom-file-input" id="customFile"
                                onchange="document.getElementById('slider_image').src = window.URL.createObjectURL(this.files[0])"
                                class="@error('slider_image') is-invalid @enderror">
                            <label class="custom-file-label" for="customFile">Choose slider_image</label>

                            @if($errors->has('slider_image'))
                            <div class="error">{{ $errors->first('slider_image') }}</div>
                            @endif
                        </div>
                        <img class="mt-2" id="slider_image" alt="slider_image" width="100" height="100" />

                        @if (isset($setting) && $setting->slider_image)
                            <div class="old_slider_image mt-2">
                                <label class="mb-0" for="">Old slider_image:</label><br>
                                <img class="mt-2" id="oldslider_image" src="{{ asset($setting->slider_image) }}"
                                    alt="slider_image" width="100" height="100" />
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="customFile">About Image</label>
                        <div class="custom-file">
                            <input type="file" name="about_image" class="custom-file-input" id="customFile"
                                onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])"
                                class="@error('about_image') is-invalid @enderror">
                            <label class="custom-file-label" for="customFile">Choose about_image</label>

                            @if($errors->has('about_image'))
                            <div class="error">{{ $errors->first('about_image') }}</div>
                            @endif
                        </div>
                        <img class="mt-2" id="about_image" alt="about_image" width="100" height="100" />

                        @if (isset($setting) && $setting->about_image)
                            <div class="old_about_image mt-2">
                                <label class="mb-0" for="">Old about_image:</label><br>
                                <img class="mt-2" id="oldabout_image" src="{{ asset($setting->about_image) }}"
                                    alt="about_image" width="100" height="100" />
                            </div>
                        @endif
                    </div>
                </div>






                {{-- <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="text " class="form-control"
                                value="{{@$setting->email ?? @old('email')}}"
                                class="@error('email') is-invalid @enderror">

                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input id="phone" name="phone" type="text " class="form-control"
                                value="{{@$setting->phone ?? @old('phone')}}"
                                class="@error('phone') is-invalid @enderror">

                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input id="location" name="location" type="text " class="form-control"
                                value="{{@$setting->location ?? @old('location')}}"
                                class="@error('location') is-invalid @enderror">

                            @error('location')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input id="facebook" name="facebook" type="text " class="form-control"
                                value="{{@$setting->facebook ?? @old('facebook')}}"
                                class="@error('facebook') is-invalid @enderror">

                            @error('facebook')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input id="instagram" name="instagram" type="text " class="form-control"
                                value="{{@$setting->instagram ?? @old('instagram')}}"
                                class="@error('instagram') is-invalid @enderror">

                            @error('instagram')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input id="twitter" name="twitter" type="text " class="form-control"
                                value="{{@$setting->twitter ?? @old('twitter')}}"
                                class="@error('twitter') is-invalid @enderror">

                            @error('twitter')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="linkdein" class="form-label">Linkdein</label>
                            <input id="linkdein" name="linkdein" type="text " class="form-control"
                                value="{{@$setting->linkdein ?? @old('linkdein')}}"
                                class="@error('linkdein') is-invalid @enderror">

                            @error('linkdein')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="youtube" class="form-label">Youtube</label>
                            <input id="youtube" name="youtube" type="text " class="form-control"
                                value="{{@$setting->youtube ?? @old('youtube')}}"
                                class="@error('youtube') is-invalid @enderror">

                            @error('youtube')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="about_description" class="form-label">About</label>
                            <textarea class="form-control" id="editor" name="about_description" rows="10"
                                class="@error('image') is-invalid @enderror">{{@$setting->about_description ?? @old('about_description')}}</textarea>

                            @error('about_description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Update</button>
            </form>


        </div>
    </div>
</div>


@endsection

@push('js')
<script>

    $("#logo").hide();
    $("#slider_image").hide();
    $("#about_image").hide();
</script>

@endpush
