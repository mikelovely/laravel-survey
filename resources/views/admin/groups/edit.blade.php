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
                            'text' => 'Edit',
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit this group</h3>
            </div>
            <div class="panel-body">
                @include('admin.groups.form', [
                    'url' => route('admin.surveys.groups.update', [$survey->id, $group->id]),
                    'method' => 'patch',
                    'button' => 'Update',
                ])
            </div>
        </div>
    </div>
@endsection
