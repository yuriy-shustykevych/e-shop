@extends('layouts.admin ')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">

            @if(session('message'))
                <h2 class="alert alert-success">{{session('message')}}</h2>
            @endif

            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Dashboard</h2>
                        <p class="md-mb-0">Your analytics dashboard panel.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                    <a class="text-primary mb-0 hover-cursor" href="{{url('admin/category')}}">Categories</a>
                </div>
            </div>
        </div>
    </div>

@endsection
