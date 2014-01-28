// Gruntfile.js
//
//

module.exports = function (grunt) {
  'use strict';

  // Force use of Unix newlines
  grunt.util.linefeed = '\n';
  
  // Project configuration
  grunt.initConfig({

  });


  // Load multiple grunt tasks using globbing patterns
  require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

};
