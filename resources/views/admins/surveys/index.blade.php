@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-md-12">
		  		<a class="btn btn-info" href="{{ route('surveys.create') }}">Create new survey</a>
		  	</div>
		</div>
		<hr>
		<div class="row">
		    <div class="col-md-12">
		    	@foreach ($surveys as $survey)
					<div class="panel panel-default">
					  	<div class="panel-heading clearfix">
					        <a class="btn btn-info" href="{{ route('surveys.show', [$survey->id]) }}">Show</a>
					    	<a class="btn btn-info" href="{{ route('surveys.edit', [$survey->id]) }}">Edit</a>
                            @include('components.forms.delete_button', [
						        'route' => 'surveys.destroy',
						        'params' => [
						        	$survey->id,
						        ],
						    ])
					    </div>
					  	<div class="panel-body">
						    <h1>{{ $survey->title }}</h1>
					        <p>{{ $survey->description }}</p>
					        <a class="btn btn-small btn-info" href="{{ route('surveys.groups.index', [$survey->id]) }}">Manage</a>
					  	</div>
					  	<div class="panel-footer">
					  		@if ($survey->anonymized == true)
					  			<span class="label label-success">Anonymized</span>
					  		@endif
					  		@if ($survey->allow_registration == true)
					  			<span class="label label-success">Allow registration</span>
					  		@endif
						    @if ($survey->active == true)
						    	<span class="label label-success">Active</span>
						    @endif
					  	</div>
					</div>
				@endforeach
	    	</div>
		</div>
    </div>
@endsection
