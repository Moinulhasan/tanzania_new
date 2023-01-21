@extends('Backend::layouts.master')
@section('title', __('All Destinations'))

@section('content')

<div class="mt-3 statbox widget box box-shadow">
    <div class="mt-1">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session()->has('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
    </div>

    <div>
        <h4 class="widget-header">
            Destinations
        </h4>
    </div>
    <div class="row col-md-12">
        <div class="ml-auto">
            <a class="btn btn-success" href="{{route('destination.create')}}/">Create New</a>
        </div>
    </div>

    <div class="table-responsive mb-4 mt-4">
        <table class="multi-table table table-striped table-bordered table-hover non-hover w-100 footable footable-1 breakpoint-lg" data-plugin="footable">
            <thead>
                <tr class="footable-header">
                    <th class="">Image</th>
                    <th class="">Title</th>
                    <th class="">slug</th>
                    <th class="">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dests as $cat)
                @php
                    $myHtml = strip_tags($cat->description);
                @endphp
                    <tr>
                        <td class="px-0 py-1"  style="display: table-cell;">
                            <div class="d-flex">
                                <div class="mx-auto">
                                    <img src="{{asset('destinations/'.$cat->photo)}}" width="90px" height="50px" alt="">
                                </div>
                            </div>
                        </td>
                        <td class="" style="display: table-cell;"><p>{{$cat->title}}</p></td>
                        {{-- <td style="display: table-cell;">{!! Str::limit($myHtml, 40, ' ...') !!}</td> --}}
                        <td style="display: table-cell;">{{$cat->slug}}</td>
                        <td style="display: table-cell;">
                            <div class="d-flex">
                                <div class="mx-2">
                                    <a href="{{route('destination.edit',$cat->id)}}" class="text-info">
                                        Edit
                                    </a>
                                </div>
                                <div class="mx-2">
                                    <a href="{{route('destination.destroy',$cat->id)}}" class="text-danger">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@stop

