<?php
$this->breadcrumbs = array(
    'ประชากรตามโครงสร้างประชากร' => array('Person/Index'),
    'บันทึกข้อมูล',
);
?>
<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-refresh"></i>  ลงทะเบียนใหม่ : Register (การลงทะเบียนนี้เป็นการลงทะเบียน สมาชิก ของ User center หากท่านเป็นสมาชิกของระบบอยู่ ไม่ต้องลทะเบียนใหม่ ให้ทำการร้องขอใช้ระบบแทน)</div>
    <div class="panel-body text-center">
        <form  class="form-horizontal"  method="post" id='frmEditUser'>
            <div class="row">
                <label class="col col-lg-2 control-label">ชื่อสกุล </label>
                <div class="col col-lg-3">
                    <input type="text" id="name" class="form-control" value="">
                    <input type="hidden" id="sys_id" class="form-control" value="5">
                </div>
                <label class="col col-lg-2 control-label">เลขที่บัตรประชาชน </label>
                <div class="col col-lg-3">
                    <input type="text" id="cid" class="form-control" value="">
                </div>
            </div>
            <br>
            <div class="row">
                <label class="col col-lg-2 control-label">Email </label>
                <div class="col col-lg-3">
                    <input type="text" id="email" class="form-control" value=""><i id='check_email'></i>
                </div>
                <label class="col col-lg-2 control-label">เบอร์โทร </label>
                <div class="col col-lg-3">
                    <input type="text" id="user_mobile" class="form-control" value="">
                </div>
            </div>
            <br>
            <div class="row">
                <label class="col col-lg-2 control-label">User Name </label>
                <div class="col col-lg-3">
                    <input type="text" id="username" class="form-control" value=""><i id='check_user' class=''></i>
                </div>
                <label class="col col-lg-2 control-label">Password </label>
                <div class="col col-lg-3">
                    <input type="password" id="password" class="form-control" value="">
                </div>
            </div>
            <br>
            <div class="row">
                <label class="col col-lg-2 control-label">ชื่อเล่น </label>
                <div class="col col-lg-3">
                    <input type="text" id="nickname" class="form-control" value="">
                </div>
            </div>
            <br>
        </form>
    </div>
</div>
<div class="panel-footer">
    <button class="btn btn-primary">ส่งคำร้อง</button>
</div>