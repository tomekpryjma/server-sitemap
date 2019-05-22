@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12 col-md-6">
        @include('common.errors')
    </div>
    <div class="w-100"></div>

    <!-- Create a new server form -->
    <div class="col-12 col-md-6">
        <div class="card add-new-server-card">
            <div class="card-body">
                <h3 class="mb-3">Add new server</h3>

                <form action="/servers/add" method="POST">
                    {{ csrf_field() }}
                    
                    <div class="form-row">
                        <div class="form-group col-12">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="name" class="control-label">Server</label>
                                    <input type="text" name="name" id="server-name" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="ip_address" class="control-label">Server IP</label>
                                    <input type="text" name="ip_address" id="server-ip" class="form-control">
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group col-12">
                            <button type="submit" class="action add">
                                <i data-feather="plus"></i>  Add Server
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Listing of all servers -->
        <div class="row mt-4">
            <div class="col-12">
                <h3 class="mb-3">Servers</h3>
                <div id="server-accordion" class="accordion-wrapper">
        
                    @if (count($servers) > 0)
        
                        @foreach ($servers as $key => $server)
        
                            <div class="card">
                                <div class="card-header p-4" id="server-heading-{{ $key }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#server-collapse-{{ $key }}" aria-expanded="{{ $key === 0 ? 'true' : 'false' }}" aria-controls="server-collapse-{{ $key }}">
                                            <span class="d-inline-block w-100">
                                                <strong>{{ $server->name }} - ({{ $server->ip_address }})</strong>
                                            </span>
                                        </button>
                                    </h5>
        
                                    <div class="nested-form">
                                        <button class="action delete" title="Delete server" data-target="#areYouSureModal" data-label="Server" data-toggle="modal" data-route="/servers/delete/" data-item-id="{{ $server->id }}">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                </div>
                        
                                <div id="server-collapse-{{ $key }}" class="collapse {{ $key === 0 ? 'show' : '' }}" aria-labelledby="server-heading-{{ $key }}" data-parent="#server-accordion">
                                    <div class="card-body">
                                        @include('sites-list')
                                    </div>
                                </div>
                            </div>
        
                        @endforeach
            
                    @else
                        <strong>No servers found.</strong>
                    @endif
                        
                </div>
        
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 offset-md-2">
        <div class="card add-new-site-card">
            <div class="card-body">
                @include('_form-site', ['servers' => $servers])
            </div>
        </div>
    </div>
</div>

@endsection