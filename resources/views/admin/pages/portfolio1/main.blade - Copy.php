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
                            <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item fun get_image_box selected">                          
                                <a class="folio-thumb click_btn">
                                    <img class="img-responsive" src="images/folio/2.png" alt="img">
                                </a>
                                <div class="folio-denote">
                                    <div class="note ">
                                        Cursus Vulputate Ipsum fdgd Ultricies Lorem Ipsum.
                                    </div>
                                    <a href="" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item elegant minimalist">
                                <a class="folio-thumb click_btn">
                                    <img class="img-responsive" src="images/folio/2.png" alt="img">
                                </a>
                                <div class="folio-denote">
                                    <div class="note">
                                        Cursus Vulputate Ipsum Ultricies Lorem Ipsum.
                                    </div>
                                    <a href="" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item professional">
                               <a class="folio-thumb click_btn">
                                    <img class="img-responsive" src="images/folio/2.png" alt="img">
                                </a>
                                <div class="folio-denote">
                                    <div class="note">
                                        Cursus Vulputate Ipsum dg Ultricies Lorem Ipsum.
                                    </div>
                                    <a href="" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item elegant minimalist">
                               <a class="folio-thumb click_btn">
                                    <img class="img-responsive" src="images/folio/2.png" alt="img">
                                </a>
                                <div class="folio-denote">
                                    <div class="note">
                                        Cursus Vulputate Ipsum Ultricies Lorem Ipsum.
                                    </div>
                                    <a href="" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item fun">
                               <a class="folio-thumb click_btn">
                                    <img class="img-responsive" src="images/folio/2.png" alt="img">
                                </a>
                                <div class="folio-denote">
                                    <div class="note">
                                        Cursus Vulputate Ipsum Ultricies Lorem Ipsum.
                                    </div>
                                    <a href="" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item professional">
                                <a class="folio-thumb click_btn">
                                    <img class="img-responsive" src="images/folio/2.png" alt="img">
                                </a>
                                <div class="folio-denote">
                                    <div class="note">
                                        Cursus Vulputate Ipsum Ultricies Lorem Ipsum.
                                    </div>
                                    <a href="" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item professional elegant">
                                <a class="folio-thumb click_btn">
                                    <img class="img-responsive" src="images/folio/2.png" alt="img">
                                </a>
                                <div class="folio-denote">
                                    <div class="note">
                                        Cursus Vulputate Ipsum Ultricies Lorem Ipsum.
                                    </div>
                                    <a href="" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xs-6 col-xxs-12 folio-item fun elegant">
                                <a class="folio-thumb click_btn">
                                    <img class="img-responsive" src="images/folio/2.png" alt="img">
                                </a>
                                <div class="folio-denote">
                                    <div class="note">
                                        Cursus Vulputate Ipsum Ultricies Lorem Ipsum.
                                    </div>
                                    <a href="" target="_blank">Visit Website <i class="fa fa-external-link"></i></a>
                                </div>
                            </div>
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
                            <div class="sidebar-item mb-50">
                                <h3 class="stitle">Selected <strong>Template</strong></h3>
                                <div class="selected-temp">
                                    <div class="selected-temp-item">
                                        <div class="item-thumb">
                                            <img class="img-responsive" src="images/folio/2.png" alt="img">
                                        </div>
                                        <div class="note">
                                            Quam nunc putamus parum claram, anteposuerit litterarum formas
                                        </div>
                                    </div>
                                    <div class="selected-temp-item temp-screenshot">
                                        <div class="screenshot-thumb">
                                            <div class="screenshot-thumb-img">
                                                <div class="no-thumb">NO TEMPLATE SELECTED</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="" class="btn uppercase btn-block update-inform">UPDATE IN FORM</a>
                            <a href="" class="btn uppercase btn-block back-form">BACK TO FORM</a>
                        </div>
                    </div>                    
                </div>                
            </div>
        </section>        
    </section>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <script type="text/javascript">
     $(document).ready(function(){ 
        $('.click_btn').click(function(){

             $('.selected-temp').empty(); 

        var get_info = $('.get_image_box').html();
       $('.selected-temp').append(get_info); 

      });
     });
  </script>




@endsection