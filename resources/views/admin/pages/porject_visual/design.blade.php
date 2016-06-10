<div class="wagon wagon-project">
    <div class="wagon-header">
        <h3 class="heading-title">Design</h3>
    </div>
    <div class="wagon-body">
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <label>SITEMAP</label>
                    <p>
                       @if(isset($look_and_fell->sitemap)) {{$look_and_fell->sitemap}} @endif 
                    </p>
                </div>
            </div>                                
            <div class="col-sm-8">   
                 <textarea class="form-control" name="sitemap">@if(old('sitemap')){{old('company_name')}}@elseif (isset($projectvisual)){{ $projectvisual->sitemap }}@endif</textarea>
                 <span class="validator_output">{{ $errors->first('sitemap') }}</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <label>LOOK AND FEEL</label>
                    <p>
                        @if(isset($look_and_fell->look_and_fell)) {{$look_and_fell->look_and_fell}} @endif  
                    </p>
                   <!--  <button class="btn btn-red uppercase bold btn-md mt-10">VIEW FROM OUR PORTFOLIO</button> -->
                  <a href="{{url('/portfolio/'.$proposal_no)}}" class="btn btn-red uppercase bold btn-md mt-10">VIEW FROM OUR PORTFOLIO</a>
                </div>
            </div>                                
            <div class="col-sm-8">
                <div class="row">

                @if(isset($selected_portfolio))  
                 @foreach($selected_portfolio as $portfolio)
                    <div class="col-sm-4 col-xs-6 col-xxs-12">
                        <div class="temp-screenshot text-center">
                            <div class="screenshot-thumb"> 
                                <div class="screenshot-thumb-img">
                                    <img class="img-responsive" src="{{url('/').'/'.$portfolio->screenshots}}" alt="img">
                                </div>
                            </div>
                            <div class="temp-details">
                                <h5 class="title">{{$portfolio->name}}</h5>
                            </div>
                        </div>
                    </div>
                 @endforeach
                 @else   
                    <div class="col-sm-4 col-xs-6 col-xxs-12">
                        <div class="temp-screenshot text-center">
                            <div class="screenshot-thumb">
                                <div class="screenshot-thumb-img">                                   
                                    <div class="no-thumb">NO TEMPLATE SELECTED</div>      
                                </div>
                            </div>
                            <div class="temp-details">
                                <h5 class="title">Template Name</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-6 col-xxs-12">
                        <div class="temp-screenshot text-center">
                            <div class="screenshot-thumb">
                                <div class="screenshot-thumb-img">
                                   <div class="no-thumb">NO TEMPLATE SELECTED</div>                                   
                                </div>
                            </div>
                            <div class="temp-details">
                                <h5 class="title">Template Name</h5>
                            </div>
                        </div>
                    </div> 
                 @endif                     
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <label>REFERENCE WEBSITES</label>
                    <p>
                        @if(isset($look_and_fell->references_website)) {{$look_and_fell->references_website}} @endif   
                    </p>
                </div>
            </div>                                
            <div class="col-sm-8">
                <textarea class="form-control" name="referance_websites">@if(old('referance_websites')){{old('referance_websites')}}@elseif (isset($projectvisual)){{ $projectvisual->referance_websites }}@endif</textarea>
                <span class="validator_output">{{ $errors->first('referance_websites') }}</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <label>what do you about  like these references?</label>
                    <p>
                       @if(isset($look_and_fell->about_references)) {{$look_and_fell->about_references}} @endif  
                    </p>
                </div>
            </div>                                
            <div class="col-sm-8">
                <textarea class="form-control" name="referance_similarities">@if(old('referance_similarities')){{old('referance_similarities')}}@elseif (isset($projectvisual)){{ $projectvisual->referance_similarities }}@endif</textarea>
                <span class="validator_output">{{ $errors->first('referance_similarities') }}</span>
            </div>
        </div>

    </div>
</div>