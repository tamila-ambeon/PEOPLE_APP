<!--- PARAM: --->
<div class="font-roboto-bold font-size-12">Пошуковий запит:</div>
<div class="mb-2">
    @include('forms.text', [
        'id' => "keyword", 'placeholder' => "Запит", 
        'value' => request('keyword')
    ])
</div>
<!--- /PARAM --->

<!--- PARAM: --->
<div class="font-roboto-bold font-size-12">Стать:</div>
<div class="mb-2">
    <?php $genders = config('people.gender'); $genders[-1] = "Будь-яка"; ksort($genders); ?>

    @include('forms.select', [
        'id' => "select-gender",  
        'items' => $genders, // а як знайти всі варіанти??
        "disabled" => false,
        'selected_value' => request('gender')
    ])
</div>
<!--- /PARAM --->



<!--- PARAM: --->
<div class="font-roboto-bold font-size-12">Вік від-до:</div>
<div class="mb-2">
    <div class="d-flex flex-row">
        <div class="me-2">
            @if(request()->has('age_from'))
                @include('forms.number', [
                    'id' => "age-from",
                    'placeholder' => "Від", 
                    "min" => "-1", "max" => "100", "step" => "1",
                    "disabled" => false,
                    'value' => request('age_from')
                ])
            @else 
                @include('forms.number', [
                    'id' => "age-from",
                    'placeholder' => "Від", 
                    "min" => "-1", "max" => "100", "step" => "1",
                    "disabled" => false,
                    'value' => -1
                ])
            @endif
        </div>
        <div>
            @include('forms.number', [
                'id' => "age-to",
                'placeholder' => "До", 
                "min" => "1", "max" => "100", "step" => "1",
                "disabled" => false,
                'value' => request('age_to')
            ]) 
        </div>
    </div>

    <div class="font-size-10">Я можу дізнатись скільки я знаю жінок такого-то віку.</div>
</div>
<!--- /PARAM --->



<!--- PARAM: --->
<div class="font-roboto-bold font-size-12">Політичне крило:</div>
<div class="mb-2">
    <?php $wing = config('people.wing'); $wing[-1] = "Будь-яке"; ksort($wing); ?>

    @include('forms.select', [
        'id' => "select-wing",  
        'items' => $wing,
        "disabled" => false,
        'selected_value' => request('wing')
    ])
</div>
<!--- /PARAM --->

<!--- PARAM: --->
<div class="font-roboto-bold font-size-12">Радикальність:</div>
<div class="mb-2">
    <?php $radicalism = config('people.radicalism'); $radicalism[-1] = "Будь-яка"; ksort($radicalism); ?>

    @include('forms.select', [
        'id' => "select-radicalism",  
        'items' => $radicalism,
        "disabled" => false,
        'selected_value' => request('radicalism')
    ])
</div>
<!--- /PARAM --->


<!--- PARAM: --->
<div class="font-roboto-bold font-size-12">Круг:</div>
<div class="mb-2">
    <?php $circle = config('people.circle'); $circle[-1] = "Будь-яка"; ksort($circle); ?>

    @include('forms.select', [
        'id' => "select-circle",  
        'items' => $circle,
        "disabled" => false,
        'selected_value' => request('circle')
    ])
</div>
<!--- /PARAM --->



<!--- PARAM --->
<div class="mb-2 d-flex flex-row">
    @include('forms.button', [
    'id' => 'start_search', // ідентифікатор кнопки
    'title' => 'Пошук', // надпис на кнопці
    'size' => 'big', // small, middle, big
    'type' => 'green', // green, red, disabled, default
    //'display' => false, // додає клан d-none
    //'icon' => 'spinner' // наразі лише 1 іконка
])
</div>
<!--- /PARAM --->


<script>
$(document).ready(function() {
    $("#start_search").click(function() {
        // Тут вставте код, який має виконатися при натисканні на кнопку
        let params = []

        // Приклад: виконання пошуку
        params["keyword"] = $("#keyword").val();
        params["gender"] = $("#select-gender").val();
        params["age_from"] = $("#age-from").val();
        params["age_to"] = $("#age-to").val();
        params["wing"] = $("#select-wing").val();
        params["radicalism"] = $("#select-radicalism").val();
        params["circle"] = $("#select-circle").val();

        let queryString = arrayToQueryString(params)
        window.location.href = "{{URL::to('/')}}/people-list?" +queryString + "&page=1"
    });
});

function arrayToQueryString(arr) {
  return Object.entries(arr)
    .map(([key, value]) => `${encodeURIComponent(key)}=${encodeURIComponent(value)}`)
    .join('&');
}

$(document).ready(function() {
  $("#keyword").keyup(function(event) {
    if (event.keyCode === 13) {
      // Наприклад, відправка форми:
      $("#start_search").click();
    }
  });
  $("#age-from").keyup(function(event) {
    if (event.keyCode === 13) {
      // Наприклад, відправка форми:
      $("#start_search").click();
    }
  });
  $("#age-to").keyup(function(event) {
    if (event.keyCode === 13) {
      // Наприклад, відправка форми:
      $("#start_search").click();
    }
  });

});
</script>
