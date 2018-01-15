<h1>Naujas radaro įrašas</h1>

<form method='post' action="?">
    <input type='hidden' name='id' required value="<?php if (isset($a->driverid)) echo $a->driverid ?>">
    Vairuotojo vardas: <input type='text' name='name' required value="<?php if (isset($a->name)) echo $a->name ?>"><br>
    Vairuotojo miestas: <input type='text' name='city' required value="<?php if (isset($a->city)) echo $a->city ?>"><br>
    <button name="save" type="submit">Išsaugoti</button>
</form>