/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,clipboard,button,panelbutton,panel,floatpanel,colorbutton,colordialog,templates,menu,contextmenu,div,resize,toolbar,elementspath,list,indent,enterkey,entities,popup,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,forms,format,htmlwriter,horizontalrule,iframe,wysiwygarea,image,smiley,justify,link,liststyle,magicline,maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,sourcearea,specialchar,menubutton,scayt,stylescombo,tab,table,tabletools,undo,wsc,youtube,uicolor,tableresize';
	config.extraPlugins = 'autogrow';
	config.skin = 'moono';
	config.allowedContent = true;
	config.entities = false;
	config.language = 'vi';
	config.disallowedContent = 'img{width,height}';
	// %REMOVE_END%

	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	config.contentsCss = 'fonts.css';
	//the next line add the new font to the combobox in CKEditor
	config.font_names = 'Open Sans;UTM Bienvenue;SFUTimesTenRoman;SFUTimesTenBold;UTMAvoBold;Roboto;Roboto Condensed;;Helvetica Neue;' + config.font_names;

	config.filebrowserBrowseUrl = baseurl+'ckeditor/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = baseurl+'ckeditor/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = baseurl+'ckeditor/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = baseurl+'ckeditor/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = baseurl+'ckeditor/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = baseurl+'ckeditor/kcfinder/upload.php?type=flash';
};
