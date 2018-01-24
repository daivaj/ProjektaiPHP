@extends('layouts.layout')

@section('content')
<table style="border: 3px solid">
    <tr>
        <td>Vardas</td>
        <td>Adresas</td>
    </tr>
    @foreach($drivers as $driver)
        <tr>
            <td>{{$driver->name}}</td>
            <td>{{$driver->city}}</td>

            {{--@if ($driver->trashed())--}}
            {{--<td>--}}
            {{--<form action="{{route('drivers.restore', ['driver' => $driver->id])}}" method="POST">--}}
            {{--{{csrf_token()}}--}}
            {{--{{method_field('RESTORE')}}--}}
            {{--<input type="submit" value="Atstatyti">--}}
            {{--</form>--}}
            {{--</td>--}}
            {{--@else--}}

            <td><a href="{{ route('drivers.edit', ['driver' => $driver->id]) }}">Atnaujinti</a></td>
            <td>
                <form action="{{route('drivers.destroy', ['driver' => $driver->id])}}" method="POST">
                    {{--                                            {{csrf_token()}}--}}
                    {{method_field('DELETE')}}
                    <input type="submit" value="Istrinti">
                </form>
            </td>
            {{--@endif--}}
        </tr>
    @endforeach
</table>

{{$radars->links()}}
@endsection