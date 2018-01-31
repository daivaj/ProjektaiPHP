@extends('layouts.layout')

@section('content')
    @include('layouts.errors')

    <div>
        <form action="{{ route('radars.store') }}" method="POST">
            {{ csrf_field() }}

            <input value="{{old('date')}}" type="string" name="date" placeholder="Iveskite data">
            <input value="{{old('number')}}"type="string" name="number" placeholder="Iveskite numeri">
            <input value="{{old('time')}}"type="string" name="time" placeholder="Iveskite laika">
            <input value="{{old('distance')}}"type="string" name="distance" placeholder="Iveskite atstuma">
            <div class="form-group">
                <label form="">Vairuotojai</label>
                {{Form::select('drivers[]', $drivers, null, ['class' => 'input-sm'])}}
            </div>

            <div class="form-group">

                <input type="submit" value="Pridėti">

            </div>


        </form>
    </div>




@endsection