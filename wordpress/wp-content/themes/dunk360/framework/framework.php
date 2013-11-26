<?php 
/*******************************************************************************
 * The framework for our theme. *
 * Load the theme options, types, metaboxs, shortcodes, widgets.
 *
 * @package KavaTheme
 * @since Kava 1.0
*******************************************************************************/


/*-------------------------------------------------------------
~~~~~~~~Load Options Customization Functions~~~~~~~~
-------------------------------------------------------------*/

/*Load remove unnecessary links file*/
require_once(FrameWork. "/removelinks.php");

/*Load rewrite urls*/
//require_once(FrameWork. "/kava_rewrite.php");

/*Load relative urls*/
//require_once(FrameWork. "/relative_urls.php");

/*Load custom menu walker*/
//require_once(FrameWork. "/kava_nav_walker.php");

/*Load customization admin url*/
require_once(FrameWork. "/clean_admin.php");
	

/*-------------------------------------------------------------
~~~~~~~~Load Metaboxes Functions~~~~~~~~
-------------------------------------------------------------*/
/*Load metabox framework*/
//require_once(FrameWork. "/metaboxs/metabox.framework.php");

/*Load slider url metabox*/
//require_once(FrameWork. "/metaboxs/metabox.slides.php");

/*Load featured box metabox*/
//require_once(FrameWork. "/metaboxs/metabox.boxes.php");

/*Load staff metabox*/
//require_once(FrameWork. "/metaboxs/metabox.staff.php");

/*Load insights metabox*/
//require_once(FrameWork. "/metaboxs/metabox.insights.php");

/*Load news metabox*/
//require_once(FrameWork. "/metaboxs/metabox.news.php");

/*-------------------------------------------------------------
~~~~~~~~Load Custom post types Functions~~~~~~~~
-------------------------------------------------------------*/

/*Load post type slides*/
//require_once(FrameWork. "/types/type.slides.php");

/*Load post type news*/
//require_once(FrameWork. "/types/type.news.php");

/*Load post type boxes*/
//require_once(FrameWork. "/types/type.boxes.php");




/*-------------------------------------------------------------------
~~~~~~~~Register And Load Widgets~~~~~~~~
-------------------------------------------------------------------*/

/*Register Custom Widgets*/
//require_once(FrameWork. "/widgets/widget.register.php");

/*Load feature recent news*/
//require_once(FrameWork. "/widgets/widget.news.recent.php");

/*Load feature contact us*/
//require_once(FrameWork. "/widgets/widget.contact.php");
?>