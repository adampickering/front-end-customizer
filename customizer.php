<?php
/*
Template Name: Customizer
*/
?>

<!DOCTYPE html>
<!--[if IE 6]> <html class="ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php if( of_get_option( 'engine_responsive' ) != '' ) : ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php endif; ?>

<title>Customizer</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->

<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="<?php echo ASSETS; ?>/js/selectivizr.js"></script>
<![endif]-->

<link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-admin/load-styles.php?c=1&amp;dir=ltr&amp;load=admin-bar,wp-admin,wp-color-picker,buttons&amp;ver=3.5" type="text/css" media="all">

<link rel="stylesheet" id="colors-css" href="<?php bloginfo('url'); ?>/wp-admin/css/colors-fresh.min.css?ver=3.5" type="text/css" media="all">

<link rel="stylesheet" href="<?php echo get_admin_url() . 'css/customize-controls.min.css'; ?> " />
<link rel="stylesheet" href="<?php echo get_admin_url() . 'css/wp-admin.min.css'; ?> " />

<style type="text/css">
	
.no-arrow.customize-section-title::after { border-color: transparent }

.wp-picker-input-wrap { margin-top: -10px }

.color-picker-hex.wp-color-picker { margin-bottom: 4px !important }

.wp-full-overlay.collapsed .collapse-sidebar-label {
    display: block;
    text-shadow: none;
}

.wp-core-ui .button.wp-picker-default,
.wp-color-picker { display: none }

.back {
    bottom: 10px;
    right: 20px;
    position: absolute;
    z-index: 100;
}

#customize-info .preview-notice small {
    line-height: 1.5em;
    display: block;
    margin-top: 15px;
}
	
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-admin/js/iris.min.js"></script>

