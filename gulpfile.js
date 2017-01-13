var gulp = require("gulp");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var batch = require("gulp-batch");
var plumber = require("gulp-plumber");
var ngAnnotate = require("gulp-ng-annotate");
var sourcemaps = require("gulp-sourcemaps");
var cssnano = require("gulp-cssnano");
var sass = require("gulp-sass");

// ---------------------------------------------------------------------------------------------------------------------- //
// This task bundles your application scripts into dist/js/scripts.js and your third party scripts into dist/js/vendor.js //
// ---------------------------------------------------------------------------------------------------------------------- //
gulp.task("js", function() {

  	gulp.src(["resources/assets/javascript/*.js"])
	  	.pipe(plumber({
	        handleError: function (err) {
	            console.log(err);
	            this.emit('end');
	        }
	    }))
	    .pipe(sourcemaps.init())
		    .pipe(ngAnnotate())
		    .pipe(concat("scripts.js"))
		    .pipe(uglify())
		.pipe(sourcemaps.write())
	    .pipe(gulp.dest("public/js"))
});

// ---------------------------------------------------- //
// This task bundles your application styles into 		//
//  resources.assets/css/styles.css 					//
// ---------------------------------------------------- //
gulp.task("sass", function() {

	gulp.src(["resources/assets/sass/*.scss"])
		.pipe(concat("styles.css"))
		.pipe(sass().on("error", sass.logError))
		.pipe(gulp.dest("public/css"))
});

// ----------------------------------------------------------------------------------------- //
// This task watches your scripts and styles and automatically builds when changes are saved //
// ----------------------------------------------------------------------------------------- //
gulp.task("watch", function() {

  	gulp.watch(["resources/assets/sass/*.scss"], batch(function(events, done) {
		gulp.start("sass", done);
	}));
	gulp.watch(["resources/assets/javascript/*.js"], batch(function(events, done) {
		gulp.start("js", done);
	}));
});


// ------------------------------------------------------------ //
// This task bundles your scripts and styles and start watching //
// ------------------------------------------------------------ //
gulp.task("init", function() {
	
	gulp.start("sass");
	gulp.start("js");
	gulp.start("watch");	
});