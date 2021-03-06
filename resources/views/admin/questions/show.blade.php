@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('components._navigation', [
                    'data' => [
                        0 => [
                            'text' => 'Surveys',
                            'url' => route('admin.surveys.index'),
                        ],
                        1 => [
                            'text' => $survey->title,
                            'url' => route('admin.surveys.show', [
                                $survey->id,
                            ]),
                        ],
                        2 => [
                            'text' => $group->title,
                            'url' => route('admin.surveys.groups.show', [
                                $survey->id,
                                $group->id,
                            ]),
                        ],
                        3 => [
                            'text' => $question->title,
                            'url' => false,
                        ],
                    ],
                ])
            </div>
        </div>
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
                            'route' => 'admin.surveys.groups.questions.destroy',
                            'params' => [
                                $survey->id,
                                $group->id,
                                $question->id,
                            ],
                        ])
                    </div>
                    <div class="panel-body">
                        <p>{{ $question->description }}</p>
                        <p>{{ $question->type }}</p>

                        @if ($question->type == "array")
                            <a class="btn btn-small btn-info" href="{{ route('admin.surveys.groups.questions.answers.index', [
                                $survey->id,
                                $group->id,
                                $question->id,
                            ]) }}">Answer options</a>
                        @endif

                        @if ($question->type == "array")
                            <a class="btn btn-small btn-info" href="{{ route('admin.surveys.groups.questions.sub-questions.index', [
                                $survey->id,
                                $group->id,
                                $question->id,
                            ]) }}">Sub questions</a>
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