<script type="text/javascript">
	
	jQuery(document).ready( function($) {
		
		$('#site').load( function() {
			$(this).contents().find('.logo a').attr('href', '<?php bloginfo("url"); ?>/home');
		});
				
		$('.customize-section-title').click( function() {
			$(this).parent().find('.customize-section-content').toggle();
		});
		
		$('.customize-section-title').click( function() {
			$(this).parent().toggleClass('open');
		});
		
		$('.collapse-sidebar').click( function() {
			$('.wp-full-overlay').toggleClass('expanded');
			$('.wp-full-overlay').toggleClass('collapsed');
			
			var text = $('.collapse-sidebar-label').text()
			
			$('.collapse-sidebar-label').text( text == 'Collapse' ? "Customize" : 'Collapse' );
		});
		
		// Colour result
		$('.wp-color-result').click( function() {
			$(this).parent().find('.color-picker-hex').iris('toggle');
			$(this).parent().find('.wp-color-picker').toggle();
			
			var text = $(this).attr('title');
			
			$(this).attr( 'title', text == "Hide Colorpicker" ? "Show Colorpicker" : "Hide Colorpicker" );
		});
		
		function css() {
			
			var backgroundColor = $('#background-color').val();
			var defaultColor = $('#default-color').val();
			var color = $('#color').val();
			var textColor = $('.text-color:checked').val();
			
			if( textColor == 'Dark Text' ) {
		
				var textColor = '#444444';
				var metaColor = 'rgba(0,0,0, 0.5)';
				var borderColor = 'rgba(0,0,0, 0.1)';
				var contentBorderColor = '#eee';
				var altBorderColor = 'rgba(0,0,0, 0.04)';
				var backgroundUrl = '<?php echo get_template_directory_uri(); ?>/assets/images/slider-overlay.png';
				var backgroundRgb = 'rgba(255, 255, 255, 0.8)';
				
			} else {
			
				var textColor = '#f7f7f7';
				var metaColor = 'rgba(255,255,255, 0.5)';
				var borderColor = 'rgba(255,255,255, 0.1)';
				var contentBorderColor = '#444';
				var altBorderColor = 'rgba(255,255,255, 0.05)';
				var backgroundUrl = '<?php echo get_template_directory_uri(); ?>/assets/images/slider-overlay-dark.png';
				var backgroundRgb = 'rgba(0, 0, 0, 0.8)';
				
			}
		
			return '.perspective{background-color:'+backgroundColor+'}body,.logo h1 a,.entry-meta a:hover,.entry-content .nav-stacked a,.comments .comment-author a,.comments .comment-reply-link:hover,.comments .comment-meta a:hover,.sidebar .Engine_Twitter .widget-title,.sidebar .Engine_Twitter a,.home-slider .entry-title a,.sc.nav-tabs li a,.home-slider-mobile .entry-title a{color:'+textColor+'}.entry-meta a,a,.primary-menu .dropdown-menu a,.entry-meta,.comments .comment-reply-link,.comments .comment-meta a,.sidebar a,.sidebar .Engine_Twitter,.welcome a:hover{color:'+metaColor+';border-color:'+borderColor+'}.main-inner,.content-inner,.sidebar-inner,.header,.post-nav,#respond,.comments,.comments .children,.comments .children ol .comment-author:after,.sidebar .widget-title,.slider-content,.welcome,.blog-preview,.home-content,.accordion-group,.sc.nav-tabs,.sc.nav-tabs .active>a,.sc.nav-tabs .active>a:hover,.sc.nav-tabs li a:hover,.sc.tab-content,.wp-caption,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"],.uneditable-input,input,textarea{border-color:'+contentBorderColor+'}.index-content .entry-wrap,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"],.uneditable-input,input,textarea{background-color:'+altBorderColor+';color:'+textColor+'}.home-slider .bg-top,.home-slider .bg-bottom{background:url('+backgroundUrl+') repeat;background:'+backgroundRgb+'}.overlay .overlay-trigger{color:'+defaultColor+'}.block,.prev-post a,.next-post a,#reply-title,.headline,body,.main-container,.primary-menu .nav-tabs.nav-stacked>li>a,.ie8 .entry-title,.flexslider .flex-direction-nav .flex-prev,.flexslider .flex-direction-nav .flex-next,.footer,.home-slider .jcarousel-prev,.home-slider .jcarousel-next,.overlay,.overlay .overlay-trigger,.accordion-heading .accordion-toggle,.mobile-menu .nav li a{background-color:'+defaultColor+'}.entry-title span,.entry-title a,.blog-preview .entry-title a{-webkit-box-shadow:20px 0 0 '+defaultColor+',-20px 0 0 '+defaultColor+';-moz-box-shadow:20px 0 0 '+defaultColor+',-20px 0 0 '+defaultColor+';-ms-box-shadow:20px 0 0 '+defaultColor+',-20px 0 0 '+defaultColor+';-o-box-shadow:20px 0 0 '+defaultColor+',-20px 0 0 '+defaultColor+';box-shadow:20px 0 0 '+defaultColor+',-20px 0 0 '+defaultColor+';background-color:'+defaultColor+'}a:hover,.comments .comment-author a:hover,.comments .bypostauthor .comment-author:after,.comments #respond #cancel-comment-reply-link:hover,.Engine_Twitter a:hover,.sidebar a:hover,.sidebar .Engine_Twitter a:hover,.home-slider .entry-title a:hover,.home-slider-mobile .entry-title a:hover,.primary-menu .dropdown-menu a:hover,.primary-menu .dropdown-menu .current-menu-item a,.welcome a,.welcome a:hover{color:'+color+'}.primary-menu .nav-tabs.nav-stacked>li>a.clone,.primary-menu .nav-tabs.nav-stacked>.current-menu-ancestor>a,.primary-menu .nav-tabs.nav-stacked>.current-menu-item>a,.read-more:hover,.entry-comments:hover,.flexslider .flex-direction-nav .flex-prev:hover,.flexslider .flex-direction-nav .flex-next:hover,.post-nav a:hover,.home-slider .jcarousel-prev:hover,.home-slider .jcarousel-next:hover,.accordion-toggle:hover,.mobile-menu .nav li a:hover,.mobile-menu .btn-navbar:hover,.ie8 .entry-title:hover,.ie8 .border-overlay .entry-title,#respond #commentform #submit:hover,.entry-date.block{background-color:'+color+'}.mobile-menu .btn-navbar{background:'+color+'}.entry-title span.active,.entry-title a:hover{-webkit-box-shadow:20px 0 0 '+color+',-20px 0 0 '+color+';-moz-box-shadow:20px 0 0 '+color+',-20px 0 0 '+color+';-ms-box-shadow:20px 0 0 '+color+',-20px 0 0 '+color+';-o-box-shadow:20px 0 0 '+color+',-20px 0 0 '+color+';box-shadow:20px 0 0 '+color+',-20px 0 0 '+color+';background-color:'+color+'}.entry-meta a:hover,.comments .comment-reply-link:hover,.comments .comment-meta a:hover,.widget a:hover,.border-overlay a,.footer-info a:hover,footer{border-color:'+color+'!important}';
			
		} 
		
		// Background Color Iris
		$('.color-picker-hex.background-color').iris({
			defaultColor: '#FFFFFF',
		    width: 255,
		    change: function(event, ui){

			    $('.wp-color-result.background-color').css({ backgroundColor: ui.color.toString() });
			    engineSave();
				$('#site').contents().find('#color-scheme').text(css());
		    },
		    hide: true,
		    palettes: true
		});
		
		// Default Color Iris
		$('.color-picker-hex.default-color').iris({
			defaultColor: '#21262b',
		    width: 255,
		    change: function(event, ui){

			    $('.wp-color-result.default-color').css({ backgroundColor: ui.color.toString() });
			    engineSave();
				$('#site').contents().find('#color-scheme').text(css());
		    },
		    hide: true,
		    palettes: true
		});
		
		// Highlight Color Iris
		$('.color-picker-hex.color').iris({
			defaultColor: '#29D2D8',
		    width: 255,
		    change: function(event, ui){
		    
			    $('.wp-color-result.color').css({ backgroundColor: ui.color.toString() });
			    engineSave();
				$('#site').contents().find('#color-scheme').text(css());
			
		    },
		    hide: true,
		    palettes: true
		});
		
		// Preset Skins
		$('#skin-light').click( function() {
		
			$('#background-color').val('#FFFFFF');
			$('.wp-color-result.background-color').css({ backgroundColor: '#FFFFFF' });
			
			$('#dark').attr('checked', 'checked');
			
			$('#default-color').val('#21262b');
			$('.wp-color-result.default-color').css({ backgroundColor: '#21262b' });
			
			$('#color').val('#29D2D8');
			$('.wp-color-result.color').css({ backgroundColor: '#29D2D8' });
			
			engineSave();
			
		});
		
		$('#skin-dark').click( function() {
		
			$('#background-color').val('#21262b');
			$('.wp-color-result.background-color').css({ backgroundColor: '#21262b' });
			
			$('#light').attr('checked', 'checked');
			
			$('#default-color').val('#000000');
			$('.wp-color-result.default-color').css({ backgroundColor: '#000000' });
			
			$('#color').val('#29D2D8');
			$('.wp-color-result.color').css({ backgroundColor: '#29D2D8' });
			
			engineSave();
			
		});
		
		$('#skin-kool').click( function() {
		
			$('#background-color').val('#F5F7FA');
			$('.wp-color-result.background-color').css({ backgroundColor: '#F5F7FA' });
			
			$('#dark').attr('checked', 'checked');
			
			$('#default-color').val('#414141');
			$('.wp-color-result.default-color').css({ backgroundColor: '#414141' });
			
			$('#color').val('#CE7C7A');
			$('.wp-color-result.color').css({ backgroundColor: '#CE7C7A' });
			
			engineSave();
			
		});
		
		$('#skin-coral').click( function() {
		
			$('#background-color').val('#31535A');
			$('.wp-color-result.background-color').css({ backgroundColor: '#31535A' });
			
			$('#light').attr('checked', 'checked');
			
			$('#default-color').val('#262626');
			$('.wp-color-result.default-color').css({ backgroundColor: '#262626' });
			
			$('#color').val('#DC7A71');
			$('.wp-color-result.color').css({ backgroundColor: '#DC7A71' });
			
			engineSave();
			
		});
		
		$('#skin-pave').click( function() {
		
			$('#background-color').val('#DBDCDE');
			$('.wp-color-result.background-color').css({ backgroundColor: '#DBDCDE' });
			
			$('#dark').attr('checked', 'checked');
			
			$('#default-color').val('#3E4247');
			$('.wp-color-result.default-color').css({ backgroundColor: '#3E4247' });
			
			$('#color').val('#DC7362');
			$('.wp-color-result.color').css({ backgroundColor: '#DC7362' });
			
			engineSave();
			
		});
		
		$('#skin-candy').click( function() {
		
			$('#background-color').val('#F4F4F4');
			$('.wp-color-result.background-color').css({ backgroundColor: '#F4F4F4' });
			
			$('#dark').attr('checked', 'checked');
			
			$('#default-color').val('#D95444');
			$('.wp-color-result.default-color').css({ backgroundColor: '#D95444' });
			
			$('#color').val('#54B8D8');
			$('.wp-color-result.color').css({ backgroundColor: '#54B8D8' });
			
			engineSave();
			
		});
		
		$('#skin-lime').click( function() {
		
			$('#background-color').val('#444C4D');
			$('.wp-color-result.background-color').css({ backgroundColor: '#444C4D' });
			
			$('#light').attr('checked', 'checked');
			
			$('#default-color').val('#343B3D');
			$('.wp-color-result.default-color').css({ backgroundColor: '#343B3D' });
			
			$('#color').val('#99B033');
			$('.wp-color-result.color').css({ backgroundColor: '#99B033' });
			
			engineSave();
			
		});
		
		$('#skin-apple').click( function() {
		
			$('#background-color').val('#485356');
			$('.wp-color-result.background-color').css({ backgroundColor: '#485356' });
			
			$('#light').attr('checked', 'checked');
			
			$('#default-color').val('#2E3537');
			$('.wp-color-result.default-color').css({ backgroundColor: '#2E3537' });
			
			$('#color').val('#91C371');
			$('.wp-color-result.color').css({ backgroundColor: '#91C371' });
			
			engineSave();
			
		});
		
		// Engine Save
		function engineSave() {
		
			var iframe = $('#site').contents();
			
			iframe.find('.logo a').attr('href', '<?php bloginfo("url"); ?>/home');
				
			iframe.find('#color-scheme').text(css);

			// Site Title
			var val = $('#sitetitle').val();
			iframe.find('.logo a, div.logo h1').text(val);
			
			// Welcome
			var val = $('.welcome-message').val();
			iframe.find('.welcome').html(val);
			
			// Custom CSS
			var val = $('.custom-css').val();
			iframe.find('#custom-css').text(val);
				
			// sidebar
			var val = $('.sidebar-option option:selected').val();
			iframe.find('body').removeClass('sidebar_right');
			iframe.find('body').removeClass('sidebar_left');
			iframe.find('body').addClass(val);
			
		}
		
		$('#customize-controls').change( function() {
			engineSave();
		})
				
	});
	
