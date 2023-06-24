@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="card new-table">
        <div class="card-header">
            <h5 class="card-title">Portfolio</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <form
                        action="{{ isset($portfolio)? route('admin.portfolio.update',$portfolio->id) : route('admin.portfolio.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($portfolio))
                        @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>

                                    <select name="category" id="category" class="form-control" required>
                                        <option value="" selected disabled>select a Category</option>
                                        <option value="Web Development" {{@$portfolio->category == "Web Development" ? 'selected':''}}>Web Development</option>
                                        <option value="Creative Design" {{@$portfolio->category == "Creative Design" ? 'selected':''}}>Creative Design</option>
                                        <option value="Graphics Design" {{@$portfolio->category == "Graphics Design" ? 'selected':''}}>Graphics Design</option>
                                    </select>

                                    @if($errors->has('category'))
                                    <div class="error">{{ $errors->first('category') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="customFile">Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile"
                                        onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                        class="@error('image') is-invalid @enderror">
                                    <label class="custom-file-label" for="customFile">Choose Image</label>

                                    @if($errors->has('image'))
                                    <div class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                                <img class="mt-2" id="image" alt="image" width="100" height="100" />

                                @if (isset($portfolio) && $portfolio->image)
                                    <div class="old_image mt-2">
                                        <label class="mb-0" for="">Old Image:</label><br>
                                        <img class="mt-2" id="oldimage" src="{{ asset($portfolio->image) }}"
                                            alt="image" width="100" height="100" />
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if(isset($portfolio))
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

@push('js')
<script>
    $("#image").hide();


    $("#customFile").change(function () {
        $("#image").show();
    });



</script>

@endpush
