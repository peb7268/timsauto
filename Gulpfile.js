var gulp 		    = require('gulp');
var imagemin 	  = require('gulp-imagemin');
var optipng 	  = require('imagemin-optipng');
var jpegtran 	  = require('imagemin-jpegtran');
var livereload  = require('gulp-livereload');
var browserify  = require('browserify');
var streamify 	= require('gulp-streamify');
var rename 		  = require('gulp-rename');
var uglify 		  = require('gulp-uglify')
var source   	  = require('vinyl-source-stream');
var sass 		    = require('gulp-sass');
var notify 		  = require("gulp-notify");


var paths = {
  scripts: 	['./js/**/*.js'],
  images: 	'./img/**/*.{gif,jpg,png,svg}',
  sass: 	'./styles/sass/**/*.scss',
  css: 		'./styles/css/'
};

// Copy all static images 
gulp.task('images', function() {
  return gulp.src(paths.images)
  	.pipe(imagemin({
  		optimizationLevel: 5,
  		progressive: true,
  		use: [optipng({optimizationLevel: 5}), jpegtran({progressive: true})]
  	}))
    .pipe(gulp.dest('./public/dist/img'))
    .pipe(notify("Images Optimized."));
});

gulp.task('browserify', function () {
  var bundleStream = browserify('public/js/main.js').bundle();
      bundleStream.pipe(source('public/js/main.js'))
      .pipe(streamify(uglify()))
      .pipe(rename('bundle.js'))
      .pipe(gulp.dest('./public/dist/js/'))
      .pipe(notify("Scripts Browserified."));
});
  
gulp.task('sass', function () {
  gulp.src(paths.sass)
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(gulp.dest(paths.css))
 	.pipe(livereload())
 	.pipe(notify("Sass Compiled."));
});

gulp.task('scripts:watch', function () {
  gulp.watch(paths.scripts, ['browserify']);
});
 
gulp.task('sass:watch', function () {
  livereload.listen();
  gulp.watch(paths.sass, ['sass']);
});


gulp.task('build',   ['sass', 'browserify', 'images']);
gulp.task('default', ['sass', 'sass:watch', 'browserify', 'scripts:watch']);