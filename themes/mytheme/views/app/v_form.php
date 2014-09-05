<div align="center">
<form method="POST"> 
    
    <?php 
    
    $list = CHtml::listData(Csex::model()->findAll(), 'sex', 'sexname');
    echo CHtml::dropDownList('listname','',$list);
    ?>
    
    <input type="Submit" value="บันทึก" class="btn btn-success">
</form>
</div>
