@extends('layouts.master')

@php
    $title = 'Manage Profiles';
    $pageTitle = 'Manage_Profiles';
@endphp

@section('content')

    {{-- Table --}}
    @include('manage-profiles.table')

    {{-- Separate modals --}}
    @include('manage-profiles.view-modal')
    @include('manage-profiles.edit-modal')
    @include('manage-profiles.delete-modal')

@endsection

@push('scripts')
    @include('manage-profiles.scripts')
@endpush
