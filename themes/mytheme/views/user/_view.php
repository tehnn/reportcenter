<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username),array('view','id'=>$data->username)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
	<?php echo CHtml::encode($data->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('officeid')); ?>:</b>
	<?php echo CHtml::encode($data->officeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastlogin')); ?>:</b>
	<?php echo CHtml::encode($data->lastlogin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countlogin')); ?>:</b>
	<?php echo CHtml::encode($data->countlogin); ?>
	<br />


</div>