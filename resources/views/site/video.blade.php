@extends('site.include.layout')
@section('content')

  <iframe src="{{asset('storage/'.$video->videourl)}}?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1" width="700" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

  
  @endsection

