@extends('Frontend::layouts.master')

@section('title', $dest->title)
@section('class_body', 'single-post')

<style>
	.font-bas{
		font-size: 19px;
		font-weight: 500;
	}
	.my_img{
			width: 100%;
			height: 160px;
			object-fit: cover;
	}

    .pmx{
            margin-left: 0.5rem !important;
            margin-right: 0.5rem !important;
        }

	@media (max-width:768px){
		.my_img{
			width: 100%;
			height: 200px;
			object-fit: cover;
		}

        .side{
            position:sticky !important;
            max-width: auto% !important;
        }

        .pmx{
            margin-left: auto !important;
            margin-right: auto !important;
        }
	}

	.tour-type__item{
		border-radius: 0px !important;
	}

	.tour-type__item .tour-type__thumbnail a:before {
		content: '';
		display: block;
		background: rgb(0 0 0 / 6%) !important;
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 9;
	}

	.tour-type__item .tour-type__thumbnail a img {
		transition: all 0.3s;
		border-radius: 0px !important;
	}

    .example::-webkit-scrollbar {
        display: none;
    }

    .post-title{
        font-size:23px !important;
        color: var(--primary);
    }
    .wat{
        font-size: 16px;
        font-weight: 500;
    }
</style>

@section('content')
    <div class="feature-image">
        <img src="{{asset('destinations/'.$dest->photo)}}" alt="image" />
    </div>

    @php
        the_breadcrumb($dest, 'destination-single');
    @endphp


