<footer>
    <div class="footer_main">
        <div class="home_footer_main">
            <div class="home_footer_up">
                <div class="footer_up_logo">
                    <img src="/web/shmweb/assets/images/logo_white_word.png">
                </div>
                <div class="footer_up_menu">
                    <ul>
                        <li class="footer_menu_title">关于我们</li>
                        <li><a href="<?php echo site_url('about/index'); ?>">公司简介</a></li>
                        <li><a href="<?php echo site_url('about/culture'); ?>">企业文化</a></li>
                        <li><a href="<?php echo site_url('about/index') . "#OfficeEnvironment"; ?>">办公环境</a></li>
                        <li><a href="<?php echo site_url('about/index') . "#OfficeEnvironment"; ?>">住宿环境</a></li>
                    </ul>
                    <ul>
                        <li class="footer_menu_title">课程分类</li>
                        <?php if (!empty($data['subject'])) { ?>
                            <?php foreach ($data['subject'] as $k => $v) { ?>
                                <li>
                                    <a href="<?php echo site_url('subject/info/' . $v['id']); ?>"><?php echo $v['subtitle']; ?></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <ul>
                        <li class="footer_menu_title">合作伙伴</li>
                        <?php if (!empty($data['partner_type'])) { ?>
                            <?php foreach ($data['partner_type'] as $k => $v) { ?>
                                <li>
                                    <a href="<?php echo site_url('partner/index/' . $v['id']); ?>"><?php echo $v['title']; ?></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <ul>
                        <li class="footer_menu_title">新闻资讯</li>
                        <?php if (!empty($data['news_type'])) { ?>
                            <?php foreach ($data['news_type'] as $k => $v) { ?>
                                <li>
                                    <a href="<?php echo site_url('news/index/' . $v['id']); ?>"><?php echo $v['title']; ?></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <ul>
                        <li class="footer_menu_title">联系我们</li>
                        <li><a href="<?php echo site_url('contact/us'); ?>">联系方式</a></li>
                        <li><a href="<?php echo site_url('contact/us'); ?>#OnlineMessage">在线留言</a></li>
                        <li><a href="<?php echo site_url('contact/application'); ?>">申请入学</a></li>
                        <li><a href="<?php echo site_url('contact/recruitment'); ?>">企业招聘</a></li>
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
</footer>
</body>
<script src="/web/shmweb/assets/js/jquery-2.1.4.min.js"></script>
<!-- 全屏插件 -->
<script src="/web/shmweb/assets/js/fullPage/js/fullpage.js"></script>
<script src="/web/shmweb/assets/js/jquery.lazyload/jquery.lazyload.min.js"></script>
<!--窗口弹出插件-->
<script src="/web/shmweb/assets/js/swiper/js/swiper.js"></script>
<script src="/web/shmweb/assets/js/swiper/js/swiper.animate.min.js"></script>
<!-- ie8 bootstrap -->
<script src="/web/shmweb/assets/js/bootstrap/js/html5shiv.js"></script>
<script src="/web/shmweb/assets/js/bootstrap/js/respond.min.js"></script>
<script src="/web/shmweb/assets/js/sticky-sidebar.js"></script>
<!--数字滚动插件-->
<script src="/web/shmweb/assets/js/scrollnum/num.min.js" type="text/javascript"></script>
<script src="/web/shmweb/assets/js/Rotationchart/Rotationchart.min.js" type="text/javascript"></script>
<!--分享插件-->
<script src="/web/shmweb/assets/js/shareJS/js/jquery.share.js" type="text/javascript"></script>
<!--地图-->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=tW416g6K9qLsCaR4gHOPkNfHkz9L4vG4"></script>
<script src="/web/shmweb/assets/js/home.js"></script>
<script src="/web/shmweb/assets/main.js"></script>
<script>
    window._bd_share_config = {
        "common": {
            "bdSnsKey": {},
            "bdText": "",
            "bdMini": "2",
            "bdPic": "",
            "bdStyle": "0",
            "bdSize": "16"
        }, "share": {}
    };
    with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
</script>
<script type="text/javascript">
    // 全局操作控制
    main.dataInit();
    main.eventBind();
    // 首页调用方法
    home.dataInit();
    home.eventBind();
</script>
<!--客服系统-->
<script type='text/javascript'>
    (function (m, ei, q, i, a, j, s) {
        m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
        j = ei.createElement(q),
            s = ei.getElementsByTagName(q)[0];
        j.async = true;
        j.charset = 'UTF-8';
        j.src = 'https://static.meiqia.com/dist/meiqia.js?_=t';
        s.parentNode.insertBefore(j, s);
    })(window, document, 'script', '_MEIQIA');
    _MEIQIA('entId', 134891);
    if (!/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
        // 强制打开对话窗口
        _MEIQIA('allSet', function () {
            _MEIQIA('showPanel');
        });
    } else {
        _MEIQIA('withoutBtn');
    }
</script>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap() {
        createMap(); //创建地图
        setMapEvent(); //设置地图事件
        addMapControl(); //向地图添加控件
        addMarker(); //向地图中添加marker
    }
    //创建地图函数：
    function createMap() {
        var map = new BMap.Map("allmap"); //在百度地图容器中创建一个地图
        var point = new BMap.Point(120.383865, 36.150523); //定义一个中心点坐标
        map.centerAndZoom(point, 16); //设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map; //将map变量存储在全局
    }
    //地图事件设置函数：
    function setMapEvent() {
        map.enableDragging(); //启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom(); //启用地图滚轮放大缩小
        map.enableDoubleClickZoom(); //启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard(); //启用键盘上下左右键移动地图
    }
    //地图控件添加函数：
    function addMapControl() {
    }
    //标注点数组120.383865,36.150523
    var markerArr = [{
        title: "青岛莱牛教育有限公司",
        content: "地址：青岛市市北区四流南路80号4楼纺织谷",
        point: "120.383865|36.150523",
        isOpen: 1,
        icon: {w: 23, h: 25, l: 0, t: 21, x: 9, lb: 12}
    }];
    //创建marker
    function addMarker() {
        for (var i = 0; i < markerArr.length; i++) {
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0, p1);
            // var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point);
            // marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title, {"offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20)});
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                borderColor: "#808080",
                color: "#333",
                cursor: "pointer"
            });

            (function () {
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click", function () {
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open", function () {
                    _marker.getLabel().hide();
                });
                _iw.addEventListener("close", function () {
                    _marker.getLabel().show();
                });
                label.addEventListener("click", function () {
                    _marker.openInfoWindow(_iw);
                });
                if (!!json.isOpen) {
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i) {
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>" + json.content + "</div>");
        return iw;
    }
    //      //创建一个Icon
    function createIcon(json) {
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w, json.h), {
            imageOffset: new BMap.Size(-json.l, -json.t),
            infoWindowOffset: new BMap.Size(json.lb + 5, 1),
            offset: new BMap.Size(json.x, json.h)
        });
        return icon;
    }
    $(function () {
        if (document.getElementById("allmap")) {
            initMap(); //创建和初始化地图
        }
    });
</script>
</html>
