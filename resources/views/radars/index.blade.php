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

    <table  class="table table-striped table-dark" style="border: 3px solid">
        <tr>
            <td>{{__('Date')}}</td>
            <td>{{__('Number')}}</td>
            <td>{{__('Speed')}}</td>
            <td>{{__('Drivers')}}</td>
            <td>Duomenis sukure</td>
            <td>Veiksmai</td>

        </tr>
        @foreach($radars as $radar)
            <tr>
                <td>{{$radar->date}}</td>
                <td>{{$radar->number}}</td>
                <td>{{$radar->distance / $radar->time}}</td>

                @if ($radar->drivers)
                <td>{{$radar->drivers->name}}</td>
                    @else
                    <td></td>
                @endif

                @if (auth()->check())
                    <td> {{ auth()->user()->id }}</td>
                @endif

                @if ($radar->trashed())
                <td>
                <form action="{{route('radars.restore', ['radar' => $radar->id])}}" method="POST">
                {{csrf_field()}}

                <input type="submit" value="Atstatyti">
                </form>
                </td>
                @else
                <td><a href="{{ route('radars.edit', ['radar' => $radar->id]) }}">Atnaujinti</a></td>
                <td>
                    <form action="{{route('radars.destroy', ['radar' => $radar->id])}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <input type="submit" value="Istrinti">
                    </form>
                </td>
                @endif
            </tr>
        @endforeach
    </table>

    {{$radars->links()}}

@endsection

