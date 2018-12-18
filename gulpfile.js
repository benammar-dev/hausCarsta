var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var cleanCss = require('gulp-clean-css');
var browserSync = require('browser-sync').create();

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

gulp.task('script', function(){
    return gulp.src('./js/main.js')
        .pipe(concat('js/main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./App'));
});

gulp.task('serve', ['sass', 'html', 'script'], function(){
    browserSync.init({
        server: './'
    });

    gulp.watch('./style/main.scss', ['sass']);
    gulp.watch('./js/script.js', ['script']);
    gulp.watch('./*.html').on('change', browserSync.reload);
});

gulp.task('default', ['serve']);
