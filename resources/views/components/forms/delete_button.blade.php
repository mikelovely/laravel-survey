<form action="{{ route($route, $params) }}" class="pull-right" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-info">Delete</button>
</form>