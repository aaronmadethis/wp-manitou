<?php
/**
 * The Header for my theme.
 */
global $post;
$share = get_facebook_share_meta($post);
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta name="google-site-verification" content="2oXcynXdjEven-EJbjWLg3AmdBmZEJHULXAeu3yxVxg" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<meta name="keywords" content="Garrison, NY School, Putnam County Schools, NY Private Schools, Cold Spring, Peekskill, Montessori Schools, Progressive Schools, Pre-School, Bi-Lingual Education, Putnam county schools, Putnam county private schools, Putnam county preschools, cold spring schools, Cold spring private schools, cold spring preschools, Garrison private schools, Garrison preschools, Garrison Schools, Philipstown schools, philipstown preschools, philipstown private schools, philipstown private preschools, beacon schools, beacon private schools, beacon private preschools, Westchester private schools, Westchester private pre schools, Westchester schools, Westchester bilingual schools, Hudson valley private schools, Hudson valley private pre schools, Hudson valley schools, Hudson valley bilingual schools, New york bilingual schools, New York bilingual pre schools, New york private pre schools, Bilingual Education in Putnam County, Bilingual Education in the Hudson Valley, Spanish schools Westchester, Spanish schools NY, Putnam County, Cold Spring, Garrison, Peekskill, Beacon, Competitor Hudson Hills Academy, Competitor Poughkeepsie Day School, Competitor Randolph School, Competitor Hackley School, Competitor Masters School, Competitor Longview School">
<meta name="author" content="The Manitou School">
<!-- Facebook -->
<meta property="og:locale" content="en_US">
<meta property="og:site_name" content="Manitou School"/>
<meta property="article:author" content="https://www.facebook.com/ManitouSchool"/>
<meta property="og:title" content="<?php echo $share['title'];?>"/>
<meta property="og:url" content="<?php echo $share['url'];?>"/>
<meta property="og:description" content="<?php echo $share['description'];?>"/>
<meta property="og:image" content="<?php echo $share['image'];?>"/>
<meta property="og:type" content="<?php echo $share['type'];?>"/>
<!-- Facebook end -->
<!-- Twitter -->
<meta name="twitter:url" content="http://manitouschool.org/">
<meta name="twitter:card" content="summary">
<meta name="twitter:creator" content="@https://twitter.com/ManitouSchool">
<meta name="twitter:site" content="@ManitouSchool">
<!-- Twitter End -->
<title><?php bloginfo( $show='name' ); ?> | <?php wp_title(''); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="author" href="https://plus.google.com/u/0/b/109626394872600571978">
<link rel="publisher" href="https://plus.google.com/u/0/b/109626394872600571978">
<!-- Typekit Fonts -->
<script type="text/javascript" src="//use.typekit.net/rxq2etg.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<div id="all-wrapper" class="col-xs-12 no-p" itemscope itemtype="http://schema.org/WebSite">