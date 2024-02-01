@extends('layouts.app')

@section('title', 'Movie Details')

@section('content')

    <div>
        <livewire:omdbapi.view :responseData="$responseData" :movieId="$movieId" />
    </div>

@endsection
