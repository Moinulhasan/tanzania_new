@php
    //widget nav
    $setting_widget_nav = [
       'footer_menu_1',
       'footer_menu_2',
       'footer_menu_3',
    ];
    foreach($setting_widget_nav as $value){
       $menu_id = get_option($value);
       $arr_widget_nav[] = [
           'label' => get_translate(get_option($value . '_heading')),
           'items' => get_menu_by_id($menu_id)
        ];
    }
    $copy_right = get_option('footer_copyright');
@endphp
<footer class="site-footer pt-60 pb-40">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                @foreach($arr_widget_nav as $menu)
                {{-- @php
                    dd($menu[]);
                @endphp --}}
                    @if(isset($menu['items']['menu_id']) && has_nav($menu['items']['menu_id']))
                    <div class="col-md-3">
                        <div class="widget widget-nav">
                            <h4 class="widget__title">{{$menu['items']['menu_title']}}</h4>
                                @php
                                    get_nav_by_id($menu['items']['menu_id']);
                                @endphp
                        </div>
                    </div>
                    @endif
                @endforeach
                <div class="col-md-3">
                    <h4 class="widget__title">Follow us on</h4>
                    @php
                        $social = get_option('social');
                    @endphp
                    @if($social)
                    <div class="social-footer d-flex mt-4">
                        @foreach($social as $s)
                            <div class="mx-3 social_icn_size">
                                <a href="{{$s['url']}}" title="{{get_translate($s['title'])}}">
                                    @if(strpos($s['icon'], ' fa-'))
                                        <i class="{{$s['icon']}} term-icon"></i>
                                    @else
                                        {!! get_icon($s['icon']) !!}
                                    @endif
                                </a>
                            </div>
                        @endforeach
                        </div>
                    @endif

                    <h4 class="widget__title mt-4">Membership/Partners</h4>
                    <div class="d-flex mt-4">
                        <div class="mr-2">
                            <img src="{{asset('images/partners/tanzania-safaris.com.partners.jpeg')}}" alt="">
                        </div>
                        <div class="mr-2">
                            <img src="{{asset('images/partners/tanzania-safaris.com.partners-1.jpg')}}" alt="">
                        </div>
                        <div class="mr-2">
                            <img src="{{asset('images/partners/association_for_the_promotion_of_tourism_to_africa_small-e1605455307548.jpg')}}" alt="">
                        </div>
                    </div>

                </div>
                {{-- @if(is_multi_language() || is_multi_currency())
                <div class="col-md-3">
                    <div class="widget widget-select">
                        @if(is_multi_language())
                            @php
                            $dropdown_langs = get_dropdown_language();
                            @endphp
                            @if($dropdown_langs)
                                <h4 class="widget__title">{{__('Language')}}</h4>
                                {!! $dropdown_langs !!}
                                <div class="mb-4"></div>
                            @endif
                        @endif

                        @if(is_multi_currency())
                        <h4 class="widget__title">{{__('Currencies')}}</h4>
                              <?php 
                            //   echo get_dropdown_currency(); 
                              ?>
                        @endif
                    </div>
                </div>
                @endif --}}
            </div>
        </div>
    </div>
    <hr>
    <div class="footer-bottom pt-20 pb-10">
        <div class="container">
            @if(isset($footer_menu['menu_id']) &&  has_nav($footer_menu['menu_id']))
                @php
                    get_nav_by_id($footer_menu['menu_id'],'menu-footer');
                @endphp
            @endif
            <div class="copyright text-center">
                @if(!empty($copy_right))
                {{ get_translate($copy_right) }}
                @else
                    ©{{date('Y')}} Book My Tour - All rights reserved.
                @endif
            </div>
                @action('gmz_after_footer_bottom')
        </div>
    </div>
</footer>
@action('gmz_after_footer')
