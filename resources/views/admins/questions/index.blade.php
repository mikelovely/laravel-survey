@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-md-12">
		  		<a class="btn btn-info" href="{{ route('surveys.groups.questions.create', [$survey->id, $group->id]) }}">Create new question</a>
		  	</div>
		</div>
		<hr>
		<div class="row">
		    <div class="col-md-12">
				@foreach ($questions as $question)
				    <div class="panel panel-default">
					  	<div class="panel-heading clearfix">
						    <a class="btn btn-info" href="{{ route('surveys.groups.questions.show', [$survey->id, $group->id, $question->id]) }}">Show</a>
        					<a class="btn btn-info" href="{{ route('surveys.groups.questions.edit', [$survey->id, $group->id, $question->id]) }}">Edit</a>
						    @include('components.forms.delete_button', [
	                            'route' => 'surveys.groups.questions.destroy',
	                            'params' => [
	                                $survey->id,
	                                $group->id,
	                                $question->id,
	                            ],
	                        ])
					    </div>
					  	<div class="panel-body">
						    <h2>{{ $question->title }}</h2>
	    					<p>{{ $question->description }}</p>
	    					<p>{{ $question->type }}</p>
					  	</div>
					  	<div class="panel-footer">
					  		<span class="label label-success">Order: {{ $question->order }}</span>
					  		<span class="label label-success">Mandatory: {{ $question->mandatory }}</span>
					  	</div>
					</div>
			    @endforeach
	    	</div>
		</div>
    </div>
@endsection