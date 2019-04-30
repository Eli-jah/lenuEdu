<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
</head>
<body>
<?php include_once VIEWS . 'inc/nav.php'; ?>

<!--内容开始-->
<div class="aboutus">
    <div class="headerPartition" style="background-image: url('<?php echo $banner ?>');">
        <div class="opacity_box"></div>
        <div class="Partition-title">
            <h1 class="title-zh">关于我们</h1>
            <h1 class="title-en">ABOUT US</h1>
        </div>
        <div class="Partition-nav">
            <ul class="nav-breadcrumb">
                <li><a href="<?php echo site_url('') ?>">首页</a></li>
                <li class="active"><a href="<?php echo site_url('about/index') ?>">关于我们</a></li>
            </ul>
            <ul class="Partition-nav-tabs">
                <li class="active"><a href="<?php echo site_url('about/index') ?>">公司简介</a></li>
                <li><a href="<?php echo site_url('about/culture') ?>">企业文化</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <!--公司简介-->
        <div class="container_partcontent container_part1" name='companyProfile' id="companyProfile"
             style="background-image: url('/web/shmweb/assets/images/aboutus_img1.png');">
            <div class="container_part1_left">
                <div class="part1_leftContent">

                    <div class="part1_leftImg" align="left">
                        <img src="<?php echo tag_photo(tag_single(42, "photo")); ?>"/>
                    </div>
                    <div class="part1_leftContent_logo">
                        <img src="/web/shmweb/assets/images/logo_theme.png"/>
                    </div>
                    <?php echo tag_single(41, "content"); ?>
                </div>
            </div>
            <div class="container_part1_right">
                <img src="<?php echo tag_photo(tag_single(43, "photo")); ?>"/>
            </div>
        </div>

        <!--教学环境-->
        <div class="container_part4" id="OfficeEnvironment" name='OfficeEnvironment'>
            <div class="pagePart_title">
                <h1>教学环境</h1>
                <p>Teaching environment</p>
            </div>
            <div class="container_part4_content introduction_banner_pic">
                <div class="office_accom_tabs">
                    <ul class="container_tabs">
                        <li class="active officeBtn" name='officeenvironment'><a href="javascript:void(0);">办公环境</a></li>
                        <li name='accommodation'><a href="javascript:void(0);">住宿环境</a></li>
                    </ul>
                    <div class="nav-marker" id="markerLine"></div>
                </div>
                <div class="picture_display">
                    <!--办公环境图片展示-->
                    <div class="picture_banner active" id="aboutusoffice_banner">
                        <div class="bank">
                            <?php if (!empty($office)): ?>
                                <?php foreach ($office as $k => $v): ?>
                                    <a rel="<?php echo $v; ?>" href="javascript:void(0);"></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!--住宿环境展示-->
                    <div class="picture_banner" id="aboutusaccommod_banner">
                        <div class="bank">
                            <?php if (!empty($accommodation)): ?>
                                <?php foreach ($office as $k => $v): ?>
                                    <a rel="<?php echo $v; ?>" href="javascript:void(0);"></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo site_url('contact/index') ?>" class="clickbtn registrationbtn">我要报名</a>
            </div>
        </div>
    </div>
</div>

<?php include_once VIEWS . 'inc/footer.php'; ?>
