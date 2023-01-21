@php
    $posts = get_posts([
        'post_type' => 'post',
        'posts_per_page' => 5,
        'orderby' => 'id',
        'order' => 'DESC'
    ]);
@endphp
@if(!$posts->isEmpty())
    <div class="widget-item widget-recent-post">
        <h4 class="widget-title">{{__('Recent posts')}}</h4>
        <div class="widget-content">
            <div class="row">
                @foreach($posts as $item)
                    @php
                        $image = get_attachment_url($item['thumbnail_id'],  [360, 240]);
                        $post_title = get_translate($item['post_title']);
                    @endphp
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="{{get_post_permalink($item['post_slug'])}}">
                                <img src="{{$image}}" alt="{{$post_title}}" class="img-fluid w-100" />
                            </a>
                        </div>
                        <div class="info mt-2">
                            <h5 style="font-size: 14px">
                                <a href="{{get_post_permalink($item['post_slug'])}}">
                                    {{$post_title}}
                                </a>
                            </h5>
                            <p style="font-size: 12px">{{date('M d, Y', strtotime($post['created_at']))}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endif
