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
    <?php require_once("core.php")?>
<script>
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

