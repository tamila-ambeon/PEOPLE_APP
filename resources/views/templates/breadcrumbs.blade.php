<div class="p-2" id="bread">
    @forelse($items as $item)
        @if($item['url'] != null)
            <div class="bread-item">
                <a href="{{$item['url']}}">{{$item['title']}} </a>
            </div>
            <div class="bread-divider">
                <span>&#10095;</span>
            </div>
        @else 
            <div class="bread-item-active">{{$item['title']}}</div>
        @endif
    @empty
    @endforelse
</div>