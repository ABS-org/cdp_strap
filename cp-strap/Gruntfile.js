// Gruntfile.js
//
//

module.exports = function (grunt) {
  'use strict';

  // Force use of Unix newlines
  grunt.util.linefeed = '\n';

  // Project configuration
  grunt.initConfig({

    // Metadata
    pkg: grunt.file.readJSON('package.json'),

    // Banner task
    //
    banner: '/*!\n' +
              ' * cp-strap theme v<%= pkg.version %>\n' +
              ' * License MIT <%= grunt.template.today("yyyy") %> ABS-org\n' +
              ' */\n',
    
    // Less task
    //
    less: {
      compile: {
        files: {
          'dist/css/style.css': 'src/stylesheets/style.less'
        }
      }
    },

  });


  // Load multiple grunt tasks using globbing patterns
  require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

  // CSS distribution task
  grunt.registerTask('dist-stylesheets', ['less', 'usebanner']);

};
