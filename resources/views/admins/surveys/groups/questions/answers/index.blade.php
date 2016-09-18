@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-md-12">
		  		<a class="btn btn-info" href="{{ route('surveys.groups.questions.answers.create', [$survey->id, $group->id, $question->id]) }}">Create new answer</a>
		  	</div>
		</div>
		<hr>
		<div class="row">
		    <div class="col-md-12">
		    	<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Code</th>
							<th>Text</th>
							<th>Order</th>
							<th>Visable</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($answers as $answer)
							<tr>
		    					<td>{{ $answer->value }}</td>
		    					<td>{{ $answer->code }}</td>
							    <td>{{ $answer->answer_text }}</td>
		    					<td>{{ $answer->order }}</td>
		    					<td>{{ $answer->visable }}</td>
						    	<td>
							    	@include('components.forms.delete_button', [
			                            'route' => 'surveys.groups.questions.answers.destroy',
			                            'params' => [
			                                $survey->id,
			                                $group->id,
			                                $question->id,
			                                $answer->id,
			                            ],
			                        ])
								</td>
	    					</tr>
					    @endforeach
					</tbody>
				</table>


				<div class="todo-list">
		            <p v-if="!items.length">No items</p>
		            <ul v-if="items.length">
		                <li v-for="item in items">@{{ item.answer_text }} - <a href="#" v-on:click="removeItem(item)">Remove</a></li>
		            </ul>
		            <input type="text" v-model="item">
		            <input type="submit" value="Add item" v-on:click="addItem">
		        </div>


	    	</div>
		</div>
    </div>
@endsection
