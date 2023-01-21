
<div class="widget-item widget-recent-post">
    <h4 class="widget-title">Other Upcomming Events</h4>
    <div class="widget-content">
        @foreach ($travels as $item)
            <div class="post-item">
                <div class="thumbnail">
                    <a href="{{route('event.show', $item->slug)}}">
                        <style>
                            .gimg{
                                height: 60px;
                                width: 100px;
                                object-fit: cover;
                            }
                        </style>
                        <img src="{{asset('events/'.$item->photo)}}" alt="alt" class="gimg"/>
                    </a>
                </div>
                <div class="info">
                    <p class="title">
                        <a href="{{route('event.show', $item->slug)}}" class="color-pri">
                            {{$item->title}}
                        </a>
                        <div style="font-size: 12px">
                            <i class="fal mr-1 color-pri fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($dest->start_date)->isoFormat('MMM D')}}
                             - 
                            {{ \Carbon\Carbon::parse($dest->end_date)->isoFormat('MMM D')}}
                        </div>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
