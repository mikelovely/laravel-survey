<ul class="list-group">
    @foreach ($groups as $group)
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="list-group-item-heading h4">{{ $group->title }}</h2>
                    <p class="list-group-item-text">{{ $group->description }}</p>

                    @if ($group->questions->count() > 0)
                        <span class="label label-info">{{ $group->questions->count() }} Questions</span>
                    @else
                        <span class="label label-danger">No groups yet</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="btn-group-padding" role="group">
                        <a class="btn btn-sm btn-info" href="{{ route('admin.surveys.groups.edit', [
                            $survey->id,
                            $group->id,
                        ]) }}">Edit</a>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.surveys.groups.questions.index', [
                            $survey->id,
                            $group->id,
                        ]) }}">Questions</a>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.surveys.groups.show', [
                            $survey->id,
                            $group->id,
                        ]) }}">View</a>

                        @include('components.forms.delete_button', [
                            'route' => 'admin.surveys.groups.destroy',
                            'params' => [
                                $survey->id,
                                $group->id,
                            ],
                        ])
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
