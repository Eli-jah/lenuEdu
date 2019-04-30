<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
</head>
<body>
<?php include_once VIEWS . 'inc/nav.php'; ?>

<!--内容开始-->
<div class="Transportation">
    <div class="headerPartition" style="background: url('<?php echo $banner ?>') center no-repeat;">
        <div class="opacity_box"></div>
        <div class="Partition-title">
            <h1 class="title-zh"><?php echo $active_type['title']; ?></h1>
            <h1 class="title-en"><?php echo $active_type['title_en']; ?></h1>
        </div>
        <div class="Partition-nav">
            <ul class="nav-breadcrumb">
                <li><a href="<?php echo site_url('') ?>">首页</a></li>
                <li><a href="javascript:void(0);">合作伙伴</a></li>
                <li class="active"><a href="javascript:void(0);"><?php echo $active_type['title']; ?></a></li>
            </ul>
            <ul class="Partition-nav-tabs Transportation_tabs">
                <?php if (!empty($partner_type)): ?>
                    <?php foreach ($partner_type as $k => $v): ?>
                        <li class="<?php if (!empty($active_type) && $active_type['id'] == $v['id'])
                            echo 'active' ?>"><a href="<?php echo site_url('partner/index/' . $v['id']) ?>"><?php echo $v['title'] ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="TextContent">
        <!--院校合作-->
        <div class="Colleges_partner partner_banners">
            <div class="view">
                <div class="swiper-container gallery-top" id="Colleges_partner_top">
                    <a class="arrow arrow-left" href="javascript:void(0)"></a>
                    <a class="arrow arrow-right" href="javascript:void(0)"></a>
                    <div class="swiper-wrapper">

                        <?php if (!empty($partner_list)): ?>
                            <?php foreach ($partner_list as $k => $v): ?>
                                <div class="swiper-slide" style="background-image: url('/web/shmweb/assets/images/partner02.png');">
                                    <div class="slide_textContent">
                                        <h3><?php echo $v['title']; ?></h3>
                                        <?php echo $v['content']; ?>
                                    </div>
                                    <div class="content_img">
                                        <img src="<?php echo tag_photo($v['back_photo']); ?>"/>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="preview">
                <a class="arrow arrow-left" href="javascript:void(0)"></a>
                <a class="arrow arrow-right" href="javascript:void(0)"></a>
                <div class="swiper-container gallery-thumbs" id="Colleges_partner_thumbs">
                    <div class="swiper-wrapper">
                        <?php if (!empty($partner_list)): ?>
                            <?php foreach ($partner_list as $k => $v): ?>
                                <div class="swiper-slide <?php if ($k == 0)
                                    echo 'active-nav' ?>" code_num='<?php echo $k; ?>'>
                                    <img src="<?php echo tag_photo($v['photo']); ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--企业合作-->
        <div class="swiper-container dis_n" id="Enterprise_partner">
        </div>
        <!--移动端展示-->
        <div class="MobilePartner">
            <ul class="MobilePartner_menu">
                <?php if (!empty($partner_type)): ?>
                    <?php foreach ($partner_type as $k => $v): ?>
                        <li class="<?php if (!empty($active_type) && $active_type['id'] == $v['id'])
                            echo 'active' ?>"><a href="<?php echo site_url('partner/index/' . $v['id']) ?>"><?php echo $v['title'] ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <ul class="MobilePartner_lists">
                <li class="list_tab activeText">

                    <?php if (!empty($partner_list)): ?>
                        <?php foreach ($partner_list as $k => $v): ?>
                            <div class="list_tab_item">
                                <div class="item_left">
                                    <img src="<?php echo tag_photo($v['photo']); ?>">
                                </div>
                                <div class="item_right">
                                    <h3><?php echo $v['title']; ?></h3>
                                    <?php echo $v['content']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </li>
            </ul>
        </div>
    </div>
</div>


<?php include_once VIEWS . 'inc/footer.php'; ?>