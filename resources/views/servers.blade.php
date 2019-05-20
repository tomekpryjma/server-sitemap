@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12 col-md-6">
        @include('common.errors')
    </div>
    <div class="w-100"></div>

    <!-- Create a new server form -->
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">

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
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-plus"></i> Add Server
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                @include('_form-site', ['servers' => $servers])
            </div>
        </div>
    </div>
</div>




<!-- Listing of all servers -->
<div class="row mt-4">
    <div class="col-12 col-md-6">
        
        <div id="server-accordion">

            @if (count($servers) > 0)

                @foreach ($servers as $key => $server)

                    <div class="card">
                        <div class="card-header p-4" id="server-heading-{{ $key }}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#server-collapse-{{ $key }}" aria-expanded="{{ $key === 0 ? 'true' : 'false' }}" aria-controls="server-collapse-{{ $key }}">
                                    {{ $server->name }} - ({{ $server->ip_address }})
                                </button>
                            </h5>

                            <form action="/servers/delete/{{ $server->id }}" method="POST" class="nested-form">
                                {!! method_field('delete') !!}
                                {!! csrf_field() !!}
                                <button class="action delete" type="submit">
                                    <i data-feather="x"></i>
                                </button>
                            </form>
                        </div>
                
                        <div id="server-collapse-{{ $key }}" class="collapse {{ $key === 0 ? 'show' : '' }}" aria-labelledby="server-heading-{{ $key }}" data-parent="#server-accordion">
                            <div class="card-body">
    
                                @if (count($server->sites) > 0)
                                    <ul>
    
                                        @foreach ($server->sites as $site)
                                            <li>
                                                {{ $site->name }}

                                                <form action="/sites/delete/{{ $site->id }}" method="POST" class="nested-form">
                                                    {!! method_field('delete') !!}
                                                    {!! csrf_field() !!}
                                                    <button class="delete action" type="submit">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        @endforeach
    
                                    </ul>
                                @else
                                    <strong>
                                        As of yet, this server doesn't have any sites assigned to it.
                                    </strong>
                                @endif
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

@endsection