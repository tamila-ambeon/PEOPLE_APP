@extends('forms.form-doc.doc-template')
@section('title', "JS Form Handler")
 
@section('content')

<!------- PAGE TITLE: --------->
<div class="row  mt-3 mb-3 ms-2 me-2">
    <div class="col-12 text-center">
        <h2>JS Form Handlerd</h2>
    </div>
</div>
<!--------- /PAGE TITLE ------->


<!---------------->
<div class="row border mt-3 mb-3 ms-2 me-2">
    <div class="col-4 pt-3">
Тут буде код, готовий до використання
base href - оце додай у шапку. 

    </div>
    <div class="col-8">
        <div class="m-1 p-1" id="my_form" endpoint="{{URL::to('/')}}/api/test-form-input" method="PATCH">

            @include('forms.hidden', [
                'id' => "id", 
                'value' => 42
            ])

            <div class="mb-2">
                @include('forms.text', [
                    'id' => "name", 
                    'placeholder' => "Ім'я", 
                    "minlength" => "1", 
                    "maxlength" => "50", 
                    "readonly" => true, 
                    "disabled" => false,
                    'value' => "vlad"
                ])
            </div>

            <div class="mb-2">
                @include('forms.textarea', [
                    'id' => "description",  
                    'placeholder' => "Опис", 
                    "rows" => "3", 
                    "cols" => "50", 
                    "readonly" => true, 
                    "disabled" => false,
                    'value' => "Привіт"
                ])
            </div>

            <div class="mb-2">
                @include('forms.number', [
                    'id' => "percentage", 
                    'placeholder' => "Відсотки", 
                    "min" => "1", 
                    "max" => "100", 
                    "step" => "0.1",
                    'value' => 72.3
                ])
            </div>

            <div class="mb-2">
                @include('forms.select', [
                    'id' => "gender",  
                    'items' => [0 => "Жінка", 1 => "Чоловік"],
                    "disabled" => false,
                    'selected_value' => 1
                ])
            </div>

            <div class="mb-2">
                @include('forms.radio', [
                    'id' => "timezone",  
                    "disabled" => false,
                    'items' => [0 => "Київ", 1 => "Прага"], // value => label
                    'checked_value' => 1
                ])
            </div>

            <div class="mb-2">
                @include('forms.checkbox', [
                    'id' => "pizza", 
                    "disabled" => false, 
                    'items' => [0 => "Mozarella", 1 => "Salami", 2 => "Pepperoni"], // value => label
                    'checked_values' => [1]
                ])
            </div>

            <div class="mb-2">
                @include('forms.datepicker', [
                    'id' => "date",
                    "disabled" => false,
                    'value' => "2022-01-01" // format: YYYY-MM-DD
                ])
            </div>

            <div class="mb-2">
                @include('forms.datetime-picker', [
                    'id' => "time",
                    "disabled" => false,
                    'value' => "2023-12-01T10:11" // format: YYYY-MM-DDTHH:MM
                ])
            </div>

            <div class="d-flex mb-2 mt-2">
                @include('forms.text-editor', [
                    'id' => "editor", 
                    'placeholder' => "new", 
                    "readonly" => true, 
                    "disabled" => false,
                    'value' => 'hello world!

d

fgd

fd

fd

d

d

f

'
                ])
            </div>

            <div class="d-flex mb-2 mt-2">
                @include('buttons.button-template', [
                    'id' => 'my_info_button', // ідентифікатор кнопки
                    'title' => 'Клацни тут!', // надпис на кнопці
                    'size' => 'middle', // small, middle, big
                    'type' => 'green', // green, red, disabled, default

                ])
            </div>

            <div class="d-flex mb-2 mt-2">
                @include('buttons.button-template', [
                    'id' => 'unclickable_btn', // ідентифікатор кнопки
                    'title' => 'А тут не клацай', // надпис на кнопці
                    'size' => 'middle', // small, middle, big
                    'type' => 'disabled', // green, red, disabled, default
                ])
            </div>

        </div>
  
    </div>

</div>



<!---------------->

<script src="{{URL::to('/')}}/js/templates/forms/js-handler/main-form.js" ></script>


@endsection