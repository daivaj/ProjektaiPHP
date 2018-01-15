<h1>Naujas radaro įrašas</h1>

<form method='post' action="?">
    <input type='hidden' name='id' required value="<?php if (isset($a->id)) echo $a->id ?>">
    Data: <input type='text' name='date' required value="<?php if (isset($a->date)) echo $a->date ?>"><br>
    Numeris: <input type='text' name='number' required
                    value="<?php if (isset($a->number)) echo $a->number ?>"><br>
    Atstumas: <input type='number' name='distance' required
                     value="<?php if (isset($a->distance)) echo $a->distance ?>"><br>
    Laikas: <input type='number' name='time' required value="<?php if (isset($a->time)) echo $a->time ?>"><br>
    Vairuotojas: <select name="driverid">
        <option>-------------</option>
        <?php
        if (!empty($b) > 0) {

           foreach ($b as $as) {
                $pasirinktas = '';
                if ($as->driverid == $a->driverid) {
                    $pasirinktas = 'selected = selected';
                } echo '<option value="' . $as->driverid . '" '.$pasirinktas.'>' . $as->name . '</option>';
            }
        } ?>
    </select> <br>
    <button name="save" type="submit">Išsaugoti</button>
</form>
