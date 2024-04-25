<style>
     .header_list .options{
        margin: auto -8px;
        transform: translate(148px, 0px);
}
.header_list .lang{
    transform: translate(44px, 4px);
}


@media screen and (max-width:1400px){
        .header_list .lang{
                  /* transform: translate(107px,52px); */
        /* margin-left: 91px; */
        /* margin: 33px; */
        transform: translate(16px, 5px);

        }
        .header_list .options{
            transform: translate(15px,2px);
        margin: auto -7px;
        }
       
        .header_list .options a span{
            font-size: 14px
        }
        .logo{
            transform: translate(12px, 0px);
        }
     
        
       
        
    }


        
@media screen and (max-width:953px){
        .header_list .lang{
            transform: translate(107px,52px);
        /* margin-left: 91px; */
        /* margin: 33px; */
        transform: translate(107px, 5px);

        }
        .header_list .options{
            transform: translate(-308px,39px);
            margin: auto 5px; }
       
        .header_list .options a span{
            font-size: 14px
        }
        .logo{
            transform: translate(133px, 0px);
        }
     
        
       
        
    }

        
 @media screen and (max-width:850px){
        .header_list .lang{
            transform: translate(107px,52px);

        }
        .header_list .options{
            transform: translate(-308px,52px);
            margin: auto 5px;
        }
       
        .header_list .options a span{
            font-size: 14px
        }
        .logo{
            transform: translate(133px, 0px);
        }
        .header_list .options{
        margin: auto -20px;
        }
        
       
        
    }
     @media screen and (max-width:750px){
        .header_list .lang{
            transform: translate(107px,52px);

        }
        .header_list .options{
            transform: translate(-308px,52px);
            margin: auto 5px;
        }
       
        .header_list .options a span{
            font-size: 14px
        }
        .logo{
            transform: translate(133px, 0px);
        }
        .header_list .options{
        margin: auto -20px;
        }
       
        
    }
     @media screen and (max-width:650px){
        .header_list .lang{
            transform: translate(17px,5px);

        }
        .header_list .options{
            transform: translate(-308px,52px);
            margin: auto 5px;
        }
       
        .header_list .options a span{
            font-size: 14px
        }
        .logo{
            transform: translate(10px, -2px);
        }
    }
   
        @media screen and (max-width:550px){
        .header_list .lang{
            transform: translate(17px,5px);

        }
        .header_list .options{
            transform: translate(-328px,52px);
            margin: auto 5px;
        }
       
        .header_list .options a span{
            font-size: 14px
        }
        .logo{
            transform: translate(10px, -2px);
        }
    }
    @media screen and (max-width:450px){
        .header_list .lang{
            transform: translate(17px,5px);

        }
        .header_list .options{
            transform: translate(-362px,61px);
        margin: auto -5px;
        }
       
        .header_list .options a span{
            font-size: 14px
        }
        .logo{
            transform: translate(10px, -2px);
        }
    }
    @media screen and (max-width:350px){
        .header_list .lang{
            transform: translate(-135px,34px);
        }
        .header_list .lang a {
            font-size: 11px
          
        }
        .header_list .options{
            transform: translate(-331px,56px);
        margin: auto -17px;
        }
       
        .header_list .options a span{
            font-size: 11px
        }
        .logo{
            transform: translate(10px, -2px);
        }
    }
