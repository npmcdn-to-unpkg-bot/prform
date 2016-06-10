{{-- Errors Showing - Start --}}
@if($errors->has())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red;">{{ $error }}</li>
        @endforeach
    </ul>
@endif
{{-- Errors Showing - END --}}

<form class="form-horizontal" method="POST" action="{{ url( Request::path() ) }}" enctype="multipart/form-data">{{-- POST to same URL --}}
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
    <div class="upload-req-panel wagon mt-40">
        <div class="wagon-header">
            <div class="row">
                <div class="col-sm-4">
                    <label class="label-styled">Project Type</label>
                    <select name="project_type_id" class="form-control select-styled stk2">
                       <option value="0">Please Select a Project Type</option>
                       @foreach ($project_types as $project_type)
                           <option
                                @if ( Request::old('project_type_id') )
                                    {{ strcmp(Request::old('project_type_id'),$project_type->id) ? "" : 'selected' }}
                                @else
                                    {{ strcmp($current_project->project_type_id,$project_type->id) ? "" : 'selected' }}
                                @endif
                               value="{{ $project_type->id }}">
                               {{ $project_type->name }}
                           </option>
                       @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <label class="label-styled">Platform</label>
                    <select name="platform_id" class="form-control select-styled stk2">
                        <option value=0>Please Select a Platform</option>
                        @foreach ($platforms as $platform)
                            <option
                                @if ( Request::old('platform_id') )
                                    {{ strcmp(Request::old('platform_id'),$platform->id) ? "" : 'selected' }}
                                @elseif ( $project_oppertunity )
                                    {{ strcmp($project_oppertunity->platform_id,$platform->id) ? "" : 'selected' }}
                                @endif
                                value="{{ $platform->id }}">
                                {{ $platform->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>  
        <div class="wagon-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="wagon-heading">
                        <h4 class="title">Ornare Malesuada</h4>
                        <p>
                            Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. 
                        </p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <ul class="upload-checkbox-list clearfix">
                        @foreach ($features as $feature)
                            <li>
                                <input name="feature_id[]"
                                    @if ( Request::old('feature_id') )
                                        @if ( in_array( $feature->id, Request::old('feature_id') ) )
                                            checked
                                        @endif
                                    @else
                                        @if ( in_array( $feature->id, $feature_project) )
                                            checked
                                        @endif
                                    @endif
                                value="{{ $feature->id }}" type="checkbox" class="check-styled">
                                <label class="label-check-styled">{{ $feature->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-xs-12">
                    <div class="other-note-holder mt-50">
                        <label>Other Notes:</label>
                        <textarea required name="notes" class="form-control">@if(Request::old('notes')){{Request::old('notes')}}@elseif ( $project_oppertunity ){{ $project_oppertunity->notes }}@endif</textarea>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <div class="text-center pt-60 pb-30">
        <button type="submit" class="btn btn-red btn-afix text-uppercase bold btn-lg">Save &amp; Update</button>
    </div>
</form>