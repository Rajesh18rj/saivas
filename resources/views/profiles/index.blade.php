@extends('layouts.master')

@php
    $title = 'Profiles';
    $pageTitle = 'Profiles';
@endphp

@section('content')
    <div class="space-y-6">

        {{-- Filters --}}
        @include('profiles.filters')

        {{-- Table --}}
        @include('profiles.table')
    </div>

    {{-- Gender Selection Modal --}}
    @if (!request()->filled('gender_id'))
        @include('profiles.gender-modal')
    @endif
@endsection
