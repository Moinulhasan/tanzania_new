<div class="breadcrumb">
    <div class="container">
        @php
        // dd($post);
            
        @endphp
        <ul>
            <li><a href="{{url('/')}}">{{__('Home')}}</a></li>
            @if($post_type == 'car')
                <li><a href="{{url('car-search')}}">{{__('Car')}}</a></li>
            @endif
            @if($post_type == 'page')
                <li><span>{{$data['title']}}</span></li>
            @elseif($post_type == 'blog')
                <li><span><a href="{{route('blog')}}">{{__('Blog')}}</a></span></li>
                <li><span>{{$post['post_title']}}</span></li>

            @elseif($post_type == 'tour-single')
                <li><span><a href="{{route('tour-search')}}">{{__('Tours')}}</a></span></li>
                <li><span>{{$post['post_title']}}</span></li>

            @elseif($post_type == 'hotel-single')
                <li><span><a href="{{route('hotel-search')}}">{{__('Hotels')}}</a></span></li>
                <li><span>{{$post['post_title']}}</span></li>

            @elseif($post_type == 'destination-single')
                <li><span><a href="{{route('destination')}}">{{__('Destinations')}}</a></span></li>
                <li><span>{{$post->title}}</span></li>

            @elseif($post_type == 'destination-abc')
            {{-- @if($data['type'] == 'category')
                <li><span>{{sprintf(__('Category: %s'), $data['title'])}}</span></li>
            @elseif($data['type'] == 'tag')
                <li><span>{{sprintf(__('Tag: %s'), $data['title'])}}</span></li>
            @else
                <li><span>{{$data['title']}}</span></li>
            @endif
            @php
                dd($data['type']);
            @endphp --}}
                <li><span><a href="{{route('destination')}}">{{__('Destinations')}}</a></span></li>
                <li><span><a href="{{url('destination/'.$data['type'])}}">{{$data['type']}}</a></span></li>
                <li><span>{{$data['title']}}</span></li>

            @elseif($post_type == 'event-single')
                <li><span><a href="{{route('event')}}">{{__('Events')}}</a></span></li>
                <li><span>{{$post->title}}</span></li>
                
            @elseif($post_type == 'travel-single')
                <li><span><a href="{{route('travelguide')}}">{{__('Travel Guide')}}</a></span></li>
                <li><span>{{$post->title}}</span></li>

            @elseif($post_type == 'disc-cat')
                <li><span><a href="{{route('quest')}}">{{__('Discussion Forum')}}</a></span></li>
                <li><span>{{$post->title}}</span></li>
            @elseif($post_type == 'disc-post')

                <li><span><a href="{{route('quest')}}">{{__('Discussion Forum')}}</a></span></li>
                <li><span><a href="{{route('discuss',$data['slug'])}}">{{ $data['category'] }}</a></span></li>
                <li><span>{{$data['title']}}</span></li>
            @elseif($post_type == 'att-single')
                <li><span><a href="{{route('attraction')}}">{{__('Popular Attractions')}}</a></span></li>
                <li><span>{{$post->title}}</span></li>

            
        @elseif($post_type == 'disc-single')
            <li><span><a href="{{route('quest')}}">{{__('Discussion Forum')}}</a></span></li>
            <li><span>{{$post->title}}</span></li>
                

            
            @elseif($post_type == 'term')
                @if($data['type'] == 'category')
                    <li><span>{{sprintf(__('Category: %s'), $data['title'])}}</span></li>
                @elseif($data['type'] == 'tag')
                    <li><span>{{sprintf(__('Tag: %s'), $data['title'])}}</span></li>
                @else
                    <li><span>{{$data['title']}}</span></li>
                @endif
            @else
                <li><span>{{get_translate($post['post_title'])}}</span></li>
            @endif
        </ul>
    </div>
</div>