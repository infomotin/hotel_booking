@extends('frontend.main_master')
@section('main')


<!-- Banner Area -->
@include('frontend.body.components.banner')
<!-- Banner Area End -->

<!-- Banner Form Area -->
@include('frontend.body.components.banner_form')
<!-- Banner Form Area End -->

<!-- Room Area -->
@include('frontend.body.components.roomone')
<!-- Room Area End -->

<!-- Book Area Two-->
@include('frontend.body.components.roomtwo')
<!-- Book Area Two End -->

<!-- Services Area Three -->
@include('frontend.body.components.roomthree')
<!-- Services Area Three End -->

<!-- Team Area Three -->
@include('frontend.body.components.team')
<!-- Team Area Three End -->

<!-- Testimonials Area Three -->
@include('frontend.body.components.testimonials')
<!-- Testimonials Area Three End -->

<!-- FAQ Area -->
@include('frontend.body.components.faq')
<!-- FAQ Area End -->

<!-- Blog Area -->
@include('frontend.body.components.blog')
<!-- Blog Area End -->

@endsection
