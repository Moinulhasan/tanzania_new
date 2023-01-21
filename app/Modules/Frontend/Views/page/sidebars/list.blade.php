@extends('Backend::layouts.master')
@section('title', __('Destination Sidebar'))

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
           Sidebar items for {{$destination->title}}
        </h4>
    </div>
    <div class="row col-md-12">
        <div class="ml-auto">
            <a class="btn btn-success" href="{{url('destination/sidebar/create')}}/{{$destination->id}}">Create New Sidebar Item</a>
        </div>
    </div>

    <div class="table-responsive mb-4 mt-4">
        <table class="multi-table table table-striped table-bordered table-hover non-hover w-100 footable footable-1 breakpoint-lg" data-plugin="footable">
            <thead>
                <tr class="footable-header">
                    <th class="">Title</th>
                    <th class="">Slug</th>
                    <th class="">Description</th>
                    <th class="">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dests as $cat)
                @php
                    $myHtml = strip_tags($cat->description);
                @endphp
                    <tr>
                        <td class="" style="display: table-cell;"><p>{{$cat->title}}</p></td>
                        <td class="" style="display: table-cell;"><p>{{$cat->slug}}</p></td>
                        <td style="display: table-cell;">{{substr($myHtml, 0, 40 )}}</td>
                        <td style="display: table-cell;">
                            <div class="d-flex">
                                <div class="mx-2">
                                    <a href="{{url('destination/sidebar',$cat->id)}}/edit" class="text-info">
                                        Edit
                                    </a>
                                </div>
                                <div class="mx-2">
                                    <a href="{{url('destination/sidebar',$cat->id)}}/delete" class="text-danger">
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

