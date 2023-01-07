<form action="{{route('store_admin.logout')}}" method="post">
    @csrf
    <button type="submit" class="btn-sm btn-primary">Logout</button>
</form>