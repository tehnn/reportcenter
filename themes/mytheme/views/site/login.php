<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>
<div class="panel panel-primary">
    <div class="panel-heading">กรุณาลงชื่อใช้งาน</div>
    <div class="panel-body">
        <?php
        $form = $this->beginWidget(
                'booster.widgets.TbActiveForm', array(
            'id' => 'verticalForm',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array('class' => 'well'), // for inset effect
                )
        );

        echo $form->textFieldGroup($model, 'username');
        echo $form->passwordFieldGroup($model, 'password');
        echo $form->checkboxGroup($model, 'rememberMe');
        $this->widget(
                'booster.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Login')
        );

        $this->endWidget();
        unset($form);
        ?>



    </div>
</div>





