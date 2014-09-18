<h1>UTEHN PHNU</h1>
<?php
$data = array
 (
  array("นายแพทย์ ก",22),
  array("นายแพทย์ ข",15),
  array("นายแพทย์ ค",5),
  array("นายแพทย์ ง",17)
);
$this->widget('booster.widgets.TbHighCharts', array(
    'options' => array(
       'title'=>array('text'=>'Power by Utehn PHNU.'),
        'series' =>array(array(
            'type'=> 'pie',
            'name'=>'จำนวน (ครั้ง)',
            'data'=>$data
        )),
        
    )
));
?>