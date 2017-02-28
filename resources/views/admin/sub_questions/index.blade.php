@extends('layouts.app')

@section('content')
    <sub-questions-table
        survey-id="{{ $survey->id }}"
        group-id="{{ $group->id }}"
        question-id="{{ $question->id }}"
        store-sub-question-route="{{ route('admin.surveys.groups.questions.sub-questions.store', [
            $survey->id,
            $group->id,
            $question->id
        ]) }}"
        index-sub-question-route="{{ route('admin.surveys.groups.questions.sub-questions.index', [
            $survey->id,
            $group->id,
            $question->id
        ]) }}"
    >
    </sub-questions-table>
@endsection
