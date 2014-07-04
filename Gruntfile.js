'use strict';

module.exports = function (grunt) {
  
  grunt.initConfig({
  
    // Watch task
    watch: {},
  
    // Less task
    less: {}
  
  });
  
  // Load plugins
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  
};
