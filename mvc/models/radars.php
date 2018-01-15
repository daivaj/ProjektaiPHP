<?php

require_once $dir . '/models/db.php';

class Radar 
{
    public $id;
    public $date;
    public $number;
    public $distance;
    public $time;
    public $speed;
    public $driverid;

    function assignFromDB($row) 
    {
        $this->id = $row['id'];
        $this->date = $row['date'];
        $this->number = $row['number'];
        $this->distance = $row['distance'];
        $this->time = $row['time'];
        $this->speed = round($this->distance / $this->time * 3.6);
        $this->driverid = $row['driverid'];
    }

    static function all($limit, $offset) 
    {
        $conn = connectDB();
        $sql = 'SELECT * FROM radars ORDER BY `number`, `date` DESC LIMIT '.$offset.', '.$limit;

        $result = $conn->query($sql);

        $radars = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $a = new Radar();
                $a->assignFromDB($row);
                $radars[] = $a;
            }
        }
        return $radars;
    }


    static function get($id) 
    {
        if (!is_numeric($id)) return null;
        
        $conn = connectDB();
        $sql = 'SELECT * FROM radars WHERE id = '.$id;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $a = new Radar();
            $a->assignFromDB($row);
            return $a;
        }
        return null;
    }

    public function save()
    {
        $conn = connectDB();
        if (isset($this->id)) {

            $sql = $conn->prepare('UPDATE radars set date = ?, number = ?, distance = ?, time = ?, driverid = ? WHERE id = ?');
            $sql->bind_param('ssddii', $this->date, $this->number, $this->distance, $this->time, $this->driverid, $this->id);
            $sql->execute();

        } else {
            $stmt = $conn->prepare("INSERT INTO radars(date, number, distance, time, driverid)
VALUES(?, ?, ?, ?, ?)");

            $stmt->bind_param("ssddi", $this->date, $this->number, $this->distance, $this->time, $this->driverid);
            $stmt->execute();

        }
        return null;
    }
    
    static function getTotal(){
        $conn = connectDB();
        $sql = "SELECT count(1) as viso FROM radars";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $visoIrasu = $row['viso'];
        return $visoIrasu;
    } 
}