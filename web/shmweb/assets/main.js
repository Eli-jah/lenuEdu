//原型方法 判断dom节点是否存在
(function($) {
    $.fn.exist = function(){ 
        if($(this).length>=1){
            return true;
        }
        return false;
    };
})(jQuery);
var main = {
    data: {},
    dataInit: function(){
        var factwidth = $(".sorting_menu").find('li').width()+10;
        $(".content_menu").find("ul").css("width",factwidth);
        //初始化关于我们的轮播图
        var aboutusoffice, aboutusaccommod,viewSwiper,previewSwiper;
        if ($(".introduction_banner_pic").exist()) {
            if(!/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                imf.create("aboutusoffice_banner", 0.5, .8, 10);
                imf.create("aboutusaccommod_banner", 0.5, .8, 10);
            }else {
                imf.create("aboutusoffice_banner", 0.25, .8, 10);
                imf.create("aboutusaccommod_banner", 0.25, .8, 10);
            }
        }
        if ($(".aboutus_banner_pic").exist()) {
            if(!/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                imf.create("aboutusoffice_banner", 0.5, .8, 10);
                imf.create("aboutusaccommod_banner", 0.5, .8, 10);
            }else {
                imf.create("aboutusoffice_banner", 0.25, .8, 10);
                imf.create("aboutusaccommod_banner", 0.25, .8, 10);
            }
        }
        if($('#aboutusHonors_banner').exist()) {
            main.fn.swiperinit_aboutusHonors();
        }
        if($('.partner_banners').exist()) {
            //合作伙伴轮播图
            viewSwiper = new Swiper('.view .swiper-container', {
                speed: 1000,
                on:{
                    slideChangeTransitionStart: function() {
                       updateNavPosition()
                    }
                }
            });
            $('.view .arrow-left,.preview .arrow-left').on('click', function(e) {
                e.preventDefault();
                if (viewSwiper.activeIndex == 0) {
                    viewSwiper.slideTo(viewSwiper.slides.length - 1, 1000);
                    return
                }
                viewSwiper.slidePrev()
            });
            $('.view .arrow-right,.preview .arrow-right').on('click', function(e) {
                e.preventDefault();
                if (viewSwiper.activeIndex == viewSwiper.slides.length - 1) {
                    viewSwiper.slideTo(0, 1000);
                    return
                }
                viewSwiper.slideNext()
            });
            previewSwiper = new Swiper('.preview .swiper-container', {
                slidesPerView: 5,
                spaceBetween: 15,
                centeredSlides: true,
                slideToClickedSlide: true,
                allowTouchMove: false,
//              watchSlidesVisibility: true,
//              watchSlidesProgress: true,
                on:{
//                  tap: function() {
//                      console.log($(this).attr("code_num"));
////                      console.log(previewSwiper.activeIndex)
////                      console.log(previewSwiper.clickedIndex)
//                      viewSwiper.slideTo(previewSwiper.clickedIndex);
//                  }
                }
        });
        $(".preview .swiper-slide").on("click",function(){
            console.log($(this).attr("code_num"));
            var active_num = $(this).attr("code_num");
            viewSwiper.slideTo(active_num);
        })
        //切换缩略图的活动图片
        function updateNavPosition() {
            $('.preview .active-nav').removeClass('active-nav');
            var activeNav = $('.preview .swiper-slide').eq(viewSwiper.activeIndex).addClass('active-nav');
            if (!activeNav.hasClass('swiper-slide-visible')) {
                if (activeNav.index() > previewSwiper.activeIndex) {
//                  var thumbsPerNav = Math.floor(previewSwiper.width / activeNav.width()) - 1;
//                      previewSwiper.slideTo(activeNav.index() - thumbsPerNav)
                    previewSwiper.slideTo(viewSwiper.activeIndex, 1000, false);//切换到指定slide，速度为1秒
                } else {
//                      previewSwiper.slideTo(activeNav.index())
                    previewSwiper.slideTo(viewSwiper.activeIndex, 1000, false);//切换到指定slide，速度为1秒
                }
            }
        }
        }
        //合作伙伴移动端选项卡切换
        if($(".MobilePartner").exist()){
            $(".MobilePartner_menu li").each(function(index) {
                $(this).mouseenter(function() {
                    $(".MobilePartner_menu li.active").removeClass("active");
                    $(this).addClass("active");
                    $(".MobilePartner_lists li.activeText").removeClass("activeText");
                    $(".list_tab").eq(index).addClass("activeText");
                });
            })
        }
        if ($('.CourseRotation').exist()) {
            main.fn.CourseRotation()
        }  
    },
    eventBind:function(){
        //判断是否为移动端
        if(!/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
            $(".show_headerinfo").on("click",function(){
                $(".header_content").addClass("active");
            })
            $(".header_close_btn").on("click",function(){
                $(".header_content").removeClass("active");
            })
        }else {
            $(".show_headerinfo").on("click",function(){
                $(".out_box").addClass("active");
                $("body").addClass("pos_fixed");
                if($("#full_page").exist()){
                    $.fn.fullpage.setAllowScrolling(false);
                }
            })
            // 移动端二级导航
            $(".mobile_more").click(function () {
                if ($(this).find(".nav-list2").hasClass("active")) {
                    $(this).find(".nav-list2").slideUp("slow");
                    $(this).find(".nav-list2").removeClass("active");
                } else {
                    $(".nav-list2").slideUp("slow");
                    $(this).find(".nav-list2").slideDown("slow");
                    $(".nav-list2").removeClass("active");
                    $(this).find(".nav-list2").addClass("active");
                }
            });
            $("#nav-xs-btn").on("click",function(){
                $(".out_box").removeClass("active");
                $("body").removeClass("pos_fixed");
                if($("#full_page").exist()){
                    $.fn.fullpage.setAllowScrolling(true);
                }
            })
        }
        //二维码点击
        $(".ercode_btn_box").hover(function(){
            if($(".closeercode_code").hasClass('dis_n')){
                $(".closeercode_code").removeClass("dis_n");
            }else {
                $(".closeercode_code").addClass("dis_n");
            }
        })
        //判断滚动条滚动事件
        //页面加载时判断滚动条的高度
        window.onload = function(){
            var top = $(window).scrollTop();
            var topNum = 0;
            if(!/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                topNum = 120
            }else {
                topNum = 30
            }
            if(top>=topNum){
                $(".header_content").addClass("scrollactive");
                $(".nomarl_show_logo").addClass('dis_ni');
                $(".nomarl_show_logo_theme").removeClass('dis_n');
                $(".nomarl_show_menu").addClass('dis_n');
                $(".nomarl_show_menu_theme").removeClass('dis_n');
                $(".Totop").removeClass("dis_n");
            }else {
                $(".header_content").removeClass("scrollactive");
                $(".nomarl_show_logo").removeClass('dis_ni');
                $(".nomarl_show_logo_theme").addClass('dis_n');
                $(".nomarl_show_menu").removeClass('dis_n');
                $(".nomarl_show_menu_theme").addClass('dis_n');
            }
            
            if($(".recruitment_table").exist()) {
                $(".recruitment_table").find(".default_show").trigger("click");
            }
            
            
            
        }
        $(window).on('scroll', function () {
            var top = $(window).scrollTop();
            var topNum = 0;
            if(!/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                topNum = 120
            }else {
                topNum = 30
            }
            if(top>=topNum){
                $(".header_content").addClass("scrollactive");
                $(".nomarl_show_logo").addClass('dis_ni');
                $(".nomarl_show_logo_theme").removeClass('dis_n');
                $(".nomarl_show_menu").addClass('dis_n');
                $(".nomarl_show_menu_theme").removeClass('dis_n');
                $(".Totop").removeClass("dis_n");
            }else {
                $(".header_content").removeClass("scrollactive");
                $(".nomarl_show_logo").removeClass('dis_ni');
                $(".nomarl_show_logo_theme").addClass('dis_n');
                $(".nomarl_show_menu").removeClass('dis_n');
                $(".nomarl_show_menu_theme").addClass('dis_n');
            }
        })
        //返回顶部
        $('.Totop').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 400);
            $(".Totop").addClass("dis_n");
        });
        //关于我们页面鼠标跟随效果
        var navMarker = $(".nav-marker");
        var navCurrent = $(".container_tabs li.active");
        var halfW = ($(".container_tabs li").width() - $(".nav-marker").width())/2;
        //设置下划线初始位置
        if($('#markerLine').exist()) {
           navMarker.css("left",navCurrent.position().left+halfW);   
        }
        //下划线随鼠标平移
        $(".container_tabs li").mouseenter(function(){
            navMarker.stop().animate({left:$(this).position().left+halfW},350);
        });
        //鼠标离开时下划线恢复到原位置
        $(".container_tabs li").mouseleave(function(){
            navMarker.stop().animate({left:navCurrent.position().left+halfW},350);  
        });
        $(".container_tabs li").on("click",function(){
            $(".container_tabs li").removeClass("active");
            $(this).addClass('active');
            navCurrent = $(".container_tabs li.active");
            navMarker.css("left",navCurrent.position().left+halfW);
            if($(this).attr("name") == "officeenvironment") {
                $("#aboutusaccommod_banner").removeClass("active");
                $("#aboutusoffice_banner").addClass("active");
            }else {
                $("#aboutusoffice_banner").removeClass("active");
                $("#aboutusaccommod_banner").addClass("active");
            }
        })
        //课程分类选择课程
        $(".Curricular_small_tabs").on("click",function(){
            if($(this).hasClass('active')){
                $(this).removeClass("active")
                $(".Curricular_choose").slideUp();
            }else{
                $(this).addClass("active");
                $(".Curricular_choose").slideDown();
            }
        })
        //新闻列表页面
        //列表分页页码
        $(".page_btn").on("click",function(){
            alert('点击了')
            if($(this).hasClass("Previouspage")){
                alert("上一页");
            }else {
                alert("下一页");
            }
        })
        //测试页码分页方法
        var pageTotal = 9;  
        var curPage = 1;
        var html = ''
        var ret = main.fn.showPages(pageTotal,curPage,html);
        $(".Pagearea").find("ul").html("");
        $(".Pagearea").find("ul").append(ret);
        //企业招聘
        $(".recruitment_table").on('click','.recruitment_ultab_item',function(){
            if ($(this).hasClass("cur")){
                $(this).removeClass("cur");
                $(this).find(".recruitment_ultab_cont").slideUp();
            }else {
                $(".recruitment_table").find('li').removeClass("cur");
                $(".recruitment_table").find(".recruitment_ultab_cont").slideUp();
                $(this).addClass("cur");
                $(this).find(".recruitment_ultab_cont").slideDown();
            }
        })
    },
    dataGet:function(){},
    fn: {
        //关于我们轮播图
        //荣誉资质
        swiperinit_aboutusHonors: function(){
            var swiper = new Swiper('#aboutusHonors_banner', {
                slidesPerView: 4,
                spaceBetween: 10,
                loop: true,
                speed: 1000,
                navigation: {
                  nextEl: '.swiper-button-next',
                  prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 2000,
                },
                breakpoints: { 
                    1440: {
                      slidesPerView: 3,
                      spaceBetween: 30
                    },
                    480: { 
                      slidesPerView: 1,
                      spaceBetween: 10
                    }
                }
            });
        },
        //课程分类轮播
        CourseRotation: function(){
            var certifySwiper = new Swiper('.CourseRotation', {
                watchSlidesProgress: true,
                slidesPerView: 'auto',
                centeredSlides: true,
                loop: true,
                loopedSlides: 5,
                autoplay: true,
                slideToClickedSlide: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                on: {
                    progress: function(progress) {
                        for (i = 0; i < this.slides.length; i++) {
                            var slide = this.slides.eq(i);
                            var slideProgress = this.slides[i].progress;
                            modify = 1;
                            if (Math.abs(slideProgress) > 1) {
                                modify = (Math.abs(slideProgress) - 1) * 0.3 + 1;
                            }
                            translate = slideProgress * modify * 260 + 'px';
                            scale = 1 - Math.abs(slideProgress) / 5;
                            zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
                            slide.transform('translateX(' + translate + ') scale(' + scale + ')');
                            slide.css('zIndex', zIndex);
                            slide.css('opacity', 1);
                            if (Math.abs(slideProgress) > 3) {
                                slide.css('opacity', 0);
                            }
                        }
                    },
                    setTransition: function(transition) {
                        for (var i = 0; i < this.slides.length; i++) {
                            var slide = this.slides.eq(i)
                            slide.transition(transition);
                        }
            
                    }
                }
            
            })
        },
        //分页方法
        showPages: function(pageTotal,curPage,html) {
            var str = "";
            var starPage = 0;
            var endPage = 0;
            if(pageTotal<=5) {
                starPage = 1;
                endPage = pageTotal;    
            }else if(pageTotal>5&&curPage<=4) {
                starPage = 1;
                endPage = 4;
                if(curPage==4){
                    endPage = 5;
                }
            }else {
                if(pageTotal==curPage){
                    starPage = curPage-3;
                    endPage = curPage;
                }else{
                    starPage = curPage-2;
                    endPage = curPage+1;
                }
                str += "<li><a href='#'>1</a></li>";
                str += "<li><span class='over'>...</span></li>";
            }
            for(let i = starPage;i <= endPage;i++){
                if(i==curPage){
                    str += "<li class='active'><a href='#'>"+ i +"</a></li>";
                }else{
                    str += "<li><a href='#'>"+ i +"</a></li>";
                }
            }
            if(pageTotal<=5){
//              html+='<a href="#" class="pageItem" id="nextBtn">&gt;</a>';
//              str += "<li><a href='#'>"+ i +"</a></li>";
            }else{
                if(curPage<pageTotal-2){ 
                    str += "<li><span class='over'>...</span></li>";
                }
                if(curPage<=pageTotal-2){
                    str += "<li><a href='#'>"+pageTotal+"</a></li>";
                }
            }
            return str;
        },   
    }
}
