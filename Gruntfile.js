module.exports = function(grunt) {

	// because why not
	"use strict";

	// 1. All configuration goes here
	grunt.initConfig({
		pkg: grunt.file.readJSON("package.json"),

		// this bad boy updates all the installed packages.
		devUpdate: {
        	main: {
            	options: {
                	reportUpdated: false,
                	updateType: "prompt",
                	semver: false
            	}
        	}
    	},

		concat: {
		    dist: {
		        src: [
					"assets/bower_components/FitVids/jquery.fitvids.js",
		            "assets/js/script.js"
		        ],
		        dest: "assets/js/responsiveVideo.js",
		    }
		},

		// this will take the concat file and minify it up too.
		uglify: {
			global: {
				files: {
					"assets/js/responsiveVideo.min.js": ["assets/js/responsiveVideo.js"]
				}
			}
		},

		watch: {
			options: {
				spawn: false
			},
			grunt: {
				files: ["Gruntfile.js"]
			},
			js: {
				files: ["assets/js/*.js", "Gruntfile.js"],
				tasks: ["concat", "uglify"]
			},
			compression: {
				files: ['assets/**/*', 'language/**/*', 'tmpl/**/*', 'helper.php', 'mod_responsivevideo.php', 'mod_responsivevideo.xml', "Gruntfile.js"],
				tasks: ["compress"]
			}
		},

		compress: {
			main: {
				options: {
					archive: "mod_responsive_video_1.x.x.zip",
					pretty: true,
					mode: 'zip'
				},
				files: [
					{expand: true, src: ['assets/js/responsiveVideo.min.js'], dest: '/'},
					{expand: true, src: ['assets/js/index.html'], dest: '/'},
					{expand: true, src: ['assets/index.html'], dest: '/'},
					{expand: true, src: ['language/**'], dest: '/'},
					{expand: true, src: ['tmpl/**'], dest: '/'},
					{expand: true, src: ['helper.php'], dest: '/'},
					{expand: true, src: ['index.html'], dest: '/'},
					{expand: true, src: ['mod_responsivevideo.php'], dest: '/'},
					{expand: true, src: ['mod_responsivevideo.xml'], dest: '/'},
				]
			}
		}
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    require("load-grunt-tasks")(grunt);

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
  	grunt.registerTask("default", ["concat", "uglify", "compress", "watch"]);
};
