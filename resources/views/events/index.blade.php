@extends('layouts.main')

@section('banner', $banner)

@section('content')
<div class="col-lg-8 post-list">
    @foreach($events as $event)
        <div class="single-post d-flex flex-row">
            <div class="thumb">
                @if($event->company->logo)
                    <img src="{{ $event->company->logo->getUrl() }}" alt="">
                @endif
            </div>
            <div class="details">
                <div class="title d-flex flex-row justify-content-between">
                    <div class="titles">
                        <a href="{{ route('event.show', $event->id) }}"><h4>{{ $event->title }}</h4></a>
                        <h6>{{ $event->company->name }}</h6>					
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
    @endforeach
    {{ $events->appends(request()->query())->links() }}
</div>	
@endsection