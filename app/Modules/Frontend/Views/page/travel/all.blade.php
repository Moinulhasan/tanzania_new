@extends('Frontend::layouts.master')

@section('title', 'Tanzania Travel Guide')
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

	@media (max-width:768px){
		.my_img{
			width: 100%;
			height: auto;
			object-fit: cover;
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
</style>


@section('content')
    {{-- @php
        the_breadcrumb([], 'page', [
            'title' => __('Travel Guide')
        ]);
    @endphp --}}

<section class="bg-light pt-5 pb-3 mb-2">
	<div class="text-center">
		<h2 class="section-title mb-20">
			<i class="fas fa-map-marker-alt color-pri"></i>
			Tanzania Travel Guide
		</h2>
		<p class="mb-4">
			Read our comprehensive travel guide containing essential tips and information to help you plan your trip to Tanzania and ensure you have a safe, enjoyable and memorable holiday. <br>

			If you need any information not answered in our guides, please feel free to <a class="color-pri" href="{{route('contact-us')}}">ask us</a>.
		</p>
	</div>
</section>


<section class="tour-type">
	<div class="container pb-1">
		<div class="row">
			@foreach ($dests as $dest)
				<div class="col-lg-3 col-md-4 col-12 mb-5">
					<div class="tour-type__item px-1" data-plugin="matchHeight">
						<div class="tour-type__thumbnail">
							<a href="{{route('travelguide.show', $dest->slug)}}">
								<img class="_image-tour my_img" src="{{asset('travels/'.$dest->photo)}}" alt="Destination">
							</a>
						</div>
						<div class="mt-3">
							<h3 class="color-pri font-bas section-title"><a class="color-pri" href="{{route('travelguide.show', $dest->slug)}}">{{$dest->title}}</a></h3>
							<div class="tour-type__description">
								@php
									$myHtml = strip_tags($dest->description);
								@endphp
								{!! Str::limit($myHtml, 140, ' ...') !!}
							</div>
						</div>
						<div class="mt-2">
							<a class="color-pri" href="{{route('travelguide.show', $dest->slug)}}">
								<h4 style="font-size: 14px">
									READ MORE
									<i class="ml-2 fas fa-angle-right"></i>
								</h4> 
							</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
@stop

