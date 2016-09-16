@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create a new survey</h3>
            </div>
            <div class="panel-body">
                @include('admins.surveys.form', [
                    'url' => route('surveys.create', [$survey->id]),
                    'method' => 'post',
                ])
            </div>
        </div>
    </div>
@endsection
