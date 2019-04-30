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
                <li><a href="<?php echo site_url(''); ?>">首页</a></li>
                <li class="active"><a href="<?php echo site_url('about/index'); ?>">关于我们</a></li>
            </ul>
            <ul class="Partition-nav-tabs">
                <li><a href="<?php echo site_url('about/index'); ?>">公司简介</a></li>
                <li class="active"><a href="<?php echo site_url('about/culture'); ?>">企业文化</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="container_partcontent" name='corporateCulture' id="corporateCulture">
            <!--助力企业腾飞-->
            <div class="container_part2" style="background-image: url('/web/shmweb/assets/images/aboutus_img1.png');">
                <div class="pagePart_title">
                    <h1>助力企业腾飞</h1>
                    <p>Helping Enterprises to Take off</p>
                </div>
                <div class="timeLine_content">
                    <div class="timeLine_box">
                        <ul class="timeLine">
                            <?php if (!empty($culture)) { ?>
                                <?php foreach ($culture as $k => $v) { ?>
                                    <li>
                                        <h3><?php echo$v['title']; ?></h3>

                                        <?php echo$v['content']; ?>

                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!--荣誉资质-->
            <div class="container_part3" id="company_honor">
                <div class="pagePart_title">
                    <h1>荣誉资质</h1>
                    <p>Honors</p>
                </div>
                <!--办公环境图片展示-->
                <div class="aboutusHonors">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-container" id="aboutusHonors_banner">
                        <div class="swiper-wrapper">

                            <?php if (!empty($honor)) { ?>
                                <?php foreach ($honor as $k => $v) { ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo tag_photo($v['photo']); ?>">
                                        <p><?php echo$v['title']; ?></p>
                                    </div>
                                <?php } ?>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        <!--教学环境-->
        <div class="container_part4" id="OfficeEnvironment" name='OfficeEnvironment'>
            <div class="pagePart_title">
                <h1>教学环境</h1>
                <p>Teaching Environment</p>
            </div>
            <div class="container_part4_content aboutus_banner_pic">
                <div class="office_accom_tabs">
                    <ul class="container_tabs">
                        <li class="active" name='officeenvironment'><a href="javascript:void(0);">办公环境</a></li>
                        <li name='accommodation'><a href="javascript:void(0);">住宿环境</a></li>
                    </ul>
                    <div class="nav-marker" id="markerLine"></div>
                </div>
                <div class="picture_display">
                    <!--办公环境图片展示-->
                    <div class="picture_banner active" id="aboutusoffice_banner">
                        <div class="bank">
                            <?php if (!empty($office)) { ?>
                                <?php foreach ($office as $k => $v) { ?>
                                    <a rel="<?php echo $v; ?>" href="javascript:void(0);"></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <!--住宿环境展示-->
                    <div class="picture_banner" id="aboutusaccommod_banner">
                        <div class="bank">
                            <?php if (!empty($accommodation)) { ?>
                                <?php foreach ($office as $k => $v) { ?>
                                    <a rel="<?php echo $v; ?>" href="javascript:void(0);"></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo site_url('contact/index'); ?>" class="clickbtn registrationbtn">我要报名</a>
            </div>
        </div>
    </div>
</div>

<?php include_once VIEWS . 'inc/footer.php'; ?>
