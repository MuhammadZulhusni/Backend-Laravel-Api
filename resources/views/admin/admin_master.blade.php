<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>React - Admin Dashboard</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/favicon.png') }}">

    {{-- Plugin CSS files --}}
    <link rel="stylesheet" href="{{ asset('backend/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    {{-- Theme CSS --}}
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

    {{-- Toastr CSS for notifications --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    {{-- SweetAlert2 CSS (Note: SweetAlert2 is also included, but Toastr is used for messages in controller) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

    {{-- Preloader (loading spinner) --}}
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    {{-- Main wrapper for the entire layout --}}
    <div id="main-wrapper">

        {{-- Include header partial --}}
        @include('admin.body.header')
        {{-- Include sidebar partial --}}
        @include('admin.body.sidebar')

        {{-- Yield content from child views (e.g., specific page content) --}}
        @yield('admin')

        {{-- Include footer partial --}}
        @include('admin.body.footer')
    </div>

    {{-- SweetAlert2 JS (included but not currently used for toast messages from controller) --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    {{-- Core plugin JS --}}
    <script src="{{ asset('backend/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    {{-- Other vendor JS --}}
    <script src="{{ asset('backend/vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('backend/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('backend/vendor/owl-carousel/owl.carousel.js') }}"></script>

    {{-- Theme-specific JS --}}
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/deznav-init.js') }}"></script>

    {{-- Toastr JS for notifications --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Toastr notification display script --}}
    @if(Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type','info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
    @endif

</body>
</html>