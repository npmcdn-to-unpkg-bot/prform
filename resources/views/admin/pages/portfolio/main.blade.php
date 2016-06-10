@extends('admin.pages.portfolio.master')

@section('content')
    <section class="main-content">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-9 folio-eqlh">
                        <div class="folio-filter">
                            <a href="#" data-filter="*" class="active">All</a>
                            <a href="#" data-filter=".minimalist">MINIMALIST</a>
                            <a href="#" data-filter=".fun">Fun</a>
                            <a href="#" data-filter=".professional">Professional</a>
                            <a href="#" data-filter=".elegant">Elegant</a>
                        </div>
                        <div class="row folio-container">                           
                          @if($allportfolio)  
                            @foreach($allportfolio as $portfolio)
                             @if($portfolio->type=='minimalist')
                              <div class="milon col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item get_image_box1 minimalist">
                                <a class="folio-thumb click_btn" id="{{$portfolio->id}}">
                                    <img class="img-responsive" src="{{URL('/')}}/{{$portfolio->screenshots}}" alt="img"> 
                                </a>
                                <div class="folio-denote">
                                    <div class="note">
                                       {{$portfolio->tags}} 
                                    </div>
                                    <a href="{{$portfolio->link}}" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                              </div>
                             @elseif($portfolio->type=='professional')                           
                              <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item professional">
                                <a class="folio-thumb click_btn" id="{{$portfolio->id}}">
                                    <img class="img-responsive" src="{{URL('/')}}/{{$portfolio->screenshots}}" alt="img">
                                </a>
                                <div class="folio-denote">
                                    <div class="note">
                                         {{$portfolio->tags}}
                                    </div>
                                    <a href="{{$portfolio->link}}" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                              </div>
                             @elseif($portfolio->type=='fun') 
                              <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item fun">
                                <a class="folio-thumb click_btn" id="{{$portfolio->id}}">
                                    <img class="img-responsive" src="{{URL('/')}}/{{$portfolio->screenshots}}" alt="img">
                                </a>
                                <div class="folio-denote">
                                    <div class="note">
                                        {{$portfolio->tags}}
                                    </div>
                                    <a href="{{$portfolio->link}}" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                              </div> 
                              @elseif($portfolio->type=='elegant') 
                               <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item elegant">
                                 <a class="folio-thumb click_btn" id="{{$portfolio->id}}">
                                    <img class="img-responsive" src="{{URL('/')}}/{{$portfolio->screenshots}}" alt="img">
                                 </a>
                                <div class="folio-denote">
                                    <div class="note">
                                        Cursus Vulputate Ipsum Ultricies Lorem Ipsum.
                                    </div>
                                    <a href="" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                              </div>  
                               @endif                           
                             @endforeach 
                            @endif                            
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3">
                        <div class="folio-sidebar folio-eqlh">
                            <div class="sidebar-item mb-50">
                                <h3 class="stitle">Search our <strong>Portfolio</strong></h3>
                                <div class="input-group folio-search-bar">
                                    <input type="text" class="form-control" placeholder="Search by tags">
                                    <span class="input-group-btn">
                                        <button class="btn btn-black" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="sidebar-item mb-50">
                                <h3 class="stitle">Filter by <strong>Featured</strong></h3>
                                <div class="filter-feat-list">
                                    <a href="">animated</a>
                                    <a href="">colorful</a>
                                    <a href="">eCommerce</a>
                                    <a href="">flat design</a>
                                    <a href="">fullscreen</a>
                                    <a href="">grid</a>
                                </div>
                            </div>
                            <div class="sidebar-item mb-50 milonnn">
                                <h3 class="stitle">Selected <strong>Template</strong></h3>
                                <div class="selected-temp">
                                   <div class="selected-temp-item temp-screenshot first_template">
                                        <div class="screenshot-thumb delete_first">
                                            <div class="screenshot-thumb-img">
                                                <div class="no-thumb">NO TEMPLATE SELECTED</div>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                    <div class="selected-temp-item temp-screenshot second_template">
                                        <div class="screenshot-thumb">
                                            <div class="screenshot-thumb-img">
                                                <div class="no-thumb">NO TEMPLATE SELECTED</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="{{url('/porject_visual_back/'.$proposal_no)}}" class="btn uppercase btn-block back-form delete_disabled">UPDATE IN FORM</a>
                          
                           <a href="{{url('/porject_visual/'.$proposal_no)}}" class="btn uppercase btn-block update-inform">BACK TO FORM </a>
                        </div>
                    </div>                    
                </div>                
            </div>
        </section>        
    </section> 
 

    <script type="text/javascript">
     $(document).ready(function(){     
          $(this).on("click", ".click_btn", function() {

       if($(this).hasClass('selected')) {
           $(this).removeClass('selected');           
          $(this).parent().removeClass('selected'); 
              var portfolio_id = $(this).attr("id");
               $('#portfolio-'+portfolio_id).remove();
                //console.log('data removed');

                 $.ajax({
                      type: "POST",
                      url: "{{url('/delete_portfolio_look_fell/'.$proposal_no)}}",
                      data: { portfolio_id:portfolio_id},
                      cache: false,
                      success: function(returnData){                                
                             console.log(returnData);                                
                          },
                      error: function() {
                        alert("Something went wrong, please try again."); 
                      }                      
                    });
            }

       else{              
             var item = $(".selected");        

           if(item.length<4) { 

             $(this).addClass('selected');
             $(this).parent().addClass('selected'); 

              var portfolio_id = $(this).attr("id");
              var template = $(this).parent().html();
                
                  $.ajax({
                      type: "POST",
                      url: "{{url('/add_portfolio_look_fell/'.$proposal_no)}}",
                      data: { portfolio_id:portfolio_id },
                      cache: false,
                      success: function(returnData){  
                               
                               console.log(returnData);
                               if(item.length<2)
                                {  $('.delete_first').empty(); }
                               else
                               { 
                                 if(item.length==3) { 
                                   $('.second_template').empty();
                                  }  
                               }
                              var tp = '<div id="portfolio-'+portfolio_id+'">'+template+'</div>'; 
                                $('.first_template').append(tp); 
                               console.log(tp);
                          },
                      error: function() {
                        alert("Something went wrong, please try again."); 
                      }                      
                    });                   
              }
            }                     
         });     
      });
  </script>

@endsection