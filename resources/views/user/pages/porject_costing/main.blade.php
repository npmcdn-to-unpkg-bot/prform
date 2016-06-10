@extends('admin.master')

@section('title', 'Project Pricing And Costing')

@section('content')

    <section class="main-content pb-0">
        <section class="section section-page-xicon">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="page-xicon">
                            <img src="{{ URL::asset('images/icon/5-lg.png') }}" alt="icon">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <form class="form-horizontal" method="POST" action="{{ url( Request::path() ) }}">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">

            @include('admin.pages.porject_costing.pages')

            @include('admin.pages.porject_costing.cost')

        </form>
    </section>
@endsection