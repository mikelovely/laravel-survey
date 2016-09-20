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
		    <div class="col-md-12 todo-list">
		    	<p v-if="!items.length">No items</p>
		    	<table class="table" v-if="items.length">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Text</th>
                            <th>Order</th>
                            <th>Visable</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
		                <tr v-for="item in items">
		                	<td>@{{ item.code }}</td>
		                	<td>@{{ item.answer_text }}</td>
		                	<td>@{{ item.order }}</td>
		                	<td>@{{ item.visable }}</td>
		                	<td><a href="#" v-on:click="removeItem(item)">Remove</a></td>
		                </tr>
		                <tr>
		                	<td><input type="text" v-model="code"></td>
		                	<td><input type="text" v-model="item"></td>
		                	<td></td>
		                	<td></td>
			    			<td><input type="submit" value="Add item" v-on:click="addItem({{ $survey->id }}, {{ $group->id }}, {{ $question->id }})"></td>
		                </tr>
                    </tbody>
                </table>
	    	</div>
		</div>
    </div>
@endsection
