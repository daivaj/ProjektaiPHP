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
<div style="width: 500px;">
    <form action="{{route('drivers.update', ['driver' => $driver->driver_id]) }}" method="POST">
        {{csrf_field()}}
        {{ method_field('put') }}

        <input type="string" name="name" value="{{ $driver->name }}">
        <input type="string" name="city" value="{{ $driver->city }}">
        <input type="submit" value="Atnaujinti">

    </form>
</div>
@endsection

