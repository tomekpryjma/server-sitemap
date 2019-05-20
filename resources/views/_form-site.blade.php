<form action="/sites/add" method="POST">
    {{ csrf_field() }}
    <fieldset {{ count($servers) <= 0 ? 'disabled="disabled"' : '' }}>
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
    
                    <select name="server_id" id="server-id">
    
                        <option value="">Select a server to assign this site to.</option>
                        
                        @if (count($servers) > 0)

                            @foreach ($servers as $server)
                                <option value="{{ $server->id }}">
                                    {{ $server->name }}
                                </option>
                            @endforeach

                        @endif
                    </select>
                </div>
            </div>
    
            <div class="form-group col-12">
                <button type="submit" class="btn btn-info">
                    <i data-feather="plus"></i> Add Site
                </button>
            </div>
        </div>
    </fieldset>
</form>
