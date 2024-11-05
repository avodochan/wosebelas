<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{asset('/assets/admin/admintl/assets/scss/app.scss')}}">
    <link rel="stylesheet" href="{{asset('/assets/admin/admintl/assets/scss/themes/dark/app-dark.scss')}}">
    <link rel="shortcut icon" href="{{asset('/assets/admin/admintl/assets/static/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('/assets/admin/admintl/assets/static/images/logo/favicon.png')}}" type="image/png">
</head>

<body>
    <script src="{{asset('/assets/admin/admintl/assets/static/js/initTheme.js')}}"></script>
    <div id="app">
        <div id="sidebar">
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('section')
            {% include '../partials/footer.html' %}
        </div>
    </div>
    <script src="{{asset('/assets/admin/admintl/static/js/components/dark.js')}}"></script>
    <script src="{{asset('/assets/admin/admintl/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    
    {% if isDev %}
    <script src="{{asset('/assets/admin/admintl/assets/js/app.js')}}" type="module"></script>
    {% else %}
    <script src="{{asset('/assets/admin/admintl/assets/compiled/js/app.js')}}"></script>
    {% endif %}

    {% block js %}{% endblock %}
</body>

</html>