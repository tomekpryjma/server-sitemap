@extends('layouts.app')

@section('title', 'Clients')

@section('content')

<div class="row">
    <div class="col-12 col-md-8">

        <div class="table-responsive">
            <table class="table table-hover table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    
                @foreach ($clients as $client)
                    
                    <tr>
                        <th scope="row">{{ $client->id }}</th>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->website }}</td>
                        <td>
                            <a href="{{ route('client.show', ['id' => $client->id]) }}" title="View this client's details" class="action">
                                <i data-feather="eye"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection