@include('forms.select', [
    'id' => $field,  
    'items' => config('people.' . $field),
    "disabled" => true,
    'selected_value' => $person->$field
])