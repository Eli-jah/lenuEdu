<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
</head>
<body>
<?php include_once VIEWS . 'inc/nav.php'; ?>

<!--内容开始-->
<div class="contactus">
    <div class="headerPartition" style="background: url(<?php echo $banner; ?>) center no-repeat;">
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
                <li class="active"><a href="<?php echo site_url('contact/us'); ?>">联系我们</a></li>
                <li><a href="<?php echo site_url('contact/application'); ?>">申请入学</a></li>
                <li><a href="<?php echo site_url('contact/recruitment'); ?>">企业招聘</a></li>
            </ul>
        </div>
    </div>
    <div class="TextContent">
        <div class="Contactus_part1">
            <div class="pagePart_title">
                <h1>联系我们</h1>
                <p>Contact us</p>
            </div>
            <?php echo $content; ?>
        </div>
        <div class="Contactus_part2" id="OnlineMessage" name='OnlineMessage'
             style="background: url(/web/shmweb/assets/images/contactus_img3.png) center no-repeat;">
            <div class="opacity_box"></div>
            <div class="localandinfo">
                <div class="localandinfo_left">
                    <p class="left_title">好评率极高的教育平台</p>
                    <div id="allmap"></div>
                    <div class="busline">
                        <p><?php echo $route; ?></p>
                    </div>
                </div>
                <div class="localandinfo_right">
                    <p class="localandinfo_right_title">在线留言</p>
                    <p class="right_smalltitle">在线填写您的要求，我们将在24小时内为您答疑解惑</p>
                    <?php echo form_open(site_url('contact/sendpost'), array("class" => "form-horizontal", "id" => "frm-feedback")); ?>
                    <ul>
                        <li>
                            <span>您的姓名</span>
                            <input type="text" name="username"/>
                            <input type="hidden" name="from" value="feedback">
                        </li>
                        <li>
                            <span>您的电话</span>
                            <input type="tel" name="telphone"/>
                        </li>
                        <li>
                            <span>您的邮箱</span>
                            <input type="email" name="email"/>
                        </li>
                        <li>
                            <span>您的地址</span>
                            <input type="text" name="address"/>
                        </li>
                        <li>
                            <span class="message_title">您的留言</span>
                            <textarea name="content"></textarea>
                        </li>
                        <li class="submit_li">
                            <button type="submit" id="submit_btn">提交</button>
                            <span>您的信息我们会保密处理</span>
                        </li>
                    </ul>
                    <?php echo form_close(); ?>
                    <div class="for_share">
                        <span>分享到：</span>
                        <div class="bdsharebuttonbox">
                            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                            <a href="#" class="bds_sqq" data-cmd="sqq" title="分享给QQ好友"></a>
                            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                        </div>
                    </div>
                </div>
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
