'use strict';

module.exports = function (grunt) {

  grunt.initConfig({

    // Watch task
    watch: {
      php: {
        files: '**/*.php',
        tasks: 'phplint:all',
        options: {
          spawn: false,
          livereload: true
        }
      },
      less: {
        files: 'assets/styles/less/**/*.less',
        tasks: 'less:development',
        options: {
          spawn: false,
          livereload: true
        }
      }
    },

    phplint: {
      options: {
        swapPath: '/tmp'
      },
      all: [
        '**/*.php',
        '!node_modules/**/*',
        '!bower_components/**/*',
        '!option-tree/**/*'
      ]
    },

    // Less task
    less: {
      development: {
        files: {
          'built/css/novell.css': 'assets/styles/less/novell.less'
        }
      },
      production: {
        options: {
          cleancss: true
        },
        files: {
          'built/css/novell.css': 'assets/styles/less/novell.less'
        }
      }
    },

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
  grunt.loadNpmTasks('grunt-phplint');

  // Build task
  grunt.registerTask('build', ['shell:optiontree']);

  // Default task
  grunt.registerTask('default', 'build');

};
