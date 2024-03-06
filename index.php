<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Document</title>
</head>
<body>
    <?php 
    $linje19 = ['Hagsätra', 'Rågsved', 'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan',
    'Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 'Thorildsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand']; ?>
    <form action="#" method="post">
        From:<br>
        <select name="start">
            <?php 
            //Adds every array element as a option tag
            for ($i = 0; $i < count($linje19); $i++) {
                echo "<option value=\"$linje19[$i]\">$linje19[$i]</option>";
            }
            ?>
        </select>
        <br>
        To:<br>
        <select name="end">
            <?php 
            for ($i = 0; $i < count($linje19); $i++) {
                echo "<option value=\"$linje19[$i]\">$linje19[$i]</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
    <div class="output">
    <?php 
    if (isset($_POST["submit"])) {
        $start = $_POST["start"];
        $end = $_POST["end"];

        $index_start = array_search($start, $linje19);
        $index_end = array_search($end, $linje19);
        
        //time calculation
        $time = abs($index_end - $index_start) * 3;
        
        echo "<div>It takes $time minutes to travel from $start to $end<br>";
        
        $arriveHour = (int) date("H");
        $arriveMin = (int) date("t");
        
        $arriveHour += floor(($time + $arriveMin) / 60); //get hours
        $arriveMin = floor(($time + $arriveMin) % 60); //get remaining minutes
        if(strlen($arriveMin) == 1) { //fix times that look like this 21:1
            $arriveMin = "0$arriveMin";
        }

        echo "Estimated arrival time $arriveHour : $arriveMin<br></div>";

        echo "<div><strong>Stations:</strong><br>";

        //print out 
        if($index_start < $index_end) {
            for ($i = $index_start; $i <= $index_end; $i++){
                echo $linje19[$i], "<br>";
            }
        }
        if($index_start > $index_end) {
            for ($i = $index_start; $i >= $index_end; $i--){
                echo $linje19[$i], "<br>";
            }
        }
        echo "</div>";
    }
    ?>
    </div>
</body>
</html>