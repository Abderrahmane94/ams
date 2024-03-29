@extends('doreViews.admin.adminBase')

@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="col-12">

        <div class="card mb-4">
            <div class="card-body">
                <form class="needs-validation tooltip-label-right" novalidate="novalidate" method="post"
                      action="{{ route('profile.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group position-relative error-l-50">
                        <label>الاسم</label><span class="text-danger">*</span>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        <div class="invalid-tooltip">
                            {{__('Name is required')}}
                        </div>

                    </div>

                    <div class="form-group position-relative error-l-50">
                        <label>البريد الالكتروني</label><span class="text-danger">*</span>
                        <input type="email" name="email" class="form-control" value=" {{ $user->email }}">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="invalid-tooltip">
                            {{__('email is required')}}
                        </div>
                    </div>

                    <div class="form-group position-relative error-l-50">
                        <label>صورة الحساب</label><span class="text-danger">*</span>
                        <div class="controls">
                            <input type="file" name="image" class="form-control" id="image" >  </div>
                    </div>

                    <div class="form-group position-relative error-l-50">
                        <div class="controls">
                            <img id="showImage" src="{{ (!empty($user->profile_photo_path))? $user->profile_photo_path:asset('img/profiles/no-image.png') }}" style="width: 100px; width: 100px; border: 1px solid #000000;">

                        </div>
                    </div>


                    <input type="submit" class="btn btn-primary mb-0 text-right" style="float: left;" value="{{__('حفظ')}}">

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
