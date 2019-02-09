/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.filebrowserBrowseUrl = 'http://hostlumen.com.br/fishbrindes/ckeditor/ckfinder/ckfinder.html',

    	config.filebrowserImageBrowseUrl = 'http://hostlumen.com.br/fishbrindes/ckeditor/ckfinder/ckfinder.html?type=Images',

    	config.filebrowserFlashBrowseUrl = 'http://hostlumen.com.br/fishbrindes/ckeditor/ckfinder/ckfinder.html?type=Flash',

    	config.filebrowserUploadUrl = 'http://hostlumen.com.br/fishbrindes/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

    	config.filebrowserImageUploadUrl = 'http://hostlumen.com.br/fishbrindes/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

    	config.filebrowserFlashUploadUrl = 'http://hostlumen.com.br/fishbrindes/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
};

