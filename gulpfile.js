var elixir 		 = require('laravel-elixir');

var gulp         = require('gulp');
var concat       = require('gulp-concat');
var clean        = require('gulp-rimraf');
var less         = require('gulp-less');
var minifyCss    = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var uglify       = require('gulp-uglify');
var notify       = require('gulp-notify');
var browserSync  = require('browser-sync');
var reload       = browserSync.reload;
var merge        = require('merge-stream');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
});

//Directorios
var assetsDirectory  = 'resources/assets/front/';
var lessDirectory    = assetsDirectory + 'less/';
var jsDirectory      = assetsDirectory + 'js/';
var libDirectory      = 'public/front/lib/';

var targetCss  = 'public/front/css';
var targetJs   = 'public/front/js';


var cssGroup = [
  libDirectory + 'foundation-flex.min.css',
  libDirectory + 'animate.css',
  libDirectory + 'owl.carousel.css',
  libDirectory + 'owl.transitions.css',
  libDirectory + 'icomoon/style.css'
];

var scriptsGroup = [
  libDirectory + 'jquery-2.1.3.min.js',
  libDirectory + 'foundation.min.js',
  libDirectory + 'owl.carousel.min.js',
  libDirectory + 'jquery.validate.min.js',
  libDirectory + 'rrssb.min.js',
  libDirectory + 'jquery.lazyload.js',
  jsDirectory + 'script-top.js',
  jsDirectory + 'custom.js'
];


//limpiar carpetas
gulp.task('clean', function() {
  gulp.src([targetCss + '/*.css', targetJs + '/*.js'], {read:false})
  .pipe(clean());
});

//scripts
gulp.task('mergeScripts', function() {
  return gulp.src(scriptsGroup)
  .pipe(concat('scripts.js'))
  .pipe(uglify())
  .pipe(gulp.dest(targetJs));
});


gulp.task('css', function(){

  var lessStream = gulp.src(lessDirectory + '/styles.less')
    .pipe(less())
    .pipe(minifyCss())
    .pipe(concat('less-files.less'));

  var cssStream = gulp.src(cssGroup)
    .pipe(minifyCss())
    .pipe(concat('css-files.css'));

  var mergedStream = merge(lessStream, cssStream)
    .pipe(concat('styles.css'))
    .pipe(minifyCss())
    .pipe(notify('css compile'))
    .pipe(gulp.dest(targetCss))
    .pipe(reload({stream:true}));

  return mergedStream;
});

gulp.task('watch', ['connect'], function() {
  gulp.watch(lessDirectory + '/**/*.less', ['css']);
  gulp.watch(lessDirectory + '/**/**/*.less', ['css']);
  gulp.watch(jsDirectory + '/*.js', ['mergeScripts']);
});

gulp.task('connect', function() {
  browserSync.init({
    server: {
      baseDir: "./"
    }
  });
});

gulp.task('default', ['clean'], function(){
  gulp.start(['css', 'watch', 'mergeScripts']);
});