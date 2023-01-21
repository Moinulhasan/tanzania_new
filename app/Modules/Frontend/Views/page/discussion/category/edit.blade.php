@extends('Backend::layouts.master')
@section('title', __('All Category'))

@php

admin_enqueue_scripts('gmz-tiny-mce');
admin_enqueue_scripts('gmz-tiny-mce-config');
@endphp
@section('content')
<div class="mt-3 statbox widget box box-shadow">
    <div>
        <h4 class="widget-header">
            Edit Category of Discussion Forum
        </h4>
    </div>
    <form action="{{route('discuss.update', $cat->id)}}">
        <div class="mt-3">
            <label for="">Title</label>
            <input class="form-control" type="text" name="title" id="" value="{{$cat->title}}">
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
            <label for="">Description</label>
            {{-- <textarea class="form-control" name="description" id="" cols="30" rows="7">{{$cat->description}}</textarea> --}}
            <textarea class="tinymce-overview-content3 gmz-hidden-field" name="description">{{$cat->description}}</textarea>
            <textarea class="myeditorinstance4">{{$cat->description}}</textarea>
        </div>
            
    
    <style>
        .tox-promotion{
            display: none !important;
        }
    </style>
        <div class="mt-3 d-flex">
            <div class="mr-auto">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>
@stop

