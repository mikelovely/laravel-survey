@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create a new group</h3>
            </div>
            <div class="panel-body">
                @include('admins.groups.form', [
                    'url' => route('surveys.groups.store', [$survey->id, $group->id]),
                    'method' => 'post',
                    'button' => 'Create',
                ])
            </div>
        </div>
    </div>
@endsection
