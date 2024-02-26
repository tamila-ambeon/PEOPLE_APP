<!--  -->
<html>
    <head>
        <base href="{{URL::to('/')}}">
        <title>@yield('title')</title>
        
        <link href="{{URL::to('/')}}/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="{{URL::to('/')}}/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" ></script>

        <!-- Core build with no theme, formatting, non-essential modules -->
        <link href="{{URL::to('/')}}/quill/quill.core.css" rel="stylesheet">
        <script src="{{URL::to('/')}}/quill/quill.core.js"></script>

        <!-- Main Quill library -->
        <script src="{{URL::to('/')}}/quill/quill.js"></script>
        <script src="{{URL::to('/')}}/quill/quill.min.js"></script>

        <!-- Theme included stylesheets -->
        <link href="{{URL::to('/')}}/quill/quill.snow.css" rel="stylesheet">
        <link href="{{URL::to('/')}}/quill/quill.bubble.css" rel="stylesheet">



        <script src="{{URL::to('/')}}/form-grabber.js" ></script>
    </head>
    <body>

<!-------------------------------------->
<div class="container-fluid p-0">
    <ul class="nav justify-content-center text-bg-dark">

        <li class="nav-item">
            <a class="nav-link link-light" aria-current="page" href="{{ URL::to('/')}}">Головна</a>
        </li>
    </ul>
</div>
<!-------------------------------------->

<div class="container-fluid">
<div class="row">
    <!--- SIDEBAR NAVIGATION: ---->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
  
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/js-handler">JS hanlder</a>
                </li>
            </ul>
            
            <h6 class="px-3 mt-1 mb-1 text-muted text-center">
                <span>Формочки:</span>
            </h6>

            <ul class="list-group">
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/hidden-input">Hidden</a>
                </li>
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/text-editor">Text Editor</a>
                </li> 
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/text-input">Text Input</a>
                </li>
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/textarea-input">Text Area</a>
                </li>
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/number-input">Number</a>
                </li>
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/select-input">Select</a>
                </li>
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/radio-input">Radio</a>
                </li>
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/checkbox-input">Checkbox</a>
                </li>
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/datepicker-input">Date Picker</a>
                </li>
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/datetime-input">DateTime Picker</a>
                </li>
                <li class="list-group-item">
                    <a class="text-warning" href="">File</a>
                </li>
                <li class="list-group-item">
                    <a class="" href="{{URL::to('/')}}/templates/forms/buttons">Buttons</a>
                </li>
                <li class="list-group-item">
                    <a class="text-warning" href="">Range</a>
                </li>
                <li class="list-group-item">
                    <a class="text-warning" href="">Password</a>
                </li>
            </ul> 

            <p>Придумай блоки, вкради з бутстрапа і заверстай щоб реюзати.</p>

        </div>
      </nav>
      <!--- /SIDEBAR NAVIGATION ---->

      <!--- MAIN CONTENT: ---->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')
      </main>
      <!--- /MAIN CONTENT ---->
</div>
<!--- /MAIN ROW ---->
</div>
<!--- /MAIN CONTAINER ---->


    <link href="{{URL::to('/')}}/buttons/button-template.css" rel="stylesheet">

    <div class="container-fluid pt-3 pb-3 text-bg-dark text-center">
Походу дизайн це розібрати на маленькі частинки, зверстати їх окремо і реюзати: <br>почни зі шрифта, далі форми, кнопки, блоки, кольори. <br>А потім реюзай!
    </div>

</body>
</html>