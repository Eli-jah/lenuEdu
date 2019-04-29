<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
</head>
<body>
<?php include_once VIEWS . 'inc/nav.php'; ?>

<!--内容开始-->
<div class="contactus">
    <div class="headerPartition" style="background: url(assets/images/contactus_banner1.jpg) center no-repeat;">
        <div class="opacity_box"></div>
        <div class="Partition-title">
            <h1 class="title-zh">联系我们</h1>
            <h1 class="title-en">Contact us</h1>
        </div>
        <div class="Partition-nav">
            <ul class="nav-breadcrumb">
                <li><a href="<?php echo site_url(''); ?>">首页</a></li>
                <li class="active"><a href="#">联系我们</a></li>
            </ul>
            <ul class="Partition-nav-tabs">
                <li><a href="<?php echo site_url('contact/us'); ?>">联系我们</a></li>
                <li><a href="<?php echo site_url('contact/application'); ?>">申请入学</a></li>
                <li class="active"><a href="<?php echo site_url('contact/recruitment'); ?>">企业招聘</a></li>
            </ul>
        </div>
    </div>
    <div class="TextContent">
        <div class="Contactus_recruitment">
            <div class="pagePart_title">
                <h1>企业招聘</h1>
                <p>Enterprise recruitment</p>
            </div>
            <div class="recruitment_content">
                <div class="recruitment_title">
                    <ul>
                        <li<?php echo $active_type ? '' : ' class="active"'; ?>><a
                                href="<?php echo site_url('contact/recruitment'); ?>">全部</a></li>
                        <?php if (!empty($types)) { ?>
                            <?php foreach ($types as $type) { ?>
                                <?php if ($active_type && $active_type['id'] == $type['id']) { ?>
                                    <li class="active"><a
                                            href="<?php echo site_url('contact/recruitment/' . $type['id']); ?>"><?php echo $type['title']; ?></a>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <a href="<?php echo site_url('contact/recruitment/' . $type['id']); ?>"><?php echo $type['title']; ?></a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="recruitment_table">
                    <ul class="recruitment_ultab">
                        <li class="recruitment_ultab_title">
                            <div>职位</div>
                            <div>人数</div>
                            <div>年龄</div>
                            <div>学历</div>
                            <div class="startTime">招聘时间</div>
                            <div class="endingTime">结束时间</div>
                            <div class="Jobtreatment"></div>
                        </li>
                        <!--第一条默认展开,需要有一个class为cur-->
                        <?php if (!empty($jobs)) { ?>
                            <?php foreach ($jobs as $key => $job) { ?>
                                <?php if ($key == 0) { ?>
                                    <li class="recruitment_ultab_item default_show">
                                        <div class="recruitment_ultab_link">
                                            <div class="Jobtitle"><span><?php echo $job['title']; ?></span></div>
                                            <div><?php echo ($job['amount'] == 0) ? '不限' : $job['amount']; ?></div>
                                            <div><?php echo ($job['age'] && $job['age_max']) ? $job['age'] . ' 至 ' . $job['age_max'] : '不限'; ?></div>
                                            <div><?php echo $job['edu']; ?></div>
                                            <div class="startTime"><?php echo date('m-d', $job['timeline']); ?></div>
                                            <div class="endingTime"><?php echo date('m-d', $job['expiretime']); ?></div>
                                            <div class="Jobtreatment">
                                        <span class="curdowm iconfont icon-arrow-down">
                                    </span></div>
                                        </div>
                                        <div class="recruitment_ultab_cont">
                                            <?php echo $job['content']; ?>
                                        </div>
                                    </li>
                                <?php } else { ?>
                                    <li class="recruitment_ultab_item">
                                        <div class="recruitment_ultab_link">
                                            <div class="Jobtitle"><span><?php echo $job['title']; ?></span></div>
                                            <div><?php echo ($job['amount'] == 0) ? '不限' : $job['amount']; ?></div>
                                            <div><?php echo ($job['age'] && $job['age_max']) ? $job['age'] . ' 至 ' . $job['age_max'] : '不限'; ?></div>
                                            <div><?php echo $job['edu']; ?></div>
                                            <div class="startTime"><?php echo date('m-d', $job['timeline']); ?></div>
                                            <div class="endingTime"><?php echo date('m-d', $job['expiretime']); ?></div>
                                            <div class="Jobtreatment">
                                        <span class="curdowm iconfont icon-arrow-down">
                                    </span></div>
                                        </div>
                                        <div class="recruitment_ultab_cont">
                                            <?php echo $job['content']; ?>
                                        </div>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once VIEWS . 'inc/footer.php'; ?>
