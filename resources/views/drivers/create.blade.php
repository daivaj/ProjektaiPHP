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
    <form action="{{ route('drivers.store') }}" method="POST">
        {{csrf_field()}}

        <input type="string" name="name" placeholder="Iveskite varda">
        <input type="string" name="city" placeholder="Iveskite miesta">
        <input type="submit" value="Pridėti">
    </form>
</div>
@endsection