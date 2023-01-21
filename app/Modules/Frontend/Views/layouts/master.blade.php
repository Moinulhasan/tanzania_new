<!DOCTYPE html>
<html lang="{{get_current_language()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $favicon = get_favicon();
        if($favicon)
            echo '<link rel="shortcut icon" type="image/png" href="'. $favicon .'"/>';
    @endphp


    @php
        $page_title = seo_page_title();
        if($page_title){
            $title_tag =  $page_title;
        }else{
            $site_name = get_translate(get_option('site_name', 'iBooking'));
            $seo_separator_title = get_seo_title_separator();
            $title_tag = $site_name . ' ' . $seo_separator_title;
        }
    @endphp

    {{-- <title>@php echo $title_tag @endphp @yield('title')</title> --}}
     <title>@yield('title')</title>

    {!! seo_meta(); !!}
    @php init_header(); @endphp
    @yield('style')
</head>
<body class="body @yield('class_body') {{rtl_class()}}">
@include('Frontend::components.admin-bar')
@include('Frontend::components.top-bar-1')
@include('Frontend::components.header')
<div class="site-content">
    @yield('content')
</div>
@include('Frontend::components.footer')

<style>
@media (min-width: 992px){
ul.main-menu > li:not(.mega-menu) ul.sub-menu li a {
    font-size: 1rem;
    line-height: 13px !important;
padding: 8px 0px 10px 8px !important}}
@media (min-width: 992px){
ul.main-menu > li:not(.mega-menu) ul.sub-menu {
padding: 8px 0 !important;}}
@media (min-width: 992px){
ul.main-menu > li:not(.mega-menu) ul.sub-menu {min-width:640px !important}}
</style>
@php init_footer(); @endphp


<script>
    $('document').ready(function() {
		
		
        $('#exp_col').on('click', function(e) {
            e.preventDefault();
            var text = $(this).text();
            var new_text = "Collapse All";
            var pre_text = "Expand All";
            if(text == "Expand All") {
                $(this).text(new_text);
                $('#accordionFaq [data-parent]').addClass('show');
                $('#accordionFaq button').removeClass('collapsed');
                
            }
            else {
                $(this).text(pre_text);
                $('#accordionFaq [data-parent]').removeClass('show');
                $('#accordionFaq button').addClass('collapsed');
            }
        });

        // $('.lf_click').on('click', function(e) {
        //     e.preventDefault();
        //     var id = e.target.id;
        //     if(id == 'overview') {
        //         $('.destClass').removeClass('d-none');
        //         window.history.pushState('page2', 'Title', '/destination/{{request()->id}}/'+encodeURIComponent(id));

        //     }
        //     else {
        //         $('.destClass').addClass('d-none');
        //         $('.'+id).removeClass('d-none');
        //         window.history.pushState('page2', 'Title', '/destination/{{request()->id}}/'+encodeURIComponent(id));
        //     }
            
        // })
    });
</script>

{{-- <script type="text/javascript">
    $(document).ready(function () {
        var pathArray = window.location.pathname.split('/');
        var secondLevelLocation = pathArray[3];
        var oneLevelLocation = pathArray[1];

        if(oneLevelLocation == "destination" && secondLevelLocation != "overview" && secondLevelLocation != null){
            if (window.location.href.indexOf(secondLevelLocation) != -1) {
                $('.destClass').addClass('d-none');
                $('.'+secondLevelLocation).removeClass('d-none');
                $('html, body').animate({
                    scrollTop: $('.breadcrumb').offset().top
                }, 'slow');
            }
        }
    });
</script> --}}
    

</body>
</html>
