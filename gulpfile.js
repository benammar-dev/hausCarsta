var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var concat = require('gulp-concat');
var cleanCss = require('gulp-clean-css');
cssbeautify = require('gulp-cssbeautify');
var browserSync = require('browser-sync').create();
var php = require('gulp-connect-php');


gulp.task('html', function(){
    return gulp.src('./*.html')
        .pipe(gulp.dest('./App'));
});

gulp.task('sass', function(){
    return gulp.src('./style/main.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCss())
        .pipe(gulp.dest('./App/css'))
        .pipe(browserSync.stream());
});

gulp.task('css', function() {
    return gulp.src('./style/*.css')
        .pipe(cssbeautify())
        .pipe(gulp.dest('./App/css'));
});

gulp.task('script', function(){
    return gulp.src('./js/*.js')
        .pipe(concat('./js/main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./App'));
});

gulp.task('image', function (){
    return gulp.src('./img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('./App/img'));
});

gulp.task('php', function(){
    php.server({base:'./', port:8010, keepalive:true});
});

gulp.task('serve', ['sass', 'css', 'html', 'image', 'script', 'php' ], function(){
    browserSync.init({
        proxy:"localhost:8010",
        baseDir: './',
        open: true,
        notify: false
    });

    gulp.watch('./style/main.scss', ['sass']);
    //gulp.watch('./js/main_script.js', ['script']);
    gulp.watch('./*.html').on('change', browserSync.reload);
    gulp.watch('./*.php').on('change', browserSync.reload);
    gulp.watch('./js/main_script.js').on('change', browserSync.reload);
});

gulp.task('default', ['serve']);
