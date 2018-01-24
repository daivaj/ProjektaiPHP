@extends('layouts.layout')

@section('content')


    <div>
        <form action="{{ route('radars.store') }}" method="POST">
            {{ csrf_field() }}

            <input type="string" name="date" placeholder="Iveskite data">
            <input type="string" name="number" placeholder="Iveskite numeri">
            <input type="string" name="time" placeholder="Iveskite laika">
            <input type="string" name="distance" placeholder="Iveskite atstuma">
            <div class="form-group">

                <input type="submit" value="Pridėti">

            </div>

{{--            @include('layouts.errors')--}}
        </form>
    </div>




@endsection