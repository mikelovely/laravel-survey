@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $group->title }}</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        @include('components.forms.delete_button', [
                            'route' => 'surveys.groups.destroy',
                            'params' => [
                                $survey->id,
                                $group->id,
                            ],
                        ])
                    </div>
                    <div class="panel-body">
                        <p>{{ $group->description }}</p>
                        <p>{{ $group->slug }}</p>
                    </div>
                    <div class="panel-footer">
                        <span class="label label-success">Order: {{ $group->order }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($group->questions as $question)
                <p>{{ $question->title }}</p>
            @endforeach
        </div>
    </div>
@endsection
