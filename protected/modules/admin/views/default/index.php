

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categories-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category',
        /*
		array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>
