<?php
$this->breadcrumbs = array(
    'บริหารจัดการข้อมูล' => $this->createUrl('App/Menu1'),
    'รายงานตัวที่ 2'
);
?>

<div class="alert alert-success" role="alert"><font size="5"><i class="glyphicon glyphicon-user"></i> ประชากรรายสถานบริการ</font></div>


<?php
//$this->widget('zii.widgets.grid.CGridView'
$this->widget('booster.widgets.TbGridView'
        , array(
    'dataProvider' => $model,
    'filter' => $filtersForm,
    'summaryText' => 'แสดงผล {start}-{end} จาก {count} แถว',
    'template' => "{summary}\n{pager}\n{items}",    
    'columns'=>array(
        array(
            'name'=>'HOSPCODE',
            //'type'=>'raw',
            'header'=>'รหัส'            
        ),
        array(
            'name'=>'hosname',
            'header'=>'ชื่อสถานบริการ'
        ),
        array(
            'name'=>'total',
            'header'=>'จำนวนประชากร'
        )
    )
));
?>
