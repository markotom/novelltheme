'use strict';

module.exports = function (grunt) {

  grunt.initConfig({

    // Watch task
    watch: {},

    // Less task
    less: {},

    // Shell task
    shell: {
      optiontree: {
        command: [
          'rm -rf option-tree',
          'git clone https://github.com/valendesigns/option-tree.git',
        ].join('&&')
      }
    }

  });

  // Load plugins
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-shell');

  // Build task
  grunt.registerTask('build', ['shell:optiontree']);

  // Default task
  grunt.registerTask('default', 'build');

};
