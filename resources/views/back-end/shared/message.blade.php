@if ($errors->count() > 0)
<div class="alert alert-danger">

    <ul class="list-group">
        @foreach ($errors->all() as $error)
        <li class="list-grop-item">
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>

@endif