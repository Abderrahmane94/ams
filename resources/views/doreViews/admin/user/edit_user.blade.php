@extends('doreViews.admin.adminBase')

@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="col-12">
        <h5 class="mb-4">{{__('Information Utilisateur')}}</h5>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-4">Basic</h5>
                <form class="needs-validation tooltip-label-right" novalidate="novalidate" method="post"
                      action="{{ route('users.update',$editData->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group position-relative error-l-50">
                        <label>Name</label><span class="text-danger">*</span>
                        <input type="text" name="name" class="form-control" value="{{ $editData->name }}">
                        <div class="invalid-tooltip">
                            {{__('Name is required')}}
                        </div>

                    </div>

                    <div class="form-group position-relative error-l-50">
                        <label>E-mail</label><span class="text-danger">*</span>
                        <input type="email" name="email" class="form-control" value=" {{ $editData->email }}">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="invalid-tooltip">
                            {{__('email is required')}}
                        </div>
                    </div>

                    <div class="form-group position-relative error-l-50">
                        <label>Profile Image</label><span class="text-danger">*</span>
                        <div class="controls">
                            <input type="file" name="image" class="form-control" id="image" >  </div>
                    </div>

                    <div class="form-group position-relative error-l-50">
                        <div class="controls">
                            <img id="showImage" src="{{ (!empty($editData->profile_photo_path))? $editData->profile_photo_path:asset('img/profiles/no-image.png') }}" style="width: 100px; width: 100px; border: 1px solid #000000;">

                        </div>
                    </div>


                    <input type="submit" class="btn btn-primary mb-0" value="{{__('Submit')}}">

                </form>
            </div>
        </div>
    </div>







    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>





@endsection

