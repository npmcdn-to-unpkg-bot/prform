<div class="col-sm-4">
    <div class="padel">
        <div class="padel-header text-center">
            <h4 class="title">- CONTACT PERSON -</h4>
        </div>
        <div class="padel-body">
            <div class="form-group">
                <div class="col-sm-6">
                    <select name="contact_salutation" class="form-control select-styled stk2">
                        <option value=0>       Please Select Salutation </option>
                        <option
                        @if ( Request::old('contact_salutation') )
                            {{ strcmp(Request::old('contact_salutation'),'Mr.') ? "" : 'selected' }}
                        @elseif ( isset($current_project) && !empty($current_project) )
                            {{ strcmp($current_project->contact_salutation,'Mr.') ? "" : 'selected' }}
                        @endif
                        value="Mr.">    Mr.                     </option>
                        <option
                        @if ( Request::old('contact_salutation') )
                            {{ strcmp(Request::old('contact_salutation'),'Mrs.') ? "" : 'selected' }}
                        @elseif ( isset($current_project) && !empty($current_project) )
                            {{ strcmp($current_project->contact_salutation,'Mrs.') ? "" : 'selected' }}
                        @endif
                        value="Mrs.">   Mrs.                    </option>
                        <option
                        @if ( Request::old('contact_salutation') )
                            {{ strcmp(Request::old('contact_salutation'),'Miss') ? "" : 'selected' }}
                        @elseif ( isset($current_project) && !empty($current_project) )
                            {{ strcmp($current_project->contact_salutation,'Miss') ? "" : 'selected' }}
                        @endif
                        value="Miss">  Miss                    </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input required value="@if(Request::old('contact_first_name')){{Request::old('contact_first_name')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->contact_first_name }}@endif" name="contact_first_name" type="text" class="form-control stk2" placeholder="First Name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input required value="@if(Request::old('contact_last_name')){{Request::old('contact_last_name')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->contact_last_name }}@endif" name="contact_last_name" type="text" class="form-control stk2" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input required value="@if(Request::old('contact_telephone')){{Request::old('contact_telephone')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->contact_telephone }}@endif" name="contact_telephone" type="tel" class="form-control stk2" placeholder="Tel">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input required value="@if(Request::old('contact_mobile')){{Request::old('contact_mobile')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->contact_mobile }}@endif" name="contact_mobile" type="tel" class="form-control stk2" placeholder="Mobile">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input required value="@if(Request::old('contact_email')){{Request::old('contact_email')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->contact_email }}@endif" name="contact_email" type="email" class="form-control stk2" placeholder="Email">
                </div>
            </div>
        </div>
    </div>
</div>