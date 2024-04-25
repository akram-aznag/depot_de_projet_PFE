<!-- end of newsletter section-->

@if (!Route::has('EDITPROFILE'))
    <div class="py-5 bg-light mx-md-3 sec-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h4 fw-bold">Subscribe to newsletter</h2>
                </div>
            </div>
            <form action class="row">
                <div class="col-md-8">
                    <div class="mb-3 mb-md-0">
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-md-4 d-grid">
                    <input type="submit" class="btn btn-primary" value="Subscribe">
                </div>
            </form>
        </div>
    </div>
@endif

<!-- end of newsletter section-->

<!-- footer-->
    <div class="site-footer">
        <div class="container">
          <div class="row justify-content-center copyright">
              <div class="col-lg-7 text-center">
               <div class="widget">
                    <ul class= "social list-unstyled">
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-linkedin"></span></a></li>
                        <li><a href="#"><span class="icon-youtube-play"></span></a></li>
                     </ul>
               </div>
              <div class="widget"><p>@lang('CustomizedLanguage.copyright') &copy;<script>document.write(new Date().getFullYear());</script> @lang('CustomizedLanguage.all_rights_reserved') </p>
                  
              </div>
     </div>
     </div>
     </div>
<!--end footer-->