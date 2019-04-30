<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
</head>
<body>
<?php include_once VIEWS . 'inc/nav.php'; ?>

<!--内容开始-->
<div class="NewsLists">
    <div class="headerPartition" style="background-image: url(<?php echo $banner; ?>);">
        <div class="opacity_box"></div>
        <div class="Partition-title">
            <h1 class="title-zh">新闻资讯</h1>
            <h1 class="title-en">News and Information</h1>
        </div>
        <div class="Partition-nav">
            <ul class="nav-breadcrumb">
                <li><a href="<?php echo site_url(''); ?>">首页</a></li>
                <li class="active"><a
                        href="<?php echo site_url('news/index/' . $active_type['id']); ?>"><?php echo $active_type['title']; ?></a>
                </li>
            </ul>
            <ul class="Partition-nav-tabs">
                <?php if (!empty($types)) { ?>
                    <?php foreach ($types as $type) { ?>
                        <?php if ($type['id'] == $active_type['id']) { ?>
                            <li class="active">
                                <a href="<?php echo site_url('news/index/' . $type['id']); ?>"><?php echo $type['title']; ?></a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?php echo site_url('news/index/' . $type['id']) ?>"><?php echo $type['title']; ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="TextContent" style="background-image: url(<?php echo $bg_image; ?>);">
        <div class="wrapper">
            <div class="pagePart_title">
                <h1><?php echo $active_type['title']; ?></h1>
                <p><?php echo $active_type['title_en']; ?></p>
            </div>
            <div class="NewsLists_items">
                <?php if (!empty($fenye['new_con'])) { ?>
                    <?php foreach ($fenye['new_con'] as $news) { ?>
                        <div class="NewsLists_item">
                            <div class="item_date">
                                <span class="date_day"><?php echo date('d', $news['timeline']); ?></span>
                                <span class="date_year"><?php echo date('Y.m', $news['timeline']); ?></span>
                            </div>
                            <div class="item_titlebrief">
                                <a href="<?php echo site_url('news/show/' . $news['id']); ?>">
                                    <div class="item_title">
                                        <h3><?php echo $news['title']; ?></h3>
                                    </div>
                                    <div class="item_brief">
                                        <p><?php echo $news['intro']; ?></p>
                                    </div>
                                </a>
                            </div>
                            <div class="item_operation">
                                <div class="Readingvolume">
                                    <p>
                                        <img src="/web/shmweb/assets/images/icon/eye.png"/>
                                        <span><?php echo $news['click']; ?></span>次</p>
                                </div>
                                <div class="Viewdetails">
                                    <a href="<?php echo site_url('news/show/' . $news['id']); ?>">查看详情</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <!--页码区，需要返回值，当前页码值，总页数，页码采用循环方式渲染-->                        <!--<div class="page">
            	<a class="prev" href="#">上一页</a>
            	<a class="active" href="#">1</a></li>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a class='omit' href="javascript:void(0)">...</a>
                <a href="#">10</a>
            	<a class="next" href="#">下一页</a>
            </div>-->                                    <!--<div class="Pagearea page">
                <div class="Previouspage page_btn">
                    <a href="javascript:void(0)">上一页</a>
                </div>
                <ul>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><span class='over'>...</span></li>
                    <li><a href="#">10</a></li>
                </ul>
                <div class="Nextpage page_btn">
                    <a href="javascript:void(0)">下一页</a>
                </div>
            </div>-->
            <?php echo $fenye['pagelink']; ?>
        </div>
    </div>
</div>
<?php include_once VIEWS . 'inc/footer.php'; ?>
</body>
</html>
