<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Attendance management system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <!-- font-->
    <link rel="stylesheet" href="{{ asset('/font/iconsmind-s/css/iconsminds.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/font/simple-line-icons/css/simple-line-icons.css') }}"/>
    <script src="https://use.fontawesome.com/6ecd46a791.js"></script>


    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('/css/vendor/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/bootstrap.rtl.only.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/fullcalendar.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/dataTables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/datatables.responsive.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/perfect-scrollbar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/glide.core.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/bootstrap-stars.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/nouislider.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/bootstrap-datepicker3.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/component-custom-switch.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body id="app-container" class="menu-sub-hidden show-spinner">

@include('doreViews.admin.body.header')
@include('doreViews.admin.body.mainMenu')

<main>

    @yield('admin')

</main>


@include('doreViews.admin.body.footer')



<!-- Scripts-->
<script src="{{ asset('/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('/js/vendor/Chart.bundle.min.js')}}"></script>
<script src="{{ asset('/js/vendor/chartjs-plugin-datalabels.js')}}"></script>
<script src="{{ asset('/js/vendor/moment.min.js')}}"></script>
<script src="{{ asset('/js/vendor/fullcalendar.min.js')}}"></script>
<script src="{{ asset('/js/vendor/datatables.min.js')}}"></script>
<script src="{{ asset('/js/vendor/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('js/vendor/jquery.validate/jquery.validate.min.js')}}"></script>  {{--added--}}
<script src="{{ asset('js/vendor/jquery.validate/additional-methods.min.js')}}"></script> {{--added--}}
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script> {{--added--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> {{--added--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script> {{--added--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script> {{--added--}}
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script> {{--added--}}
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script> {{--added--}}
<script src="{{ asset('/js/vendor/progressbar.min.js')}}"></script>
<script src="{{ asset('/js/vendor/jquery.barrating.min.js')}}"></script>
<script src="{{ asset('/js/vendor/select2.full.js')}}"></script>
<script src="{{ asset('/js/vendor/nouislider.min.js')}}"></script>
<script src="{{ asset('/js/vendor/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('/js/vendor/Sortable.js')}}"></script>
<script src="{{ asset('/js/vendor/mousetrap.min.js')}}"></script>
<script src="{{ asset('/js/vendor/glide.min.js')}}"></script>
<script src="{{ asset('/js/dore.script.js')}}"></script>
<script src="{{ asset('/js/scripts.js')}}"></script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    toastr.options =
        {
            'positionClass': 'toast-top-left'
        }
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>


</body>

</html>
