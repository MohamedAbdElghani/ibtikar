@extends('layouts.app')

@section('content')
@include('home.after_squad')
{{-- @if($old_squad && $old_squad->calendly)
    @include('home.after_squad', ['old_squad' => $old_squad])
@else
    @include('home.before_squad')
@endif --}}

@endsection