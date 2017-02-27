@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit this question</h3>
            </div>
            <div class="panel-body">
                @include('admin.questions.form', [
                    'url' => route('admin.surveys.groups.questions.update', [
                        $survey->id,
                        $group->id,
                        $question->id,
                    ]),
                    'method' => 'patch',
                    'button' => 'Update',
                ])
            </div>
        </div>
    </div>
@endsection
