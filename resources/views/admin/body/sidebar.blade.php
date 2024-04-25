<nav class="sidebar">
  <div class="sidebar-header">
     @if(app()->getLocale()=='ar')
     <a href="#" class="sidebar-brand">
        @lang('CustomizedLanguage.admin_attributes.panel')  <span> @lang('CustomizedLanguage.admin_attributes.admin')</span>
      </a>
      @else
      <a href="#" class="sidebar-brand">
        @lang('CustomizedLanguage.admin_attributes.admin') <span> @lang('CustomizedLanguage.admin_attributes.panel')</span>
      </a>
     @endif
      <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
      </div>
  </div>
  <div class="sidebar-body">
      <ul class="nav">
          <li class="nav-item nav-category"> @lang('CustomizedLanguage.admin_attributes.main')</li>
          <li class="nav-item">
              <a href="{{ route('admin.dashboard') }}" class="nav-link">
                  <i class="link-icon" data-feather="box"></i>
                  <span class="link-title"> @lang('CustomizedLanguage.admin_attributes.dashboard')</span>
              </a>
          </li>
          <li class="nav-item nav-category"> @lang('CustomizedLanguage.admin_attributes.account')</li>
          <li class="nav-item mb-2">
              <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                  <i class="link-icon fa-brands fa-black-tie"></i>
                  <span class="link-title"> @lang('CustomizedLanguage.admin_attributes.muy_account')</span>
              </a>
          </li>
          <li class="nav-item nav-category"> @lang('CustomizedLanguage.admin_attributes.blogers')</li>
          <li class="nav-item mb-2">
              <a class="nav-link" href="{{ route('users') }}" role="button" aria-expanded="false" aria-controls="advancedUI">
                  <i class="link-icon fa-solid fa-users"></i>
                  <span class="link-title"> @lang('CustomizedLanguage.admin_attributes.manage_blogers')</span>
              </a>
          </li>
          <li class="nav-item mb-2">
              <a class="nav-link" href="{{ route('create') }}" role="button" aria-expanded="false" aria-controls="advancedUI">
                  <i class="link-icon fa-solid fa-user-plus"></i>
                  <span class="link-title"> @lang('CustomizedLanguage.admin_attributes.add_bloger')</span>
              </a>
          </li>
          <li class="nav-item nav-category"> @lang('CustomizedLanguage.admin_attributes.blogs')</li>
          <li class="nav-item mb-2">
              <a class="nav-link" href="{{ route('show_admin_blogs') }}" role="button" aria-expanded="false" aria-controls="advancedUI">
                  <i class="link-icon fa-regular fa-newspaper"></i>
                  <span class="link-title"> @lang('CustomizedLanguage.admin_attributes.manage_my_blogs')</span>
              </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('posts') }}" role="button" aria-expanded="false" aria-controls="advancedUI">
                <i class="link-icon fa-regular fa-newspaper"></i>
                <span class="link-title"> @lang('CustomizedLanguage.admin_attributes.manage_blogers_blogs')</span>
            </a>
        </li>
          <li class="nav-item mb-2">
              <a class="nav-link" href="{{ route('create_blog') }}" role="button" aria-expanded="false" aria-controls="advancedUI">
                  <i class="link-icon fa-solid fa-file-circle-plus"></i>
                  <span class="link-title"> @lang('CustomizedLanguage.admin_attributes.add_blog')</span>
              </a>
          </li>
          <!---->
          <li class="nav-item nav-category"> @lang('CustomizedLanguage.admin_attributes.blogs_comments')</li>
          <li class="nav-item mb-2">
              <a class="nav-link" href="{{ route('comments') }}" role="button" aria-expanded="false" aria-controls="advancedUI">
                  <i class="link-icon fa-regular fa-comments"></i>
                  <span class="link-title"> @lang('CustomizedLanguage.admin_attributes.manage_blogs_comments')</span>
              </a>
          </li>
          <!---->
          <li class="nav-item nav-category"> @lang('CustomizedLanguage.admin_attributes.categories')</li>
          <li class="nav-item mb-2">
              <a class="nav-link" href="{{ route('categories') }}" role="button" aria-expanded="false" aria-controls="advancedUI">
                  <i class="link-icon fa-solid fa-list"></i>
                  <span class="link-title"> @lang('CustomizedLanguage.admin_attributes.manage_categories')</span>
              </a>
          </li>
          <li class="nav-item mb-2">
              <a class="nav-link" href="{{ route('create_category') }}" role="button" aria-expanded="false" aria-controls="advancedUI">
                  <i class="link-icon fa-solid fa-folder-plus"></i>
                  <span class="link-title"> @lang('CustomizedLanguage.admin_attributes.add_category')</span>
              </a>
          </li>
          
      </ul>
  </div>
  <div class="sidebar-body">
      <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
      </a>
  </div>
</nav>