</script>

<?php
	
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	//wp_head();
	
?>

</head>

<body class="wp-core-ui locale-en-us">

<div class="wp-full-overlay expanded">

	<form id="customize-controls" class="wrap wp-full-overlay-sidebar">
		
		<div id="customize-header-actions" class="wp-full-overlay-header">
		<a href="#" class="collapse-sidebar button-secondary" title="Collapse Sidebar">
				<span class="collapse-sidebar-arrow"></span>
				<span class="collapse-sidebar-label">Collapse</span>
			</a>
			<a id="save" href="http://themeforest.net/item/pipes-a-superduper-customizable-wordpress-theme-/3836179?ref=designerthemes" class="button button-primary save">Purchase</a>
		</div>
		
		<div class="wp-full-overlay-sidebar-content" tabindex="-1">
		
			<div id="customize-info" class="customize-section">
				<div class="customize-section-title no-arrow" aria-label="Theme Customizer Options" tabindex="0">
					<span class="preview-notice">You are previewing <strong class="theme-name">Pipes</strong> <small>Here's just a taste of some of the options available to you.</small></span>
				</div>			
			</div>

			<div id="customize-theme-controls">
			
				<ul>
				
					<li id="customize-section-title_tagline" class="control-section customize-section">
						<h3 class="customize-section-title" tabindex="0" title="">Site Title</h3>
						<ul class="customize-section-content">
							<li id="customize-control-blogname" class="customize-control customize-control-text">
								<label>
									<span class="customize-control-title">Site Title</span>
									<input id="sitetitle" type="text" value="Pipes">
								</label>
							</li>
							<li id="customize-control-welcome" class="customize-control customize-control-text">
								<label>
									<span class="customize-control-title">Welcome Message</span>
									<textarea class="welcome-message" rows="5" style="width:100%;">Pipes is a super-duper customizable WordPress theme for your portfolio.
