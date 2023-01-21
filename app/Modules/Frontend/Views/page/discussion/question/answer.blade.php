@extends('Frontend::layouts.master')
@section('title', $disc->title)
@section('content')

    @php
        // the_breadcrumb([], 'page', [
        //     'title' => __('Discussion Forum')
        // ]);
        $param =[
            'slug'=>$category->slug,
            'category'=>$category->title,
            'title'=>$disc->title
];
       the_breadcrumb('', 'disc-post',$param);

    @endphp
    <style>
        .tox-notifications-container {
            display: none !important;
        }
    </style>

    <section class="bg-white mx-3 mb-5">
        <div class="col-md-12 row pt-4">
            @include('Frontend::page.discussion.cat_section')

            <div class="col-md-9">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mb-3">
                    <h3 class="section-title">
                        @isset($category->title)
                            {{$category->title}}
                        @endisset
                    </h3>

                    {{-- <h5 class="dessc section-title">
                        {{$cat->description}}
                    </h5> --}}
                </div>

                <style>
                    .bg-custom {
                        background: #e5fccf;
                    }
                </style>


                <div class="card py-3 my-2 bg-custom">
                    <div class="col-md-12 d-flex">
                        <div class="col-md-2 text-center">
                            <div class="my-icn">
                                <i class="fal fa-user-circle"></i>
                            </div>
                            <div class="">
                                @php
                                    // dd($disc->posted_by);
                                        $usr = \App\Models\User::find($disc->posted_by);
                                        $usr_name = $usr->first_name;
                                        $usr_name1 = $usr->last_name;
                                @endphp

                                <p class="mb-0">{{$usr_name}} {{$usr_name1}}</p>
                                <p class="mb-0">
                                    <i>
                                        {{ \Carbon\Carbon::parse($disc->created_at)->isoFormat('MMM Do YYYY')}}
                                    </i>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-10 pt-4">
                            <h5 class="color-pri">
                                {{$disc->title}}
                            </h5>
                            <p class="discus d-flex">
                                {{$disc->question}}
                            </p>
                        </div>
                    </div>
                </div>

                @foreach ($ans as $dis)
                    <div class="card py-3 my-2 bg-light">
                        <div class="col-md-12 d-flex">
                            <div class="col-md-2 text-center">
                                <div class="my-icn">
                                    <i class="fal fa-user-circle"></i>
                                </div>
                                <div class="">
                                    @php
                                        $usr = \App\Models\User::find($dis->user_id);
                                        $usr_name = $usr->first_name;
                                        $usr_name1 = $usr->last_name;
                                    @endphp

                                    <p class="mb-0">{{$usr_name}} {{$usr_name1}}</p>
                                    <p class="mb-0">
                                        <i>
                                            {{ \Carbon\Carbon::parse($dis->created_at)->isoFormat('MMM Do YYYY')}}
                                        </i>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-10 pt-4">
                                <h5 class="">
                                    <a class="color-pri" href="">
                                        {{-- {{$dis->title}} --}}
                                    </a>
                                </h5>
                                <p class="discus d-flex">
                                    {!!  $dis->answer !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4">
                    <h5 class="section-title color-pri">
                        Join the discussion
                    </h5>
                </div>

                @if (auth()->user())
                    <form action="{{route('discuss.answer.store', $disc->id)}}">
                        <textarea class="form-control w-100" name="answer" id="mytextarea" cols="10" rows="10"
                                  placeholder="Reply here ..."></textarea>
                        <button type="submit" class="mt-2 btn btn-primary">Submit and Publish</button>
                    </form>
                @else

                    You need to <a href="{{route('login')}}" class="color-pri">
                        <span style="font-weight: 500">Login</span>
                    </a> to reply to this post.

                @endif
            </div>
        </div>
        <div class="pagination-wrapper">{{$ans->withQueryString()->links()}}</div>

    </section>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: "textarea",
            menubar: false,
            statusbar: false,
            plugins: [
                "insertdatetime",
                'link'
            ],
            toolbar: false,
            width: 1000,
            height: 200,
        });
    </script>
@stop