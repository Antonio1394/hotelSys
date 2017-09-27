@include('templates.administrator.components.head')
<body class="fixed-left">
    <div id="element" class="introLoading"></div>
    @include('templates.administrator.components.alertErrors')
    @include('templates.administrator.components.alertSuccess')
    <div id="wrapper">
        @include('templates.administrator.components.topbar')
        @include('admin.layouts.partials.menubar')

        <div class="content-page">
            <div class="content">
                <div class="container">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            2017 © copyright Environment
        </footer>

    </div>
    @include('templates.administrator.components.scripts')
</body>
</html>
