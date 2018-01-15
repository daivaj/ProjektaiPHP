<?php

require_once $dir . '/models/db.php';

class Driver
{
    public $driverid;
    public $name;
    public $city;

    function assignFromDB($row)
    {
        $this->driverid = $row['driverid'];
        $this->name = $row['name'];
        $this->city = $row['city'];

    }

    static function all($limit, $offset)
    {
        $conn = connectDB();
        $sql = 'SELECT * FROM drivers LIMIT '.$offset.', '.$limit;

        $result = $conn->query($sql);

        $drivers = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $a = new Driver();
                $a->assignFromDB($row);
                $drivers[] = $a;
            }
        }
        return $drivers;
    }


    static function get($driverid)
    {
        if (!is_numeric($driverid)) return null;

        $conn = connectDB();
        $sql = 'SELECT * FROM drivers WHERE driverid = ' . $driverid;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $a = new Driver();
            $a->assignFromDB($row);
            return $a;
        }
        return null;
    }

    public function save()
    {
        $conn = connectDB();
        if (isset($this->driverid)) {
            
            $sql = $conn->prepare('UPDATE drivers set name = ?, city = ? WHERE driverid = ?');
            $sql->bind_param('ssi', $this->name, $this->city, $this->driverid);
            $sql->execute();

        } else {
            $stmt = $conn->prepare("INSERT INTO drivers(name, city) VALUES(?, ?)");
            $stmt->bind_param("ss", $this->name, $this->city);
            $stmt->execute();
            
        }
        return null;
    }

    static function getTotal(){
        $conn = connectDB();
        $sql = "SELECT count(1) as viso FROM drivers";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $visoIrasu = $row['viso'];
        return $visoIrasu;
    }
}