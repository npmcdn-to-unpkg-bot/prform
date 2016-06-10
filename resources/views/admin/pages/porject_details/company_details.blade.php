<section class="section section-project">
    <div class="container">               
        <div class="wagon wagon-project">
            <div class="wagon-header">
                <h3 class="heading-title">About the Company</h3>
            </div>
            <div class="wagon-body">
                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="label-grouped">
                            <label>INDUSTRY</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <select name="industry_id" class="form-control select-styled stk2">
                           <option value=0>Please Select a Project Type</option>
                           @foreach ($industries as $industry)
                               <option
                                    @if ( Request::old('industry_id') )
                                        {{ strcmp(Request::old('industry_id'),$industry->id) ? "" : 'selected' }}
                                    @elseif ( $project_details )
                                        {{ strcmp($project_details->industry_id,$industry->id) ? "" : 'selected' }}
                                    @endif
                                   value="{{ $industry->id }}">
                                   {{ $industry->name }}
                               </option>
                           @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="label-grouped">
                            <label>Describe your business</label>
                        </div>
                    </div>                                
                    <div class="col-sm-8">
                        <textarea required name="business_description" class="form-control">@if(Request::old('business_description')){{Request::old('business_description')}}@elseif ( $project_details ){{ $project_details->business_description }}@endif</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="label-grouped">
                            <label>Sales channel</label>
                        </div>
                    </div>                                
                    <div class="col-sm-8">
                        <ul class="list-inline">
                            <li>
                                <input required name="sales_cahnnel"
                                @if ( Request::old('sales_cahnnel') )
                                    {{ strcmp(Request::old('sales_cahnnel'),'B2B') ? "" : 'checked' }}
                                @elseif ( $project_details )
                                    {{ strcmp($project_details->sales_cahnnel,'B2B') ? "" : 'checked' }}
                                @endif
                                value="B2B" type="radio" class="check-styled">
                                <label for="b2b" class="label-check-styled">B2B</label>
                            </li>
                            <li>
                                <input name="sales_cahnnel"
                                @if ( Request::old('sales_cahnnel') )
                                    {{ strcmp(Request::old('sales_cahnnel'),'B2C') ? "" : 'checked' }}
                                @elseif ( $project_details )
                                    {{ strcmp($project_details->sales_cahnnel,'B2C') ? "" : 'checked' }}
                                @endif
                                value="B2C" type="radio" class="check-styled">
                                <label for="b2c" class="label-check-styled">B2C</label>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="label-grouped">
                            <label>Product / service details</label>
                            <p>
                                (Morbi leo risus, porta ac consectetur ac, at eros Vivamus sagittis lacus vel augue laoreet.)
                            </p>
                        </div>
                    </div>                                
                    <div class="col-sm-8">
                        <textarea required name="product_details" class="form-control">@if(Request::old('product_details')){{Request::old('product_details')}}@elseif ( $project_details ){{ $project_details->product_details }}@endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="label-grouped">
                            <label>describe your target audience</label>
                            <p>
                               (Morbi leo risus, porta ac consectetur ac, at eros Vivamus sagittis lacus vel augue laoreet.) 
                            </p>
                        </div>
                    </div>                                
                    <div class="col-sm-8">
                        <textarea required name="terget_audience_description" class="form-control">@if(Request::old('terget_audience_description')){{Request::old('terget_audience_description')}}@elseif ( $project_details ){{ $project_details->terget_audience_description }}@endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="label-grouped">
                            <label>List your competitors</label>
                            <p>
                               (Morbi leo risus, porta ac consectetur ac, at eros Vivamus sagittis lacus vel augue laoreet.) 
                            </p>
                        </div>
                    </div>                                
                    <div class="col-sm-8">
                        <textarea required name="competitor_list" class="form-control">@if(Request::old('competitor_list')){{Request::old('competitor_list')}}@elseif ( $project_details ){{ $project_details->competitor_list }}@endif</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="label-grouped">
                            <label>your unique selling point</label>
                            <p>
                               (Morbi leo risus, porta ac consectetur ac, at eros Vivamus sagittis lacus vel augue laoreet.) 
                            </p>
                        </div>
                    </div>                                
                    <div class="col-sm-8">
                        <textarea required name="unique_selling_points" class="form-control">@if(Request::old('unique_selling_points')){{Request::old('unique_selling_points')}}@elseif ( $project_details ){{ $project_details->unique_selling_points }}@endif</textarea>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>