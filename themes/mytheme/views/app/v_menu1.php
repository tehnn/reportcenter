<?php
$this->breadcrumbs = array(
    'บริหารจัดการข้อมูล',
);
?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        บริหารจัดการข้อมูล
    </a>
    <a href="<?php echo $this->createUrl('App/Rpt1'); ?>" class="list-group-item"><i class="glyphicon glyphicon-list-alt"></i> รายงานตัวที่ 1</a>
    <a href="<?php echo $this->createUrl('App/Rpt2'); ?>" class="list-group-item"><i class="glyphicon glyphicon-list-alt"></i> รายงานตัวที่ 2</a>
    <a href="<?php echo $this->createUrl('App/Rpt3'); ?>" class="list-group-item"><i class="glyphicon glyphicon-list-alt"></i> รายงานตัวที่ 3</a>
    
</div>