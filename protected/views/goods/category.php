<?php
/**
 * Created by PhpStorm.
 * User: admin2
 * Date: 7/28/14
 * Time: 2:18 PM
 */


    foreach($data as $d){
?>

    <div class="view">

        <b><?php echo CHtml::encode($d['cost']); ?> $</b>
        <b><?php echo CHtml::encode($d['name']); ?></b>

        <?php echo CHtml::link('Налетай!', array('goods/bucket', 'id'=>$d['id'])); ?>
    <br />


    </div>


<?php }