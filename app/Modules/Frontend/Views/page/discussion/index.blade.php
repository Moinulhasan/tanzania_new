@extends('Frontend::layouts.master')
@section('title', $cat->title)
@section('content')

@php

the_breadcrumb($cat, 'disc-cat');

// the_breadcrumb([], 'page', [
//     'title' => __('Discussion Forum')
// ]);
@endphp

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<section class="bg-white mx-3 mb-5">
    <div class="col-md-12 row pt-4">
        @include('Frontend::page.discussion.cat_section')

        <div class="col-md-9">
            <div class="my-4 text-center">
                <h3 class="section-title mt-3">
                    Tanzania Travel Forum
                </h3>

                <h5 class="dessc section-title">
                    Exchange travel advice, tips, accommodation reviews and other related information about traveling to Bhutan. <br>
                    Participate in discussions with both foreigners and Tanzanian locals.
                </h5>
            </div>

            @foreach ($disc as $ques)

                <div class="card py-3 my-2 bg-light">
                    <div class="">
                        <div class="col-md-12 d-flex row pt-4">
                            <div class="col-md-11">
                                <h5 class="">
                                    <a class="color-pri" href="{{route('discuss.answer', $ques->slug)}}">
                                        {{$ques->title}}
                                    </a>
                                </h5>
                                <p>
                                    @php
                                        $cat = \App\Models\DiscussCategory::find($ques->category);
                                        $cat_name = $cat->title;

                                        $total = \App\Models\Answer::where('discussion_id',$ques->id)->count();

                                        $usr = \App\Models\User::find($ques->posted_by);
                                        $usr_name = $usr->first_name;
                                        $usr_name1 = $usr->last_name;
                                    @endphp
                                    <i>
                                        Posted under <a class="color-pri" href="">{{$cat_name}}</a> by {{$usr_name}} {{$usr_name1}} - {{ \Carbon\Carbon::parse($ques->created_at)->isoFormat('MMM Do YYYY')}}
                                    </i>
                                </p>
                                <p class="discus">
                                    {{$ques->question}}
                                </p>
                            </div>
                            <div class="col-md-1 text-center">
                                <div class="my-icn1">
                                    <i class="far fa-comment"></i>
                                </div>
                                <p class="color-p">{{$total}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pagination-wrapper">{{$disc->withQueryString()->links()}}</div>

</section>

@stop