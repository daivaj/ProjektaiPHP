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

    <table style="border: 3px solid">
        <tr>
            <td>{{__('Name')}}</td>
            <td>{{__('City')}}</td>
            <td>{{__('Created_by')}}</td>
            <td>Veiksmai</td>

        </tr>
        @foreach($drivers as $driver)
            <tr>
                <td>{{$driver->name}}</td>
                <td>{{$driver->city}}</td>

                @if (auth()->check())
                    <td> {{ auth()->user()->id }}</td>
                @endif

                @if ($driver->trashed())
                <td>
                <form action="{{route('drivers.restore', ['driver' => $driver->driver_id])}}" method="POST">
                {{csrf_field()}}

                <input type="submit" value="Atstatyti">
                </form>
                </td>
                @else

                <td><a href="{{ route('drivers.edit', ['driver' => $driver->driver_id]) }}">Atnaujinti</a></td>
                <td>
                    <form action="{{route('drivers.destroy', ['driver' => $driver->driver_id])}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="submit" value="Istrinti">
                    </form>
                </td>
                @endif
            </tr>
        @endforeach
    </table>

    {{$drivers->links()}}
@endsection