@extends('layouts.app')

@section('title', 'OMDb Api')

@section('content')

    <div>
        <livewire:omdbapi.index :responseData="$responseData" :pageNumber="$pageNumber" :title="$title" />
    </div>

@endsection
