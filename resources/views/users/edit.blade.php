@extends('layouts.app')
@section('title', 'user profile edit page')
@section('content')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header">
            <h4><i class="glyphicon glyphicon-edit">Edit profile</i></h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @include('shared._error')
                <div class="form-group">
                    <label for="name-field">User Name</label>
                    <input type="text" class="form-control" name="name" id="name-field" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group">
                    <label for="email-field">Email</label>
                    <input type="text" class="form-control" name="email" id="email-field" value="{{ old('email', $user->email) }}">
                </div>
                <div class="form-group">
                    <label for="introduction-field">Introduction</label>
                    <textarea class="form-control"
                    name="introduction" id="introduction-field" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <label class="avatar-label">Avatar</label>
                    <input type="file" name="avatar" class="form-control-file">
                    @if($user->avatar)
                        <br>
                        <img src="{{ $user->avatar }}" width="200" alt="" class="thumbnail img-responsive">
                    @endif
                </div>

                <div class="well well-sm">
                    <button class="btn btn-primary" type="submit">
                     Save
                    </button>
                </div>

            </form>
        </di>
    </div>
</div>
@stop
