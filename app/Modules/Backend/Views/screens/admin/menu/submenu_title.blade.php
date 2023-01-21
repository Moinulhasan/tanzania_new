@extends('Backend::layouts.master')

@section('title', __('Menu'))

@php
    admin_enqueue_scripts('jquery-ui');
    admin_enqueue_styles('jquery-ui');
    admin_enqueue_scripts('nested-sort-js');
@endphp

@section('content')
    <div class="layout-top-spacing">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{__('Menu')}}</h4>
                        </div>
                    </div>
                </div>
                <form action="{{route('title')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-8">
                            <label for="menuName">Menu Options</label>
                            <select name="menu" id="menuName" class="form-control">
                                <option value="">Select One</option>
                                @foreach($listMenus as $menu)
                                    <option value="{{$menu->id}}"> {{$menu->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3 col-md-8">
                            <label for="count">Enter the Row Count</label>
                            <input type="number" value="Enter number" id="count" class="form-control" name="count">
                        </div>
                        <div class="col-md-8">
                            <div class="mt-3">
                                <label for="">Section Title</label>
                                <div id="Number">

                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3"> Save</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $('#count').on('keyup click onchange', function () {
            console.log($(this).val());
            $('#Number').append('');
            if ($(this).val() > 0) {
                for($i=0;$i < $(this).val();$i++)
                {
                    $('#Number').append('<input type="text" value="Enter title"  class="form-control mt-2" name="title[]">');
                }
            }else{
                $('#Number').empty();
            }
            if( !$(this).val() ){
                $('#Number').empty();
            }
            // If user tries to click on the span then trigger the click event manually.

        });
    </script>
@endsection