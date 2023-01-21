@extends('Frontend::layouts.master')

@section('title', 'Destinations')
@section('class_body', 'single-post')


@section('content')
    {{-- @php
        the_breadcrumb([], 'page', [
            'title' => __('All Destinations')
        ]);
    @endphp --}}


<section class="tour-type bg-light">
	<div class="container py-40">
		<div class="text-center">
			<h2 class="section-title mb-20">
				<i class="fas fa-map-marker-alt color-pri "></i>
				POPULAR DESTINATIONS & PLACES
			</h2>
			<p class="lead mb-4">Popular tourist places and destinations in Tanzania that should be on your must visit list when you travel to Tanzania</p>
		</div>
		<div class="row">
			@foreach ($dests as $dest)
				<div class="col-lg-3 col-md-4 col-6 pb-5">
					<div class="tour-type__item" data-plugin="matchHeight">
						<div class="tour-type__thumbnail">
							<a href="{{route('destination.show', $dest->slug)}}">

								<style>
								.my_img{
										max-width: 300px;
										min-width: 300px;
										min-height: 200px;
										object-fit: cover;
										height: auto;
								}
								</style>
								<img class="_image-tour my_img" src="{{asset('destinations/'.$dest->photo)}}" alt="Destination">
							</a>
						</div>
						<div class="tour-type__info">
							<h3 class="tour-type__name"><a href="{{route('destination.show', $dest->slug)}}">{{$dest->title}}</a></h3>
							{{-- <div class="tour-type__description">
								description
							</div> --}}
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
@stop

