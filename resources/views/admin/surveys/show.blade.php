@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-md-12">
		  		<h1>{{ $survey->title }}</h1>
		  	</div>
		</div>
		<hr>
		<div class="row">
		    <div class="col-md-12">
		    	<div class="panel panel-default">
				  	<div class="panel-heading clearfix">
				    	<a class="btn btn-info" href="{{ route('admin.surveys.edit', [$survey->id]) }}">Edit</a>
						@include('components.forms.delete_button', [
					        'route' => 'admin.surveys.destroy',
					        'params' => [
					        	$survey->id,
					        ],
					    ])
				    </div>
				    <div class="panel-body">
		    			<h2>{{ $survey->slug }}</h2>
					    <p>{{ $survey->description }}</p>
					    <p>{{ $survey->welcome_text }}</p>
		  			</div>
			  	</div>
			</div>
		</div>
		<div class="row">
		    <div class="col-md-12">
		        <h2>Groups for this survey</h2>
		    </div>
		</div>
		<hr>
		@include('admin.groups._list')
	</div>
@endsection
