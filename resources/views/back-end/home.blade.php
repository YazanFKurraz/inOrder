@extends('back-end.layouts.app')

@section('title')
    home
@endsection


@section('content')
     
@component('back-end.layouts.header',['nav_title' => 'home'])

@endcomponent

      @include('back-end.sections.statics')
      @include('back-end.sections.leatestComment')
      @include('back-end.sections.leatestUser')

@endsection