<div class="col-md-3 pr-5 pl-3">
    <div class="mb-3">
        @if (auth()->user())
            <a href="{{route('quest.create')}}" class="btn btn-primary" style="border-radius:0;">
                <div class="px-2">
                    <i class="fas fa-pen-fancy pr-1"></i>
                    <span style="font-weight: 500">START A NEW TOPIC</span>
                </div>
            </a>
        @else
            <a href="{{route('login')}}" class="btn btn-primary" style="border-radius:0;">
                <div class="px-2">
                    <i class="fas fa-pen-fancy pr-1"></i>
                    <span style="font-weight: 500">Login / Signup</span>
                </div>
            </a>
        @endif
    </div>
    <h5 class="section-title" style="color: rgb(127, 127, 127)">
        Choose By Category
    </h5>
    <hr class="my-2">
    {{-- <div class="ml-2">
        <p class="mb-0">
            <a class="cat-text" href="{{route('quest')}}">All Types</a>
        </p>
    </div> --}}

    @php
        $all = \App\Models\Discussion::all()->count();   
    @endphp

    <div class="ml-2 d-flex">
        <div class="">
            <p class="mb-0">
                <i class="far fa-circle size-i mr-2"></i>
                <a class="cat-text color-pri" href="{{route('quest')}}">All Types</a>
            </p>
        </div>
        <div class="ml-auto mr-2">
            <span class="badge badge-pill badge-info" style="line-height: auto !important; background:rgb(184, 184, 184)">{{$all}}</span>
        </div>
    </div>
    <hr class="my-2">

    @foreach ($cats as $cat)
        @php
            $total = \App\Models\Discussion::where('category',$cat->id)->count();   
        @endphp
        <div class="ml-2 d-flex">
            <div class="">
                <p class="mb-0">
                    <style>
                        .size-i{
                            font-size: 13px;
                            color: #f9c741;
                        }
                    </style>
                    <i class="far fa-circle size-i mr-2"></i>
                    <a class="cat-text color-pri" href="{{route('discuss',$cat->slug)}}">{{$cat->title}}</a>
                </p>
            </div>
            <div class="ml-auto mr-2">
                <span class="badge badge-pill badge-info" style="line-height: auto !important; background:rgb(184, 184, 184)">{{$total}}</span>
            </div>
        </div>
        <hr class="my-2">
    @endforeach

</div>
