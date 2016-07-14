@extends('layouts')
@section('title', 'All Posted Jobs')
@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">
            @include('helpers.displayMessage')
        </div>
        <div class="col-md-12">
            @foreach($jobs as $job)
            <div class="job-wrapper">
                <div class="entry-header">
                    <h2>{{ $job->title }}</h2>
                    <p class="lead">by <a href="mailto:{{ $job->user_email }}">{{ $job->user_email }}</a></p>
                </div>
                <div class="entry-content">
                    {{ $job->description }}
                </div>
                <div class="skills">
                    <h3>Skills</h3>
                    <?php $skills = json_decode($job->skills); ?>
                    @foreach($skills as $skill)
                        <span class="label label-primary">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
                <hr>
            @endforeach
            {!! $jobs->render() !!}
        </div>

    </div>
@stop