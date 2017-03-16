var gulp = require('gulp');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync');
var sass = require('gulp-sass');
var config = require('./config/dev').sass;
var filter = require('gulp-filter');
var minifycss = require('gulp-minify-css');
var rename = require('gulp-rename');
var gconfig = {
    assetsDir: './',
    sassPattern: './sass/**/*.scss'
};


gulp.task('default', ['watch']);
gulp.task('.', ['watch']);

/* COMPILE SASS FILES */
gulp.task('sass', function () {
    return gulp.src(config.src)
        .pipe(sourcemaps.init())
        .pipe(sass(config.settings).on('error', sass.logError))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(config.dest))
        .pipe(rename({ suffix: '.min' }))
        .pipe(minifycss({ keepSpecialComments: 1, processImport: false }))
        .pipe(gulp.dest(config.dest))
        .pipe(filter('**/*.css'))
        .pipe(browserSync.reload({
            stream: true
        }));
});


gulp.task('watch', function() {
    gulp.watch(gconfig.assetsDir+'/'+gconfig.sassPattern, ['sass'])
});
