@extends('layouts.app')

@section('title', 'OMDb Api')

@section('content')

<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">Search movie</h4>
                        <hr>

                        <div class="card-shadow">
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="md-3">
                                                <label>Title</label>
                                                <input type="text" wire:model="title" name="title" value="{{$title}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Type</label>
                                            <select name="type" wire:model="type" class="form-select" id="">
                                                <option value="movie" selected>movie</option>
                                                <option value="series">series</option>
                                                <option value="episode">episode</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-4">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($responseData != null)
        <div class="container" style="margin-bottom: 500px;">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">Movies</h4>
                        <hr>
                        <div class="row">
                        @if($responseData)
                            @forelse($responseData as $itemOne)
                                <div class="col-md-6">
                                    <div class="card-shadow">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="{{$itemOne['Poster']}}" alt=""/>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4>Title: {{$itemOne['Title']}}</h4>
                                                    <h4>Year: {{$itemOne['Year']}}</h4>
                                                    <h4>Type: {{$itemOne['Type']}}</h4>
                                                    <a href="{{url ('omdbapi/'.$itemOne['imdbID'])}}" data-bs-toggle="modal" data-bs-target="#sendModal" class="btn btn-primary">Send</a>
                                                    <a href="{{url('omdbapi/'.$itemOne['imdbID'])}}" class="btn btn-primary">Details</a>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                    <div class="modal fade" id="sendModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Send Movie</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                    <form action="{{ url('email-route/'.$itemOne['imdbID']) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="md-3">
                                                                        <label>Email To</label>
                                                                        <input type="text" name="receiverName" class="form-control" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="md-3">
                                                                        <label>Email Title</label>
                                                                        <input type="text" name="emailTitle" class="form-control" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="md-3">
                                                                        <label>Email Text</label>
                                                                        <textarea name="emailText" class="form-control" rows="4"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save Data</button>
                                                            </div>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <div>No Data</div>
                                    @endforelse
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4">
                                        {{ $pageNumber->links() }}
                                    </ul>
                                </nav>
                                @else
                            <div>{{$responseData['Error']}}</div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
@endsection
