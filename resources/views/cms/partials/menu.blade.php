    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-40"><img src="{{url('admin_assets/img/demo/social_app.svg')}}" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-10"><img src="{{url('admin_assets/img/demo/email_app.svg')}}" alt="socail">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-40"><img src="{{url('admin_assets/img/demo/calendar_app.svg')}}" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-10"><img src="{{url('admin_assets/img/demo/add_more.svg')}}" alt="socail">
            </a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img style="margin-left:50px" src="" alt="logo" class="brand" data-src="" data-src-retina="" width="150" height="43">
        <div class="sidebar-header-controls">
          <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
          </button>
          <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 open">
            <a href="{{url('/dashboard')}}" class="detailed">
              <span class="title">Go Back</span>              
            </a>
            <span class="icon-thumbnail bg-success"><i class="fa fa-tachometer"></i></span>
          </li>
          <li class="m-t-30 open">
            <a href="{{url('/cms')}}" class="detailed">
              <span class="title">Home</span>              
            </a>
            <span class="icon-thumbnail bg-success"><i class="fa fa-tachometer"></i></span>
          </li>
          <li class="">
             <a href="javascript:;">
               <span class="title">Users</span>
               <span class="arrow"></span>             
            </a>
            <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
            <ul class="sub-menu">             
              <li class="">
                <a href="{{url('/view_users')}}">View User</a>
                <span class="icon-thumbnail">fe</span>
              </li>
               </ul>
          </li> 
          <li class="">
             <a href="javascript:;">
               <span class="title">Project Platform</span>
               <span class="arrow"></span>             
            </a>
            <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
            <ul class="sub-menu">             
              <li class="">
                <a href="{{url('/view_project_platform')}}">View Project Platform</a>
                <span class="icon-thumbnail">fe</span>
              </li>
               </ul>
          </li> 
          <li class="">
             <a href="javascript:;">
               <span class="title">Project Type</span>
               <span class="arrow"></span>             
            </a>
            <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
            <ul class="sub-menu">             
              <li class="">
                <a href="{{url('/view_users')}}">View Project Platform</a>
                <span class="icon-thumbnail">fe</span>
              </li>
               </ul>
          </li> 
          <li class="">
             <a href="javascript:;">
               <span class="title">Portfolio</span>
               <span class="arrow"></span>             
            </a>
            <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
            <ul class="sub-menu">             
              <li class="">
                <a href="{{url('/view_portfolio')}}">View Portfolio</a>
                <span class="icon-thumbnail">fe</span>
              </li>
               </ul>
          </li>                              
          <li class="">
             <a href="javascript:;">
               <span class="title">Devoloping Team</span>
               <span class="arrow"></span>             
            </a>
            <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
            <ul class="sub-menu">             
              <li class="">
                <a href="#">View Devoloping Team</a>
                <span class="icon-thumbnail">fe</span>
              </li>
               </ul>
           </li>
           <li class="">
             <a href="javascript:;">
               <span class="title">Look & Feel</span>
               <span class="arrow"></span>             
            </a>
            <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
            <ul class="sub-menu">             
              <li class="">
                <a href="{{url('/view_look_feel')}}">Look & Feel</a>
                <span class="icon-thumbnail">fe</span>
              </li>
               </ul>
           </li>
       
            <li class="">
            <a href="javascript:;"><span class="title">Settings</span>
              <span class="arrow"></span>             
            </a>
            <span class="icon-thumbnail"><i class="pg-form"></i></span>         
           
          </li>   
   <!--   <li class="">
            <a href="portlets.html">
              <span class="title">Pages</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-cog"></i></span>
          </li>  
     -->     
         
          <li class="">
           <a href="javascript:;">
               <span class="title">Admin</span>
               <span class="arrow"></span>             
            </a>
            <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
            <ul class="sub-menu">
             
                <li class="">
                  <a href="{{url('/logout')}}">
                     <span class="title">Logout</span>
                  </a>
                  <span class="icon-thumbnail">fe</span>
                </li>                 
            </ul>
          </li>        
       </ul>
     <div class="clearfix"></div>
   </div>
  <!-- END SIDEBAR MENU -->
</nav>