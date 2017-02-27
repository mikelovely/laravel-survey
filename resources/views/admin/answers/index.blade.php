@extends('layouts.app')

@section('content')
    <answers-table
        survey-id="{{ $survey->id }}"
        group-id="{{ $group->id }}"
        question-id="{{ $question->id }}"
        store-answer-route="{{ route('admin.surveys.groups.questions.answers.store', [$survey->id, $group->id, $question->id]) }}"
        index-answer-route="{{ route('admin.surveys.groups.questions.answers.index', [$survey->id, $group->id, $question->id]) }}"
    >
    </answers-table>
@endsection
