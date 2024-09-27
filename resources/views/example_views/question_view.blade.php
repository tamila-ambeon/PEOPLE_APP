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


<div class="pt-3 pb-3 text-bg-dark mt-5">
    <div class="container">
Низ
    </div>
</div>

@yield('scripts')
    </body>
</html>