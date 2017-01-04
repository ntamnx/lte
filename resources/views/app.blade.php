<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    @include('partials.htmlheader')
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">
            @include('partials.mainheader')
            @include('partials.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @include('partials.errors')
                @include('partials.message')
                <!-- Main content -->
                <section class="content overfollow_hidden" >
                    @yield('main-content')
                </section><!-- /.content -->
            </div>
            @include('partials.controlsidebar')
            @include('partials.footer')
        </div><!-- ./wrapper -->
        @include('partials.scripts')
        @yield('js')
    </body>
</html>