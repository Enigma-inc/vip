var gulp = require("gulp"),
    concat = require("gulp-concat"),
    uglify = require("gulp-uglify"),
    notify = require("gulp-notify"),
    rev = require("gulp-rev"),
    gutil = require("gulp-util"),
    revOutdated = require("gulp-rev-outdated"),
    inject = require("gulp-inject"),
    rimraf = require("rimraf"),
    path = require("path"),
    through = require("through2"),
    debug = require('gulp-debug');

gulp.task("appScripts", function() {
    return gulp.src([
            "resources/assets/theme/js/jquery-2.1.3.min.js",
            //  "node_modules/bootstrap/dist/js/bootstrap.min.js",
            "resources/assets/theme/js/theme/imagesloaded.js",
            "resources/assets/theme/js/theme/materialize.min.js",
            "resources/assets/theme/js/theme/menuzord.js",
            "resources/assets/theme/js/theme/jquery.easing.min.js",
            "resources/assets/theme/js/theme/jquery.sticky.min.js",
            "resources/assets/theme/js/theme/smoothscroll.min.js",
            "resources/assets/theme/js/theme/jquery.stellar.min.js",
            "resources/assets/theme/js/theme/scripts.js",

        ])
        .pipe(concat("lib-bundle.js"))
        .pipe(uglify().on('error', gutil.log))
        .pipe(gulp.dest("public/js"));
});


gulp.task("appendVersion", ['appScripts'], function() {
    // by default, gulp would pick 'assets/css' as the base, 
    // so we need to set it explicitly: 
    return gulp.src(["public/js/lib-bundle.js"], { base: "public/js" })
        .pipe(rev())
        .pipe(gulp.dest("public/js")) // write rev'd assets to dir 
        .pipe(rev.manifest())
        .pipe(gulp.dest("public/js"));
});


function cleaner() {
    return through.obj(function(file, enc, cb) {
        rimraf(path.resolve((file.cwd || process.cwd()), file.path), function(err) {
            if (err) {
                this.emit("error", new gutil.PluginError("Cleanup old files", err));
            }
            this.push(file);
            cb();
        }.bind(this));
    });
}

gulp.task("clean", ['appendVersion'], function() {
    gulp.src(["build/assets/css/*.css"], { read: false })
        .pipe(revOutdated(1)) // leave 1 latest asset file for every file name prefix. 
        .pipe(cleaner());

    gulp.src(["build/assets/js/*.js"], { read: false })
        .pipe(revOutdated(1)) // leave 1 latest asset file for every file name prefix. 
        .pipe(cleaner());

    return;
});

gulp.task("injectScriptsAndCSS", ['clean'], function() {
    var masterPage = gulp.src(['./resources/views/welcome.blade.php']).pipe(debug({ title: 'HOME PAGE FOUND' }));

    var sources = gulp.src(["./public/js/lib-bundle-*.js"], { read: false });
    masterPage.pipe(inject(sources))
        .pipe(gulp.dest("./resources/views/"))
        .pipe(notify({ message: "Injected Scripts", wait: false }));


    return;
});


gulp.task("default", ['clean', "appScripts", 'appendVersion',
    'injectScriptsAndCSS'
]);