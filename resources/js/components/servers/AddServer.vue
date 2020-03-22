<template>
    <div class="card add-new-server-card">
        <div class="card-body">
            <h3 class="mb-3">Add new server</h3>

            <form :action="this.routeAdd" method="POST">
                <input type="hidden" name="_token" :value="this.csrfToken">
                
                <div class="form-row">
                    <div class="form-group col-12">
                        <div class="form-row">
                            <div class="col-md-8">
                                <label for="name" class="control-label">Server</label>
                                <input type="text" name="name" id="server-name" class="form-control" placeholder="Server name">
                            </div>
                            <div class="col-md-4">
                                <label for="ip_address" class="control-label">Server IP</label>
                                <input type="text" name="ip_address" id="server-ip" class="form-control" placeholder="127.0.0.1">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <select name="server-type" id="server-type" class="no-search">
                            <option value="" disabled selected>Server type</option>
                            <option value="development">Development</option>
                            <option value="dirty">Dirty</option>
                            <option value="production">Production</option>
                        </select>
                    </div>
                    <div class="form-group col-12 mt-3">
                        <button type="submit" class="action add">
                            <i data-feather="plus"></i>  Add Server
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['routeAdd', 'csrfToken']
    }
</script>