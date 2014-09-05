<?php

class AppController extends Controller {

    public function actionMenu1() {

        $this->render('v_menu1');
    }

    public function actionMenu2() {

        $this->render('v_menu2');
    }

    public function actionRpt1() {

        $model = new Person('search');
        $model->unsetAttributes();
        if (isset($_GET['Person'])) {
            $model->attributes = $_GET['Person'];
        }

        $this->render('v_rpt1', array(
            'model' => $model
        ));
    }

    public function actionRpt2() {
        $sql = "SELECT p.HOSPCODE ,h.hosname, count(DISTINCT p.CID) as total 
from person p
LEFT JOIN chospital h on p.HOSPCODE = h.hoscode
GROUP BY p.HOSPCODE";

        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();
        $dataProvider = new CArrayDataProvider($dataReader, array(
            'totalItemCount' => count($dataReader),
            'keyField' => 'HOSPCODE',
            'pagination' => array(
                'pageSize' => 15
            ),
        ));
        $this->render('v_rpt2', array(
            'model' => $dataProvider
        ));
    }

    public function actionRpt3() {

        $sql = "SELECT p.HOSPCODE ,h.hosname, count(DISTINCT p.CID) as total 
from person p
LEFT JOIN chospital h on p.HOSPCODE = h.hoscode
GROUP BY p.HOSPCODE";

        if (isset($_POST['data'])) {
            $sql = "SELECT p.HOSPCODE ,h.hosname, count(DISTINCT p.CID) as total 
from person p
LEFT JOIN chospital h on p.HOSPCODE = h.hoscode
where p.BIRTH BETWEEN '$_POST[date1]' and '$_POST[date2]'
GROUP BY p.HOSPCODE";
        }

        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

     

        $this->render('v_rpt3', array(
            'model' => $dataReader,
            
        ));
    }
    
    public function actionPdf(){
         $sql = "SELECT p.HOSPCODE ,h.hosname, count(DISTINCT p.CID) as total 
from person p
LEFT JOIN chospital h on p.HOSPCODE = h.hoscode
GROUP BY p.HOSPCODE";
         
          $dataReader = Yii::app()->db->createCommand($sql)->queryAll();
          
          // ส่วนแสดง PDF
          
          $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        spl_autoload_register(array('YiiBase', 'autoload'));
        //เพิ่ม  font
        $fontname = $pdf->addTTFfont('pdffont/FONTNONGNAM.TTF', 'TrueTypeUnicode', '', 32);
        // set document information

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle("UTHN PHNU");
        $pdf->SetHeaderData('', 0, "ชื่อรายงาน", "เวลาพิมพ์ " . date('Y-m-d H:i:s') . "");
        $pdf->setHeaderFont(Array('freeserif', '', '14'));
        $pdf->setFooterFont(Array('freeserif', '', '10'));
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        //$pdf->SetFont('freeserif', '', 12);
        //เรียกใช้ font ที่เพิ่ม
        $pdf->SetFont($fontname, '', 14, '', false);
        $pdf->SetTextColor(80, 80, 80);
        $pdf->AddPage();

        //$sql = "select * from  disease";

        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

        $tbl = '<table cellspacing="0" cellpadding="4" border="1">';
        $tbl.= "<tr><th>รหัส</th><th>ชื่อ</th><th>จำนวน</th></tr>";

        foreach ($dataReader as $key => $value) {
            $col1 = $value['HOSPCODE'];
            $col2 = $value['hosname'];
            $col3 = $value['total'];
            $tbl.="<tr bgcolor='#FF0000'><td>$col1</td><td>$col2</td><td>$col3</td></tr>";
        }

        $tbl.='</table>';

        $pdf->writeHTML($tbl, true, false, true, false, '');

        // reset pointer to the last page
        $pdf->lastPage();

        //Close and output PDF document
       
         $pdf->Output('filename.pdf', 'I'); // I= Preview , D=Download
       
        Yii::app()->end();
          
          //จบส่วน pdf
          
         
        
    }

}
