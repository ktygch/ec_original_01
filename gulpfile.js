// JavaScript Document
var gulp = require("gulp");
var plumber = require("gulp-plumber");
//var rename = require("gulp-rename");
var sass = require("gulp-sass");
var uglify = require("gulp-uglify");

gulp.task("js", function(){
    gulp.src(["js/**/*.js", "!js/min/**/*.js"])
    .pipe(plumber())
    .pipe(uglify())
    .pipe(gulp.dest("./html/js/min"));
});

gulp.task("sass", function(){
    gulp.src("sass/**/*.scss")
    .pipe(plumber())
    .pipe(sass())
    .pipe(gulp.dest("./html/css"));
});

gulp.task("default", function(){
    gulp.watch(["js/**/*.js", "!js/min/**/*.js"],["js"]);
    gulp.watch("sass/**/*.scss", ["sass"]);
    gulp.watch(["ejs/**/*.ejs", "!ejs/**/_*.ejs"],["ejs"]);
});