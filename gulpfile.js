// ==== CONFIGURATION ==== //

// Project paths
var project     = 'project';


var gulp = require('gulp');
var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var gutil = require('gulp-util');
var sourcemaps = require('gulp-sourcemaps');
var bulkSass = require('gulp-sass-bulk-import');



/* ==========================================================================
   JS
   ========================================================================== */
gulp.task('js', function() {

    return gulp.src([
        'js/vendor/*.js',
        'js/**/*.js',
        '!js/dist/*.js',
        '!js/maps/*.js'
    ])
        .pipe(sourcemaps.init())
        .pipe(concat('all.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('../maps'))
        .pipe(gulp.dest('js/dist'))
});

/* ==========================================================================
   SASS
   ========================================================================== */
gulp.task('sass', function() {

    return gulp.src('sass/styles.scss')
        .pipe(sourcemaps.init())
        .pipe(plumber(function(error) {
            gutil.log(error.message);
            this.emit('end');
        }))
        .pipe(bulkSass())
        .pipe(sass())
        .pipe(autoprefixer('last 4 version'))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('stylesheets'))
});



/* ==========================================================================
   DEFAULT
   ========================================================================== */
gulp.task('default', function(){

    gulp.watch('sass/**/*.scss', ['sass']);
    gulp.watch([
        'js/**/*.js',
        '!js/dist/*.js',
        '!js/maps/*.js'
    ], ['js']);

});


