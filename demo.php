<?php
	//	https://github.com/MatthewKosloski/wp-metabox-constructor-class#installation
	// updated 
	// https://github.com/mamunur105/wp-metabox-constructor-class
	
require_once("metabox_constructor_class.php");
$metabox = new Metabox_Constructor(array(
	'id' => 'popups_id',
	'title' => __('Metabox Demo', 'experiment_functionality'),
	'screen' => 'popups_creator'
));
// $metabox->addWysiwyg(array(
// 	'id' => 'metabox_wysiwyg_custom', // required
// 	'label' => 'WYSIWYG', // required
// 	'desc' => 'You can add your own html markup here '
// ));
$metabox->addCheckbox(array(
	'id' => 'popups_activation_field',
	'label' => 'Active/Deactive',
	'desc' => 'Active Popup Or Popups Is not activate'
));
function metabox_for_pagelist(){
	global $post;
	$args = array(
		'post_type' => 'page'
	);
	$pages = get_posts($args);
	$page_list = array();
	foreach($pages as $post){
		setup_postdata( $post );
		$page_list[get_the_ID()]= get_the_title(get_the_ID());
	}
	return $page_list;
}
$metabox->addSelect(array(
	'id' => 'popups_select_forpage',
	'label' => 'Popups  For Page',
	'desc' => 'Select a page for shoing popups',
	'options' => metabox_for_pagelist() 
));
// $metabox->addCheckbox(array(
// 	'id' => 'popups_display_onpageload',
// 	'label' => 'Auto Hide',
// 	'desc' => 'Popup auto hide'
// ));
// $metabox->addCheckbox(array(
// 	'id' => 'popups_display_onexit',
// 	'label' => 'Auto Hide',
// 	'desc' => 'Popup On exit'
// ));
$metabox->addRadio(
	array(
		'id' => 'dispay_exit_or_pageload',
		'label'=>'Display popup'
	),
	array(
		'pageload' => 'Display on page load',
		'exit'=> 'Display on exit'
	)
);
// addRadio
$metabox->addText(array(
	'id' => 'popups_url_field',
	'label' => 'Url',
	'desc' => 'Input Url'
));
$metabox->addNumber(array(
	'id' => 'popups_delay',
	'label' => 'Delay Time ',
	'default' => 1,
	'desc' => 'Delay timer Secound example:1 (1s)'
));
// $metabox->addImage(array(
// 	'id' => 'popups_image_field',
// 	'label' => 'Image Upload Field',
// 	'desc' => 'Upload an image, or change it, by clicking the button below the preview.'
// ));
$metabox->addCheckbox(array(
	'id' => 'popups_thumbnail_field',
	'label' => 'Show Popup Image',
	'default' => 'on',
	'desc' => 'Click checkbox for show image'
));
$metabox->addSelect(array(
	'id' => 'popups_select_field',
	'label' => 'Image Size ',
	'desc' => 'select image size ',
	'options' => array(
		'full' => "Full",
		'popup-landscape' => "Landscape",
		'popup-square' => 'Squere'
	)
));
// $metabox_repeater_block15_fields[] = $metabox->addText(array(
// 	'id' => 'metabox_repeater_text_field',
// 	'label' => 'Product Title'
// ), true);
// $metabox_repeater_block15_fields[] = $metabox->addTextArea(array(
// 	'id' => 'metabox_repeater_textarea_field',
// 	'label' => 'Product Description'
// ), true);
// $metabox_repeater_block15_fields[] = $metabox->addWysiwyg(array(
// 	'id' => 'metabox_wysiwyg_field',
// 	'label' => 'WYSIWYG Field',
// 	'desc' => 'You can use a WYSIWYG editor to facilitate the management of HTML content.'
// ),true);
// $metabox_repeater_block15_fields[] = 
// $metabox->addRepeaterBlock(array(
// 	'id' => 'metabox_repeater_block15',
// 	'label' => 'Repeater Block Field',
// 	'desc' => 'Repeater blocks can be used to store an array of content with a dynamic length (e.g, Products).',
// 	'fields' => $metabox_repeater_block15_fields,
// 	'single_label' => 'Product'
// ));
// $metabox->addGallery(array(
// 	'id' => 'metabox_image_field_gallery_',
// 	'label' => 'Gallery Image Upload Field',
// 	'desc' => 'Upload an image, or change it, by clicking the button below the preview.'
// ));
// $metabox->addRadio(
// 	array(
// 		'id' => 'metabox_radio_field',
// 		'label' => 'Radio Field',
// 		'desc' => 'Radio fields are a great way to choose from a selection of options.',
// 	),
// 	array(
// 		'key1' => 'Value One',
// 		'key2' => 'Value Two'
// 	)
// );
// $metabox->addGallery(array(
// 	'id' => 'metabox_image_field_gallery',
// 	'label' => 'Gallery Image Upload Field',
// 	'desc' => 'Upload an image, or change it, by clicking the button below the preview.'
// ));
// $metabox->addTextArea(array(
// 	'id' => 'metabox_textarea_field',
// 	'label' => 'Textarea Field'
// ));
