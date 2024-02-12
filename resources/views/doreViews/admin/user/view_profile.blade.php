@extends('doreViews.admin.adminBase')

@section('admin')


    <div class="col-12 ">
        <br><br><br><br>
        <div class="card">
            <div class="card-body">
                <form class="needs-validation tooltip-label-right" novalidate="novalidate" method="post"
                      action="{{ route('profile.edit') }}">
                    @csrf
                    <a  class="lightbox">
                        <img alt="Profile" src="{{ (!empty($user->profile_photo_path))? $user->profile_photo_path:asset('img/profiles/no image.png') }} " class="img-thumbnail card-img social-profile-img">
                    </a>
                    <div class="form-group position-relative error-l-50">
                        <label>الاسم</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                               disabled="true">

                    </div>

                    <div class="form-group position-relative error-l-50">
                        <label>البريد الالكتروني</label>
                        <input type="email" name="email" class="form-control" value=" {{ $user->email }}"
                               disabled="true">

                    </div>


                    <a href="{{ route('profile.edit') }}" style="float: left;"
                       class="btn btn-primary mb-0">{{__('تغيير الحساب')}}</a>

                </form>
            </div>
        </div>
    </div>













@endsection
