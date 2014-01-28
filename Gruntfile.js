// Gruntfile.js

module.exports = function (grunt) {
  'use strict';

  // Force use of Unix newlines
  grunt.util.linefeed = '\n';

  var fs = require('fs')

  // Project configuration.
  grunt.initConfig({

    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*!\n' +
              ' * cdp-ABS theme v<%= pkg.version %> (<%= pkg.homepage %>)\n' +
              ' * Copyright <%= grunt.template.today("yyyy") %> cdp-ABS\n' +
              ' */\n',

    less: {
      compileDefaultTheme: {
        files: {
          'css/style.css': 'less/style.less'
        }
      }
    },

    usebanner: {
      dist: {
        options: {
          position: 'top',
          banner: '<%= banner %>'
        },
        files: {
          src: [
            'css/style.css',
            'css/style.min.css',
          ]
        }
      }
    },

    watch: {
      gruntfile: {
        files: 'Gruntfile.js',
        tasks: ['default']
      },
      stylesheets: {
        files: '**/**/*.less',
        tasks: ['less'],
        options: {
          livereload: true
        }
      }
    }

  });


  // These plugins provide necessary tasks.
  require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

  // CSS distribution task.
  grunt.registerTask('dist-stylesheets', ['less', 'usebanner']);

  // Full distribution task.
  grunt.registerTask('dist', ['dist-stylesheets']);

  // Default task.
  grunt.registerTask('default', ['dist', 'watch']);

};
