<!--  -->
<html>
    <head>
        <base href="{{URL::to('/')}}">
        <title>@yield('title')</title>

        <!--- Form grabber library: ---->
        <link href="{{URL::to('/')}}/form-grabber-bundle.css" rel="stylesheet">
        <script src="{{URL::to('/')}}/form-grabber-bundle.js"></script>

        <link href="{{URL::to('/')}}/people-style-bundle.css" rel="stylesheet">
        <link href="{{URL::to('/')}}/fonts/fonts.css" rel="stylesheet">

    </head>
    <body>

<!-------------------------------------->
<div class="container-fluid p-0">


    <div style="display: flex; justify-content: space-between;" class="text-bg-dark">
        <div id="home-outer" style="width: 30%;">
            <ul class="nav text-bg-dark">
                <li class="nav-item">
                    <a class="nav-link link-light" aria-current="page" href="{{ URL::to('/')}}">HOME</a>
                </li>
            </ul>
        </div>
        <div class="menu-outer" style="width: 33%;">
            <ul class="nav justify-content-center text-bg-dark">

                <li class="nav-item">
                    <a class="nav-link link-light" aria-current="page" href="{{ URL::to('/')}}">Головна</a>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link link-light" aria-current="page" href="{{ URL::to('/')}}/people-list">Список людей</a>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ URL::to('/')}}/signs-list">Ознаки</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ URL::to('/')}}/backups">Бекапи</a>
                </li>
            </ul>
        </div>
        <div class="search-outer" style="display: flex; flex-direction: row-reverse; align-items: center; width: 30%;">
            <div class="me-3 ms-1 pointer" onclick="goToSearchPage()">🔎</div>
            <div><input type="text" id="search" class="" placeholder="Пошук людей..." value="" style="font-size: 12px;"></div>
<script>
function goToSearchPage() { 
    location.href = document.getElementsByTagName("base")[0].href + "search?q=" + document.getElementById('search').value
}
let searchField = document.getElementById('search')
searchField.addEventListener("keydown", ({key}) => {
    if (key === "Enter") {
        goToSearchPage()
    }
})
</script>

        </div>
    </div>
</div>
<!-------------------------------------->

<div class="container-fluid ps-0 pe-0" id="page-content">
    @yield('content')
</div>

<div class=" pt-3 pb-3 text-bg-dark">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-4">
                    <div class="font-plex">Розробка:</div>
                    <div>GitHub Account: <a href="https://github.com/tamila-ambeon" target="_blank" class="text-warning">Tamila Ambeon</a></div>
                    <div>Репозиторій проекту: <a href="https://github.com/tamila-ambeon/PEOPLE_APP" target="_blank" class="text-warning">PEOPLE APP</a></div>

              
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
    </body>
</html>