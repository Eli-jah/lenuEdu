<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
</head>
<body>
<?php include_once VIEWS . 'inc/nav.php'; ?>

<!--内容开始-->
<div class="wrapper">
    <div class="wrap wrap-message">
        <div class="title-in wow fadeInUp" data-wow-duration="1s">
            <h2>在线留言</h2>
        </div>
        <div class="message">
            <div class="lnvestor-message">
                <div class="message">
                    <?php echo form_open(site_url('contact/sendpost'), array("class" => "form-horizontal", "id" => "frm-feedback")); ?>
                    <ul>
                        <li>
                            <input type="text" name="username" placeholder="留言人">
                            <div class="js-check">
                                <span>性别</span>
                                <label><input type="radio" name="gender" value="男" checked/><i></i> 男</label>
                                <label><input type="radio" name="gender" value="女"/><i></i>女</label>
                            </div>
                        </li>
                        <li>
                            <input type="text" name="telphone" placeholder="手机号码*">
                        </li>
                        <li>
                            <input type="text" name="email" placeholder="电子邮箱*">
                        </li>
                        <li>
                            <textarea name="content" id="" cols="30" rows="5" placeholder="留言内容"></textarea>
                        </li>
                        <li>
                            <button id="feed_submit" class="btn submit">留 言</button>
                            <button class="btn reset">重 置</button>
                        </li>
                    </ul>
                    <?php echo form_close(); ?>
                </div>

                <div class="pic">
                    <img class="lazy" data-src="/web/shmweb/assets/images/img/message-01.jpg" alt="">
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
                            text += data.msg[r_val] + ' |  ';
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
</body>

</html>
