@extends('Backend::layouts.master')
@section('title', __('Create Sidebar'))

@php
    $collection = [
    [
        "id" => "description",
        "label" => "Description",
        "type" => "editor",
        "layout" => "pb-5 border-bottom border-danger",
        "std" => "",
        "break" => true,
        "translation" => true,
        "translation_ext" => false,
        "value" => "",
        "validation" => "",
        "no_option" => false,
        "condition" => "",
        "binding" => "title",
        "description" => ""
    ],
]
@endphp

@section('content')
<div class="mt-3 statbox widget box box-shadow">
    <div>
        <h4 class="widget-header">
            Create Sidebar Item for {{$destination->title}}
        </h4>
    </div>
    <form action="{{url('destination/sidebar/create')}}/{{$destination->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-3">
            <label for="">Title / Name</label>
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
            <label for="basic-url">Permalink</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">{{url('/')}}</span>
                </div>
                <input type="text" class="form-control"  name="slug" value="{{old('slug')}}" required >
            </div>
        </div>


        @foreach ($collection as $item)
            <div class="mt-3">
                @include('Backend::settings.fields.render', [
                    'field' => $item
                ])
            </div>
        @endforeach

        <div class="mt-3 d-flex">
            <div class="mr-auto">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>
@stop

