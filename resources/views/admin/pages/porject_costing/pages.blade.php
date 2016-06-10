<section class="section section-project">
    <div class="container">
        <div class="form-group mb-30">
            <div class="col-sm-4">
                <label class="uppercase bold">PROJECT PLATFORM</label>
                <div class="like-input">
                   @if(isset($project_type)) {{$project_type->name}} @endif                   
                </div>
            </div>
            <div class="col-sm-4">
                <label class="uppercase bold">DEVELOPING TEAM</label>
                <div class="like-input">
                    Greenweb
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-7">
                <label class="uppercase bold">unique pages required</label>&nbsp;&nbsp;
                <span class="like-input uni-page-count">
                   @if(isset($project_pages)) {{sizeof($project_pages)}} @endif
                </span>
            </div>
        </div>

        <div class="pdetail-box pricing-pdetail-box">
            <table class="table">
                <thead>
                    <tr>
                        <th>PAGE #</th>
                        <th>PAGE Name</th>
                        <th>PAGE FEATURE / Requirements</th>
                        <th>Extra Notes</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $i=1;?>
                 @if(isset($project_pages))
                  @foreach($project_pages as $pages)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                            <div class="like-input">
                               {{$pages->page_name}}
                            </div>
                        </td>
                        <td>
                            <div class="like-input">{{$pages->page_requirements}}</div>
                        </td>
                        <td>
                            <div class="like-input">{{$pages->extra_notes}}</div>
                        </td>
                    </tr>
                    @endforeach
                  @endif  
                    <!-- <tr>
                        <td>2</td>
                        <td>
                            <div class="like-input">About us</div>
                        </td>
                        <td>
                            <div class="like-input">Cursus Vehicula Magna</div>
                        </td>
                        <td>
                            <div class="like-input">Dapibus Vehicula Amet</div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <div class="like-input">Service</div>
                        </td>
                        <td>
                            <div class="like-input">Cursus Vehicula Magna</div>
                        </td>
                        <td>
                            <div class="like-input">Dapibus Vehicula Amet</div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <div class="like-input">Gallery</div>
                        </td>
                        <td>
                            <div class="like-input">Cursus Vehicula Magna</div>
                        </td>
                        <td>
                            <div class="like-input">Dapibus Vehicula Amet</div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <div class="like-input">Contact</div>
                        </td>
                        <td>
                            <div class="like-input">Cursus Vehicula Magna</div>
                        </td>
                        <td>
                            <div class="like-input">Dapibus Vehicula Amet</div>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</section>