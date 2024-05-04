@extends('admin.admin_dashboard')
@section('admin')
			<div class="page-content">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                  <div>
                    <h4 class="mb-3 mb-md-0"> @lang('CustomizedLanguage.admin_attributes.welcome_to_dashboad')</h4>
                  </div>
                  <div class="d-flex align-items-center flex-wrap text-nowrap">
                    
                   
                  </div>
                </div>
        
                <div class="row">
                  <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                          <a href="{{route('users')}}" style="text-decoration: none;color:#d1d6da">

                          <h6 class="card-title mb-0"> @lang('CustomizedLanguage.admin_attributes.blogers')</h6>
                          </a>
                          <div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                  
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6 col-md-12 col-xl-5">
                          <a href="" style="text-decoration: none;color:#d1d6da">

                            <h3 class="mb-2">{{\App\Models\User::where('role','user')->get()->count()}} members</h3>
                          </a>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                          <a href="{{route('posts')}}" style="text-decoration: none;color:#d1d6da">
                            <h6 class="card-title mb-0"> @lang('CustomizedLanguage.admin_attributes.blogs')</h6>
                          </a>

                          <div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                  
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6 col-md-12 col-xl-5">
                          <a href="" style="text-decoration: none;color:#d1d6da">

                            <h3 class="mb-2">{{\App\Models\Post::get()->count()}} blogs</h3>
                          </a>
                            
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                          <a href="{{route('categories')}}" style="text-decoration: none;color:#d1d6da">

                          <h6 class="card-title mb-0"> @lang('CustomizedLanguage.admin_attributes.categories')</h6>
                          <a href="" style="text-decoration: none;color:#d1d6da">

                          <div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                  
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6 col-md-12 col-xl-5">
                          <a href="" style="text-decoration: none;color:#d1d6da">

                            <h3 class="mb-2">{{\App\Models\Category::get()->count()}} categories</h3>
                          </a>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                      <a href="">
                        
                      </a>
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                          <a href="{{route('comments')}}" style="text-decoration: none;color:#d1d6da">


                          <h6 class="card-title mb-0"> @lang('CustomizedLanguage.admin_attributes.blogs_comments')</h6>
                          </a>
                          <div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                  
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6 col-md-12 col-xl-5">
                            <a href="" style="text-decoration: none;color:#d1d6da">

                              <h3 class="mb-2">{{\App\Models\Comment::get()->count()}} comments</h3>
                            </a>
                            
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                          <a href="{{route('messages')}}" style="text-decoration: none;color:#d1d6da">

                          <h6 class="card-title mb-0"> @lang('CustomizedLanguage.contact_messages.messages')</h6>
                          <a href="" style="text-decoration: none;color:#d1d6da">

                          <div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                  
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6 col-md-12 col-xl-5">
                          <a href="{{route('messages')}}" style="text-decoration: none;color:#d1d6da">

                            <h3 class="mb-2">{{\App\Models\Message::get()->count()}} message</h3>
                          </a>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- row -->
                    </div>
        
@endsection