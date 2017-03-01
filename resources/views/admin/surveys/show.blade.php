@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-md-12">
				@include('components._navigation', [
		            'data' => [
		            	0 => [
		            		'text' => 'Surveys',
		            		'url' => route('admin.surveys.index'),
		            	],
		            	1 => [
		            		'text' => $survey->title,
		            		'url' => false,
		            	],
		            ],
		        ])
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-12">
		    	<h1 class="header-padding">{{ $survey->title }}</h1>
			</div>
		</div>
		<div class="row">
		    <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">Settings</h1>
					</div>
					<div class="panel-body">
						Activate | Delete Survey | Statistics
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		    <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">Text</h1>
					</div>
					<div class="panel-body">
						<div class="btn-group-padding" role="group">
							<a class="btn btn-sm btn-info" href="{{ route('admin.surveys.edit', [
	                            $survey->id,
	                        ]) }}">Edit</a>
	                    </div>
						<dl>
							<dt>Title</dt>
							<dd><div class="well well-sm">{{ $survey->title }}</div></dd>
							<dt>Slug</dt>
							<dd><div class="well well-sm">{{ $survey->slug }}</div></dd>
							<dt>Description</dt>
							<dd><div class="well well-sm">{{ $survey->description }}</div></dd>
							<dt>Welcome text</dt>
							<dd><div class="well well-sm">{{ $survey->welcome_text }}</div></dd>
							<dt>End text</dt>
							<dd><div class="well well-sm">{{ $survey->end_text }}</div></dd>
							<dt>End url</dt>
							<dd><div class="well well-sm">{{ $survey->end_url }}</div></dd>
							<dt>Admin name</dt>
							<dd><div class="well well-sm">{{ $survey->admin_name }}</div></dd>
							<dt>Admin email</dt>
							<dd><div class="well well-sm">{{ $survey->admin_email }}</div></dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
		    <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">Groups</h1>
					</div>
					<div class="panel-body">
						@include('admin.groups._list')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
