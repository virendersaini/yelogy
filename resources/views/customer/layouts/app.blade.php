<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<!-- Head -->
<head>
    @include('customer.element.head')
</head>
<!-- Head -->

<body class="animsition">

    <div class="page-wrapper">

        <!-- Header Mobile-->
        @include('customer.element.header')
        <!-- Header Mobile End-->


        <!--Sidebar Part -->
        @include('customer.element.sidebar')    
        <!--Sidebar Part End -->

        <!-- Container Part -->
        <div class="page-container">
            @yield('content')
        </div>
        <!-- Container Part End -->
    </div>
    <!-- Footer-->
    @include('customer.element.footer')    
    <!-- Footer-->

</body>
@include('customer.element.js')

</html>
