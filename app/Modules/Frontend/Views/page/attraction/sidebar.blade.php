
<div class="widget-item widget-recent-post">
    <h4 class="widget-title">Nearby Attractions</h4>
    <div class="widget-content">
        @foreach ($travels as $item)
            <div class="post-item">
                <div class="thumbnail">
                    <a href="{{route('attraction.show', $item->slug)}}">
                        <style>
                            .gimg{
                                height: 60px;
                                width: 100px;
                                object-fit: cover;
                            }
                        </style>
                        <img src="{{asset('attractions/'.$item->photo)}}" alt="alt" class="gimg"/>
                    </a>
                </div>
                <div class="info">
                    <p class="title">
                        <a href="{{route('attraction.show', $item->slug)}}" class="color-pri">
                            {{$item->title}}
                        </a>
                        <div style="font-size: 12px">
                            <i class="far mr-1 color-pri fa-map-marker-alt"></i>
                            {{$dest->location}}
                        </div>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
