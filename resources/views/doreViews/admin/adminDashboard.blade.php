@extends('doreViews.admin.adminBase')
@section('admin')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>لوحة القيادة</h1>
                <div class="separator mb-5"></div>
            </div>

            <div class="col-lg-12 col-xl-6">
                <div class="icon-cards-row">
                    <div class="glide dashboard-numbers">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center">
                                            <i class="simple-icon-people"></i>
                                            <p class="card-text mb-0">مجموع العمال</p>
                                            <p class="lead text-center">{{ $users->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center">
                                            <i class="simple-icon-user-following"></i>
                                            <p class="card-text mb-0">الحاضرون اليوم</p>
                                            <p class="lead text-center">{{ $users->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center">
                                            <i class="simple-icon-user-following"></i>
                                            <p class="card-text mb-0">الحاضرون اليوم</p>
                                            <p class="lead text-center">{{ $users->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="glide__slide">
                                    <a href="#" class="card">
                                        <div class="card-body text-center">
                                            <i class="simple-icon-user-following"></i>
                                            <p class="card-text mb-0">الحاضرون اليوم</p>
                                            <p class="lead text-center">{{ $users->count() }}</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-xl-6 col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">حضور اليوم</h5>

                        <div class="scroll dashboard-list-with-user">
                            @foreach($users as $user)
                                <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                    <a href="#">
                                        <img src={{ $user->profile_photo_path }} alt={{ $user->name }}
                                             class="img-thumbnail border-0 rounded-circle list-thumbnail align-self-center xsmall" />
                                    </a>
                                    <div class="pl-3">
                                        <a href="#">
                                            <p class="font-weight-medium mb-0 ">{{ $user->name }}</p>
                                            <p class="text-muted mb-0 text-small">09.08.2018 - 12:45</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>


@endsection
