<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mycss.css" rel="stylesheet" /> 
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div>
            <nav class="nav navbar-custom" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <i class="glyphicon glyphicon-th-large"></i>
                            <?php echo Yii::app()->name; ?>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>                               
                                <a href="<?php echo $this->createUrl('Test/About'); ?>">
                                    <i class="glyphicon glyphicon-arrow-up"></i>  ข้อมูลหน่วยงาน
                                </a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">หมวดรายงาน <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo $this->createUrl('App/Menu1');  ?>">บริหารจัดการข้อมูล</a></li>
                                    
                                    <li class="divider"></li>
                                    <li><a href="<?php echo $this->createUrl('App/Menu2');  ?>">ทรัพยากร</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                             <?php if(Yii::app()->user->getState('role')== 'admin'): ?>
                            <li><a href="#">เกี่ยวกับ</a></li>
                            <?php endif;?>
                            
                            <?php if(Yii::app()->user->isGuest): ?>
                            <li>
                                <a href="<?php echo $this->createUrl('Site/Login'); ?>">
                                    <i class="glyphicon glyphicon-user"></i>  
                                    เข้าใช้งาน 
                                </a>
                            </li>
                            <?php endif;  ?>
                            <?php if(!Yii::app()->user->isGuest): ?>
                            <li>                                
                                <a href="<?php echo $this->createUrl('Site/Logout'); ?>">
                                    (<?php echo Yii::app()->user->getState('fullname'); ?>) ออกจากระบบ
                                </a>  
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>

        <?php if (isset($this->breadcrumbs)): ?>
            <?php
            $this->widget('booster.widgets.TbBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            ));
            ?><!-- breadcrumbs -->
        <?php endif; ?>   
            
        <?php echo $content; ?>
        
        <div class="well" align="center">
            สสจ.แพร่ <br>
            2014-2020
        </div>

    </body>
</html>

