@extends('layouts.app')

@section('title', 'Viewing client: ' . $client->name)

@section('content')
    <h1 class="page-title h2">
        <strong>{{ $client->name }}</strong>'s details
    </h1>

    <div class="row mt-5">
        <div class="col-12 col-md-8">

            <ul class="list-group">
                <li class="list-group-item">
                    <strong>
                        Company name:
                    </strong>
                    {{ $client->name }}
                </li>

                
                <li class="list-group-item">
                    <strong>
                        Contacts:
                    </strong>
                    
                    @foreach (json_decode($client->contacts) as $contact)

                        <ul class="list-group mt-4">
                            
                            @foreach ($contact as $key => $value)
                                <li class="list-group-item">
                                    <strong>{{ $key }}</strong>
                                    {{ $value }}
                                </li>
                            @endforeach

                        </ul>

                    @endforeach

                </li>

                <li class="list-group-item">
                    <strong>
                        Website:
                    </strong>
                    <a href="//{{ $client->website }}" target="_blank" rel="noreferrer noopener" class="site-link d-inline-block">
                        {{ $client->website }}
                        <span class="d-inline-block link-icon">
                            <i data-feather="external-link"></i>
                        </span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
@endsection