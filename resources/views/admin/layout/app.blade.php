<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<!-- Head Panel-->
@include('admin.element.head')
<!-- /#Head-panel -->

<body class="open">

    <div class="body-overlay"></div>
    
    <!-- Left Panel -->
    @include('admin.element.left')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('admin.element.header')
        <!-- /header -->
        
        <!----Top Popup-->
        @include('admin.element.top')
        <!----Top Popup-->

        <!-- main content -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>@stack('title')</h1>
                    </div>
                </div>
            </div>
            <?php //print_r(Auth::guard('web')->user()->name);die; ?>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @stack('breadcrumbs')
                        </ol>
                    </div>
                </div>
            </div>
        </div>
 
        @yield('content')
        <!-- end of main content -->
    </div>
    <!--End Of Right Panel-->

    <!-- Footer-->
        @include('admin.element.footer')
    <!-- Footer-->

    <!-- Footer JS-->
        @include('admin.element.footer_js')
    <!-- Footer JS-->
    <!-- scripts stack -->
</body>

</html>
