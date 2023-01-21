@if(is_enable_service(GMZ_SERVICE_TOUR))
    @php
        enqueue_scripts('match-height');
        $list_tours = get_posts([
            'post_type' => GMZ_SERVICE_TOUR,
            'posts_per_page' => 6,
            'status' => 'publish'
        ]);
        $search_url = url('tour-search');
    @endphp
    @if(!$list_tours->isEmpty())
        <section class="list-tour list-tour--grid py-40 bg-gray-100">
            <div class="container">
                <h2 class="section-title mt-3 mb-20 text-center">{{__('OUR BEST SELLING TANZANIA SAFARIS & TOURS')}}</h2>
                <p class="text-center">These are our most popular Tanzania safari & tours packages booked by visitors traveling to Tanzania. Perfect for those who do not have the time to design their own itineraries. <br>
                    For those who have specific needs and interests, we also offer custom designed tour itineraries, at no extra cost.</p>
                <div class="row">
                    @foreach($list_tours as $item)
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            @include('Frontend::services.tour.items.grid-item')
                        </div>
                    @endforeach
                </div>

                <div class="d-flex align-items-center col-lg-12 mt-5">
                    <div class="mx-auto">
                        <a class="btn btn-primary px-3" href="{{route('tour-search')}}">{{__('MORE TOUR PACKAGES')}}</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif