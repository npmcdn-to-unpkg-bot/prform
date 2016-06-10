<div class="wagon wagon-project mt-50">
    <div class="wagon-body">
        <div class="form-group">
            <div class="col-sm-12">
                <div class="label-grouped">
                    <p>
                        Please provide us with the details of the main contact person for future domain & hosting renewal.
                    </p>
                </div>
            </div>                                
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                        <div class="label-grouped">
                            <label>
                                NAME <sup>*</sup>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8 @if($errors->has('dh_renewal_name')) has-error has-feedback @endif">
                        <input required value="@if(Request::old('dh_renewal_name')){{Request::old('dh_renewal_name')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->dh_renewal_name }}@endif" type="text" name="dh_renewal_name" class="form-control stk2" placeholder="Mr. Xyz">
                        <span style="color: red;">{{ $errors->first('dh_renewal_name') }}</span>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                        <div class="label-grouped">
                            <label>
                                EMAIL ADDRESS <sup>*</sup>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8 @if($errors->has('d_h_renewal_email')) has-error has-feedback @endif">
                        <input required value="@if(Request::old('d_h_renewal_email')){{Request::old('d_h_renewal_email')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->d_h_renewal_email }}@endif" type="text" name="d_h_renewal_email" class="form-control stk2" placeholder="abc@xyz.com">
                        <span style="color: red;">{{ $errors->first('d_h_renewal_email') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                        <div class="label-grouped">
                            <label>
                                Mobile No <sup>*</sup>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8  @if($errors->has('d_h_renewal_mobile_no')) has-error has-feedback @endif">
                        <input required value="@if(Request::old('d_h_renewal_mobile_no')){{Request::old('d_h_renewal_mobile_no')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->d_h_renewal_mobile_no }}@endif" type="text" name="d_h_renewal_mobile_no" class="form-control stk2" placeholder="+88 01822 ......">
                        <span style="color: red;">{{ $errors->first('d_h_renewal_mobile_no') }}</span>
                    </div>
                </div> 
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                        <div class="label-grouped">
                            <label>
                                Company name <sup>*</sup>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8 @if($errors->has('dh_renewal_company_name')) has-error has-feedback @endif">
                        <input required value="@if(Request::old('dh_renewal_company_name')){{Request::old('dh_renewal_company_name')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->dh_renewal_company_name }}@endif" type="text" name="dh_renewal_company_name" class="form-control stk2" placeholder="XYZ Ltd.">
                        <span style="color: red;">{{ $errors->first('dh_renewal_company_name') }}</span>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                        <div class="label-grouped">
                            <label>
                                company address <sup>*</sup>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8 @if($errors->has('d_h_renewal_company_address')) has-error has-feedback @endif">
                        <input required value="@if(Request::old('d_h_renewal_company_address')){{Request::old('d_h_renewal_company_address')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->d_h_renewal_company_address }}@endif" type="text" name="d_h_renewal_company_address" class="form-control stk2" placeholder="abc@xyz.com">
                        <span style="color: red;">{{ $errors->first('d_h_renewal_company_address') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-md-4">
                        <div class="label-grouped">
                            <label>
                                postal code <sup>*</sup>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8  @if($errors->has('d_h_renewal_postal_code')) has-error has-feedback @endif">
                        <input required value="@if(Request::old('d_h_renewal_postal_code')){{Request::old('d_h_renewal_postal_code')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->d_h_renewal_postal_code }}@endif" type="text" name="d_h_renewal_postal_code" class="form-control stk2" placeholder="9002">
                        <span style="color: red;">{{ $errors->first('d_h_renewal_postal_code') }}</span>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>