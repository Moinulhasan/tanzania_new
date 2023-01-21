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
            Create Category of Discussion Forum
        </h4>
    </div>
    <form action="{{route('discuss-store')}}">
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
            <label for="">Description</label>
            {{-- <textarea class="form-control" name="description" id="" cols="30" rows="7"></textarea> --}}
            <textarea class="tinymce-overview-content2 gmz-hidden-field" name="description"></textarea>
            <textarea class="myeditorinstance3"></textarea><textarea class="tinymce-overview-content2 gmz-hidden-field" name="description"></textarea>
            <textarea class="myeditorinstance3"></textarea>
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

