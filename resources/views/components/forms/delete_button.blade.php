<form action="{{ route($route, $params) }}" class="pull-right" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-info">Delete</button>
</form>