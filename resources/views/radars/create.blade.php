@extends('layouts.layout')

@section('content')

    @if(count($errors))
        <div class="form-group">
            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                </ul>

            </div>

        </div>
    @endif

    <div>
        <form action="{{ route('radars.store') }}" method="POST">
            {{ csrf_field() }}

            <input value="{{old('date')}}" type="string" name="date" placeholder="Iveskite data">
            <input value="{{old('number')}}"type="string" name="number" placeholder="Iveskite numeri">
            <input value="{{old('time')}}"type="string" name="time" placeholder="Iveskite laika">
            <input value="{{old('distance')}}"type="string" name="distance" placeholder="Iveskite atstuma">
            <div class="form-group">

                <input type="submit" value="Pridėti">

            </div>

{{--            @include('layouts.errors')--}}
        </form>
    </div>




@endsection