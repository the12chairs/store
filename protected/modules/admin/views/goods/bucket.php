
<div class="view">
    <?php




    if(Yii::app()->user->checkAccess('administrator')){
        echo "Yes, master";
    }
    foreach($data as $d){

        echo "Name: " . $d['name'];

        echo "<br />";
        echo "Cost: " . $d['cost'];
        echo "<br />";
        echo "<br />";
    }


    ?>

<br />
