<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username,
);

$this->menu=array(
array('label'=>'List User','url'=>array('index')),
array('label'=>'Create User','url'=>array('create')),
array('label'=>'Update User','url'=>array('update','id'=>$model->username)),
array('label'=>'Delete User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->username; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'username',
		'password',
		'fullname',
		'officeid',
		'role',
		'lastlogin',
		'countlogin',
),
)); ?>
