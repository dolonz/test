<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\Location;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('company')
            ->paginate(7);

        $banner = 'Events';

        return view('events.index', compact(['events', 'banner']));
    }

    public function show(Event $event)
    {
        $event->load('company');

        return view('events.show', compact('event'));
    }
}
