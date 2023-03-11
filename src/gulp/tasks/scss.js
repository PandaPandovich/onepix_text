import dartSass from "sass";
import gulpSass from "gulp-sass";
import autoPrefixer from "gulp-autoprefixer";
import groupCssMediaQueries from "gulp-group-css-media-queries";
import cleanCss from "gulp-clean-css";
import rename from 'gulp-rename';

const sass = gulpSass(dartSass);

export const scss = () => {
  return app.gulp
    .src(app.path.src.scss, { sourcemaps: app.isDev })
    .pipe(
      app.plugins.plumber(
        app.plugins.notify.onError({
          title: "SCSS",
          message: "Error <%= error.message %>",
        })
      )
    )
    .pipe(app.plugins.replace(/@img\//g, "../img/"))
    .pipe(
      sass({
        outputStyle: "expanded",
      })
    )
    .pipe(
      app.plugins.if(
        app.isBuild,
        rename({
          basename: "bundle",
          extname:".min.css"
        }),
        rename({
          basename: "bundle",
          extname:".css"
        })
      ))
    .pipe(
      app.plugins.if(
        app.isBuild,
        autoPrefixer({
          grid: true,
          overrideBrowserslist: ["last 3 versions"],
          cascade: true,
        })
      )
    )
    .pipe(app.plugins.if(app.isBuild, groupCssMediaQueries()))
    .pipe(app.plugins.if(app.isBuild, cleanCss()))
    .pipe(app.gulp.dest(app.path.build.css));
};
