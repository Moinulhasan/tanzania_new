@extends('Backend::layouts.master')
@section('title', __('Edit Event'))

@section('content')
<div class="mt-3 statbox widget box box-shadow">
    <div>
        <h4 class="widget-header">
            Edit Event
        </h4>
    </div>
    <form action="{{route('event.update', $dest->id)}}" method="POST" enctype="multipart/form-data">
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
            <label for="">Location (City / Town)</label>
            <input class="form-control" type="text" name="location" id="" value="{{$dest->location}}">
        </div>

        <div class="mt-3">
            <label for="">Starting Date</label>
            <input class="form-control" type="date" name="start_date" id="" value="{{$dest->start_date}}">
        </div>

        <div class="mt-3">
            <label for="">Starting Date</label>
            <input class="form-control" type="date" name="end_date" id="" value="{{$dest->end_date}}">
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
            @php
                $_val = array(
                    "id" => "description",
                    "label" => "Description",
                    "type" => "editor",
                    "layout" => "",
                    "std" => "",
                    "break" => true,
                    "translation" => true,
                    "translation_ext" => false,
                    "value" => "$dest->description",
                    "validation" => "required",
                    "no_option" => false,
                    "condition" => "",
                    "binding" => "title",
                    "description" => ""
                );
            @endphp
            {{-- <textarea class="form-control" name="description" id="" cols="30" rows="7"></textarea> --}}
            @include('Backend::settings.fields.render', [
                                    'field' => $_val
                                ])
        </div>

        <div class="mt-3 d-flex">
            <div class="mr-auto">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>
@stop

