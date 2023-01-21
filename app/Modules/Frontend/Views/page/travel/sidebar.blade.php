
<div class="widget-item widget-recent-post">
    <h4 class="widget-title">Tanzania Travel Guide</h4>
    <div class="widget-content">
        @foreach ($travels as $item)
            <div class="post-item">
                <div class="thumbnail">
                    <a href="{{route('travelguide.show', $item->slug)}}">
                        <style>
                            .gimg{
                                height: 50px;
                                width: 90px;
                                object-fit: cover;
                            }
                        </style>
                        <img src="{{asset('travels/'.$item->photo)}}" alt="alt" class="gimg"/>
                    </a>
                </div>
                <div class="info">
                    <p class="title">
                        <a href="{{route('travelguide.show', $item->slug)}}" class="color-pri">
                            {{$item->title}}
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
