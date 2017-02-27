<div class="row">
    <div class="col-md-12">
        <a class="btn btn-info" href="{{ route('admin.surveys.groups.create', [
            $survey->id,
        ]) }}">Create new group</a>
    </div>
</div>
<hr>
<div class="row">
    @foreach ($groups as $group)
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <a class="btn btn-small btn-success" href="{{ route('admin.surveys.groups.show', [
                        $survey->id,
                        $group->id,
                    ]) }}">Show</a>
                    <a class="btn btn-small btn-info" href="{{ route('admin.surveys.groups.edit', [
                        $survey->id,
                        $group->id,
                    ]) }}">Edit</a>
                    @include('components.forms.delete_button', [
                        'route' => 'admin.surveys.groups.destroy',
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
                </div>
                <div class="panel-footer">
                    <span class="label label-success">Order: {{ $group->order }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
