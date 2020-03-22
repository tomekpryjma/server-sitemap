<h3 class="mb-3">Add new site</h3>
<form action="{{ route('site.add') }}" method="POST" id="form-add-site">
    {{ csrf_field() }}
    <fieldset {{ count($servers) <= 0 ? 'disabled="disabled"' : '' }}>
        <div class="form-row">
            <div class="form-group col-12 mt-0 mb-0">
                <div class="form-row">
                    <div class="col-12">
                        <label for="client" class="control-label">Client <sup>The people we did the site for.</sup></label>

                        <select name="client_id" id="client-id" class="with-search">
                            <option value="" disabled selected>Select one of our clients</option>
                            
                            @if (count($clients) > 0)

                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->name }}
                                    </option>
                                @endforeach

                            @endif
                        </select>
                    </div>
                    <div class="col-12 mt-4 mb-0">
                        <label for="url" class="control-label">Site URL</label>
                        <input type="text" name="url" id="site-url" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 mt-4 mb-0">
                        <select name="server_id" id="server-id" class="with-search">
                            <option value="" disabled selected>Which server is this site on?</option>
                            
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
            </div>
    
            <div class="form-group col-12 mt-4 mb-0">
                <button type="submit" class="action add">
                    <i data-feather="plus"></i> Add Site
                </button>
            </div>
        </div>
    </fieldset>
</form>
