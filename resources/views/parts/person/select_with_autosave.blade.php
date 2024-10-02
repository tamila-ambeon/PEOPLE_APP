@include('forms.select', [
    'id' => $field,  
    'items' => config('people.' . $field),
    "disabled" => false,
    'selected_value' => $person->$field
])