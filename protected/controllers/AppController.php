<?php

class AppController extends Controller {
   
    public function actionMenu1(){
        
        $this->render('v_menu1');        
    }
    
      public function actionMenu2(){
        
        $this->render('v_menu2');        
    }
    
    public function actionRpt1(){
        
        $model = new Person('search');       
         $model->unsetAttributes();  
        if (isset($_GET['Person'])){
            $model->attributes = $_GET['Person'];
        }
        
        $this->render('v_rpt1',array(
            'model'=>$model
         ));
    }
    
    public function actionRpt2(){
        $sql ="SELECT p.HOSPCODE ,h.hosname, count(DISTINCT p.CID) as total 
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
         $this->render('v_rpt2',array(
             'model'=>$dataProvider
         ));
         
        
    }
    
    
}