<div class="col-md-12 col-lg-12 d-flex row container pmx">
{{-- <div class="col-md-12 col-lg-12 d-flex container h-100 row"> --}}
        <div class="border-end side bg-white mt-4 pt-3 col-lg-2 col-md-2" style="" id="sidebar-wrapper">
        {{-- <div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div> --}}
          {{--  <div class="list-group list-group-flush">
                <p class="mb-0 list-group-item list-group-item-action list-group-item-grey bg-primary p-3 text-white"><b>{{$dest->title}}</b></p>
                <a class="lf_click list-group-item list-group-item-action list-group-item-grey p-3" href="{{route('destination.showByid', [$dest->slug,'overview'])}}" id="overview"><i class="far fa-chevron-right mr-2"></i>Overview</a>
                @if(!empty($dest->wildlife))
                @if($dest->wildlife != "<p><br></p>")

                    <a class="lf_click list-group-item list-group-item-action list-group-item-grey p-3" href="{{route('destination.showByid', [$dest->slug,'wildlife'])}}" id="wildlife"><i class="far fa-chevron-right mr-2"></i>Wildlife</a>
                @endif
                @endif

                @if(!empty($dest->birds))
                @if($dest->birds != "<p><br></p>")

                    <a class="lf_click list-group-item list-group-item-action list-group-item-grey p-3" href="{{route('destination.showByid', [$dest->slug,'birds'])}}" id="birds"><i class="far fa-chevron-right mr-2"></i>Birds</a>
                @endif
                @endif

                @if(!empty($dest->best_time))
                @if($dest->best_time != "<p><br></p>")

                    <a class="lf_click list-group-item list-group-item-action list-group-item-grey p-3" href="{{route('destination.showByid', [$dest->slug,'best_time'])}}" id="best_time"><i class="far fa-chevron-right mr-2"></i>Best Time to Visit</a>
                @endif
                @endif

                @if(!empty($dest->weather))
                @if($dest->weather != "<p><br></p>")

                    <a class="lf_click list-group-item list-group-item-action list-group-item-grey p-3" href="{{route('destination.showByid', [$dest->slug,'weather'])}}" id="weather"><i class="far fa-chevron-right mr-2"></i>Weather and Climate</a>
                @endif
                @endif

                @if(!empty($dest->scenery))
                @if($dest->scenery != "<p><br></p>")

                    <a class="lf_click list-group-item list-group-item-action list-group-item-grey p-3" href="{{route('destination.showByid', [$dest->slug,'scenery'])}}" id="scenery"><i class="far fa-chevron-right mr-2"></i>Scenery</a>
                @endif
                @endif

                @if(!empty($dest->getting_there))
                @if($dest->getting_there != "<p><br></p>")

                    <a class="lf_click list-group-item list-group-item-action list-group-item-grey p-3" href="{{route('destination.showByid', [$dest->slug,'getting_there'])}}" id="getting_there"><i class="far fa-chevron-right mr-2"></i>Getting There</a>
                @endif
                @endif

                @if(!empty($dest->elevation))
                @if($dest->elevation != "<p><br></p>")

                    <a class="lf_click list-group-item list-group-item-action list-group-item-grey p-3" href="{{route('destination.showByid', [$dest->slug,'elevation'])}}" id="elevation"><i class="far fa-chevron-right mr-2"></i>Elevation</a>
                @endif
                @endif

                <a class="btn btn-primary p-3" href="#tours_dest">Tours to {{$dest->title}}</a>



            </div>--}}


            <div class="list-group list-group-flush">
               
                 <a class="mb-0 list-group-item list-group-item-action list-group-item-grey bg-primary p-3 text-white" href="{{url('destination', $dest->slug)}}" id="overview">{{$dest->title}}</a>


                @if($sidebars)
                    @foreach($sidebars as $sidebar)
                        <a class="lf_click list-group-item list-group-item-action list-group-item-grey p-3" href="{{route('destination.showByid', [$dest->slug, $sidebar->slug])}}" id="overview"><i class="far fa-chevron-right mr-2"></i>{{$sidebar->title}}</a>
                    @endforeach
                @endif

            </div>
            <br>
            <br>
        </div>
        

        {{-- <div class="d-flex col-md-10 col-lg-10 example vh-100" style="overflow-y: auto !important;" id="wrapper"> --}}
        <div class="d-flex col-md-10 col-lg-10 example" id="wrapper">
        <!-- Sidebar-->

            <!-- Page content wrapper-->
            <div id="page-content-wrapper col-lg-10 col-md-10">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 pb-5">
                                {{-- <h1 class="post-title">
                                    {{$dest->title}}
                                </h1> --}}

                                <section  class="description destClass wildlife">
                                    <h2 class="post-title mb-3">
                                        Overview
                                    </h2>
                                    {!! $dest->overview !!}
                                </section>

                                @if(!empty($dest->scenery))
                                @if($dest->scenery != "<p><br></p>")

                                    <section  class="description destClass scenery">
                                        <h2 class="post-title mb-3">
                                            Scenery
                                        </h2>
                                        <div class="section-content">
                                            {!! Str::limit(strip_tags($dest->scenery), 400, ' .....') !!}

                                            {{-- {!!$dest->scenery!!} --}}
                                        </div>
                                    </section>
                                @endif
                                @endif

                                @if(!empty($dest->birds))
                                @if($dest->birds != "<p><br></p>")

                                    <section  class="description destClass birds">
                                        <h2 class="post-title mb-3">
                                            Birds
                                        </h2>
                                        <div class="section-content">

                                            {!! Str::limit(strip_tags($dest->birds), 400, ' .....') !!}

                                            {{-- {!! Str::limit(strip_tags($dest->birds), 400, ' ... <a class="color-pri wat" href="">See Details <i class="far fa-plus-circle"></i></a>') !!} --}}

                                            {{-- {!!$dest->birds!!} --}}
                                        </div>
                                        
                                    </section>
                                @endif
                                @endif

                                @if(!empty($dest->best_time))
                                @if($dest->best_time != "<p><br></p>")

                                    <section  class="description destClass best_time">
                                        <h2 class="post-title mb-3">
                                            Best Time to Go There
                                        </h2>
                                        <div class="section-content">
                                            {!! Str::limit(strip_tags($dest->best_time), 400, ' .....') !!}

                                            {{-- {!!$dest->best_time!!} --}}
                                        </div>
                                    </section>
                                @endif
                                @endif

                                @if(!empty($dest->weather))
                                @if($dest->weather != "<p><br></p>")
                                    <section  class="description destClass weather">
                                        <h2 class="post-title mb-3">
                                            Weather and Climate
                                        </h2>
                                        <div class="section-content">
                                            {!! Str::limit(strip_tags($dest->weather), 400, ' .....') !!}

                                            {{-- {!!$dest->weather!!} --}}
                                        </div>
                                    </section>
                                @endif
                                @endif

                                @if(!empty($dest->getting_there))
                @if($dest->getting_there != "<p><br></p>")

                                    <section  class="description destClass getting_there">
                                        <h2 class="post-title mb-3">
                                            Getting to {{$dest->title}}
                                        </h2>
                                        <div class="section-content">
                                            {!! Str::limit(strip_tags($dest->getting_there), 400, ' .....') !!}

                                            {{-- {!!$dest->getting_there!!} --}}
                                        </div>
                                    </section>
                                @endif
                                @endif

                                @if(!empty($dest->elevation))
                @if($dest->elevation != "<p><br></p>")

                                    <section  class="description destClass elevation">
                                        <h2 class="post-title mb-3">
                                            Elevation
                                        </h2>
                                        <div class="section-content">
                                            {!! Str::limit(strip_tags($dest->elevation), 400, ' .....') !!}

                                            {{-- {!!$dest->elevation!!} --}}
                                        </div>
                                    </section>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


    @if ($attractions->count() > 0)
        <section class="list-hotel list-hotel--grid pt-40 pb-20 bg-gray-100">
            <div class="container">
                <h2 class="section-title mb-4">Popular Attractions in {{$dest->title}}</h2>
                <div class="row">
                    @foreach($attractions as $att)
                        @if ($loop->index < 4)
                        <div class="col-lg-3 col-md-4 col-12 mb-5">
                            <div class="tour-type__item px-1" data-plugin="matchHeight">
                                <div class="tour-type__thumbnail">
                                    <a href="{{route('attraction.show', $att->slug)}}">
                                        <img class="_image-tour my_img" src="{{asset('attractions/'.$att->photo)}}" alt="Destination">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h3 class="color-pri font-bas section-title"><a class="color-pri" href="{{route('attraction.show', $att->slug)}}">{{$att->title}}</a></h3>
        
                                    <h6 class="mb-0"> 
                                        <div class="d-flex my-3">
                                            <div class="">
                                                <i class="far mr- fa-map-marker-alt"></i>
                                                {{$att->location}}
                                            </div>
                                        </div>
                                    </h6>
                                    <div class="tour-type__description">
                                        @php
                                            $myHtml = strip_tags($att->description);
                                        @endphp
                                        {!! Str::limit($myHtml, 70, ' ...') !!}
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a class="color-pri" href="{{route('attraction.show', $att->slug)}}">
                                        <h4 style="font-size: 14px; text-transform:uppercase">
                                            View Details
                                            <i class="ml-1 fas fa-angle-right"></i>
                                        </h4> 
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="mt-3 col-md-12 text-center">
                            <a class="color-pri" href="{{route('attraction')}}">
                                <h4 class="" style="font-size: 15px; text-transform:uppercase">
                                    VIEW ALL Attractions IN {{$dest->title}}
                                    <i class="ml-2 fas fa-angle-right"></i>
                                </h4> 
                            </a>
                        </div>  
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($events->count() > 0)
        <section class="list-hotel list-hotel--grid pt-40 pb-20 bg-white">
            <div class="container">
                <h2 class="section-title mb-4">Upcoming Events, Festivals & Activities in {{$dest->title}}</h2>
                <div class="row">
                    @foreach($events as $item)
                        @if ($loop->index < 4)
                        <div class="col-lg-3 col-md-4 col-12 mb-5">
                            <div class="tour-type__item px-1" data-plugin="matchHeight">
                                <div class="tour-type__thumbnail">
                                    <a href="{{route('event.show', $item->slug)}}">
                                        <img class="_image-tour my_img" src="{{asset('events/'.$item->photo)}}" alt="Destination">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h3 class="color-pri font-bas section-title"><a class="color-pri" href="{{route('event.show', $item->slug)}}">{{$item->title}}</a></h3>
        
                                    <h6 class="mb-0"> 
                                        <div class="d-flex my-3">
                                            <div>
                                                <i class="fal mr- fa-calendar-alt"></i>
                                                {{ \Carbon\Carbon::parse($item->start_date)->isoFormat('MMM D')}}
                                                - 
                                                {{ \Carbon\Carbon::parse($item->end_date)->isoFormat('MMM D')}}
                                            </div>
                                            <div class="ml-4">
                                                <i class="far mr- fa-map-marker-alt"></i>
                                                {{$item->location}}
                                            </div>
                                        </div>
                                    </h6>
                                    <div class="tour-type__description">
                                        @php
                                            $myHtml = strip_tags($item->description);
                                        @endphp
                                        {!! Str::limit($myHtml, 70, ' ...') !!}
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a class="color-pri" href="{{route('event')}}">
                                        <h4 style="font-size: 14px; text-transform:uppercase">
                                            View Details
                                            <i class="ml-1 fas fa-angle-right"></i>
                                        </h4> 
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="mt-3 col-md-12 text-center">
                            <a class="color-pri" href="{{route('event.show', $dest->id)}}">
                                <h4 class="" style="font-size: 15px; text-transform:uppercase">
                                    VIEW ALL ACCOMMODATION CHOICES IN {{$dest->title}}
                                    <i class="ml-2 fas fa-angle-right"></i>
                                </h4> 
                            </a>
                        </div>  
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($hotels->count() > 0)
        {{-- <section class="list-hotel list-hotel--grid py-40 bg-gray-100"> --}}
        <section class="list-hotel list-hotel--grid py-40 bg-gray-100">
            <div class="container">
                <h2 class="section-title mb-20">Popular Hotels & Accommodations in {{$dest->title}}</h2>
                <div class="row">
                    @foreach($hotels as $item)
                        @if ($loop->index < 4)
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                @include('Frontend::services.hotel.items.grid-item')
                            </div>
                        @else
						<div class="mt-3 col-md-12 text-center">
							<a class="color-pri" href="{{route('hotel')}}">
								<h4 class="" style="font-size: 15px; text-transform:uppercase">
									VIEW ALL ACCOMMODATION CHOICES IN {{$dest->title}}
									<i class="ml-2 fas fa-angle-right"></i>
								</h4> 
							</a>
						</div>  
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if(is_enable_service(GMZ_SERVICE_TOUR))
    @php
        // enqueue_scripts('match-height');
        // $list_tours = get_posts([
        //     'post_type' => GMZ_SERVICE_TOUR,
        //     'posts_per_page' => 3,
        //     'status' => 'publish',
        // ]);
        

        // $search_url = url('tour-search');
    @endphp
    @if(!$list_tours->isEmpty())
        <section id="tours_dest" class="list-tour list-tour--grid py-40 bg-gray-100">
            <div class="container">
                <h2 class="section-title mt-3 mb-20 text-center" style="text-transform: uppercase">OUR BEST SELLING TOURS IN {{$dest->title}}</h2>
                {{-- <p class="text-center">These are our most popular tour packages booked by visitors traveling to Bhutan. Perfect for those who do not have the time to design their own itineraries. <br>
                    For those who have specific needs and interests, we also offer custom designed tour itineraries, at no extra cost.</p> --}}
                <div class="row">
                    @foreach($list_tours as $item)
                        @if ($loop->index < 3)
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                @include('Frontend::services.tour.items.grid-item')
                            </div>
                        @endif
                    @endforeach
                </div>


                @if ($list_tours->count() >= 3)
                    <div class="d-flex align-items-center col-lg-12 mt-5">
                        <div class="mx-auto">
                            <a class="btn btn-primary px-3" href="{{route('tour-search')}}">{{__('MORE TOUR PACKAGES')}}</a>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif
@endif
@stop

