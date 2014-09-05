<?php

class TestController extends Controller {

    public function actionTest1() {
        echo "Yii ครังแรกของฉัน";
    }

    public function actionTest2() {
        echo "Yii ครัง 2 ของฉัน";
    }

    public function actionTest3() {
        $this->render('v_test3', array(
            'data' => 'ข้อมูลส่งมาจาก Controller',
            'data2' => date('Y-m-d H:i:s'),
            'data3' => 'นาย ก ข ค ง'
        ));
    }

    public function actionTest4($data1 = null) {
        $this->render('v_test4', array(
                'data'=>$data1
                )
        );
    }

}
