@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit this group</h3>
            </div>
            <div class="panel-body">
                @include('admins.surveys.groups.form', [
                    'url' => route('surveys.groups.update', [$survey->id, $group->id]),
                    'method' => 'patch',
                    'button' => 'Update',
                ])
            </div>
        </div>
    </div>
@endsection