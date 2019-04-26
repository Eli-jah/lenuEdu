<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>莱牛教育</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link href="/web/shmweb/assets/images/favicon.ico" rel="shortcut icon">
    <link href="/web/shmweb/assets/images/favicon.png" rel="shortcut icon">
    <link rel="stylesheet" href="/web/shmweb/assets/js/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/web/shmweb/assets/js/animate.css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/web/shmweb/assets/js/swiper/css/swiper.min.css"/>
    <link rel="stylesheet" type="text/css" href="/web/shmweb/assets/js/fullPage/css/fullpage.min.css"/>
    <link rel="stylesheet" type="text/css" href="/web/shmweb/assets/fonts/iconfont.css">
    <!--分享-->
    <link rel="stylesheet" type="text/css" href="/web/shmweb/assets/js/shareJS/css/share.min.css">
    <link rel="stylesheet" href="/web/shmweb/assets/css/style.css">
</head>
<body>
<header>
    <div class="header_content">
        <div class="header_content_top">
            <div class="logo">
                <!--默认显示-->
                <a href="index.php">
                    <img class="nomarl_show_logo" src="/web/shmweb/assets/images/logo_white.png" title="莱牛教育">
                    <img class="nomarl_show_logo_theme dis_n" src="/web/shmweb/assets/images/logo_theme_noword.png" title="莱牛教育">
                    <!--header展开时显示-->
                    <img class="active_show_logo" src="/web/shmweb/assets/images/logo_theme.png" title="莱牛教育"/>
                </a>
            </div>
            <!--header展开时显示-->
            <div class="header_menus">
                <ul class="sorting_menu">
                    <li class="active"><a href="javascript:void(0);">关于我们</a></li>
                    <li><a href="javascript:void(0);">课程分类</a></li>
                    <li><a href="javascript:void(0);">合作伙伴</a></li>
                    <li><a href="javascript:void(0);">新闻资讯</a></li>
                    <li><a href="javascript:void(0);">联系我们</a></li>
                </ul>
                <div class="content_menu">
                    <ul class="aboutus_menu">
                        <li><a href="aboutus_introduction.php">公司简介</a></li>
                        <li><a href="aboutus.php">企业文化</a></li>
                        <li><a href="aboutus.php#OfficeEnvironment">办公环境</a></li>
                        <li><a href="aboutus.php#OfficeEnvironment">住宿环境</a></li>
                    </ul>
                    <ul class="classification_menu">
                        <li><a href="Curriculum.php">ETL</a></li>
                        <li><a href="Curriculum.php">JAVA</a></li>
                        <li><a href="Curriculum.php">UI</a></li>
                        <li><a href="Curriculum.php">Python</a></li>
                    </ul>
                    <ul class="enterprise_menu">
                        <li><a href="Transportation.php">院校合作</a></li>
                        <li><a href="Enterprisepartner.php">企业合作</a></li>
                    </ul>
                    <ul class="news _menu">
                        <li><a href="NewsLists.php">公司新闻</a></li>
                        <li><a href="NewsLists.php">行业资讯</a></li>
                        <li><a href="NewsLists.php">招生动态</a></li>
                    </ul>
                    <ul class="contactus_menu">
                        <li><a href="Contactus.php">联系方式</a></li>
                        <li><a href="Contactus.php#OnlineMessage">在线留言</a></li>
                        <li><a href="Entrance.php">申请入学</a></li>
                        <li><a href="Recruitment.php">企业招聘</a></li>
                    </ul>
                </div>
            </div>
            <div class="menu_box">
                <a class="show_headerinfo" href="javascript:void(0);">
                    <img class="nomarl_show_menu" src="/web/shmweb/assets/images/menu_index.png">
                    <img class="nomarl_show_menu_theme dis_n" src="/web/shmweb/assets/images/mene_index_theme.png">
                </a>
                <!--头部菜单展开式显示-->
                <div class="closeercode">
                    <div class="closeercode_close">
                        <a href="javascript:void(0);" class="header_close_btn">
                            <span class="close_btn_left"></span>
                            <span class="close_btn_right"></span>
                        </a>
                    </div>
                    <div class="closeercode_code dis_n">
                        <img src="/web/shmweb/assets/images/ercode.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="header_content_bottom">
            <ul>
                <li>
                    <img src="/web/shmweb/assets/images/icon/address_icon.png"/>
                    <span>山东省青岛市市北区四流南路80号纺织谷  </span>
                </li>
                <li>
                    <img src="/web/shmweb/assets/images/icon/qq_icon.png"/>
                    <span>471913346</span>
                </li>
                <li>
                    <img src="/web/shmweb/assets/images/icon/tel_icon.png"/>
                    <span>18560678853</span>
                </li>
                <li>
                    <img src="/web/shmweb/assets/images/icon/phone_icon.png"/>
                    <span>0532-58971971</span>
                </li>
            </ul>
            <div class="ercode_btn_box">
                <a href="javascript:void(0);">
                    <img src="/web/shmweb/assets/images/icon/ercode_icon.png"/>
                </a>
            </div>
        </div>
    </div>
