<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
</head>
<body>
<?php include_once VIEWS . 'inc/nav.php'; ?>

<!--内容开始-->
<div class="NewsListsDetail">
    <div class="headerPartition" style="background: url(<?php echo $banner; ?>) center no-repeat;">
        <div class="opacity_box"></div>
        <div class="Partition-title">
            <h1 class="title-zh">新闻资讯</h1>
            <h1 class="title-en">News and Information</h1>
        </div>
        <div class="Partition-nav">
            <ul class="nav-breadcrumb">
                <li><a href="<?php echo site_url(''); ?>">首页</a></li>
                <li class="active">
                    <a href="<?php echo site_url('news/index/' . $active_type['id']); ?>"><?php echo $active_type['title']; ?></a>
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
    <div class="TextContent">
        <div class="wrapper">
            <div class="pagePart_title">
                <h1><?php echo $active_type['title']; ?></h1>
                <p><?php echo $active_type['title_en']; ?></p>
            </div>
            <div class="Newsdetail_content">
                <h3><?php echo $info['title']; ?></h3>
                <div class="newsinfo">
                    <div class="newsinfo_left">
                        <ul>
                            <li>
                                <img src="/web/shmweb/assets/images/icon/news_edit.png"/>
                                <span><?php echo $info['author'] ? $info['author'] : '青岛莱牛教育'; ?></span>
                            </li>
                            <li>
                                <img src="/web/shmweb/assets/images/icon/news_time.png"/>
                                <span><?php echo date('Y-m-d', $info['timeline']); ?></span>
                            </li>
                            <li>
                                <img src="/web/shmweb/assets/images/icon/news_eye.png"/>
                                <span><?php echo $info['click']; ?>次</span>
                            </li>
                        </ul>
                    </div>
                    <div class="newsinfo_right">
                        <div class="bdsharebuttonbox">
                            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                            <a href="#" class="bds_sqq" data-cmd="sqq" title="分享给QQ好友"></a>
                            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                        </div>
                    </div>
                </div>
                <div class="newsprofile">
                    <p class="newsprofile_top Quotation">
                        <img src="/web/shmweb/assets/images/leftQuotation.png">
                    </p>
                    <div class="newsprofile_center">
                        <p><?php echo $info['text']; ?></p>
                    </div>
                    <p class="newsprofile_bottom Quotation">
                        <img src="/web/shmweb/assets/images/rightQuotation.png">
                    </p>
                </div>
                <div class="newscontent">
                    <div class="newscontent_text" style="z-index: 9999;">
                        <?php echo $info['content']; ?>
                    </div>
                    <div class="border_line"></div>
                    <div class="newscontent_btns">
                        <?php if (!empty($updown['next'])) { ?>
                            <a href="<?php echo site_url('news/show/' . $updown['next']['id']); ?>">上一篇</a>
                        <?php } else { ?>
                            <a href="javascript:void(0);">第一篇</a>
                        <?php } ?>
                        <?php if (!empty($updown['prev'])) { ?>
                            <a href="<?php echo site_url('news/show/' . $updown['prev']['id']); ?>">下一篇</a>
                        <?php } else { ?>
                            <a href="javascript:void(0);">没有了</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once VIEWS . 'inc/footer.php'; ?>

