@extends('templates.PageTemplate')

@section('title', 'Резервні копії')
 
@section('content')

<!--------- TITLE: ---------->
@include('templates.header', [
    'title' => 'Резервні копії'
])
<!--------- /TITLE ---------->


<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Резервні копії:", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->


<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-4">
            <div class="file-size-outer d-flex flex-row">
                <div class="p-1">Розмір всіх завантажених файлів:</div>
                <div id="file-size" class="ms-1 ms-1 bg-dark text-white p-1 rounded"> ... </div>
            </div>

            <div class="file-size-outer d-flex flex-row">
                <div class="p-1">Бекапи повністю автоматичні. Виконуються з допомогою CRON на Mac Air.</div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-4">
            <div class="mt-1">
                <p>Файли завантажуються у хмари як є, без архіву і паролів з допомогою програми <b>RCLONE</b>. Це потрібно для того, щоб зменшити трафік. Оновлюватись будуть лише ті файли, які додались, а не весь архів одразу.</p>
                <p>У хмари я входжу через <b>аккаунт Google</b>.</p>
                <p>Перелік хмар:
                    <ul>
                        <li>google</li>
                        <li>koofr</li>
                        <li>box</li>
                        <li>microsoft one drive</li>
                        <li>pCloud</li>
                    </ul>
                </p>
            </div>
            
        </div>
         


          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="d-flex flex-row-reverse">


                @include('forms.button', [
                    'id' => 'backup', // ідентифікатор кнопки
                    'title' => 'Dump SQL', // надпис на кнопці
                    'size' => 'big', // small, middle, big
                    'type' => 'green', // green, red, disabled, default
                    //'display' => false, // додає клан d-none
                    //'icon' => 'spinner' // наразі лише 1 іконка
                ])

                @include('forms.button', [
                    'id' => 'backup_request', // ідентифікатор кнопки
                    'title' => 'Виконую бекап', // надпис на кнопці
                    'size' => 'big', // small, middle, big
                    'type' => 'disabled', // green, red, disabled, default
                    'display' => false, // додає клан d-none
                    'icon' => 'spinner' // наразі лише 1 іконка
                ])
            </div>

         </div>

    </div>
</div>




@endsection


@section('scripts')
<script src="{{URL::to('/')}}/js/files/files-size.js"></script>
<script src="{{URL::to('/')}}/js/files/backup.js"></script>
@endsection