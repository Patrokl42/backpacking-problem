<!DOCTYPE html>
<html>
<head>
    <title>Перевезення</title>
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<form class="form" method="post">
    <h3> У вас  <?php echo htmlspecialchars($_POST['items']);?> предметів</h3>
    <h3>І максимальна грузопідйомність <?php echo htmlspecialchars($_POST['max_cargo']);?></h3>
    <?php
    $items = $_POST['items'];
    $max_cargo = $_POST['max_cargo'];
    $cargo_array= array();
    $cost_array= array();
    setcookie("items", $items, time() + 3600*24);
    setcookie("max_cargo",$max_cargo, time() + 3600*24);
    echo '<table>';
    for($i = 0; $i < $items; $i++) {
        echo '<tr>';
            echo '<td>';
            echo "<label>Предмет №${i}</label>";
            echo "<input id='cargo${i}' type='number' name='cargo${i}' placeholder='маса предмета ${i}'>";
            echo "<input id='cost${i}' type='number' name='cost${i}' placeholder='вартість предмета ${i}'>";
            echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo'<input class="submit" type="button" value="Обчислити">';
    ?>
    <div class="conteiner"></div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" rel="script">
$(document).ready(function () {
    var items = "<?php Print($items);?>";
    var max_cargo = <?php Print($max_cargo);?>;
    var cargo_array = [];
    var cost_array = [];
    var item_array = [];
    var specific_array = [];
    var cost_array_var = [];
    var max_cost = 0;
    var cargo = 0;
    var cost = 0;
    function assign_value(){
        for(var i = 0 ; i < items ;i++){
            cost_array[i] = item_array[i][0];
            cargo_array[i] = item_array[i][1];
        }
    }
    function getValue(){
        for(var i = 0; i < items; i++){
            item_array[i] = [$("#cargo"+i).val(),$("#cost"+i).val()];
        }
        return item_array;
    }
    $( ".submit" ).click(function() {
        item_array = getValue();
        item_array = item_array.sort(function(a,b) {
            return a[0]-b[0];
        });
        for(var i = 0; i < items ; i++){
            
            specific_array[i] = 0;
            cost_array_var[i] = 0;
            var sub = 0;
            var j = 0;
            while (sub + item_array[i][0] <= max_cargo) {
                item_array[i][0] = +item_array[i][0];
                item_array[i][1] = +item_array[i][1];
                sub = specific_array[i] = specific_array[i] + item_array[i][0];
                cost_array_var[i] =cost_array_var[i] + item_array[i][1]
            }
            console.log(i);
        }

//        for(var i = 0; i < items ; i++){
//            for(var j = 0; j < max_cargo ; j++){
//                if(specific_array[j] < max_cargo){
//                    specific_array[j] = Math.max(specific_array[j],item_array[j][0]);
//                    console.log(specific_array[j]);
//                }
//                break
//            }
//        }
        console.log(specific_array);
        console.log(cost_array_var);
    })
    });






//        for(var i = 0 ;i <= max_cargo; i+cargo){
//            if(cargo <= max_cargo){
//                i = cargo;
//                max_cost = Math.max(cost,max_cost);
//                cargo = 21;
//                cost = 2;
//
//            }
//            console.log(max_cost)
//        }
//        for(var i = 0; i < items; i++){
//            cargo_array = [$("#cargo"+i).val()];
//            cost_array = [$("#cost"+i).val()];
//            console.log(cargo_array);
//            console.log(cost_array);
//        }










</script>
</body>
</html>
