@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>User Profile</h4>
                    <div class="underline md-4"></div>
                </div>

                <div class="col-md-10">

                    @if(session('message'))
                        <p class="alert alert-success">{{ session('message') }}</p>
                    @endif

                        @if($errors->any())
                            <div class="alert alert-warning">
                                @foreach($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif

                    <div class="card-shadow">
                        <div class="card-body">
                            <form action="{{ url('profile') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-3">
                                            <label>Username</label>
                                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" />
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                        <div class="md-3">
                                            <label>Email Address</label>
                                            <input type="text" readonly value="{{ Auth::user()->email }}" name="email" class="form-control" />
                                        </div>
                                        </div>
                                            <div class="col-md-12">
                                        <div class="md-3">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" rows="4">{{ Auth::user()->userDetail->address ?? "" }}</textarea>
                                        </div>
                                            </div>
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-primary">Save Data</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
