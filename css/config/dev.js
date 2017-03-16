var dest = "./";
var src = "./";

module.exports = {
    browserSync: {
        server: {
            baseDir:dest
        }
    },
   sass: {
        src: src + "sass/**/*.{scss, sass}",
        dest: dest,
        settings: {
            bundleExec: true
        }
    }
  
};