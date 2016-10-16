@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $question->title }}</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        @include('components.forms.delete_button', [
                            'route' => 'groups.questions.destroy',
                            'params' => [
                                $group->id,
                                $question->id,
                            ],
                        ])
                    </div>
                    <div class="panel-body">
                        <p>{{ $question->description }}</p>
                        <p>{{ $question->type }}</p>
                        
                        @if ($question->type == "array")
                            <a class="btn btn-small btn-info" href="{{ route('questions.answers.index', [$question->id]) }}">Answer options</a>
                        @endif
                    </div>
                    <div class="panel-footer">
                        <span class="label label-success">Order: {{ $question->order }}</span>
                        <span class="label label-success">Mandatory: {{ $question->mandatory }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection