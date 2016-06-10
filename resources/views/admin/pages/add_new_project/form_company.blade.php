<div class="col-sm-4">
    <div class="padel padel-com-info">
        <div class="padel-header text-center">
            <h4 class="title">- Company Info -</h4>
        </div>
        <div class="padel-body">
            <div class="form-group">
                <div class="col-sm-12">
                    <input required @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif value="@if(Request::old('company_name')){{Request::old('company_name')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->company_name }}@endif" type="text" name="company_name" class="form-control stk2" placeholder="Company Name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <textarea required @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif name="company_address" class="form-control stk2" placeholder="Company Address">@if(Request::old('company_address')){{Request::old('company_address')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->company_address }}@endif</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input required @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif value="@if(Request::old('company_telephone')){{Request::old('company_telephone')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->company_telephone }}@endif" type="tel" name="company_telephone" class="form-control stk2" placeholder="Company Tel">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input required @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif value="@if(Request::old('company_fax')){{Request::old('company_fax')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->company_fax }}@endif" type="tel" name="company_fax" class="form-control stk2" placeholder="Company Fax">
                </div>
            </div>
        </div>
    </div>
</div>