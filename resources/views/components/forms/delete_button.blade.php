<form action="{{ route($route, $params) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-sm btn-info">Delete</button>
</form>
