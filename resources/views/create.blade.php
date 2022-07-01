@extends('layout')

@section('content')
<div class="card_upper">
    <div class="card-header">
        Form
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('form.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" name="surname" value="{{ old('surname') }}" />
            </div>
            <div class="form-group">
                <label for="id_number">ID No:</label>
                <input type="number" class="form-control" name="id_number" value="{{ old('id_number') }}" />
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input id="date_of_birth" type="text" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="dd-mm-yyyy" required pattern="(?:30))|(?:(?:0[13578]|1[02])-31))/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])" />
            </div>
            <button type="submit" class="btn btn-primary">POST</button>
            <button type="reset" wire:click="cancel" class="btn btn-danger">CANCEL</button>
        </form>
        @if(Session::has('errors'))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
    </div>
</div>
@endsection