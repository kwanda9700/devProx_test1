@extends('layout')

@section('content')

<style>
    body {
        text-align: center;
    }
</style>

<div class="button-container-div">
    <form method="get" action="{{ route('create') }}">
        <p>"Form is successfully validated and data has been saved"</p>
        <button type="submit" id="indexButton" class="btn btn-primary">Return to new a form</button>
    </form>

</div>