@extends('layouts.layout')

@section('content')
<div style="width: 500px;">
    <form action="{{ route('drivers.store') }}" method="POST">
{{--        {{csrf_token()}}--}}

        <input type="string" name="name" placeholder="Iveskite varda">
        <input type="string" name="city" placeholder="Iveskite miesta">
        <input type="submit" value="Pridėti">
    </form>
</div>
@endsection