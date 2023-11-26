<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="jamsekarang" id="jamsekarang">24:00:00</div>
    <form action="index.php" method="post">
        <input type="hidden" name="sentClock" id="sentClock">
        <select name="jam" id="selectJam">
            <?php for($i = 0;$i <= 23;$i++){
            if($i<10){
                $j = "0" . $i;
                echo "<option value = $j>$i</option>";
            }else{
                echo "<option value = $i>$i</option>";
            }
            }
            ?>
        </select> :
        <select name="menit" id="selectMenit">
            <?php for($i = 0;$i <= 59;$i++){
            if($i<10){
                $j = "0" . $i;
                echo "<option value = $j>$i</option>";
            }else{
                echo "<option value = $i>$i</option>";
            }
            }
            ?>
        </select> :
        <select name="detik" id="selectDetik">
            <?php for($i = 0;$i <= 59;$i++){
            if($i<10){
                $j = "0" . $i;
                echo "<option value = $j>$i</option>";
            }else{
                echo "<option value = $i>$i</option>";
            }
            }
            ?>
        </select>
        <input type="submit" value="Setel Alarm">
        <input type="submit" name="clear" value="Bersihkan Alarm">
    </form>
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

    function __construct($a="24",$b="00",$c="00"){
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
    $alarm = new Alarm();
}

if(isset($_POST["clear"]))  $alarm->clearJam();

echo $alarm->getJam();

echo "<script>
setInterval(() => {
if('".$alarm->getJamOnly()."'==document.getElementById('jamsekarang').innerHTML){
alert('Alarm berbunyi');
}    
}, 1000);
</script>";?><script>
setInterval(() => {
        const today = new Date();
        const h = today.getHours();
        const m = today.getMinutes();
        const s = today.getSeconds();
        const time = checkZero(h) + ":" + checkZero(m) + ":" + checkZero(s);
        document.getElementById("sentClock").value = time;
        document.getElementById("jamsekarang").innerHTML = time;
    }, 999);


function checkZero(i) {
    return i < 10 ? "0" + i : i;
    }

</script>
</body>
</html>

