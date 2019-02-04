const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
/* Admin Assets*/



mix.js('resources/js/admin/app.js', 'public/js');


/ All.js /
mix.scripts([
    'public/admin/assets/js/datatables.js',
    'public/admin/assets/js/loadingoverlay.min.js',
    'public/admin/assets/js/bootstrap-notify.js',
    'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
    'node_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
    'public/admin/assets/js/jquery.mask.js'

    ], 'public/js/all.js'
);

/ All.css /
mix.styles([
    'public/admin/assets/css/datatables.css'
    ], 'public/css/all.css'
);


/* All Plugins Add here like(datatable,datapicker,selectjs)*/

mix.styles([
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
    'node_modules/bootstrap-select/dist/css/bootstrap-select.min.css',
    'resources/assets/css/plugins/datatables.css',
    ], 'public/css/vendor.css'
);



/* Theme Css*/
mix.styles([
		'public/admin/assets/css/normalize.css',
		'public/admin/assets/css/flag-icon.min.css',
		'public/admin/assets/css/cs-skin-elastic.css',
		'public/admin/assets/scss/style.css',
		'public/admin/assets/css/lib/vector-map/jqvmap.min.css',
		'public/admin/assets/css/bootstrap-notify.css'
	],
	'public/css/theme.css'
);

/ Theme js /
mix.js([		
		'public/admin/assets/js/lib/vector-map/jquery.vmap.js',
		'public/admin/assets/js/lib/vector-map/jquery.vmap.min.js',
		'public/admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js',
		'public/admin/assets/js/lib/vector-map/country/jquery.vmap.world.js',
		'public/admin/assets/js/plugins.js',
		'public/admin/assets/js/main.js',
		'public/admin/assets/js/dashboard.js',
		'public/admin/assets/js/widgets.js',
	], 
	'public/js/theme.js'
);



