@extends('layouts.app')

@section('content')
    <answers-table
        question-id="{{ $question->id }}"
        store-answer-route="{{ route('questions.answers.store', [$question->id]) }}"
        index-answer-route="{{ route('questions.answers.index', [$question->id]) }}"
    >
    </answers-table>
@endsection
