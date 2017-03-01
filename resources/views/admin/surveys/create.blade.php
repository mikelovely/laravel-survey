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
                            'text' => 'Create',
                            'url' => false,
                        ],
                    ],
                ])
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create a new survey</h3>
            </div>
            <div class="panel-body">
                @include('admin.surveys.form', [
                    'url' => route('admin.surveys.store', [$survey->id]),
                    'method' => 'post',
                    'button' => 'Create',
                ])
            </div>
        </div>
    </div>
@endsection
