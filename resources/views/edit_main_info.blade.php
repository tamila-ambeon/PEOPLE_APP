@extends('templates.PageTemplate')

@section('title', $person->surname . " ". $person->name  )
 
@section('content')

@include('forms.hidden', [
    'id' => "id", 
    'value' => $person->id
])

<!------------------->
<div class="container-fluid text-center p-0 pt-3 pb-2 bd-pink-100">
    <p class="font-plex fs-2">{{$person->surname}} {{$person->name}}</p>
</div>
<!------------------->

<!------------------->
<div class="container-fluid">
  <div class="row">


<!------Left Sidebar: ------>
<div class="col-2 bg-light pt-2 pb-5">
    <div class="d-flex align-items-center justify-content-center border pt-1 pb-1" style="min-height: 150px; max-height: 200px;">
        <div class="">
            <img src="{{URL::to('/')}}/images/no-avatar.png">
        </div>
    </div>
    @include("templates.person-sidebar-menu")
</div>
<!------ /Left Sidebar ------>


<div class="col-10 pt-3 pb-2">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Головна</a></li>
            <li class="breadcrumb-item"><a href="/people-list">Список людей</a></li>
            <li class="breadcrumb-item"><a href="/person/{{$person->id}}">{{$person->surname}} {{$person->name}}</a></li>
            <li class="breadcrumb-item active">Редагування основної інформації:</li>
        </ol>
    </nav>

<!---- Сторінка профілю: ---->
<div class="container-fluid p-0 mt-3">
    <div class="row">
        <div class="container-fluid">
            <div class="row">

                <!--- Основна інформація: --->
                <div class="col-8">

                    <div class="font-plex person-header mb-2 text-center">Основна інформація:</div>

<div class="">

    <div class="bg-light p-2 mb-4">
        <div class="mb-2">
            @include('forms.input_title', ["title" => "Ім'я:"])
            @include('forms.text', ['id' => "name", 'placeholder' => "Ім'я", "maxlength" => "50" , 'value' => $person->name])
        </div>

        <div class="mb-2">
            @include('forms.input_title', ["title" => "Прізвище:"])
            @include('forms.text', ['id' => "surname", 'placeholder' => "Прізвище:", "maxlength" => "50" , 'value' => $person->surname])
        </div>

        <div class="mb-2">
            @include('forms.input_title', ["title" => "По-батькові:"])
            @include('forms.text', ['id' => "middlename", 'placeholder' => "По-батькові", "maxlength" => "50" , 'value' => $person->middlename])
        </div>

        <div class="d-flex flex-row-reverse ">
            @include('buttons.button-template', ['title' => 'Зберегти', 'type' => 'green', 'size' => 'big', 'id' => 'save_1'])
        </div>
    </div>

</div>

<div class="font-plex person-header mb-2 text-center">Контактна інформація:</div>

<div class="bg-light p-2 mb-4">

    <div class="mb-2">
        @include('forms.input_title', ["title" => "Гендер:"])
        @include('forms.select', [
            'id' => "gender",  
            'items' => [0 => "Жінка", 1 => "Чоловік"],
            'selected_value' => $person->gender
        ])
    </div>


    <div class="mb-2">
        @include('forms.input_title', ["title" => "День народження:"])
        @include('forms.datepicker', ['id' => "birth_date", 'value' => $person->birth_date])
    </div>

    <div class="mb-2">
        @include('forms.input_title', ["title" => "Дата нашого знайомства:"])
        @include('forms.datepicker', ['id' => "date_we_met", 'value' => $person->date_we_met])
    </div>

    <div class="mb-2">
        @include('forms.input_title', ["title" => "Адреси:"])
        <div class="mb-2 bg-white">
            @include('forms.text-editor', ['id' => "adresses", 'placeholder' => "Адреси", "value" => $person->adresses])
        </div>
    </div>

    <div class="mb-2">
        @include('forms.input_title', ["title" => "Всі можливі контакти:"])
        <div class="mb-2 bg-white">
            @include('forms.text-editor', ['id' => "contacts", 'placeholder' => "Всі можливі контакти",  "value" => $person->contacts])
        </div>
    </div>

    <div class="d-flex flex-row-reverse ">
        @include('buttons.button-template', ['title' => 'Зберегти', 'type' => 'green', 'size' => 'big', 'id' => 'save_2'])
    </div>

</div>




                </div>
                <!--- /Основна інформація --->

                <!--- Резюме: --->
                <div class="col-4"> 
                    <div class="font-plex person-header">
                        Підказки:
                    </div>  
                    <div>
                        Після натискання, блокую всі кнопки, щоб не натискалось двічі. У разі успіху перезавантажую сторінку. У разі невдачі - показую помилку.
                    </div>
                </div>
                <!--- /Резюме --->



            </div>
        </div>
    </div>

</div>
<!---- /Сторінка профілю ---->


    </div>

  </div>
</div>
<!------------------->

<script>


const save1 = document.getElementById("save_1")
/**
 * Клік на кнопку збереження:
 */
/*
 save1.onclick = function (event) {
    sendRequest(
        document.getElementById("name").value, 
        document.getElementById("surname").value, 
        document.getElementById("middlename").value
    )
}

function sendRequest(name, surname, middlename) {

    const options =  {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            'id': {{$person->id}},
            'name': name,
            'surname': surname,
            'middlename': middlename,
        })
    }

    fetch("{{URL::to('/')}}/api/main_info", options).then( (response) => {
        console.log(response)

        if (!response.ok) {
            throw Error(response.statusText)
        } else {
            return response.json()
        }
    }).then( (json) => {
        console.log("json response", json)
        location.reload()
       // showSuccess(json.data.id)
    }).catch( (error) => {
        console.log("error: ", error)
      //  showError(error)
    })

}
*/
</script>

<script>

const save2 = document.getElementById("save_2")
/**
 * Клік на кнопку збереження:
 */
/*
 save2.onclick = function (event) {
    sendRequest2(
        document.getElementById("gender").value,
        document.getElementById("birth_date").value,
        document.getElementById("date_we_met").value,
        document.getElementById("adresses").value,
        document.getElementById("contacts").value,
    )
}

function sendRequest2(gender, birthDate, dateWeMet, Adresses, Contacts) {
    console.log(birthDate, dateWeMet, Adresses, Contacts)

    const options =  {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            'id': {{$person->id}},
            'gender': gender,
            'birth_date': birthDate,
            'date_we_met': dateWeMet,
            'adresses': Adresses,
            'contacts': Contacts
        })
    }

    fetch("{{URL::to('/')}}/api/main_info", options).then( (response) => {
        console.log(response)

        if (!response.ok) {
            throw Error(response.statusText)
        } else {
            return response.json()
        }
    }).then( (json) => {
        console.log("json response", json)
        location.reload()
       // showSuccess(json.data.id)
    }).catch( (error) => {
        console.log("error: ", error)
      //  showError(error)
    })

}
*/
</script>
@endsection


@section('scripts')
    <script src="{{URL::to('/')}}/js/person/main-info.js" ></script>
    <script src="{{URL::to('/')}}/js/person/contact-info.js" ></script>
@endsection