</header>
<!--隐藏菜单移动端显示-->
<div class="out_box">
    <div class="mobile_menu" id="mobile_menu">
        <button id="nav-xs-btn">
            <span class="btn-line"></span>
            <span class="btn-line"></span>
        </button>
        <ul class="nav-list1">
            <li><a href="index.php">首页</a></li>
            <li class="mobile_more">
                <a href="javascript:void(0);">关于我们</a>
                <ul class="nav-list2">
                    <li><a href="aboutus_introduction.php">公司简介</a></li>
                    <li><a href="aboutus.php">企业文化</a></li>
                    <li><a href="aboutus.php">荣誉资质</a></li>
                    <li><a href="aboutus.php#OfficeEnvironment">办公环境</a></li>
                    <li><a href="aboutus.php#OfficeEnvironment">住宿环境</a></li>
                </ul>
            </li>
            <li class="mobile_more">
                <a href="javascript:void(0);">课程分类</a>
                <ul class="nav-list2">
                    <li><a href="Curriculum.php">ETL</a></li>
                    <li><a href="Curriculum.php">JAVA</a></li>
                    <li><a href="Curriculum.php">UI</a></li>
                    <li><a href="Curriculum.php">Python</a></li>
                </ul>
            </li>
            <li class="mobile_more">
                <a href="javascript:void(0);">合作伙伴</a>
                <ul class="nav-list2">
                    <li><a href="Transportation.php">院校合作</a></li>
                    <li><a href="Enterprisepartner.php">企业合作</a></li>
                </ul>
            </li>
            <li class="mobile_more">
                <a href="javascript:void(0);">新闻资讯</a>
                <ul class="nav-list2">
                    <li><a href="NewsLists.php">公司新闻</a></li>
                    <li><a href="NewsLists.php">行业资讯</a></li>
                    <li><a href="NewsLists.php">招生动态</a></li>
                </ul>
            </li>
            <li class="mobile_more">
                <a href="javascript:void(0);">联系我们</a>
                <ul class="nav-list2">
                    <li><a href="Contactus.php">联系方式</a></li>
                    <li><a href="Contactus.php#OnlineMessage">在线留言</a></li>
                    <li><a href="Entrance.php">申请入学</a></li>
                    <li><a href="Recruitment.php">企业招聘</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--右侧导航-->
<div class="rightnav">
    <ul>
        <li>
            <a href="javascript:void(0);" onclick="_MEIQIA('showPanel')">
                <img src="/web/shmweb/assets/images/icon/online.png"/>
                <p>在线咨询</p>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="_MEIQIA('showPanel')">
                <img src="/web/shmweb/assets/images/icon/free.png"/>
                <p>免费试学</p>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="_MEIQIA('showPanel')">
                <img src="/web/shmweb/assets/images/icon/course.png"/>
                <p>课程咨询</p>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="_MEIQIA('showPanel')">
                <img src="/web/shmweb/assets/images/icon/applyfor.png"/>
                <p>申请入学</p>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" onclick="_MEIQIA('showPanel')">
                <img src="/web/shmweb/assets/images/icon/telphone.png"/>
                <p>招生电话</p>
            </a>
        </li>
        <li class="Totop dis_n">
            <a href="javascript:void(0);" class="returnTop">
                <img src="/web/shmweb/assets/images/icon/top.png"/>
                <p>Top</p>
            </a>
        </li>
    </ul>
</div>
