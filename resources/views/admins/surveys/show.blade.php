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
				    	<a class="btn btn-info" href="{{ route('surveys.edit', [$survey->id]) }}">Edit</a>
						@include('components.forms.delete_button', [
					        'route' => 'surveys.destroy',
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
		<div class="row">
		    <div class="col-md-12">
				@foreach ($groups as $group)
					<div class="panel panel-default">
					  	<div class="panel-heading clearfix">
					        <a class="btn btn-small btn-success" href="{{ route('surveys.groups.show', [$survey->id, $group->id]) }}">Show</a>
							<a class="btn btn-small btn-info" href="{{ route('surveys.groups.edit', [$survey->id, $group->id]) }}">Edit</a>
							@include('components.forms.delete_button', [
						        'route' => 'surveys.groups.destroy',
						        'params' => [
						        	$survey->id,
						        	$group->id,
						        ],
						    ])
					    </div>
					  	<div class="panel-body">
						    <h1>{{ $group->title }}</h1>
							<p>{{ $group->description }}</p>
							<p>{{ $group->slug }}</p>
							<a class="btn btn-small btn-info" href="{{ route('surveys.groups.questions.index', [$survey->id, $group->id]) }}">Manage</a>
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