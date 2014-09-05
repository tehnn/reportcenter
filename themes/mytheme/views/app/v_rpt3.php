<?php
$this->breadcrumbs = array(
    'บริหารจัดการข้อมูล' => $this->createUrl('App/Menu1'),
    'รายงานตัวที่ 3'
);
?>

<?php
$dir = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();

$cs->registerScriptFile($dir . '/js/excellentexport.js');
$cs->registerScriptFile($dir . '/js/highcharts.js');
?>


<a class="search-button btn btn-primary" > เงื่อนไข <i class="glyphicon glyphicon-question-sign"></i></a>

<div class="search-form form well" style="display:none; margin-top: 10px">
    <form method="POST">
        <?php
        $this->widget(
                'ext.booster.widgets.TbDatePicker', array(
            'name' => 'date1',
            'options' => array(
                'format' => 'yyyy-mm-dd',
                'language' => 'th',
                'autoclose' => true
            ),
        ));
        ?>
        <?php
        $this->widget(
                'ext.booster.widgets.TbDatePicker', array(
            'name' => 'date2',
            'options' => array(
                'language' => 'th',
                'format' => 'yyyy-mm-dd',
                'autoclose' => true
            )
        ));
        ?>
        <input type="hidden" name="data">

        <input type="submit" class="btn btn-default" value="ประมวลผล">
    </form>
</div>
<hr>

<table class="table table-striped table-hover" id="datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>รหัสหน่วยงาน</th>
            <th>ชื่อหน่วยงาน</th>
            <th>จำนวนประชากร (คน)</th>                          
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($model as $key => $value):
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?= $value['HOSPCODE'] ?></td>
                <td><?= $value['hosname'] ?></td>
                <td><?= $value['total'] ?></td>
            </tr>

            <?php
        endforeach;
        ?>
    </tbody>
</table>

<a download="somedata.xls" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet1');" class="btn btn-success">Excel</a>

<a download="somedata.csv" href="#" onclick="return ExcellentExport.csv(this, 'datatable', ',');" class="btn btn-danger">CSV</a>

<div id="chart">

    <?php
    $d = $data->getData();
    $dis = array();
    $val = array();
    foreach ($d as $ds) {
        array_push($dis, $ds['hosname']);
        array_push($val, intval($ds['total']));
    }



    $this->widget(
            'ext.booster.widgets.TbHighCharts', array(
        'options' => array(
            'colors' => array('#673DD2'),
            'credits' => array('enabled' => false),
            'chart' => array(
                'type' => 'column',
                'plotBackgroundColor' => 'white',
                'plotBorderWidth' => 1,
                'plotShadow' => FALSE,
            ),
            'title' => array(
                'text' => 'แผนภูมิแสดงจำนวนประชากร'
            ),
            'yAxis' => array(
                'title' => array('text' => 'ประชากร (คน)'),
                'min' => 0
            ),
            'xAxis' => array(
                'categories' => $dis,
            ),
            'series' => array(
                array(
                    'name' => 'หน่วยงาน',
                    'data' => $val,
                )
            ),
        )
            )
    );
    ?>

</div>



<script>
    $('.search-button').click(function() {

        $('.search-form').fadeToggle();
        return false;
    });
</script>
