@extends('doreViews.admin.adminBase')
@section('admin')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>المداومة</h1>

                <div class="top-right-button-container">
                    <div class="btn-group">
                        <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            تصدير
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" id="dataTablesExcel" href="#">Excel</a>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
                       role="button" aria-expanded="true" aria-controls="displayOptions">
                        Display Options
                        <i class="simple-icon-arrow-down align-middle"></i>
                    </a>
                    <div class="collapse dont-collapse-sm" id="displayOptions">
                        <div class="d-block d-md-inline-block">
                            <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                                <input class="form-control" placeholder="البحث في القائمة" id="searchDatatable">
                            </div>
                        </div>
                        <div class="float-md-right dropdown-as-select" id="pageCountDatatable">
                            <span class="text-muted text-small">عرض 1-10 من 40 </span>
                            <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                10
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">5</a>
                                <a class="dropdown-item active" href="#">10</a>
                                <a class="dropdown-item" href="#">20</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4 data-table-rows data-tables-hide-filter">
                <table id="datatableRows" class="data-table responsive nowrap"
                       data-order="[[ 1, &quot;desc&quot; ]]">
                    <thead>
                    <tr>
                        <th style="text-align: center">الصورة الشخصية</th>
                        <th style="text-align: center">الاسم</th>
                        <th style="text-align: center">يوم الدخول</th>
                        <th style="text-align: center">وقت الدخول</th>
                        <th style="text-align: center">يوم الخروج</th>
                        <th style="text-align: center">وقت الخروج</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attendances as $key => $attendance)
                        <tr>
                            <td style="font-size:0px">
                                <img alt="Profile Picture"
                                     src="{{ (!empty($attendance->user->profile_photo_path))? $attendance->user->profile_photo_path:asset('img/profiles/no-image.png') }} "
                                     width="80px"/>
                            </td>
                            <td>
                                <p class="list-item-heading" style="text-align: center">{{ $attendance->user->name }}</p>
                            </td>
                            <td>
                                <p class="text-muted" style="text-align: center">{{ date('Y-m-d', strtotime($attendance->entry_time)) }}</p>
                            </td>
                            <td style="text-align: center">
                                <p class="text-muted" style="text-align: center">{{ date('H:i', strtotime($attendance->entry_time))  }}</p>
                            </td>
                            <td>
                                <p class="text-muted" style="text-align: center">{{ date('Y-m-d', strtotime($attendance->exit_time)) }}</p>
                            </td>
                            <td>
                                <p class="text-muted" style="text-align: center">{{ date('H:i', strtotime($attendance->exit_time)) }}</p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection










