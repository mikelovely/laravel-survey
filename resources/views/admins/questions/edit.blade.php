@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit this question</h3>
            </div>
            <div class="panel-body">
                @include('admins.questions.form', [
                    'url' => route('surveys.groups.questions.update', [$survey->id, $group->id, $question->id]),
                    'method' => 'patch',
                    'button' => 'Update',
                ])
            </div>
        </div>
    </div>
@endsection