<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/back/css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/css/plugins/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/css/plugins/dataTables.bootstrap5.min.css') }}">
    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/material.css') }}">

    <!-- vendor css -->
    <link rel="stylesheet" href="#" id="rtl-style-link">
    <link rel="stylesheet" href="{{ asset('assets/back/css/style.css') }}" id="main-style-link">
    <style>
        .form-check-inline {
            margin: 0px;
        }
    </style>
    @section('css')

    @show
</head>
<body class="theme-1">
    @include('layouts.include.header')
    @include('layouts.include.sidebar')
        <main>
            @yield('content')
        </main>
    @include('layouts.include.footer')
    <script src="{{ asset('assets/back/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/plugins/sweetalert2.all.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/back/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.4.5.1/full-all/ckeditor.js"></script>
    <script src="{{ asset('assets/back/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/main.js') }}"></script>
    @section('js')

    @show
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });

        function DeleteConfirmation(){
            var result = confirm('Are you sure want to delete this?');
            if(result == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
    @if (Session::has('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{ Session::get('success') }}",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
    @elseif (Session::has('error'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: "{{ Session::get('error') }}",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
    @endif
    <script>
       $('#multiple-select-custom').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
       $('#multiple-select-custom1').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),

        });
    </script>
</body>
</html>
