@extends('layouts.app')

@section('title', 'Viewing client: ' . $client->name)

@section('content')
    <h1 class="page-title h2">
        <strong>{{ $client->name }}</strong>'s details
    </h1>

    <div class="row mt-5">
        <div class="col-12 col-md-8">

            <div class="card client">
                <div class="card-body">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>
                                Company name:
                            </strong>
                            {{ $client->name }}
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
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <section>
                <h3>Contacts within the client's company</h3>

                <hr>

                <div class="card-deck mt-5 flex-lg-wrap justify-content-md-between">

                @foreach (json_decode($client->contacts) as $contact)
        
                    <article class="card contact my-3">
                        <div class="card-body">

                            <div class="name-tag p-2 px-2 px-lg-4 text-center text-lg-left">
                                <h4 class="h6 font-weight-bold">{{ $contact->name }}</h4>
                            </div>

                            <ul class="list-group mt-3">

                                <li class="list-group-item">
                                    <span class="font-weight-bold text-capitalise">Email</span>
                                    <a href="mailto:{{ $contact->email }}" class="d-block">{{ $contact->email }}</a>
                                </li>

                                <li class="list-group-item">
                                    <span class="font-weight-bold text-capitalise">Phone</span>
                                    <a href="tel:{{ $contact->phone }}" class="d-block">{{ $contact->phone }}</a>
                                </li>

                            </ul>
                        </div>
                    </article>
                        
                @endforeach
                    
                </div>
            </section>
        </div>
    </div>
@endsection