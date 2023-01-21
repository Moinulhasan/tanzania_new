@php
    $faq = maybe_unserialize($post['faq']);
@endphp
@if(!empty($faq))
    @php
        $ifaq = 0;
    @endphp
    @if(!empty($faq))
        <section class="feature">
            <h2 class="section-title">{{__('FAQs')}}</h2>
            <div class="section-content">
                <div class="accordion" id="accordionFaq">
                    @foreach($faq as $kfaq => $vfaq)
                        <div class="card">
                            <div class="card-header" id="heading{{$kfaq}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left @if($ifaq != 0) collapsed @endif" type="button" data-toggle="collapse" data-target="#collapse{{$kfaq}}" aria-expanded="true" aria-controls="collapse{{$kfaq}}">
                                        {{get_translate($vfaq['question'])}}
                                        <div class="arrow">
                                                            <span class="arrow-up">
                                                                <i class="fal fa-chevron-up"></i>
                                                            </span>
                                            <span class="arrow-down">
                                                                <i class="fal fa-chevron-down"></i>
                                                            </span>
                                        </div>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse{{$kfaq}}" class="collapse @if($ifaq == 0) show @endif" aria-labelledby="heading{{$kfaq}}" data-parent="#accordionFaq">
                                <div class="card-body">
                                    {!! get_translate($vfaq['answer']) !!}
                                </div>
                            </div>
                        </div>
                        @php $ifaq++ @endphp
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endif