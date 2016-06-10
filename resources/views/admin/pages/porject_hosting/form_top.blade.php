<div class="wagon wagon-project">
    <div class="wagon-header">
        <h3 class="heading-title">Domain and Hosting</h3>
    </div>
    <div class="wagon-body">
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <p>
                        Do you need us to register your domain immediately (if you have not yet registered) ?
                    </p>
                </div>
            </div>

            <div class="col-sm-3 col-md-2 @if($errors->has('need_us_to_register')) has-error has-feedback @endif">
                <select name="need_us_to_register" class="form-control select-styled stk2">
                    <option value=0>       Select                               </option>
                    <option
                    @if ( Request::old('need_us_to_register') )
                        {{ strcmp(Request::old('need_us_to_register'),'yes') ? "" : 'selected' }}
                    @elseif ( isset($project_hosting) && !empty($project_hosting) )
                        {{ strcmp($project_hosting->need_us_to_register,'yes') ? "" : 'selected' }}
                    @endif
                    value="yes">    Yes                     </option>
                    <option
                    @if ( Request::old('need_us_to_register') )
                        {{ strcmp(Request::old('need_us_to_register'),'no') ? "" : 'selected' }}
                    @elseif ( isset($project_hosting) && !empty($project_hosting) )
                        {{ strcmp($project_hosting->need_us_to_register,'no') ? "" : 'selected' }}
                    @endif
                    value="no">   No                    </option>
                </select>
                <span style="color: red;">{{ $errors->first('need_us_to_register') }}</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <p>
                        Tell us the domain to be used / registered.
                    </p>
                </div>
            </div>                                
            <div class="col-sm-8 col-md-8 @if($errors->has('domain_to_be_used')) has-error has-feedback @endif">
                <input required value="@if(Request::old('domain_to_be_used')){{Request::old('domain_to_be_used')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->domain_to_be_used }}@endif" type="text" name="domain_to_be_used" class="form-control stk2" placeholder="company_name.xyz">
             <span style="color: red;">{{ $errors->first('domain_to_be_used') }}</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <p>
                        Do you have other domains to be redirected to this site?
                    </p>
                </div>
            </div>                                
            <div class="col-sm-8 col-md-8 @if($errors->has('domains_to_be_redirected')) has-error has-feedback @endif">
                <input required value="@if(Request::old('domains_to_be_redirected')){{Request::old('domains_to_be_redirected')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->domains_to_be_redirected }}@endif" type="text" name="domains_to_be_redirected" class="form-control stk2" placeholder="another_company_name.xyz">
                 <span style="color: red;">{{ $errors->first('domains_to_be_redirected') }}</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <p>
                        Do you have existing hosting or email accounts for your website?
                    </p>
                </div>
            </div>                                
            <div class="col-sm-3 col-md-2 @if($errors->has('existing_hosting_accounts')) has-error has-feedback @endif">
                <select name="existing_hosting_accounts" class="form-control select-styled stk2">
                    <option value=0>       Select                               </option>
                    <option
                    @if ( Request::old('existing_hosting_accounts') )
                        {{ strcmp(Request::old('existing_hosting_accounts'),'yes') ? "" : 'selected' }}
                    @elseif ( isset($project_hosting) && !empty($project_hosting) )
                        {{ strcmp($project_hosting->existing_hosting_accounts,'yes') ? "" : 'selected' }}
                    @endif
                    value="yes">    Yes                     </option>
                    <option
                    @if ( Request::old('existing_hosting_accounts') )
                        {{ strcmp(Request::old('existing_hosting_accounts'),'no') ? "" : 'selected' }}
                    @elseif ( isset($project_hosting) && !empty($project_hosting) )
                        {{ strcmp($project_hosting->existing_hosting_accounts,'no') ? "" : 'selected' }}
                    @endif
                    value="no">   No                    </option>
                </select>
                <span style="color: red;">{{ $errors->first('existing_hosting_accounts') }}</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <p>
                        Will you be using or switching to use our Hosting (usually included in the package – <strong>free</strong> for 1st year)?
                    </p>
                </div>
            </div>                                
            <div class="col-sm-3 col-md-2 @if($errors->has('willing_to_switching_to_our_hosting')) has-error has-feedback @endif">
                <select name="willing_to_switching_to_our_hosting" class="form-control select-styled stk2">
                    <option value=0>       Select                               </option>
                    <option
                    @if ( Request::old('willing_to_switching_to_our_hosting') )
                        {{ strcmp(Request::old('willing_to_switching_to_our_hosting'),'yes') ? "" : 'selected' }}
                    @elseif ( isset($project_hosting) && !empty($project_hosting) )
                        {{ strcmp($project_hosting->willing_to_switching_to_our_hosting,'yes') ? "" : 'selected' }}
                    @endif
                    value="yes">    Yes                     </option>
                    <option
                    @if ( Request::old('willing_to_switching_to_our_hosting') )
                        {{ strcmp(Request::old('willing_to_switching_to_our_hosting'),'no') ? "" : 'selected' }}
                    @elseif ( isset($project_hosting) && !empty($project_hosting) )
                        {{ strcmp($project_hosting->willing_to_switching_to_our_hosting,'no') ? "" : 'selected' }}
                    @endif
                    value="no">   No                    </option>
                </select>
                <span style="color: red;">{{ $errors->first('willing_to_switching_to_our_hosting') }}</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-4">
                <div class="label-grouped">
                    <p>
                       If you are using own hosting, please ensure it’s Linux or support PHP. Please provide your hosting details (FTP and cPanel) for us to verify.
                    </p>
                    
                </div>
            </div>                                
            <div class="col-sm-8 @if($errors->has('hosting_details')) has-error has-feedback @endif">
                <textarea required name="hosting_details" class="form-control stk2" placeholder="">@if(Request::old('hosting_details')){{Request::old('hosting_details')}}@elseif ( isset($project_hosting) && !empty($project_hosting) ){{ $project_hosting->hosting_details }}@endif</textarea>
                <span style="color: red;">{{ $errors->first('hosting_details') }}</span> 
            </div>
        </div>
    </div>
</div>