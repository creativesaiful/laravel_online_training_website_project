@extends('layout.app')
@section('title', 'Home')
@section('content')

@include('component.HomeBanner')
@include('component.HomeService')

@include('component.HomeCourses')

@include('component.HomeProject')


@include('component.HomeContact')





@endsection
