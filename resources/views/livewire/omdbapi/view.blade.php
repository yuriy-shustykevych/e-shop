<div>
    <div>
        <div class="py-3 py-md-5">
            @if($responseData)
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mt-3">
                        <div class="bg-white border">
                            @if($responseData['Poster'])
                                <img src="{{$responseData['Poster']}}" class="w-100" alt="Img">
                            @else
                                No Image Added
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7 mt-3">
                        <div class="product-view">
                            <h4 class="product-name">
                                {{$responseData['Title']}}
                                <a href="{{ url('omdbapi') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                            </h4>
                            <hr>
                            <div class="mt-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td><span class="fw-bold">Genre: </span></td>
                                                <td>{{ $responseData['Genre'] }}</td>
                                            </tr>
                                        <tr>
                                            <td><span class="fw-bold">Year: </span></td>
                                                <td>{{ $responseData['Year'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Director: </span></td>
                                                <td>{{ $responseData['Director'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Writer: </span></td>
                                                <td>{{ $responseData['Writer'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Actors: </span></td>
                                                <td>{{ $responseData['Actors'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Released: </span></td>
                                                <td>{{ $responseData['Released'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Runtime: </span></td>
                                                <td>{{ $responseData['Runtime'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Country: </span></td>
                                                <td>{{ $responseData['Country'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Rated: </span></td>
                                                <td>{{ $responseData['Rated'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">imdbRating: </span></td>
                                                <td>{{ $responseData['imdbRating'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Released: </span></td>
                                                <td>{{ $responseData['Released'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="fw-bold">Runtime: </span></td>
                                                <td>{{ $responseData['Runtime'] }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4>Description</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    {!! $responseData['Plot'] !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="bg-white">
                                <h4>No Film with this ID <a href="{{url('omdbapi')}}" class="btn btn-danger btn-sm text-white float-end">BACK</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
