@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-md-12">
				@include('components._navigation', [
		            'data' => [
		            	0 => [
		            		'text' => 'Surveys',
		            		'url' => false,
		            	],
		            ],
		        ])
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">Surveys</h1>
					</div>
					<div class="panel-body">
						<div class="btn-group btn-group-padding" role="group">
					  		@can('create surveys')
					    		<a class="btn btn-sm btn-info" href="{{ route('admin.surveys.create') }}">Create new survey</a>
					    	@endcan
						</div>
						<div class="list-group">
				    		@foreach ($surveys as $survey)
								<a href="{{ route('admin.surveys.show', [$survey->id]) }}" class="list-group-item">
									<h2 class="list-group-item-heading h4">{{ $survey->title }}</h2>
									<p class="list-group-item-text">By {{ $survey->users->first()->name }}</p>

									@if ($survey->groups->count() > 0)
										<span class="label label-info">{{ $survey->groups->count() }} Groups</span>
									@else
		                            	<span class="label label-danger">No groups yet</span>
		                            @endif

		                            @if ($survey->questions->count() > 0)
										<span class="label label-info">{{ $survey->questions->count() }} Questions</span>
									@else
		                            	<span class="label label-danger">No groups yet</span>
		                            @endif

									@if ($survey->anonymized == true)
		                                <span class="label label-success">Anonymized</span>
		                            @else
		                            	<span class="label label-danger">Anonymized</span>
		                            @endif

		                            @if ($survey->allow_registration == true)
		                                <span class="label label-success">Allow registration</span>
		                            @else
		                            	<span class="label label-danger">Allow registration</span>
		                            @endif

		                            @if ($survey->active == true)
		                                <span class="label label-success">Active</span>
		                            @else
		                            	<span class="label label-danger">Active</span>
		                            @endif
								</a>
							@endforeach
						</div>
					</div>
				</div>
		  	</div>
		</div>
    </div>
@endsection
