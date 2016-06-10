<div class="form-group">
    <div class="col-sm-12">
        <label class="label-styled">Project Title</label>
        <input required @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif value="@if(Request::old('project_title')){{Request::old('project_title')}}
        @elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->project_title }} @endif" type="text" name="project_title" class="form-control stk2">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <label class="label-styled">Proposal Number</label>
        <input required @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif value="@if(Request::old('proposal_no')){{Request::old('proposal_no')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->proposal_no }}@endif" type="text" name="proposal_no" class="form-control stk2">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <label class="label-styled">PROJECT TYPE</label>
        <select required name="project_type_id" @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif class="form-control select-styled stk2">
            <option value=0>Please Select a Project Type</option>
            @foreach ($project_types as $project_type)
                <option
                    @if ( Request::old('project_type_id') )
                        {{ strcmp(Request::old('project_type_id'),$project_type->id) ? "  " : 'selected' }}
                    @elseif ( isset($current_project) && !empty($current_project) )
                        {{ strcmp($current_project->project_type_id,$project_type->id) ? "" : 'selected' }}
                    @endif
                    value="{{ $project_type->id }}">
                    {{ $project_type->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <label class="label-styled">Date</label>
        <input required @if(isset($current_project) && !empty($current_project) ) disabled="disabled" @endif value="@if(Request::old('date')){{Request::old('date')}}@elseif ( isset($current_project) && !empty($current_project) ){{ $current_project->date }}@endif" name="date" type="text" class="form-control date-field stk2">
    </div>
</div>