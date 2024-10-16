@extends('templates.PageTemplate')

@section('title', 'Люди')
 
@section('content')

<!--------- BREADCRUMBS: ---------->
@include('templates.breadcrumbs', [ 'items' => [
    ["title" => "Головна", "url" => URL::to('/')],
    ["title" => "Список людей", "url" => URL::to('/') . '/people-list'],
    ["title" => "Dashboard", "url" => null],
]])
<!--------- /BREADCRUMBS ---------->

<!--- BLOCK: --->
<div class="container mt-2 mb-2 border-bottom pb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold pt-2">Дні народження</div>
            @forelse($data['nearestBirthday'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['birth_date']])
            @empty
            <div>Найближчих 10 днів немає іменинників.</div>
            @endforelse
 
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold pt-2">Розглядаю:</div>
            @forelse($data['dating_interest'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>В моєму оточенні немає жінок.</div>
            @endforelse     
        </div>
        <!--- /Мета --->


        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold pt-2">Жінки</div>
            @forelse($data['woman'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>В моєму оточенні немає жінок.</div>
            @endforelse

        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">

        </div>
        <!--- /Мета --->



    </div>
</div>



<!--- BLOCK: --->
<div class="container mt-2 mb-2 border-bottom pb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold pt-2">Останні 10 стосунків:</div>
            @forelse($data['last_relations'] as $item)
                @include("pages.home_page.item", ['item' => $item->person, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає.</div>
            @endforelse 
            
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold pt-2">Найкращі стосунки</div>
            @forelse($data['best'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає.</div>
            @endforelse 
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold pt-2">Найгірші стосунки</div>
            @forelse($data['worst'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає.</div>
            @endforelse 
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold pt-2"></div>



            
        </div>
        <!--- /Мета --->

    </div>
</div>



<!--- BLOCK: --->
<div class="container mt-2 mb-2 border-bottom pb-3">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold pt-2">Близькі</div>
            @forelse($data['close'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає близьких стосунків.</div>
            @endforelse 
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">


            <div class="font-roboto-bold pt-2">Дальні</div>
            @forelse($data['distant'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає дальніх стосунків.</div>
            @endforelse 
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold pt-2">Нейтральні</div>
            @forelse($data['neutral'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає нейтральних стосунків.</div>
            @endforelse 
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold pt-2">Ворожі</div>
            @forelse($data['enemy'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає ворогів.</div>
            @endforelse 
            
        </div>
        <!--- /Мета --->


    </div>
</div>



<!--- BLOCK: --->
<div class="container mt-2 mb-2 border-bottom pb-3 pt-2">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold">Ліві</div>
            @forelse($data['leftist'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає лівих.</div>
            @endforelse 
            
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">


            <div class="font-roboto-bold">Праві</div>
            @forelse($data['righttist'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає правих.</div>
            @endforelse 
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold">Центристи</div>
            @forelse($data['centrist'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає центристів.</div>
            @endforelse 
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold">Радикальні</div>
            @forelse($data['radicals'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['relationship_quality']])
            @empty
            <div>Немає радикалів.</div>
            @endforelse 
            
        </div>
        <!--- /Мета --->


    </div>
</div>





<!--- BLOCK: --->
<div class="container mt-2 mb-2 pb-3 pt-2">
    <div class="row">

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold">Кому можна довіряти:</div>
            @forelse($data['trust_in_person'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['trust_in_person', 'relationship_quality']])
            @empty
            <div>Немає кому довіряти.</div>
            @endforelse 
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold">В кого я користуюсь довірою:</div>
            @forelse($data['trust_in_me'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['trust_in_person', 'relationship_quality']])
            @empty
            <div>Мені ніхто не довіряє.</div>
            @endforelse 
            
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold">Хто становить загрозу:</div>
            @forelse($data['dangerous'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['dangerous', 'relationship_quality']])
            @empty
            <div>Загроз нема.</div>
            @endforelse 
            
        </div>
        <!--- /Мета --->

        <!--- Мета: --->
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
            <div class="font-roboto-bold">Хто приносить мені користь:</div>  
            @forelse($data['benefits_for_me'] as $item)
                @include("pages.home_page.item", ['item' => $item, 'fields' => ['benefits_for_me', 'relationship_quality']])
            @empty
            <div>Нема користі.</div>
            @endforelse 
                
        </div>
        <!--- /Мета --->


    </div>
</div>


    
@endsection