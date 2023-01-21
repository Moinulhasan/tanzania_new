@extends('Backend::layouts.master')
@section('title', __('Destinations'))

@php

admin_enqueue_scripts('gmz-tiny-mce');
admin_enqueue_scripts('gmz-tiny-mce-config');
$collection = [
                [
                    "id" => "wildlife_title",
                    "label" => "Wildlife Page Title",
                    "type" => "text",
                    "layout" => "",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->wildlife_title",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],
                [
                    "id" => "wildlife",
                    "label" => "Wildlife",
                    "type" => "editor",
                    "layout" => "pb-5 border-bottom border-danger",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->wildlife",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],
                [
                    "id" => "birds_title",
                    "label" => "Birds Page Title",
                    "type" => "text",
                    "layout" => "",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->birds_title",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "birds",
                    "label" => "Birds",
                    "type" => "editor",
                    "layout" => "pb-5 border-bottom border-danger",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->birds",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "best_time_title",
                    "label" => "Best Time Page Title",
                    "type" => "text",
                    "layout" => "",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->best_time_title",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "best_time",
                    "label" => "Best Time",
                    "type" => "editor",
                    "layout" => "pb-5 border-bottom border-danger",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->best_time",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "weather_title",
                    "label" => "Weather Page Title",
                    "type" => "text",
                    "layout" => "",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->weather_title",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "weather",
                    "label" => "Weather and Climate",
                    "type" => "editor",
                    "layout" => "pb-5 border-bottom border-danger",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->weather",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "scenery_title",
                    "label" => "Scenery Page Title",
                    "type" => "text",
                    "layout" => "",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->scenery_title",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "scenery",
                    "label" => "Scenary",
                    "type" => "editor",
                    "layout" => "pb-5 border-bottom border-danger",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->scenery",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "getting_there_title",
                    "label" => "Getting There Page Title",
                    "type" => "text",
                    "layout" => "",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->getting_there_title",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "getting_there",
                    "label" => "Getting There",
                    "type" => "editor",
                    "layout" => "pb-5 border-bottom border-danger",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->getting_there",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "elevation_title",
                    "label" => "Elevation Page Title",
                    "type" => "text",
                    "layout" => "",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->elevation_title",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ],[
                    "id" => "elevation",
                    "label" => "Elevation",
                    "type" => "editor",
                    "layout" => "",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->elevation",
                    "validation" => "",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                ]
            ];

            ','
@endphp



@section('content')
<div class="mt-3 statbox widget box box-shadow">
    <div>
        <h4 class="widget-header d-flex">
            Edit Destination
            <a href="{{url('destination/sidebar')}}/{{$dest->id}}" class="btn btn-primary ml-auto">Manage Sidebar</a>
        </h4>


    </div>
    <form action="{{route('destination.update', $dest->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-3">
            <label for="">Title / Name</label>
            <input class="form-control" type="text" name="title" id="" value="{{$dest->title}}">
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
            <label for="basic-url">Permalink</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">{{url('/')}}</span>
                </div>
                <input type="text" class="form-control"  name="slug" value="{{old('slug') ?? $dest->slug}}" required >
            </div>
        </div>


        <div class="mt-3">
            <div>
                <label for="">Featured Image</label>
            </div>
            <div>
                <input type="file" name="photo" id="">
            </div>
        </div>

        <div class="mt-3">
            <label for="basic-url">Overview</label>
            {{-- <textarea name="overview" class="form-control quil-editor">{{old('overview') ?? $dest->overview}}</textarea> --}}
            <textarea class="tinymce-overview-content gmz-hidden-field" name="overview">{{old('overview') ?? $dest->overview}}</textarea>
            <textarea class="myeditorinstance2" >{{old('overview') ?? $dest->overview}}</textarea>
        </div>
    <style>
        .tox-promotion{
            display: none !important;
        }
    </style>
            {{-- <textarea class="form-control" name="description" id="" cols="30" rows="7"></textarea> --}}
            {{-- @include('Backend::settings.fields.render', [
                                    'field' => $_val
                                ]) --}}

      {{--  @foreach ($collection as $item)
            <div class="mt-3">
                @include('Backend::settings.fields.render', [
                    'field' => $item
                ])
            </div>
        @endforeach--}}

        <div class="mt-3 d-flex">
            <div class="mr-auto">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>
@stop

