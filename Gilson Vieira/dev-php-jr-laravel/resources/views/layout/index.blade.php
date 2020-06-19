<!DOCTYPE html>
<html lang="pt-BR">

<header>
    @include('layout.head')
    @yield('stylesheet')
</header>

<body>
<!-- Top Bar Start -->
@include('layout.topbar')
<!-- Top Bar End -->

<div class="page-wrapper">
    <!-- Left Sidenav -->
@include('layout.left-sidenav')
<!-- end left-sidenav-->

    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            @yield('content')
        </div><!-- container -->

        <!--  Modal -->

    @include('layout.footer')<!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->

<!-- jQuery  -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/waves.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>

@yield('scriptsheet')
<script>
    $(document).ready(function() {
        $('body').tooltip({
            selector: "[data-tooltip=tooltip]",
            container: "body"
        });
    })
</script>
</body>
</html>
