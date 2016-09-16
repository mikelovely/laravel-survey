@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit this survey</h3>
            </div>
            <div class="panel-body">
                @include('admins.surveys.form', [
                    'url' => route('surveys.update', [$survey->id]),
                    'method' => 'patch',
                ])
            </div>
        </div>
    </div>
@endsection
