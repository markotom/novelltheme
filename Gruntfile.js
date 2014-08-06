'use strict';

module.exports = function (grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // Watch task
    watch: {
      php: {
        files: '**/*.php',
        options: {
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
      },
      uglify: {
        files: [ 'assets/scripts/**/*.js' ],
        tasks: [ 'uglify' ],
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

    // Uglify task
    uglify: {
      production: {
        files: {
          'built/js/novell.min.js': [
            'bower_components/bootstrap/dist/js/bootstrap.min.js',
            'assets/scripts/novell.js'
          ]
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
    },

    // Compress task
    compress: {
      theme: {
        options: {
          archive: '<%= pkg.name %>-<%= pkg.version %>.zip'
        },
        files: [
          { src: ['*.php'] },
          { src: ['style.css'] },
          { src: ['screenshot.png'] },
          { src: ['assets/images/**/*'] },
          { src: ['built/**/*'] },
          { src: ['includes/**/*'] },
          { src: ['templates/**/*'] },
          { src: ['languages/**/*'] },
          { src: ['option-tree/**/*'] }
        ]
      }
    },

    // Release task
    release: {
      options: {
        commit: false,
        push: false,
        pushTags: false,
        npm: false,
        commitMessage: 'Release <%= version %>',
        tagMessage: 'Version <%= version %>'
      }
    }

  });

  // Load plugins
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-release');
  grunt.loadNpmTasks('grunt-shell');
  grunt.loadNpmTasks('grunt-phplint');

  // Build task
  grunt.registerTask('build', ['shell:optiontree']);

  // Theme task (get wordpress theme)
  grunt.registerTask('theme', [
    'build',
    'less:production',
    'uglify:production',
    'compress:theme'
  ]);

  // Default task
  grunt.registerTask('default', 'build');

};
