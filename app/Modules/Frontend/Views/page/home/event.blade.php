<section class="tour-type bg-grey">
	<div class="container py-40">
		<div class="text-center">
			<h2 class="section-title mb-20">
				<i class="fal mr- fa-calendar-alt color-pri"></i>
				{{-- <i class="fal mr- fa-calendar-alt"></i> --}}

				UPCOMING FESTIVALS & EVENTS
			</h2>
			<p class="lead mb-4">Explore all the upcoming festivals, events and other activities taking place in Tanzania</p>
		</div>
		@php
			$atts = \App\Models\Event::take(4)->get();
		@endphp
		<div class="row">
			@foreach ($atts as $att)
				<div class="col-lg-3 col-md-4 col-6">
					<div class="tour-type__item" data-plugin="matchHeight">
						<div class="tour-type__thumbnail">
							<a href="{{route('event.show', $att->slug)}}">

								<style>
								.my_img{
										max-width: 300px;
										min-width: 300px;
										min-height: 200px;
										object-fit: cover;
										height: auto;
								}
								</style>
								<img class="_image-tour my_img" src="{{asset('events/'.$att->photo)}}" alt="event">
							</a>
						</div>
						<div class="tour-type__info">
							<h3 style="font-size: 17px !important; font-weight:600  !important" class="tour-type__name">
								<a href="{{route('event.show', $att->slug)}}">{{$att->title}}</a>
							</h3>
							<div class="d-flex">
								<div class="mx-auto">
									<p class="mb-0" style="color: white !important; font-weight:600">
										<i class="fal mr- fa-calendar-alt"></i>
										{{ \Carbon\Carbon::parse($att->start_date)->isoFormat('MMM D')}}
										 - 
										{{ \Carbon\Carbon::parse($att->end_date)->isoFormat('MMM D')}}
									</p>
								</div>
								{{-- <div class="ml-4">
									<p style="color: white !important">
										<i class="far mr- fa-map-marker-alt"></i>
										{{$att->location}}
									</p>
								</div> --}}
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<div class="d-flex align-items-center col-lg-12 mt-4 pb-2">
		<div class="mx-auto">
			<a class="btn btn-primary px-3" href="{{route('event')}}">{{__('VIEW All EVENTS')}}</a>
		</div>
	</div>
</section>

