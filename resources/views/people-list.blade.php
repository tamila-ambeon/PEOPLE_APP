@extends('templates.PageTemplate')

@section('title', 'Список людей')
 
@section('content')

<!------------------->
<div class="container-fluid text-center p-0 pt-3 pb-2 bd-pink-100">
    <p class="font-plex fs-2">Список людей</p>
</div>
<!------------------->

<!------------------->
<div class="container-fluid">
  <div class="row">
    <div class="col-9 pt-2 pb-2">

        <div class="d-flex justify-content-between mt-2">
            <div class=""><div class="p-2">Всі люди з бази даних:</div></div>
            <div class="">

            <!---------------->
            @include('buttons.button-template', [
                'title' => 'Додати людину', 'size' => 'big', 'id' => 'go-to-create-person'
            ])

            <script>
                // Редірект при кліку на кнопку створення:
                document.getElementById("go-to-create-person").onclick = function (event) {
                    location.href = "{{URL::to('/')}}/create_person"
                }
            </script>
            <!---------------->

            </div>
        </div>

        <div>
            {{ $people->links('templates.people-list-pagination') }}
        </div>

        <div class="container p-0 mt-3">
            @each('templates.people-list-item', $people, 'person')
        </div>

        <div>
            {{ $people->links('templates.people-list-pagination') }}
        </div>
        
    </div>
    <div class="col-3 bg-light pt-2 pb-2">
      
    </div>
  </div>
</div>
<!------------------->
    
@endsection