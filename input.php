<!DOCTYPE html>
<html>
<head>
    <title>Перевезення</title>
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
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
            echo "<input id='cargo${i}' type='text' name='cargo${i}' placeholder='маса предмета ${i}'>";
            echo "<input id='cost${i}' type='text' name='cost${i}' placeholder='вартість предмета ${i}'>";
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
    var max_cost = 0;
    var cargo = 0;
    var cost = 0;
    function getValue (){

        for(var i = 0; i < items; i++){
            item_array[i] = [$("#cost"+i).val(),$("#cargo"+i).val()];
        }
        return item_array;
    }
    $( ".submit" ).click(function() {
        item_array = getValue();
        item_array = item_array.sort(function(a,b) {
            return b[0]-a[0];
        });
        while (cargo <= max_cargo){
                max_cost = Math.max(cost,max_cost);
                cargo += 21;
                cost += 2;
            console.log(max_cost)
        }
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
