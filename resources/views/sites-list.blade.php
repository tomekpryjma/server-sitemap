@if (count($server->sites) > 0)

<div id="site-accordion-{{ $key }}" class="accordion-wrapper">

    @foreach ($server->sites as $siteKey => $site)

    <div class="card site-card">
        <div class="card-header p-4" id="site-heading-{{ $siteKey }}">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#site-collapse-{{ $key . '-' . $siteKey }}" aria-expanded="false" aria-controls="site-collapse-{{ $key.  '-' . $siteKey }}">

                    <a href="http://{{ $site->url }}" target="_blank" rel="noreferrer noopener" class="site-link d-inline-block" title="View this site">
                        {{ $site->url }}
                        <span class="d-inline-block link-icon">
                            <i data-feather="external-link"></i>
                        </span>
                    </a>
                </button>
            </h5>

            <div class="nested-form">
                <button class="delete action" data-target="#areYouSureModal" title="Delete site" data-toggle="modal" data-route="/sites/delete/" data-item-id="{{ $site->id }}">
                    <i data-feather="x"></i>
                </button>
            </div>
        </div>

        <div id="site-collapse-{{ $key . '-' . $siteKey }}" class="collapse" aria-labelledby="site-heading-{{ $key . '-' . $siteKey }}" data-parent="#site-accordion-{{ $key }}">
            <div class="m-0 p-4">
                <h5>
                    <strong>Site details</strong>
                </h5>
                <ul class="site-details m-0">
                    @if ($site->client)
                        <li>
                            <strong>Client: </strong>{{ $site->client }}
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @endforeach

</div>
@else
    <p class="m-0 p-2">
        <strong>
            As of yet, this server doesn't have any sites assigned to it.
        </strong>
    </p>
@endif