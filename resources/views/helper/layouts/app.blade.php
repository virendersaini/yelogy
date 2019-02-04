<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<!-- Head -->
<head>
    @include('helper.element.head')
</head>
<!-- Head -->

<body class="animsition">

    <div class="page-wrapper">

        <!-- Header Mobile-->
        @include('helper.element.header')
        <!-- Header Mobile End-->


        <!--Sidebar Part -->
        @include('helper.element.sidebar')    
        <!--Sidebar Part End -->

        <!-- Container Part -->
        <div class="page-container">
            @yield('content')
        </div>
        <!-- Container Part End -->
    </div>
    <!-- Footer-->
    @include('helper.element.footer')    
    <!-- Footer-->

</body>
@include('helper.element.js')

</html>
