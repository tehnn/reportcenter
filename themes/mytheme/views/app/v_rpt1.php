<?php
    $this->breadcrumbs=array(
	'บริหารจัดการข้อมูล'=>$this->createUrl('App/Menu1'),
        'รายงานตัวที่ 1'
);
?>


<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'person-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
     'summaryText' => 'Displaying {start}-{end} of {count} results.',
    'template'=>"{summary}\n{pager}\n{items}",
   'columns'=>array(
       'HOSPCODE',
       'PRENAME',
       'NAME',
       'LNAME',
       'SEX' ,
        array(
                    'name' => 'SEX',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->tocsex->sexname)',
            )
       )
    
    ));

?>
