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


<div class="pt-3 pb-3 text-bg-dark mb-5">
    <div class="container">
Верх
    </div>
</div>

<div class="pt-3 pb-3">
    <div class="container">

        <div class="q-title font-roboto font-size-19 ps-3 mb-1">Який вайб випромінює?</div>
        <div class="q-body bg-white font-size-14 pt-3 pb-3 ps-3 pe-3">
            Протягом своєї кар'єри Blackpink побили численні рекорди: їхній світовий тур «Born Pink World Tour[en]» (2022—2023) став найкасовішим концертним туром жіночого гурту та азійського виконавця в історії; вони першими з азійських гуртів стали хедлайнером музичного фестивалю Коачелла. Їхній канал на YouTube мав найбільшу кількість підписок та переглядів серед музичних виконавців, а акаунт на Spotify — найбільшу кількість підписок та прослуховувань серед жіночих гуртів. Blackpink отримали численні нагороди, серед яких Golden Disc Awards, MAMA Awards[en], премія «Вибір народу» та MTV Video Music Awards. Вони стали першим дівочим гуртом, який отримав звання «Гурт року»[en] в XXI столітті. У 2023 році за внесок у поширення обізнаності про глобальне потепління дівчат нагородили Орденом Британської імперії. Blackpink — перший жіночий гурт, який увійшов до рейтингу Forbes 30 Under 30 Asia (2019), а журнал «Тайм» визнав їх «Артистами року» (2022). У 2024 році гурт очолив рейтинг Forbes Korea Power Celebrity 40 та отримав визнання колишнього президента Південної Кореї Мун Чже Іна за поширення K-pop та корейської культури по всьому світу.

        </div>

    </div>
</div>



<!--- BLOCK: --->
<div class="container mt-3 mb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <div class="">
                <div class="font-roboto-bold font-size-19">Політичні погляди:</div>
                <div class="font-roboto-light font-size-12 fc-secondary">Крило і радикальність</div>
            </div>
        </div>
        <!--- /Мета --->

        <!--- Контент: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 p-0">
            <div class="bg-white border mt-1">
                
                <div class="d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer">
                    <a href="{{URL::to("/")}}">редагувати</a>
                </div>  
            </div>
        </div>
        <!--- /Контент --->

    </div> 
</div>
<!--- /BLOCK --->







<div class="grow-content">
    <div class="bg-white border">
            
            <div class="d-flex flex-row">
                <div class="d-flex flex-row p-1">
                    <div class="font-size-13">
                        @include('forms.select', [
                            'id' => "wing",  
                            'items' => [0 => "Невідомо", 1 => "Ліві", 2 => "Праві", 3 => "Центристські"],
                            "disabled" => true,
                            'selected_value' => 0
                        ])
                    </div>
                </div>
                <div class="d-flex flex-row p-1">
                    <div class="font-size-13">
                        @include('forms.select', [
                            'id' => "radicalism",  
                            'items' => [0 => "Невідомо", 1 => "Помірковані", 2 => "Радикальні"],
                            "disabled" => true,
                            'selected_value' => 0
                        ])
                    </div>
                </div>
            </div>
            <div class="bg-white border-top d-flex ps-2 pe-2 font-size-12">
                Треба знати політичні погляди ВСІХ оточуючих людей. Щоб знати хто мене оточує. 
                <br>І можливо ще де вони перебувають (територіально, категорично), щоб знати куди йти, щоб знайти своїх.
                <br>Politics is reflection of values.
                <br>Build relations які грунтуються на спільних values.
            </div>
            <div class="bg-white border-top d-flex flex-row-reverse ps-2 pe-2 font-size-14 edit-button-outer">
                <a href="{{URL::to("/")}}">редагувати</a>
            </div> 
        </div>

</div>















<div class="pt-3 pb-3 text-bg-dark mt-5">
    <div class="container">
Низ
    </div>
</div>

@yield('scripts')
    </body>
</html>