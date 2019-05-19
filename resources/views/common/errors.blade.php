@if (count($errors) > 0)
{{-- @php dd($errors->all()); @endphp --}}
    <div class="alert alert-danger">
        <strong>
            There's been a boo boo!
        </strong>

        <br/>
        <br/>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif