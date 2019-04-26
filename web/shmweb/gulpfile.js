var gulp = require("gulp"),
    autoprefixer = require('gulp-autoprefixer'),
    csscomb = require('gulp-csscomb'),
    sass = require('gulp-sass'),
    minicss = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    util = require('gulp-util'),
    browserSync = require("browser-sync"),
//  uglify = require('gulp-uglify'),　　
    path = {
        HTML: "*.html",
        PHP: "*.php",
        SASS: "assets/sass/**/*.scss",
        ME: "assets/sass/style.scss",
        CSS: "assets/css/*.css",
        JS: "assets/*.js"
        
    };

function errorHandle(err) {
    util.beep();
    util.log('Sass Error!', err.message);
    this.emit('end');
}
gulp.task("serve", ["sass", "js-watch", "html", "php"], function() {
    // browserSync.init({
    //     server : "./"
    // });

    browserSync.init({
//      proxy: "http://box.anmpserver.com/sahereman/",
        proxy:'localhost/lainiueducation/', // 设置本地服务器的地址
        port:8090  // 设置访问的端口号

//      proxy: "D:\phpStudy\WWW\sahereman",
//      open: "external",
//      scrollRestoreTechnique: "cookie",
    });

    gulp.watch(path.SASS, ["sass"]);
    gulp.watch(path.JS, ["js-watch"]);
    gulp.watch(path.HTML, ["html"]);
    gulp.watch(path.PHP, ["php"]);


    gulp.watch(path.HTML).on("change", function() {
        browserSync.reload;
    });
    gulp.watch(path.PHP).on("change", function() {
        browserSync.reload;
    });
    gulp.watch(path.JS).on("change", function() {
        browserSync.reload;
    });
});


gulp.task("sass", function() {
    gulp.src(path.ME)
        .pipe(sass())
        .on('error', errorHandle)
        .pipe(autoprefixer([
            'Android >= 4',
            'Chrome >= 30',
            'Firefox >= 24',
            'Explorer >= 6',
            'Safari >= 6',
            'iOS >= 6',
        ]))
        .pipe(csscomb())
        //输出到dist文件夹
        .pipe(minicss())
        .pipe(gulp.dest('assets/css/'))
        .pipe(browserSync.stream());


    // gulp.src(path.LESS)
    //     .pipe(less())
    //     .pipe(gulp.dest(path.CSS))
    //     .pipe(browserSync.stream());
})


gulp.task("js-watch", function() {
    gulp.src(path.JS)
        .pipe(browserSync.stream());
})

gulp.task("html", function() {
    gulp.src(path.HTML)
        .pipe(browserSync.stream());
})

gulp.task("php", function() {
    gulp.src(path.PHP)
        .pipe(browserSync.stream());
})

gulp.task("default", ["serve"])

//如果想添加对CSS的监听,想上面监听less html js 一样
//我既然用了less就不用监听css了


gulp.task('watch', function() {
    var watcher = gulp.watch(['sass/**/*.scss'], ['sass']);
});