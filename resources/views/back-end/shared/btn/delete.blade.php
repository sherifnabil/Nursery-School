
<form action="{{ url('students/' . $id ) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" rel="tooltip" class="btn btn-danger btn-sm">

        <i class="fa fa-trash"></i>
    </button>
</form>