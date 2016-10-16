@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create a new question</h3>
            </div>
            <div class="panel-body">
                @include('admins.questions.form', [
                    'url' => route('groups.questions.store', [
                        $group->id,
                        $question->id,
                    ]),
                    'method' => 'post',
                    'button' => 'Create',
                ])
            </div>
        </div>
    </div>
@endsection
