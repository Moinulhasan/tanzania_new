@extends('Backend::layouts.master')

@section('title', __('Comments'))

@php
    admin_enqueue_styles([
        'gmz-datatables',
        'gmz-dt-global',
        'gmz-dt-multiple-tables',
        'gmz-switches',
        'footable'
    ]);
    admin_enqueue_scripts([
        'gmz-datatables',
        'footable'
    ]);
@endphp

@section('content')

    <div class="layout-top-spacing">

        <div class="statbox widget box box-shadow">
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
                    Categories of Discussion Forum
                </h4>
            </div>
            <div class="row col-md-12">
                <div class="ml-auto">
                    <a class="btn btn-success" href="{{route('discuss-category')}}">Create New</a>
                </div>
            </div>

            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>{{__('Discussion')}}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter-action pl-2 mt-3">
{{--                @php--}}
{{--                    $status = request()->get('status', '');--}}
{{--                    if(!in_array($status, ['publish', 'pending'])){--}}
{{--                        $status = '';--}}
{{--                    }--}}
{{--                @endphp--}}
{{--                <a href="{{dashboard_url('comment')}}" class="@if($status == '') text-primary font-weight-bold @endif mr-2">{{__('All')}}</a>--}}
{{--                <a href="{{dashboard_url('comment?status=publish')}}" class="@if($status == 'publish') text-primary font-weight-bold @endif mr-2">{{__('Publish')}}</a>--}}
{{--                <a href="{{dashboard_url('comment?status=pending')}}" class="@if($status == 'pending') text-primary font-weight-bold @endif">{{__('Pending')}}</a>--}}
            </div>

            <div class="table-responsive mb-4 mt-4">
                @if($cats->total() > 0)
                    <table class="multi-table table table-striped table-bordered table-hover non-hover overflow-hidden w-100" data-plugin="footable">
                        <thead>
                        <tr>
                            <th>{{__('Info')}}</th>
                            <th data-breakpoints="xs sm">{{__('Status')}}</th>
                            <th data-breakpoints="xs sm">{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cats as $item)
{{--                            @php--}}
{{--                                $post = get_post($item->post_id, $item->post_type);--}}
{{--                                $post_title = get_translate($item->post_title);--}}
{{--                            @endphp--}}
                            <tr>
                                <td style="max-width: 450px">
                                    <p>
                                        {{$item->title}}
                                    </p>
                                    <p>{{__('In:')}} &nbsp;<b><a href="#" target="_blank">{{get_translate($item->categoryList->title ?? '---')}} ( {{ $item->categoryList->description }} )</a></b></p>
{{--                                    <p>{{__('In:')}} &nbsp;<b><a href="{{get_post_permalink($post['post_slug'] ?? '---')}}" target="_blank">{{get_translate($item->category->title ?? '---')}}</a></b></p>--}}
                                    <p>{{__('By ')}} <b>{{$item->owner->first_name}} ({{$item->owner->email}})</b>
                                    </p>

                                </td>

                                <td class="align-middle">
                                    @php
                                        $params = [
                                            'discussion_id' => $item->id,
                                            'postHashing' => gmz_hashing($item->id)
                                        ];
                                    @endphp
                                    <label class="gmz-switcher gmz-switcher-action switch s-icons s-outline  s-outline-primary  mb-0"
                                           data-params="{{base64_encode(json_encode($params))}}" data-action="{{ route('discuss.status.update') }}">
                                        <input type="checkbox" value="on" @if( $item->status == 1) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </td>

                                <td>
                                    <a class="btn btn-danger btn-sm gmz-link-action" href="javascript:void(0);" data-confirm="true" data-action="{{ route('discuss.delete') }}" data-params="{{base64_encode(json_encode($params))}}" data-remove-el="tr">{{__('Delete')}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="gmz-pagination">
                        {!! $cats->appends($_GET)->links() !!}
                    </div>

                @else
                    <div class="alert alert-warning">{{__('No data')}}</div>
                @endif
            </div>



        </div>
    </div>
@stop

