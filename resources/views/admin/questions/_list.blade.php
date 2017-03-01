<ul class="list-group">
    @foreach ($questions as $question)
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="list-group-item-heading h4">{{ $question->title }}</h2>
                    <p class="list-group-item-text">{{ $question->description }}</p>
                    <p class="list-group-item-text">{{ $question->type }}</p>
                    <span class="label label-success">Order: {{ $question->order }}</span>
                    <span class="label label-success">Mandatory: {{ $question->mandatory }}</span>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.surveys.groups.questions.show', [
                        $survey->id,
                        $group->id,
                        $question->id
                    ]) }}">Show</a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.surveys.groups.questions.edit', [
                        $survey->id,
                        $group->id,
                        $question->id
                    ]) }}">Edit</a>
                    @if ($question->type == "array")
                        <a class="btn btn-small btn-info" href="{{ route('admin.surveys.groups.questions.answers.index', [
                            $survey->id,
                            $group->id,
                            $question->id,
                        ]) }}">Answer options</a>
                    @endif
                    @if ($question->type == "array")
                        <a class="btn btn-small btn-info" href="{{ route('admin.surveys.groups.questions.sub-questions.index', [
                            $survey->id,
                            $group->id,
                            $question->id,
                        ]) }}">Sub questions</a>
                    @endif
                    @include('components.forms.delete_button', [
                        'route' => 'admin.surveys.groups.questions.destroy',
                        'params' => [
                            $survey->id,
                            $group->id,
                            $question->id,
                        ],
                    ])
                </div>
            </div>
        </li>
    @endforeach
</ul>
