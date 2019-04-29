<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php include_once VIEWS . 'inc/head.php'; ?>
</head>
<body>
<?php include_once VIEWS . 'inc/nav.php'; ?>

<!--内容开始-->


<div class="index_content">
    <ul id="menu">
        <li data-menuanchor="page1" class="active"><a href="#page1"><span></span></a></li>
        <li data-menuanchor="page2"><a href="#page2"><span></span></a></li>
        <li data-menuanchor="page3"><a href="#page3"><span></span></a></li>
        <li data-menuanchor="page4"><a href="#page4"><span></span></a></li>
        <li data-menuanchor="page5"><a href="#page5"><span></span></a></li>
        <li data-menuanchor="page6"><a href="#page6"><span></span></a></li>
    </ul>
    <div id="full_page">
        <!--第一屏内容-->
        <div class="section">
            <div class="swiper-container" id="page1_banner">
                <div class="swiper-wrapper">
                    <?php foreach($banners as $key => $banner) { ?>
                        <div class="swiper-slide slide_<?php echo $key+1; ?>" style="background: url(<?php echo $banner['photo_url']; ?>) center no-repeat;">
                            <?php echo $banner['content']; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--第二屏内容-->
        <div class="section">
            <div class="fullpage2" style="background: url(<?php echo $company['bg_image']; ?>) center no-repeat;">
                <div class="opacity_box"></div>
                <div class="fullpage2_content">
                    <div class="fullpage2_content_title">
                        <h3><?php echo $company['titles']['title']; ?></h3>
                        <span><?php echo $company['titles']['title_en']; ?></span>
                    </div>
                    <?php echo $company['intro']; ?>
                </div>
            </div>
        </div>
        <!--第三屏内容-->
        <div class="section">
            <div class="fullpage3">
                <div class="fullpage3_content_title">
                    <h3><?php echo $courses['titles']['title']; ?></h3>
                    <span><?php echo $courses['titles']['title_en']; ?></span>
                </div>
                <div class="fullpage3_content_main">
                    <div class="fp3_content_main_left">
                        <img src="<?php echo $courses['display_image']; ?>">
                    </div>
                    <?php echo $courses['intro']; ?>
                </div>
            </div>
        </div>
        <!--第四屏内容-->
        <div class="section">
            <div class="fullpage4" style="background: url(<?php echo $partners['bg_image'] ?>) center no-repeat;">
                <div class="opacity_box"></div>
                <div class="fullpage4_content">
                    <div class="fullpage4_title">
                        <h3><?php echo $partners['titles']['title']; ?></h3>
                        <span><?php echo $partners['titles']['title_en']; ?></span>
                    </div>
                    <?php echo $partners['intro']; ?>
                </div>
            </div>
        </div>
        <!--第五屏内容-->
        <div class="section">
            <div class="fullpage5" style="background: url(<?php echo $news['bg_image']; ?>) center no-repeat;">
                <div class="opacity_box"></div>
                <div class="fullpage5_content">
                    <div class="fullpage5_title">
                        <h3><?php echo $news['titles']['title']; ?></h3>
                        <span><?php echo $news['titles']['title_en']; ?></span>
                    </div>
                    <div class="fullpage5_main">
                        <div class="swiper-container" id="page5_banner">
                            <div class="swiper-wrapper">
                                <?php $_ii = 0;
                                while ($_ii++ < 3): ?>
                                    <div class="swiper-slide">
                                        <div class="opacity_box"></div>
                                        <div class="swiper-slide-content">
                                            <div class="parts_img">
                                                <img src="/web/shmweb/assets/images/banner/banner5_imgbanner1.png">
                                            </div>
                                            <div class="parts_textcontent">
                                                <div class="parts_textcontent_title">
                                                    <h3 title="大数据人工智能行业终于爆发了">
                                                        大数据人工智能行业终于爆发了！
                                                    </h3>
                                                </div>
                                                <p class="parts_textcontent_time">
                                                    <img src="/web/shmweb/assets/images/icon/time.png">
                                                    <span>2019.3.28</span>
                                                </p>
                                                <div class="parts_textcontent_content">
                                                    <p>
                                                        随着科学技术的不断进步，大数据时代已经到来，其是以数据技术为基础，
                                                        在人类学习生活各个方面都起到不可或缺的作用，它促进了社会的转型和媒介的发展。
                                                        在企业品牌传播方面，以大量的数据为基础并且进行深度挖掘，来获得消费者状态、
                                                        品牌传播的有效方法和传播效果。一般的数据分析方法已经落伍，满足不了企业品牌
                                                        传播的更高要求。所以，很多企业关注的问题就在于
                                                    </p>
                                                </div>
                                                <a href="NewsLists.php">了解更多</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--第六屏内容-->
        <div class="section">
            <div class="fullpage6" style="background: url(<?php echo $achievement['bg_image'] ?>) center no-repeat;">
                <div class="opacity_box"></div>
                <div class="fullpage6_content">
                    <div class="fullpage6_title">
                        <h3><?php echo $achievement['titles']['title']; ?></h3>
                        <span><?php echo $achievement['titles']['title_en']; ?></span>
                    </div>
                    <?php echo $achievement['intro']; ?>
                </div>
            </div>
        </div>
        <!--footer内容。这个是首页的footer，其他内页的footer放在footer.php文件中-->
        <div class="section fp-auto-height">
            <div class="home_footer_main">
                <div class="home_footer_up">
                    <div class="footer_up_logo">
                        <img src="/web/shmweb/assets/images/logo_white_word.png">
                    </div>
                    <div class="footer_up_menu">
                        <ul>
                            <li class="footer_menu_title">关于我们</li>
                            <li><a href="aboutus_introduction.php">公司简介</a></li>
                            <li><a href="aboutus.php">企业文化</a></li>
                            <li><a href="aboutus.php">办公环境</a></li>
                            <li><a href="aboutus.php">住宿环境</a></li>
                        </ul>
                        <ul>
                            <li class="footer_menu_title">课程分类</li>
                            <li><a href="Curriculum.php">ETL</a></li>
                            <li><a href="Curriculum.php">JAVA</a></li>
                            <li><a href="Curriculum.php">UI</a></li>
                            <li><a href="Curriculum.php">Python</a></li>
                        </ul>
                        <ul>
                            <li class="footer_menu_title">合作伙伴</li>
                            <li><a href="Transportation.php">院校合作</a></li>
                            <li><a href="Enterprisepartner.php">企业合作</a></li>
                        </ul>
                        <ul>
                            <li class="footer_menu_title">新闻资讯</li>
                            <li><a href="NewsLists.php">公司新闻</a></li>
                            <li><a href="NewsLists.php">行业资讯</a></li>
                            <li><a href="NewsLists.php">招生动态</a></li>
                        </ul>
                        <ul>
                            <li class="footer_menu_title">联系我们</li>
                            <li><a href="Contactus.php">联系方式</a></li>
                            <li><a href="Contactus.php">在线留言</a></li>
                            <li><a href="Entrance.php">申请入学</a></li>
                            <li><a href="Recruitment.php">企业招聘</a></li>
                        </ul>
                    </div>
                    <div class="footer_up_local">
                        <p><span>地址 ：</span><span><?php echo $data['footer_info']['address']; ?></span></p>
                        <p><span>电话 ：</span><span><?php echo $data['footer_info']['telephone']; ?></span></p>
                        <p><span>手机 ：</span><span><?php echo $data['footer_info']['phone']; ?></span></p>
                        <p><span>Q Q ：</span><span><?php echo $data['footer_info']['qq']; ?></span></p>
                        <div class="bdsharebuttonbox">
                            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                            <a href="#" class="bds_sqq" data-cmd="sqq" title="分享给QQ好友"></a>
                            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                        </div>
                    </div>
                    <div class="footer_up_ercode">
                        <div class="footer_ercode_box">
                            <img src="<?php echo $data['footer_info']['qr_code']; ?>">
                        </div>
                        <span>关注微信</span>
                    </div>
                </div>
                <div class="home_footer_down">
                    <?php echo $data['footer_info']['icp']; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once VIEWS . 'inc/footer.php'; ?>

