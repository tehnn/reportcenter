<?php

$this->breadcrumbs = array(
    'บริหารจัดการข้อมูล' => $this->createUrl('App/Menu1'),
    'รายงานตัวที่ 2'
);
?>

<div class="alert alert-success" role="alert"><font size="5"><i class="glyphicon glyphicon-user"></i> ประชากรรายสถานบริการ</font></div>


<?php

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'person-total-grid',
    'dataProvider' => $model,
    'summaryText' => 'Displaying {start}-{end} of {count} results.',
    'template' => "{summary}\n{pager}\n{items}",
));
?>
