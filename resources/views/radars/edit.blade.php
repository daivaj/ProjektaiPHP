@extends('layouts.layout')

@section('content')

    @include('layouts.errors')

    <div style="width: 500px;">
        <form action="{{route('radars.update', ['radar' => $radar->id]) }}" method="POST">
            {{csrf_field()}}
            {{method_field('put')}}

            <input type="string" name="date" value="{{$radar->date}}">
            <input type="string" name="number" value="{{ $radar->number }}">
            <input type="string" name="time" value="{{ $radar->time }}">
            <input type="string" name="distance" value="{{ $radar->distance }}">
            <input type="submit" value="Atnaujinti">

        </form>
    </div>

@endsection
