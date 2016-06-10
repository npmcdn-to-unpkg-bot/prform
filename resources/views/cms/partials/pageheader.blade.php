 <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <!-- LEFT SIDE -->
        <div class="pull-left full-height visible-sm visible-xs">
          <!-- START ACTION BAR -->
          <div class="sm-action-bar">
            <a href="#" class="btn-link toggle-sidebar" data-toggle="sidebar">
              <span class="icon-set menu-hambuger"></span>
            </a>
          </div>
          <!-- END ACTION BAR -->
        </div>
        <!-- RIGHT SIDE -->
       
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table">
          <div class="header-inner">
              <div class="brand inline">
                <img width="150" height="43" alt="logo" src="" style="margin-left:50px">
               </div>
            </div>
        </div>
        <div class=" pull-right">
          <div class="header-inner">
            <a href="#" class="btn-link icon-set menu-hambuger-plus m-l-20 sm-no-margin hidden-sm hidden-xs" data-toggle="quickview" data-toggle-element="#quickview"></a>
          </div>
        </div>
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md m-t-10">
              <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
                <span class="semi-bold"> {{ Auth::user()->name }} </span>
              </div>
              <div class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="{{url('admin_assets/img/profiles/avatar.jpg')}}" alt="" data-src="{{url('admin_assets/img/profiles/avatar.jpg')}}" data-src-retina="{{url('admin_assets/img/profiles/avatar.jpg')}}" width="32" height="32">
             </div>              
          </div>
          <!-- END User Info-->
        </div>
      </div>