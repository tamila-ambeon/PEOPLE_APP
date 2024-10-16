<!--  -->
<html>
    <head>
        <base href="{{URL::to('/')}}">
        <title>@yield('title')</title>

        <!--- Form grabber library: ---->
        <link href="{{URL::to('/')}}/form-grabber-bundle.css" rel="stylesheet">
        <script src="{{URL::to('/')}}/form-grabber-bundle.js"></script>
        <script src="{{URL::to('/')}}/js/jquery.js"></script>

        <link href="{{URL::to('/')}}/people-style-bundle.css" rel="stylesheet">
        <link href="{{URL::to('/')}}/fonts/fonts.css" rel="stylesheet">
        <link rel="icon" href="{{URL::to('/')}}/favicon.ico" type="image/x-icon"/>

    </head>
<body>

<div class="container-fluid ps-0 pe-0" id="page-content">
    @yield('content')
</div>

<div class=" pt-3 pb-3 text-bg-dark">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="text-center">Я маю вибір!</div>
                <div class="col-4">
                    <div class="font-plex">Розробка:</div>
                    <div>GitHub Account: <a href="https://github.com/tamila-ambeon" target="_blank" class="text-warning">Tamila Ambeon</a></div>
                    <div>Репозиторій проекту: <a href="https://github.com/tamila-ambeon/PEOPLE_APP" target="_blank" class="text-warning">PEOPLE APP</a></div>
                    <div>Збірка стилів: <code class="text-success">npm run dev</code></div>

              
                </div>
                <div class="col-4">
                    <div class="font-plex">Документація:</div>
                    <div>Формочки: <a href="http://form-grabber.test" target="_blank" class="text-warning">form-grabber.test</a></div>
                    <div>Репозиторій формочок: <a href="https://github.com/tamila-ambeon/FORM-GRABBER" target="_blank" class="text-warning">FORM GRABBER</a></div>


                </div>
                <div class="col-4">
                   
                </div>
            </div>
        </div>
    </div>
</div>

@yield('scripts')
<script src="{{URL::to('/')}}/js/blur.js"></script>
    </body>
</html>