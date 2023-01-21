@extends('Frontend::layouts.master')
@section('title', __('Discussion Forum'))
@section('content')
<style>
    .bg-grey{
        background: rgb(249, 249, 249);
    }

    .cat-text{
        font-size: 16px;
    }

    .my-icn{
        font-size: 69px;
        color: var(--primary);
    }

    .color-p{
        color: var(--primary);
        font-size: 16px;
        font-weight: 500;
    }

    .color-pri{
        color: var(--primary);
    }

    .my-icn1{
        font-size: 38px;
        color: var(--primary);
    }

    .discus{
        font-size: 14px;
    }

    .dessc{
        font-weight: 400;
        color: grey;
    }
</style>

@php

the_breadcrumb([], 'page', [
    'title' => __('Discussion Forum')
]);
@endphp
<section class="bg-white mx-3 mb-5">
    <div class="col-md-12 row pt-4">
        @include('Frontend::page.discussion.cat_section')

        <div class="col-md-9">
            <div class="mt-3 statbox widget box box-shadow">
                <div>
                    <h4 class="widget-header">
                        Start a New Topic
                    </h4>
                </div>
                <form action="{{route('quest.store')}}">
                    <div class="mt-3">
                        <label for="">Title</label>
                        <input class="form-control" type="text" name="title" id="">
                        @if ($errors->any())
                            <div class="mt-2 alert alert-danger" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
            
            
                    <div class="mt-3">
                        <label for="">Category</label>
                        <select class="form-control" name="category" id="">
                            <option>Select Category</option>
                            @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="mt-3">
                        <label for="">Message / Question</label>
                        <textarea class="form-control" name="question" id="" cols="30" rows="6"></textarea>
                    </div>
                    <div class="mt-3 d-flex">
                        <div class="mr-auto">
                            <button class="btn btn-primary" type="submit">Save and Publish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@stop