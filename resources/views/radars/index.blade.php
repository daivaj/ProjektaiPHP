@extends('layouts.layout')

@section('content')

    <table style="border: 3px solid">
        <tr>
            <td>Data</td>
            <td>Numeris</td>
            <td>Greitis</td>
        </tr>
        @foreach($radars as $radar)
            <tr>
                <td>{{$radar->date}}</td>
                <td>{{$radar->number}}</td>
                <td>{{$radar->distance / $radar->time}}</td>

                {{--@if ($radar->trashed())--}}
                    {{--<td>--}}
                        {{--<form action="{{route('radars.restore', ['radar' => $radar->id])}}" method="POST">--}}
                            {{--{{csrf_token()}}--}}
                            {{--{{method_field('RESTORE')}}--}}
                            {{--<input type="submit" value="Atstatyti">--}}
                        {{--</form>--}}
                    {{--</td>--}}
                    {{--@else--}}
                    <td><a href="{{ route('radars.edit', ['radar' => $radar->id]) }}">Atnaujinti</a></td>
                    <td>
                        <form action="{{route('radars.destroy', ['radar' => $radar->id])}}" method="POST">
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

