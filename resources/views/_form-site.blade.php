<form action="/sites/add" method="POST">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-12">
            <div class="form-row">
                <div class="col-md-8">
                    <label for="name" class="control-label">Site name</label>
                    <input type="text" name="name" id="site-name" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="url" class="control-label">Site URL</label>
                    <input type="text" name="url" id="site-url" class="form-control">
                </div>

                <input type="text" name="server_id" value="{{ $serverId }}" hidden>
            </div>
        </div>

        <div class="form-group col-12">
            <button type="submit" class="btn btn-info">
                <i class="fa fa-plus"></i> Add Site
            </button>
        </div>
    </div>
</form>
