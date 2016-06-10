<div class="wagon wagon-project mt-50">
    <div class="wagon-body">
        <div class="form-group">
            <div class="col-sm-12">
                <div class="label-grouped">
                    <p>
                        For registration of .com.sg and .sg domains, we require one of the following:
                    </p>
                </div>
            </div>                                
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <label>
                        Company Registration Number
                    </label>
                </div>
            </div>                                
            <div class="col-sm-4 col-md-4  @if($errors->has('company_registration_no')) has-error has-feedback @endif">
                <input required value="@if(Request::old('company_registration_no')){{Request::old('company_registration_no')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->company_registration_no }}@endif" type="text" name="company_registration_no" class="form-control stk2" placeholder="#XYZ123">
                <span style="color: red;">{{ $errors->first('company_registration_no') }}</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <label>
                        NRIC Number
                    </label>
                </div>
            </div>                                
            <div class="col-sm-4 col-md-4 @if($errors->has('nric_no')) has-error has-feedback @endif">
                <input required value="@if(Request::old('nric_no')){{Request::old('nric_no')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->nric_no }}@endif" type="text" name="nric_no" class="form-control stk2" placeholder="#XYZ123">
                <span style="color: red;">{{ $errors->first('nric_no') }}</span>
            </div>
        </div>
    </div>
</div>