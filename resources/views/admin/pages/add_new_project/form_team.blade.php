<ul class="list-unstyled inline-form-field clearfix">
    <li>
        <label class="label-styled">SALES PERSON</label>
        <select name="sales_person_id" @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif class="form-control select-styled stk2">
            <option value=0>Please Select a Sales Person</option>
            @foreach ($users as $user)
                <option
                @if ( Request::old('sales_person_id') )
                    {{ strcmp(Request::old('sales_person_id'),$user->id) ? "" : 'selected' }}
                @elseif ( isset($current_project) && !empty($current_project) )
                    {{ strcmp($current_project->sales_person_id,$user->id) ? "" : 'selected' }}
                @endif
                value="{{ $user->id }}">{{ $user->full_name }}</option>
            @endforeach
        </select>
    </li>
    <li>
        <label class="label-styled">PROJECT MANAGER</label>
        <select name="project_manager_id" @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif class="form-control select-styled stk2">
            <option value=0>Please Select a Manager</option>
            @foreach ($users as $user)
                <option
                @if ( Request::old('project_manager_id') )
                    {{ strcmp(Request::old('project_manager_id'),$user->id) ? "" : 'selected' }}
                @elseif ( isset($current_project) && !empty($current_project) )
                    {{ strcmp($current_project->project_manager_id,$user->id) ? "" : 'selected' }}
                @endif
                value="{{ $user->id }}">{{ $user->full_name }}</option>
            @endforeach
        </select>
    </li>
    <li>
        <label class="label-styled">DESIGNER</label>
        <select name="designer_id" @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif class="form-control select-styled stk2">
            <option value=0>Please Select a Designer</option>
            @foreach ($users as $user)
                <option
                @if ( Request::old('designer_id') )
                    {{ strcmp(Request::old('designer_id'),$user->id) ? "" : 'selected' }}
                @elseif ( isset($current_project) && !empty($current_project) )
                    {{ strcmp($current_project->designer_id,$user->id) ? "" : 'selected' }}
                @endif
                value="{{ $user->id }}">{{ $user->full_name }}</option>
            @endforeach
        </select>
    </li>
    <li>
        <label class="label-styled">TECH SUPPORT</label>
        <select name="tech_support_id" @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif class="form-control select-styled stk2">
            <option value=0>Please Select a Tech Support</option>
            @foreach ($users as $user)
                <option
                @if ( Request::old('tech_support_id') )
                    {{ strcmp(Request::old('tech_support_id'),$user->id) ? "" : 'selected' }}
                @elseif ( isset($current_project) && !empty($current_project) )
                    {{ strcmp($current_project->tech_support_id,$user->id) ? "" : 'selected' }}
                @endif
                value="{{ $user->id }}">{{ $user->full_name }}</option>
            @endforeach
        </select>
    </li>
    <li>
        <label class="label-styled">DEVELOPING TEAM</label>
        <select id="developing_team_id" @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif class="form-control select-styled stk2">
            <option>Please Select a Developing Team For Recommandation</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->full_name }}</option>
            @endforeach
        </select>
    </li>
</ul>