@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-md-12 todo-list">
		    	<p v-if="!items.length">No items yet.</p>
		    	<table class="table">
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
		                	<td><a href="#" class="btn btn-danger" v-on:click="removeItem(item)">Remove</a></td>
		                </tr>
		                <tr>
		                	<td><input class="form-control" type="text" v-model="code"></td>
                            <td><input class="form-control" type="text" v-model="answer_text"></td>
                            <td><input class="form-control" type="text" v-model="order"></td>
		                	<td><input class="form-control" type="text" v-model="visable"></td>
			    			<td>
                                <input class="btn btn-success" type="submit" value="Add item" v-on:click="addItem(
                                    {{ $survey->id }},
                                    {{ $group->id }},
                                    {{ $question->id }}
                                )">
                            </td>
		                </tr>
                    </tbody>
                </table>
	    	</div>
		</div>
    </div>
@endsection
