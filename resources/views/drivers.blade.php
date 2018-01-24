<h1>Hello World</h1>
<table style="border: 3px solid">
    <tr>
        <td>Vardas</td>
        <td>Adresas</td>
    </tr>
    @foreach($drivers as $driver)
        <tr>
            <td>{{$driver->name}}</td>
            <td>{{$driver->city}}</td>
        </tr>
    @endforeach;
</table>
