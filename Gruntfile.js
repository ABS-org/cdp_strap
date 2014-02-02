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
          'cp-strap/dist/css/style.css': 'cp-strap/src/stylesheets/build.less'
        }
      },
      website: {
        files: {
          'cp-strap/dist/website/css/style.css': 'cp-strap/src/website/stylesheets/build.less'
        }
      }
    },

    /************************************
     * grunt-contrib-concat
     * Concat javascripts and other files
     ************************************/
    concat: {
      javascripts: {
        src: [
          'cp-strap/src/website/javascripts/classie.js',
          'cp-strap/src/website/javascripts/nav-horizontal.js',
          'cp-strap/src/website/javascripts/main.js'
        ],
        dest: 'cp-strap/dist/website/js/main.js'
      }
    },

    /************************************
     * grunt-contrib-watch
     * Watch some files and tasks
     ************************************/
    watch: {
      html: {
        files: 'cp-strap/**/*.html',
        options: {
          livereload: true
        }
      },
      stylesheets: {
        files: 'cp-strap/src/**/*.less',
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
        commitFiles: ['package.json', 'bower.json', 'cp-strap/dist/**/*'], // '-a' for all files
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

  // JS distribution task.
  grunt.registerTask('dist-javascripts', ['concat']);

  // CSS distribution task
  grunt.registerTask('dist-stylesheets', ['less', 'usebanner']);

  // Default task
  grunt.registerTask('default', ['watch']);

  // Use grunt-bump for changing version number
  grunt.loadNpmTasks('grunt-bump');

};
