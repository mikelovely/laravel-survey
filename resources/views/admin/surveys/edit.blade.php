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
                            'text' => 'Edit',
                            'url' => false,
                        ],
                    ],
                ])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="header-padding">{{ $survey->title }}</h1>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit this survey</h3>
            </div>
            <div class="panel-body">
                @include('admin.surveys.form', [
                    'url' => route('admin.surveys.update', [$survey->id]),
                    'method' => 'patch',
                    'button' => 'Update',
                ])
            </div>
        </div>
    </div>
@endsection
