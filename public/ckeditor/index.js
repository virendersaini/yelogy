const ckeditor = require('./ckeditor');

window.editor = (element, config = null) => {
	if(element){
		console.log('init...',element);
		//CKEDITOR_BASEPATH
		return CKEDITOR.replace(element, {
			//baseHref : 'http://just-helper.test/',
			customConfig : 'http://just-helper.test/public/js/editor-config.js',
		});
	}
}