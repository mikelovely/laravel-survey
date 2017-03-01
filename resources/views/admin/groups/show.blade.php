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
                            'url' => false,
                        ],
                    ],
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="header-padding">{{ $group->title }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Details</h1>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group-padding" role="group">
                            <a class="btn btn-sm btn-info" href="{{ route('admin.surveys.groups.edit', [
                                $survey->id,
                                $group->id,
                            ]) }}">Edit</a>
                        </div>
                        <dl>
                            <dt>Title</dt>
                            <dd><div class="well well-sm">{{ $survey->title }}</div></dd>
                            <dt>Slug</dt>
                            <dd><div class="well well-sm">{{ $survey->slug }}</div></dd>
                            <dt>Description</dt>
                            <dd><div class="well well-sm">{{ $survey->description }}</div></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Questions</h1>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group btn-group-padding" role="group">
                            @can('create surveys')
                                <a class="btn btn-sm btn-info" href="{{ route('admin.surveys.groups.questions.create', [
                                    $survey->id,
                                    $group->id,
                                ]) }}">Create new question</a>
                            @endcan
                        </div>
                        @include('admin.questions._list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
