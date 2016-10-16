@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-md-12">
		  		<a class="btn btn-info" href="{{ route('surveys.groups.create', [$survey->id]) }}">Create new group</a>
		  	</div>
		</div>
		<hr>
		<div class="row">
		    <div class="col-md-12">
				@foreach ($groups as $group)
					<div class="panel panel-default">
					  	<div class="panel-heading clearfix">
					        <a class="btn btn-info" href="{{ route('surveys.groups.show', [$survey->id, $group->id,]) }}">Show</a>
					        <a class="btn btn-info" href="{{ route('surveys.groups.edit', [$survey->id, $group->id,]) }}">Edit</a>
							@include('components.forms.delete_button', [
	                            'route' => 'surveys.groups.destroy',
	                            'params' => [
	                                $survey->id,
	                                $group->id,
	                            ],
	                        ])
					    </div>
					  	<div class="panel-body">
						    <h2>{{ $group->title }}</h2>
	    					<p>{{ $group->description }}</p>
	    					<p>{{ $group->slug }}</p>
	    					<a class="btn btn-small btn-info" href="{{ route('groups.questions.index', [$group->id]) }}">Manage</a>
					  	</div>
					  	<div class="panel-footer">
					  		<span class="label label-success">Order: {{ $group->order }}</span>
					  	</div>
					</div>
			    @endforeach
	    	</div>
		</div>
    </div>
@endsection
