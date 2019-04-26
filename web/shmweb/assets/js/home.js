var home = {
    data: {
    },
    dataInit: function(){
        //全屏插件
        $('#full_page').fullpage({
            anchors: ['page1', 'page2', 'page3', 'page4', 'page5','page6','footer'],
            menu: '#menu',
            scrollingSpeed: 1000,
//          normalScrollElements: '.out_box',
            afterLoad: function(origin, destination, direction){
                if(destination.index == '2'||destination.index == '5'){
                    $("#menu").find('li span').addClass("activeColor");
                    $(".nomarl_show_menu").addClass('dis_n');
                    $(".nomarl_show_menu_theme").removeClass('dis_n');
                    $(".nomarl_show_logo").addClass('dis_ni');
                    $(".nomarl_show_logo_theme").removeClass('dis_n');
                }else {
                    $("#menu").find('li span').removeClass("activeColor");
                    $(".nomarl_show_menu").removeClass('dis_n');
                    $(".nomarl_show_menu_theme").addClass('dis_n');
                    $(".nomarl_show_logo").removeClass('dis_ni');
                    $(".nomarl_show_logo_theme").addClass('dis_n');
                }
                if (destination.index == '5'){
                    $("#dataNums").rollNumDaq({
                        deVal:$("#dataNums").attr("data-shownum"),
                        className:'dataNums',
                    });
                    $("#dataNums1").rollNumDaq({
                        deVal:$("#dataNums1").attr("data-shownum"),
                        className:'dataNums1',
                    });
                    $("#dataNums2").rollNumDaq({
                        deVal:$("#dataNums2").attr("data-shownum"),
                        className:'dataNums2',
                    });
                    $("#dataNums3").rollNumDaq({
                        deVal:$("#dataNums3").attr("data-shownum"),
                        className:'dataNums3',
                    });
                }
            },
            onLeave: function(origin, destination, direction){
            }
        });
        home.fn.swiperinit_page1();
        home.fn.swiperinit_page2();
//      home.fn.autoScrolling();
    },
    eventBind:function(){
        //第三屏选项卡
        $(".courseintroduction_menu li").each(function(index) {
            $(this).mouseenter(function() {
                $(".courseintroduction_menu li.active").removeClass("active");
                $(this).addClass("active");
                $(".courseintroduction_lists li.activeText").removeClass("activeText");
                $(".list_tab").eq(index).addClass("activeText");
            });
        })
        //第五屏的触摸效果
        var hove_dom = $("#page5_banner").find(".swiper-slide").find('a');
        $(hove_dom).on("mouseenter",function(){
            $(this).parents('.swiper-slide').find('.parts_img img').addClass("active");
        }).on("mouseleave",function(){
            $(this).parents('.swiper-slide').find('.parts_img img').removeClass("active");
        })
    },
    dataGet:function(){},
    fn: {
//      autoScrolling: function(){
//          var $ww = $(window).width();
//          if($ww < 1024){
//              $.fn.fullpage.setAutoScrolling(false);
//          } else {
//              $.fn.fullpage.setAutoScrolling(true);
//          }
//      },
        swiperinit_page1: function(){
            var swiper = new Swiper('#page1_banner', {
                  centeredSlides: true,
                  loop: true,
                  speed: 800,
                  effect : 'slide',
                  preventInteractionOnTransition : true,
                  fadeEffect: {
                    crossFade: true,
                  },
                  autoplay: {
                    delay: 3000,
                  },
                  pagination: {
                    el: '.banner-pagination',
                    clickable: true,
                  },
                  on:{
                      init: function(){
                        swiperAnimateCache(this); //隐藏动画元素 
                        swiperAnimate(this); //初始化完成开始动画
                      }, 
                      slideChangeTransitionEnd: function(){ 
                        swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
                        //this.slides.eq(this.activeIndex).find('.ani').removeClass('ani'); 动画只展现一次，去除ani类名
                      } 
                  }
        
            });  
        },
        swiperinit_page2: function(){
            var swiper = new Swiper('#page5_banner', {
              slidesPerView: 4,
              spaceBetween: 30,
              pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
                dynamicMainBullets: 3
              },
              breakpoints: { 
                //当宽度小于等于320
                1440: {
                  slidesPerView: 3,
                  spaceBetween: 30
                },
               //当宽度小于等于480
                480: { 
                  slidesPerView: 1,
                  spaceBetween: 10
                }
              }
            });
        },
    }
}
