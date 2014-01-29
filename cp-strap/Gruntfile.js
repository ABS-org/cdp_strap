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
          'dist/css/style.css': 'src/stylesheets/build.less'
        }
      }
    },

    /************************************
     * grunt-contrib-watch
     * Watch some files and tasks
     ************************************/
    watch: {
      html: {
        files: '**/**/*.html',
        options: {
          livereload: true
        }
      },
      stylesheets: {
        files: '**/**/*.less',
        tasks: ['less'],
        options: {
          livereload: true
        }
      }
    },

    /************************************
     * grunt-bump
     * Bump package version, create tag, commit, push...
     ************************************/
    bump: {
      options: {
        files: ['package.json', 'bower.json'],
        updateConfigs: [],
        commit: true,
        commitMessage: 'v%VERSION%',
        commitFiles: ['package.json', 'bower.json', 'dist/**/*'], // '-a' for all files
        createTag: true,
        tagName: 'v%VERSION%',
        tagMessage: 'v%VERSION%',
        push: true,
        pushTo: 'master',
        gitDescribeOptions: '--tags --always --abbrev=1 --dirty=-d' // options to use with '$ git describe'
      }
    }

  });


  // Load multiple grunt tasks using globbing patterns
  require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

  // CSS distribution task
  grunt.registerTask('dist-stylesheets', ['less', 'usebanner']);

  // Default task
  grunt.registerTask('default', ['watch']);

  // Use grunt-bump for changing version number
  grunt.loadNpmTasks('grunt-bump');

};