<br />
Take the theme <a href="http://demo.designerthemes.com/pipes/customizer/" target="_top">customizer <i style="font-size:85%" class="icon-external-link"></i></a> for a whirl and see what you can create!</textarea>
								</label>
							</li>			
						</ul>
					</li>
					
					<li id="customize-section-title_tagline" class="control-section customize-section">
						<h3 class="customize-section-title" tabindex="0" title="">Design Settings</h3>
						<ul class="customize-section-content">
							<li id="customize-control-color-background" class="customize-control customize-control-text">
								<label>
									<span class="customize-control-title">Primary Background Color</span>
									<a tabindex="0" class="wp-color-result background-color" style="background-color: #FFFFFF;" title="Show Colorpicker" data-current="Current Color"></a>
									
									<span class="wp-picker-input-wrap">
										<input id="background-color" class="color-picker-hex wp-color-picker background-color" value="#FFFFFF" type="text" maxlength="7" placeholder="Hex Value" data-default-color="#FFFFFF">

									</span>
									
								</label>
							</li>
							<li id="customize-control-options_engine_engine_skin" class="customize-control customize-control-radio">
								<span class="customize-control-title">Primary Text/Details</span>
								<label>
									<input class="text-color" type="radio" name="skin" id="light" checked="" value="Light Text">
									Light<br>
								</label>
								<label>
									<input class="text-color" type="radio" name="skin" id="dark" checked="checked" value="Dark Text">
									Dark<br>
								</label>
							</li>
							<li id="customize-control-color-default" class="customize-control customize-control-text">
								<label>
									<span class="customize-control-title">Secondary Color</span>
									<a tabindex="0" class="wp-color-result default-color" style="background-color: #21262b;" title="Show Colorpicker" data-current="Current Color"></a>
									
									<span class="wp-picker-input-wrap">
										<input id="default-color" class="color-picker-hex wp-color-picker default-color" value="#21262b" type="text" maxlength="7" placeholder="Hex Value" data-default-color="#21262b">

									</span>
									
								</label>
							</li>
							<li id="customize-control-color" class="customize-control customize-control-text">
								<label>
									<span class="customize-control-title">Highlight Color</span>
									<a tabindex="0" class="wp-color-result color" style="background-color: #29D2D8;" title="Show Colorpicker" data-current="Current Color"></a>
									
									<span class="wp-picker-input-wrap">
										<input id="color" class="color-picker-hex wp-color-picker color" value="#29D2D8" type="text" maxlength="7" placeholder="Hex Value" data-default-color="#ffa531">

									</span>
									
								</label>
							</li>
							<li id="customize-control-options_engine_engine_skin" class="customize-control customize-control-radio">
								<span class="customize-control-title">Here are some we made earlier...</span>
								<label>
									<input type="radio" name="earlier" id="skin-light" checked="checked" value="default">
									Light (default)<br>
								</label>
								<label>
									<input type="radio" name="earlier" id="skin-dark"  value="dark">
									Dark<br>
								</label>
								<label>
									<input type="radio" name="earlier" id="skin-kool"  value="kool">
									Kool<br>
								</label>
								<label>
									<input type="radio" name="earlier" id="skin-coral"  value="coral">
									Coral<br>
								</label>
								<label>
									<input type="radio" name="earlier" id="skin-pave"  value="pave">
									Pave<br>
								</label>
								<label>
									<input type="radio" name="earlier" id="skin-candy"  value="candy">
									Candy<br>
								</label>
								<label>
									<input type="radio" name="earlier" id="skin-lime"  value="lime">
									Lime<br>
								</label>
								<label>
									<input type="radio" name="earlier" id="skin-apple"  value="apple">
									Apple<br>
								</label>
							</li>
										
						</ul>
					</li>
					
					<li id="customize-section-title_tagline" class="control-section customize-section">
						<h3 class="customize-section-title" tabindex="0" title="">Layout Settings</h3>
						<ul class="customize-section-content">
							<li id="customize-control-pipes-engine_page_sidebar" class="customize-control customize-control-select">
								<label>
									<span class="customize-control-title">Default Sidebar Position</span>
									<p><small>Make sure you're on the blog or post page to see this setting in action.</small></p>
									<select class="sidebar-option" data-customize-setting-link="pipes[engine_page_sidebar]">
										<option value="sidebar_left">Left</option>
										<option value="sidebar_right" selected="selected">Right</option>											
									</select>
								</label>
							</li>
							<li id="customize-control-engine_css" class="customize-control customize-control-textarea">
						        <label>
							        <span class="customize-control-title">Custom CSS</span>
							        <textarea class="custom-css" rows="5" style="width:100%;" data-customize-setting-link="pipes[engine_css]"></textarea>
						        </label>
			        		</li>			
						</ul>
					</li>
									
				</ul>
			</div>
		</div>

		<div id="customize-footer-actions" class="wp-full-overlay-footer">
			<a class="back button" href="<?php bloginfo('url'); ?>/home">Remove Customizer</a>
		</div>
		
	</form>
	
	<div id="customize-preview" class="wp-full-overlay-main">
		<iframe id="site" src="<?php bloginfo('url'); ?>/home" frameborder="0"></iframe>
	</div>
	
</div>

</body>

</html>