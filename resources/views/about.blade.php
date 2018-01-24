<h1>Hello world</h1>

<table>
    <tr>
        <th>Numeris</th>
        <th>Greitis (km/h)</th>
    </tr>

    <tr>
        @foreach($radars as $radar)
        <td>{{$radars->number}}</td>
        <td>{{$radars->speed}}</td>
        @endforeach;
    </tr>
</table>