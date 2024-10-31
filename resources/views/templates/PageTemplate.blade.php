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

    <!--- TIMER: --->
    <div class="ps-0 pe-0 d-flex justify-content-center font-size-12 pointer text-center" id="global-timer" style="background: #000; color: #fff;">
        <div id="lock" class="d-flex align-items-center p-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
              </svg>   
        </div>
        <div id="timer-lock" class="p-1">00:00</div>
    </div>
    <!--- /TIMER --->


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