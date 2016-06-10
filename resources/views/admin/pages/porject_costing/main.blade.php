@extends('admin.master')

@section('title', 'Project Pricing And Costing')

@section('content')

    <section class="main-content pb-0">
        <section class="section section-page-xicon">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="page-xicon">
                            <img src="{{ URL::asset('images/icon/5-lg.png') }}" alt="icon">
                        </div>
                    </div>
                </div>
            </div>
        </section>

       @if(Session::has('msg'))<h5 align="center" style="color:green">{{Session::get('msg')}}</h5> @endif

        <form class="form-horizontal" method="POST" action="{{ url( Request::path() ) }}">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">

            @include('admin.pages.porject_costing.pages')

            @include('admin.pages.porject_costing.cost')

        </form>
    </section>

    <style type="text/css">
     .display-non{ display: none;}
     .btn-submit-cost {display: none;}
   </style>
  
 <!--add design row -->
    <script type="text/javascript">
      $(document).ready(function(){ 
        $('.cost_edit_btn').click(function(){        
           $("button").removeClass('display-non'); 
           $(".cost_edit_btn").hide();  
           $("button").removeClass('btn-submit-cost');
        }); 
      });
    </script> 

 <!--add design row -->
    <script type="text/javascript">
      $(document).ready(function(){ 
       $( document ).on( 'click', '.add_design_btn', function() {       
          $('.add_design_row').append('<tr><td><input type="text" required class="form-control" name="design_sub_category_name[]"/></td><td><input type="text" class="form-control" required name="design_sub_estimated_cos[]"/></td><td><input type="text" class="form-control" required name="design_sub_actual_cost[]"/></td><td><input type="text" class="form-control" required name="design_sub_quoted_cos[]"/></td></tr>');
       
        }); 
      });
    </script>
 <!--add development row -->
     <script type="text/javascript">
      $(document).ready(function(){        
        $( document ).on( 'click', '.add_development_btn', function() {      
          $('.add_development_row').append('<tr><td><input type="text" required class="form-control" name="development_sub_category_name[]" placeholder="name" /></td><td><input type="text" required class="form-control" name="development_sub_estimated_cos[]"/></td><td><input type="text" class="form-control" required name="development_sub_actual_cost[]" /></td><td><input type="text" class="form-control" name="development_sub_quoted_cos[]" /></td></tr>');
        }); 
      });
    </script>

     <!--add development row -->
     <script type="text/javascript">
      $(document).ready(function(){        
        $( document ).on( 'click', '.add_mobile_btn', function() { 
          $('.add_mobile_row').append('<tr><td><input type="text" required class="form-control" name="mobile_sub_category_name[]" placeholder="name" /></td><td><input type="text" required class="form-control" name="mobile_sub_estimated_cos[]"/></td><td><input type="text" class="form-control" required name="mobile_sub_actual_cost[]"/></td><td><input type="text" class="form-control" required name="mobile_sub_quoted_cos[]"/></td></tr>');
        }); 
      });
    </script>

     <!--add hosting row -->
     <script type="text/javascript">
      $(document).ready(function(){        
        $( document ).on( 'click', '.add_hosting_btn', function() {      
          $('.add_hosting_row').append('<tr><td><input type="text" required class="form-control" name="hosting_sub_category_name[]" placeholder="name" /></td><td><input type="text" required class="form-control" name="hosting_sub_estimated_cos[]"/></td><td><input type="text" class="form-control" required name="hosting_sub_actual_cost[]"/></td><td><input type="text" class="form-control" required name="hosting_sub_quoted_cos[]"/></td></tr>');
        }); 
      });
    </script>

    <!--add domain row -->
     <script type="text/javascript">
      $(document).ready(function(){        
        $( document ).on( 'click', '.add_domain_btn', function() {      
          $('.add_domain_row').append('<tr><td><input type="text" required class="form-control" name="domain_sub_category_name[]" placeholder="name" /></td><td><input type="text" required class="form-control" name="domain_sub_estimated_cos[]"/></td><td><input type="text" class="form-control" required name="domain_sub_actual_cost[]"/></td><td><input type="text" class="form-control" required name="domain_sub_quoted_cos[]"/></td></tr>');
        }); 
      });
    </script>

    <!--add domain row -->
    <script type="text/javascript">
      $(document).ready(function(){        
        $( document ).on( 'click', '.add_plugin_btn', function() {      
          $('.add_plugin_row').append('<tr><td><input type="text" required class="form-control" name="plugins_sub_category_name[]" placeholder="name" /></td><td><input type="text" required class="form-control" name="plugins_sub_estimated_cos[]"/></td><td><input type="text" class="form-control" required name="plugins_sub_actual_cost[]"/></td><td><input type="text" class="form-control" required name="plugins_sub_quoted_cos[]"/></td></tr>');
        }); 
      });
    </script>

    <!--add domain row -->
    <script type="text/javascript">
      $(document).ready(function(){        
        $( document ).on( 'click', '.add_customize_btn', function() {      
          $('.add_customize_row').append('<tr><td><input type="text" required class="form-control" name="customize_sub_category_name[]" placeholder="name" /></td><td><input type="text" required class="form-control" name="customize_sub_estimated_cos[]"/></td><td><input type="text" class="form-control" required name="customize_sub_actual_cost[]"/></td><td><input type="text" class="form-control" required name="customize_sub_quoted_cos[]"/></td></tr>');
        }); 
      });
    </script>



@endsection