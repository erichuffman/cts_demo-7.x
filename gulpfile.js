'use strict';

//=======================================================
// Include gulp
//=======================================================
var gulp = require('gulp');

//=======================================================
// Include Our Plugins
//=======================================================
var sass       = require('gulp-sass');
var prefix     = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var filter     = require('gulp-filter');
var shell      = require('gulp-shell');
var q          = require('q');
var path       = require('path');
var fs         = require('fs');

//=======================================================
// Functions
//=======================================================
function handleError(err) {
  console.log(err.toString());
  this.emit('end');
}

//=======================================================
// Compile Our Sass
//=======================================================

gulp.task('sass', function() {
  gulp.src('./sass/{,**/}*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'nested'
    }))
    .on('error', handleError)
    .pipe(prefix({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(sourcemaps.write('maps'))
    .pipe(gulp.dest('css'))
    .pipe(filter('*.css'))
});

//=======================================================
// Watch and recompile sass.
//=======================================================

gulp.task('watch', function() {

  // BrowserSync proxy setup
  //sync({
  //    proxy: 'http://my-local-domain/'
  //});

  // Watch all my sass files and compile sass if a file changes.
  gulp.watch('sass/{,**/}*.scss', ['sass']);

});

// Default Task
gulp.task('default', ['watch']);
