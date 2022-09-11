@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.events.update", [$event->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.event.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($event) ? $event->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
                <label for="company">{{ trans('cruds.event.fields.company') }}*</label>
                <select name="company_id" id="company" class="form-control select2" required>
                    @foreach($companies as $id => $company)
                        <option value="{{ $id }}" {{ (isset($event) && $event->company ? $event->company->id : old('company_id')) == $id ? 'selected' : '' }}>{{ $company }}</option>
                    @endforeach
                </select>
                @if($errors->has('company_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('company_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
                <label for="short_description">{{ trans('cruds.event.fields.short_description') }}</label>
                <input type="text" id="short_description" name="short_description" class="form-control" value="{{ old('short_description', isset($event) ? $event->short_description : '') }}">
                @if($errors->has('short_description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('short_description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.short_description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('full_description') ? 'has-error' : '' }}">
                <label for="full_description">{{ trans('cruds.event.fields.full_description') }}</label>
                <textarea id="full_description" name="full_description" class="form-control ">{{ old('full_description', isset($event) ? $event->full_description : '') }}</textarea>
                @if($errors->has('full_description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('full_description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.full_description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('requirements') ? 'has-error' : '' }}">
                <label for="requirements">{{ trans('cruds.event.fields.requirements') }}</label>
                <textarea id="requirements" name="requirements" class="form-control ">{{ old('requirements', isset($event) ? $event->requirements : '') }}</textarea>
                @if($errors->has('requirements'))
                    <em class="invalid-feedback">
                        {{ $errors->first('requirements') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.requirements_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('event_nature') ? 'has-error' : '' }}">
                <label for="event_nature">{{ trans('cruds.event.fields.event_nature') }}</label>
                <input type="text" id="event_nature" name="event_nature" class="form-control" value="{{ old('event_nature', isset($event) ? $event->event_nature : '') }}">
                @if($errors->has('event_nature'))
                    <em class="invalid-feedback">
                        {{ $errors->first('event_nature') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.event_nature_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
                <label for="location">{{ trans('cruds.event.fields.location') }}*</label>
                <select name="location_id" id="location" class="form-control select2" required>
                    @foreach($locations as $id => $location)
                        <option value="{{ $id }}" {{ (isset($event) && $event->location ? $event->location->id : old('location_id')) == $id ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
                @if($errors->has('location_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('location_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.event.fields.address') }}</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($event) ? $event->address : '') }}">
                @if($errors->has('address'))
                    <em class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                <label for="categories">{{ trans('cruds.event.fields.categories') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="categories[]" id="categories" class="form-control select2" multiple="multiple">
                    @foreach($categories as $id => $categories)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || isset($event) && $event->categories->contains($id)) ? 'selected' : '' }}>{{ $categories }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <em class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.categories_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
                <label for="salary">{{ trans('cruds.event.fields.salary') }}*</label>
                <input type="text" id="salary" name="salary" class="form-control" value="{{ old('salary', isset($event) ? $event->salary : '') }}" required>
                @if($errors->has('salary'))
                    <em class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.salary_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('top_rated') ? 'has-error' : '' }}">
                <label for="top_rated">{{ trans('cruds.event.fields.top_rated') }}</label>
                <input name="top_rated" type="hidden" value="0">
                <input value="1" type="checkbox" id="top_rated" name="top_rated" {{ (isset($event) && $event->top_rated) || old('top_rated', 0) === 1 ? 'checked' : '' }}>
                @if($errors->has('top_rated'))
                    <em class="invalid-feedback">
                        {{ $errors->first('top_rated') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.top_rated_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection