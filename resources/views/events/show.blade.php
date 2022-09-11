@extends('layouts.main')

@section('banner', 'Event: '.$event->title)

@section('content')
<div class="col-lg-8 post-list">
    <div class="single-post d-flex flex-row">
        <div class="thumb">
            @if($event->company && $event->company->logo)
                <img src="{{ $event->company->logo->getUrl() }}" alt="{{ $event->company->name }}">
            @endif
        </div>
        <div class="details">
            <div class="title d-flex flex-row justify-content-between">
                <div class="titles">
                    <a href="#"><h4>{{ $event->title }}</h4></a>
                    @if($event->company)
                        <h6>{{ $event->company->name }}</h6>		
                    @endif			
                </div>
            </div>
            <p>
                {{ $event->short_description }}
            </p>
            <h5>event Nature: {{ $event->event_nature }}</h5>
            <p class="address"><span class="lnr lnr-map"></span> {{ $event->address }}</p>
            <p class="address"><span class="lnr lnr-database"></span> {{ $event->salary }}</p>
        </div>
    </div>	
    <div class="single-post event-details">
        <h4 class="single-title">Whom we are looking for</h4>
        <p>
            {{ $event->full_description }}
        </p>
    </div>
    <div class="single-post event-experience">
        <h4 class="single-title">Experience Requirements</h4>
        <p>
            {{ $event->requirements }}
        </p>
    </div>													
</div>
@endsection