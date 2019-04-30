<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
</head>
<body>
<?php include_once VIEWS . 'inc/nav.php'; ?>

<!--内容开始-->
<div class="contactus">
    <div class="headerPartition">
        <div class="opacity_box"></div>
        <div class="Partition-title">
            <h1 class="title-zh">联系我们</h1>
            <h1 class="title-en">Contact us</h1>
        </div>
        <div class="Partition-nav">
            <ul class="nav-breadcrumb">
                <li><a href="index.php">首页</a></li>
                <li class="active"><a href="#">联系我们</a></li>
            </ul>
            <ul class="Partition-nav-tabs">
                <li><a href="<?php echo site_url('contact/us'); ?>">联系我们</a></li>
                <li class="active"><a href="<?php echo site_url('contact/application'); ?>">申请入学</a></li>
                <li><a href="<?php echo site_url('contact/recruitment'); ?>">企业招聘</a></li>
            </ul>
        </div>
    </div>
    <div class="TextContent">
        <div class="Contactus_entrance">
            <div class="pagePart_title">
                <h1>申请入学</h1>
                <p>Apply for Admission to Our School</p>
            </div>
            <div class="entrance_textcontent"
                 style="background: url(/web/shmweb/assets/images/entrance_img.png) center no-repeat;">
                <p class="Apply_title">您的个人信息将在学员名单保留，请准确真实的填写，填好申请入学报名表并提交后，我们咨询导师会在24小时内和您联系，请确认您的联系方式无误。</p>
                <?php echo form_open(site_url('contact/sendpost'), array("class" => "form-horizontal", "id" => "frm-feedback")); ?>
                <div class="form_item">
                    <span>姓名：</span>
                    <input type="text" name="username" id="uname" value=""/>
                    <input type="hidden" name="from" value="application">
                </div>
                <div class="form_item">
                    <span>邮箱：</span>
                    <input type="text" name="email" id="email" value=""/>
                </div>
                <div class="form_item">
                    <span>性别：</span>
                    <div class="forinpwidth">
                        <input type="radio" name="gender" id="male" checked value="1"/>
                        <label for="male" class="sextype">男</label>
                        <input type="radio" name="gender" id="female" value="0"/>
                        <label for="female" class="sextype">女</label>
                    </div>
                </div>
                <div class="form_item">
                    <span>年龄：</span>
                    <input type="text" name="age" id="age" value=""/>
                </div>
                <div class="form_item">
                    <span>地址：</span>
                    <input type="text" name="address" id="address" value=""/>
                </div>
                <div class="form_item">
                    <span>手机：</span>
                    <input type="text" name="telphone" id="phone" value=""/>
                </div>
                <div class="form_item">
                    <span>QQ：</span>
                    <input type="text" name="qq" id="qq" value=""/>
                </div>
                <div class="form_item Remarks">
                    <span>备注：</span>
                    <textarea name="content" rows="" cols=""></textarea>
                </div>
                <button type="submit" id="feed_submit" class="apply_subtn">确认提交</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php
echo static_file('jquery-1.10.2.min.js');
echo static_file('tools.js');
echo static_file('site/js/init.js');
?>

<script>
    $(function () {
        $('#feed_submit').on('click', function (event) {
            url = $('#frm-feedback').attr('action');
            data = $('#frm-feedback').serializeArray();
            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                })
                .done(function (data) {
                    var status;
                    var text = '';
                    if (data.status == 0) {
                        for (var r_val in data.msg) {
                            text += data.msg[r_val] + ' | ';
                        }
                        alert(text);
                    } else if (data.status == 1) {
                        alert(data.msg);
                        document.location.reload();
                    } else if (data.status == 2) {
                        alert(data.msg);
                    }
                });
            event.preventDefault();
        });
    });
</script>

<?php include_once VIEWS . 'inc/footer.php'; ?>

