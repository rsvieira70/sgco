<!DOCTYPE html>
<html lang="{{ env('locale') }}">
@include('_Partials.head')

<!--<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">-->
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @includeIf('_Partials.navbar')
        @includeIf('_Partials.aside')
        <div class="content-wrapper">
            @includeIf('_Partials.header')
            <section class="content">
                <div class="container-fluid">
                    @yield("content")
                </div>
            </section>
        </div>
        @includeIf('_Partials.footer')
        @includeIf('_Partials.javascripts')
    </div>
</body>

</html>
