<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
  <div class="input-group-text">
    <i data-feather="search"></i>
  </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
              @if(app()->getLocale()=='ar')
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flag-icon flag-icon-ma mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block"> @lang('CustomizedLanguage.dropdown_languages.arabic')</span>
                </a>          
              @elseif(app()->getLocale()=='fr')
              <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="flag-icon flag-icon-fr mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block"> @lang('CustomizedLanguage.dropdown_languages.french')</span>
            </a> 
              @else
              <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block"> @lang('CustomizedLanguage.dropdown_languages.english')</span>
            </a> 
                  
              @endif
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
    <a  style=" display:{{ app()->getLocale()=='en' ? 'none' : '' }}"  href="{{ route('language_route', ['lang' => 'en']) }}" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ms-1"> @lang('CustomizedLanguage.dropdown_languages.english') </span></a>
    <a   style=" display:{{ app()->getLocale()=='fr' ? 'none' : '' }}" href="{{ route('language_route', ['lang' => 'fr']) }}" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ms-1"> @lang('CustomizedLanguage.dropdown_languages.french') </span></a>
    <a    style=" display:{{ app()->getLocale()=='ar' ? 'none' : '' }}" href="{{ route('language_route', ['lang' => 'ar']) }}" class="dropdown-item py-2"><i class="flag-icon flag-icon-ma" title="de" id="de"></i> <span class="ms-1"> @lang('CustomizedLanguage.dropdown_languages.arabic') </span></a>
                </div>
               
</li>
<!---->
            
            @php
            $id=Auth::user()->id;
            $profiledata=App\Models\User::find($id);
            @endphp
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="wd-40 rounded-circle" src="{{
                    !empty($profiledata->photo)
                    ?url('upload/admin_images/'.$profiledata->photo)
                    :url('upload/no_image.jpg')
                    }}" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                          <img class="wd-80 rounded-circle" src="{{
                            !empty($profiledata->photo)
                            ?url('upload/admin_images/'.$profiledata->photo)
                            :url('upload/no_image.jpg')
                            }}" alt="profile">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{$profiledata->name}}</p>
                            <p class="tx-12 text-muted">{{$profiledata->email}}</p>
                        </div>
                    </div>
    <ul class="list-unstyled p-1">
      <li class="dropdown-item py-2">
        <a href="{{route('admin.profile')}}" class="text-body ms-0">
          <i class="fa-solid fa-user" data-feather="user"></i>
          <span>@lang('CustomizedLanguage.profile.title')</span>
        </a>
      </li>
     
      <li class="dropdown-item py-2">
        <a href="{{route('admin.change.password')}}" class="text-body ms-0">
          <i class="fa-solid fa-key"></i>
          <span class="m-2">@lang('CustomizedLanguage.profile.change_password')</span>
        </a>
      </li>
      <li class="dropdown-item py-2">
        <a href="{{route('admin.logout')}}" class="text-body ms-0">
          <i class="fa-solid fa-logout" data-feather="log-out"></i>
          <span>@lang('CustomizedLanguage.menu.logout')</span>
        </a>
      </li>
    </ul>
    
                </div>
            </li>
        </ul>
    </div>
</nav>