@extends('layouts.app')
@section('title', 'User show page')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="card">
                <img src="{{ $user->avatar }}" alt="" class="card-img-top">
                <div class="card-body">
                    <h5><strong>
                        Profile
                    </strong></h5>
                    <p>
                        {{ $user->introduction }}
                    </p>
                    <h5><strong>
                        Created at
                    </strong></h5>
                    <p>{{ $user->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-0">
                        {{ $user->name }} <small> {{ $user->email }}</small>
                    </h1>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    messages posted by {{ $user->name }}
                </div>
            </div>
        </div>
    </div>
@stop
