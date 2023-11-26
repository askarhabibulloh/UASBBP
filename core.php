<?php

class Clock {
    private $jam;

    function __construct($jam){
        $this->jam = $jam;
    }

    function getJam(){
        return $this->jam;
    }
}

class Alarm extends Clock{
    private $alarm;

    function __construct($a=00,$b=00,$c=00){
        $this->alarm = $a.":".$b.":".$c;
        if($this->alarm == "24:00:00")$this->alarm=null;
    }

    function getJam(){
        if(is_null($this->alarm)) return "Alarm belum disetel";
        return "Alarm akan berbunyi pada jam ".$this->alarm;
    }
    function getJamOnly(){
        if(is_null($this->alarm)) return "Alarm belum disetel";
        return $this->alarm;
    }

    function clearJam(){
        $this->alarm = null;
    }
}
if (isset($_POST["jam"]) && isset($_POST["menit"]) && isset($_POST["detik"])) {
    $alarm = new Alarm($_POST["jam"], $_POST["menit"], $_POST["detik"]);
} else {
    $alarm = new Alarm("24","00","00");
}

if(isset($_POST["clear"]))  $alarm->clearJam();

echo $alarm->getJam();

echo "<script>
setInterval(() => {
if('".$alarm->getJam()."'==document.getElementById('jamsekarang').innerHTML){
alert('Alarm berbunyi');
}    
}, 1000);
</script>";