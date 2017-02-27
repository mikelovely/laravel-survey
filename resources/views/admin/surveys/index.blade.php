@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-md-12">
		    	@can('create surveys')
		    		<a class="btn btn-info" href="{{ route('admin.surveys.create') }}">Create new survey</a>
		    	@endcan
		  	</div>
		</div>
		<hr>
		<div class="row">
		    <div class="col-md-12">
		    	@foreach ($surveys as $survey)
					<div class="panel panel-default">
					  	<div class="panel-heading clearfix">
					        <a class="btn btn-info" href="{{ route('admin.surveys.show', [$survey->id]) }}">Show</a>
					    	<a class="btn btn-info" href="{{ route('admin.surveys.edit', [$survey->id]) }}">Edit</a>
                            @include('components.forms.delete_button', [
						        'route' => 'admin.surveys.destroy',
						        'params' => [
						        	$survey->id,
						        ],
						    ])
					    </div>
					  	<div class="panel-body">
						    <h1>{{ $survey->title }}</h1>
					        <p>{{ $survey->description }}</p>
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
