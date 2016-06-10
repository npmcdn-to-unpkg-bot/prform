<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Pr_form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
	
    <link href="{{asset('admin_assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet"> 
    <link href="{{asset('admin_assets/plugins/boostrapv3/css/bootstrap.min.css') }}" rel="stylesheet"> 
    <link href="{{asset('admin_assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet"> 
    <link href="{{asset('admin_assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet"> 
    <link href="{{asset('admin_assets/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet"> 
    <link href="{{asset('admin_assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet"> 
    <link href="{{asset('admin_assets/plugins/nvd3/nv.d3.min.css') }}" rel="stylesheet"> 
    <link href="{{asset('admin_assets/plugins/mapplic/css/mapplic.css') }}" rel="stylesheet"> 
    <link href="{{asset('admin_assets/plugins/rickshaw/rickshaw.min.css') }}" rel="stylesheet"> 	
    <link href="{{asset('admin_assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">   
    <link href="{{asset('admin_assets/plugins/jquery-metrojs/MetroJs.css') }}" rel="stylesheet"> 
    <link href="{{asset('pages/css/pages-icons.css') }}" rel="stylesheet"> 
    <link href="{{asset('pages/css/pages.css') }}" rel="stylesheet"> 
   
    <script src="{{asset('admin_assets/plugins/jquery/jquery-1.8.3.min.js') }}"></script>
    
 <script src="{{asset('admin_assets/js/tinymce.min.js') }}"></script> 
 
   <!--  
  <link href="{{asset('admin_assets/css/bootstrap-wysihtml5.css') }}" rel="stylesheet"> 
  
  <script src="{{asset('admin_assets/js/bootstrap-wysihtml5.js') }}"></script> 
  <script src="{{asset('admin_assets/js/bootstrap-wysihtml5-0.0.2.min.js') }}"></script>  -->
    
     <!--Delete Confirmation-->    
    <script type="text/javascript">     
         function confirmation()
            {
             var r=confirm("Do You Want To Delete This ?");
             if (r==true)
                {               
                  return true;              
                }
             else
                 {
                   return false;                
                 }
            }    
    </script> 

    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
  </head>
  <body class="fixed-header  dashboard ">   
     <!-- BEGIN SIDEBPANEL-->      
       @include('cms.partials.menu')
     <!--END BEGIN SIDEBPANEL--> 
   
      <!-- START PAGE-CONTAINER -->
      <div class="page-container">
      <!-- START HEADER -->
       @include('cms.partials.pageheader')
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
        @yield('content') <!-- for extends -->        
      <!-- END PAGE CONTENT WRAPPER -->    
    
      	<!--Start footer-->
          @include('cms.partials.footer')    
        <!--End footer -->
    <!-- END PAGE CONTAINER -->
   </div>    
    <!-- BEGIN VENDOR JS -->
    <script src="{{asset('admin_assets/plugins/pace/pace.min.js') }}"></script>
    
    <script src="{{asset('admin_assets/plugins/modernizr.custom.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/boostrapv3/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/jquery/jquery-easy.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/jquery-unveil/jquery.unveil.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/jquery-bez/jquery.bez.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/jquery-ios-list/jquery.ioslist.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/jquery-actual/jquery.actual.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/bootstrap-select2/select2.min.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/classie/classie.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/switchery/js/switchery.min.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/nvd3/lib/d3.v3.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/nvd3/nv.d3.min.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/nvd3/src/utils.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/nvd3/src/tooltip.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/nvd3/src/interactiveLayer.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/nvd3/src/models/axis.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/nvd3/src/models/line.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/nvd3/src/models/lineWithFocusChart.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/mapplic/js/hammer.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/mapplic/js/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('admin_assets/plugins/mapplic/js/mapplic.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/jquery-metrojs/MetroJs.min.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/skycons/skycons.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- END VENDOR JS -->
       
    <!-- datatable -->
    <script src="{{asset('admin_assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
    <script src="{{asset('admin_assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
    <!-- end datatable -->
    <!-- For Data Table -->
     <script src="{{asset('admin_assets/plugins/jquery-datatable/media/css/jquery.dataTables.css') }}"></script>
     <script src="{{asset('admin_assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}"></script>
     <script src="{{asset('admin_assets/plugins/datatables-responsive/css/datatables.responsive.css') }}"></script>
    <!-- End For Data Table-->     
   
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{asset('pages/js/pages.min.js') }}"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{asset('admin_assets/js/datatables.js') }}"></script>
    <script src="{{asset('admin_assets/js/scripts.js') }}"></script>
    <!-- END PAGE LEVEL JS -->
    
     <script type="text/javascript">
       tinymce.init({ selector:'.editor_service'});
      </script>  
    
  </body>
</html>