</style>
<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">
            <div class="row">
                <div class="col-md-6 text-center order-1 order-md-2 mb-3 mb-md-0 d-flex">
                    <a href="{{route('guest_page')}}" class="logo m-0 text-uppercase">InsightfulBlogs</a>
                    <ul class="d-flex header_list">
                        <li class="lang" style="list-style: none; display:{{ app()->getLocale()=='en' ? 'none' : '' }}">
                            <a class="dropdown-item" href="{{ route('language_route', ['lang' => 'en']) }}">@lang('CustomizedLanguage.dropdown_languages.english')</a>
                        </li>
                        <li class="lang" style="list-style: none; display:{{ app()->getLocale()=='fr' ? 'none' : '' }}">
                            <a class="dropdown-item" href="{{ route('language_route', ['lang' => 'fr']) }}">@lang('CustomizedLanguage.dropdown_languages.french')</a>
                        </li>
                        <li class="lang" style="list-style: none; display:{{ app()->getLocale()=='ar' ? 'none' : '' }}">
                            <a class="dropdown-item" href="{{ route('language_route', ['lang' => 'ar']) }}">@lang('CustomizedLanguage.dropdown_languages.arabic')</a>
                        </li>
                        @if(!Auth::user())
                        <li style="list-style: none" class="options list-style-none"><a class="text-muted" style="text-decoration: none" href="{{route('create_message')}}" ><span style="display: block;width:120px">@lang('CustomizedLanguage.contact_messages.contact_us')</span></a></li>
                        <li style="list-style: none" class="options list-style-none"><a class="text-muted" style="text-decoration: none" href="{{route('login')}}" ><span style="display: block;width:120px">@lang('CustomizedLanguage.login')</span></a></li>
                        <li style="list-style: none" class="options list-style-none"><a class="text-muted" style="text-decoration: none" href="{{route('register')}}" ><span style="display: block;width:120px">@lang('CustomizedLanguage.create_account')</span></a></li>
                        @endif
                        
                    </ul>
                    
                </div>
                
                <div class="col-md-3 order-3 order-md-1">
                    <form action="#" class="search-form">
                        <span class="icon-search2"></span>
                        <input type="search" class="form-control" placeholder="Search...">
                    </form>
                </div>
                <div class="col-md-3 text-end order-2 order-md-3 mb-3 mb-md-0">
                    <div class="d-flex">
                       
                        <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block menubutton" data-toggle="collapse" data-target="#main-navbar">
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="js-clone-nav d-none d-lg-inline-none text-start site-menu float-end">
                @if(Auth::user())
                <li class="">
                    <a href={{route('EDITPROFILE')}}>
                        <div class="contanierr" style="margin-bottom:10px ;margin-top:6x;">
                            <div class="user-info row">
                                <div class="d-flex justify-content-center">

                                    <img src={{Auth::user()->photo?url('upload/bloger_images/'.Auth::user()->photo) :url('upload/no_image.jpg')}} alt="" style="height: 80px;width:80px;border-radius: 37px;">
                                </div>
                                <div class="text-muted mt-3 mb-2" style="text-align: center">
                                    @lang('CustomizedLanguage.menu.blogger')
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <span class="text-muted" style="">{{Auth::user()->name}}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                        <li style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"> <a href="{{route('EDITPROFILE')}}" style="position: relative;left:20px"> @lang('CustomizedLanguage.menu.edit_profile')</a> </li>
                <li style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"> <a href="{{route('CHANGEPASSWORD')}}" style="position: relative;left:20px" >@lang('CustomizedLanguage.menu.change_password')</a> </li>
                <li class="has-children" style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;">
                    <a href="../main/categories.html"  style="position: relative;left:20px">
                        @lang('CustomizedLanguage.menu.blogs')
                    
                    </a>
                    <ul class="dropdown">
                        <li><a href={{route('manage_blogs')}}>@lang('CustomizedLanguage.menu.maanage_blogs')</a></li>
                        <li><a href={{route('create-blog')}}>@lang('CustomizedLanguage.menu.create_blog')</a></li>
                    </ul>
                </li>
                <li style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"> <a href="{{route('show_bloger_comments')}}"  style="position: relative;left:20px">@lang('CustomizedLanguage.admin_attributes.blogs_comments')</</a> </li>
                <li  style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"><a href="{{url('/posts/posts-categories/choose-post-category')}}"  style="position: relative;left:20px">@lang('CustomizedLanguage.menu.categories')</a></li>
                <li style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"> <a href=""  style="position: relative;left:20px">@lang('CustomizedLanguage.menu.about_us')</a> </li>
                <li style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"> <a href="{{route('create_message')}}"  style="position: relative;left:20px">@lang('CustomizedLanguage.menu.contact_us')</a> </li>

                <li style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"> <a href="{{route('LOGOUT')}}"  style="position: relative;left:20px">@lang('CustomizedLanguage.menu.logout')</a> </li>
                </ul>
                @else
                <li class="active" style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"><a href="{{route('guest_page')}}">@lang('CustomizedLanguage.menu.blogs')</a></li>
                <li style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"> <a href="{{route('blogs_categories')}}">@lang('CustomizedLanguage.menu.categories')</a></li>
                <li style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"> <a href="">@lang('CustomizedLanguage.menu.about_us')</a></li>
                <li style="border-bottom: 1px #e6e2e2 solid ;margin-bottom:10px ;margin-top:6x;"> <a href="{{route('create_message')}}">@lang('CustomizedLanguage.menu.contact_us')</a></li>
               
            </ul>
            @endif
        </div>
    </div>
</nav>
