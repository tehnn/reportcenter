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
<div class="alert alert-success" role="alert"><font size="5"><i class="glyphicon glyphicon-user"></i> ประชากรแยกรายสถานบริการ</font></div>

<div class="panel-body">

    <div style="float: left">
        <a class="search-button btn btn-primary" > <i class="glyphicon glyphicon-question-sign"></i> เงื่อนไข</a>

        <div class="search-form form well" style="display:none; margin-top: 10px">
            <form method="POST">

                <label for="date1">เกิดระหว่าง</label>
                <?php
                $this->widget(
                        'ext.booster.widgets.TbDatePicker', array(
                    'name' => 'date1',
                    'value' => $d1,
                    'options' => array(
                        'format' => 'yyyy-mm-dd',
                        'language' => 'th',
                        'autoclose' => true,
                    ),
                ));
                ?>


                <label for="date2">และ</label>
                <?php
                $this->widget(
                        'ext.booster.widgets.TbDatePicker', array(
                    'name' => 'date2',
                    'value' => $d2,
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
    </div>

    <div style="float: right">
        <a download="somedata.xls" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet1');" class="btn btn-success">Excel</a>

        <a download="somedata.csv" href="#" onclick="return ExcellentExport.csv(this, 'datatable', ',');" class="btn btn-danger">CSV</a>

        <a href="<?php echo $this->createUrl('App/Pdf', array('d1' => $d1, 'd2' => $d2)); ?>" target="_blank" class="btn btn-primary">PDF</a>

    </div>


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


    <div id="chart" class="well" style="margin-top: 10px">

        <?php
        $hos = array();
        $val = array();

        foreach ($model as $d) {
            array_push($hos, $d['hosname']);
            array_push($val, intval($d['total']));
        }



        $this->widget(
                'ext.booster.widgets.TbHighCharts', array(
            'options' => array(
                'colors' => array('#4EBA0C'),
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
                    'categories' => $hos,
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
</div>


<script>
            $('.search-button').click(function() {
                $('.search-form').fadeToggle();
                return false;
            });
</script>
