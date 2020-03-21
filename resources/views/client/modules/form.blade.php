<h3 class="mb-3">Add new client</h3>
<form action="{{ route('client.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="name" class="control-label">Client</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="name" class="control-label">Website</label>
        <input type="url" name="website" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="action add">
            <i data-feather="plus"></i> Add Site
        </button>
    </div>

</form>