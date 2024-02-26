@if(isset($id))
<div class="d-none">
    @include('forms.text-editor', [
        'id' => $id, 
        "readonly" => true, 
        'value' => ($value) ? $value : ""
    ])
</div>
<div class="quill-content" id="{{$id}}-content"></div>

<script>
document.getElementById("{{$id}}-content").innerHTML = TextEditors.getInstance().findEditorById("{{$id}}").core.root.innerHTML
</script>

@else 
Error: Specify ID form Quill editor.
@endif