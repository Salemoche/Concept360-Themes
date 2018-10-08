<?php
/* Adds custom classes to the array of body classes. */
function thb_body_classes( $classes ) {
  $thb_id = get_queried_object_id();
  $transparent_header = get_post_meta($thb_id, 'transparent_header', TRUE);
	$classes[] = 'mobile_menu_position_'. ot_get_option('mobile_menu_position', 'right');
	$classes[] = 'mobile_menu_style_'. ot_get_option('mobile_menu_style', 'style1');
	$classes[] = 'header_style_'. ot_get_option('header_style', 'style1');
	$classes[] = 'header_full_menu_'. ot_get_option('header_full_menu', 'on');
	$classes[] = 'footer_style_'. ot_get_option('footer_style', 'style1');
	$classes[] = 'site_bars_'.ot_get_option('site_bars', 'on');
	$classes[] = 'preloader_'.ot_get_option('preloader', 'on');
	$classes[] = 'header_full_menu_submenu_color_'. ot_get_option('header_full_menu_submenu_color', 'style1');
	$classes[] = 'footer_simple_fixed_'.ot_get_option('footer_simple_fixed', 'off');
	
	$classes[] = 'transparent_header_'.$transparent_header;
	if ($transparent_header === 'on') {
	$classes[] = get_post_meta($thb_id, 'header_color', TRUE);
	}
	$classes[] = post_password_required() ? 'page-password-required' : '';
	
	
	return $classes;
}
add_filter( 'body_class', 'thb_body_classes' );

/* Excerpts */
add_filter('excerpt_length', 'thb_default_excerpt_length');
add_filter('excerpt_more', 'thb_default_excerpt_more');

function thb_default_excerpt_length() {
	return 55;
}

function thb_short_excerpt_length() {
	return 32;
}

function thb_supershort_excerpt_length() {
	return 15;
}

function thb_default_excerpt_more(){
	return "&hellip;";
}

/* Font Awesome Array */
function thb_getIconArray(){
	$icons = array(
		'' => '', 'fa-glass' => 'fa-glass', 'fa-music' => 'fa-music', 'fa-search' => 'fa-search', 'fa-envelope-o' => 'fa-envelope-o', 'fa-heart' => 'fa-heart', 'fa-star' => 'fa-star', 'fa-star-o' => 'fa-star-o', 'fa-user' => 'fa-user', 'fa-film' => 'fa-film', 'fa-th-large' => 'fa-th-large', 'fa-th' => 'fa-th', 'fa-th-list' => 'fa-th-list', 'fa-check' => 'fa-check', 'fa-times' => 'fa-times', 'fa-search-plus' => 'fa-search-plus', 'fa-search-minus' => 'fa-search-minus', 'fa-power-off' => 'fa-power-off', 'fa-signal' => 'fa-signal', 'fa-cog' => 'fa-cog', 'fa-trash-o' => 'fa-trash-o', 'fa-home' => 'fa-home', 'fa-file-o' => 'fa-file-o', 'fa-clock-o' => 'fa-clock-o', 'fa-road' => 'fa-road', 'fa-download' => 'fa-download', 'fa-arrow-circle-o-down' => 'fa-arrow-circle-o-down', 'fa-arrow-circle-o-up' => 'fa-arrow-circle-o-up', 'fa-inbox' => 'fa-inbox', 'fa-play-circle-o' => 'fa-play-circle-o', 'fa-repeat' => 'fa-repeat', 'fa-refresh' => 'fa-refresh', 'fa-list-alt' => 'fa-list-alt', 'fa-lock' => 'fa-lock', 'fa-flag' => 'fa-flag', 'fa-headphones' => 'fa-headphones', 'fa-volume-off' => 'fa-volume-off', 'fa-volume-down' => 'fa-volume-down', 'fa-volume-up' => 'fa-volume-up', 'fa-qrcode' => 'fa-qrcode', 'fa-barcode' => 'fa-barcode', 'fa-tag' => 'fa-tag', 'fa-tags' => 'fa-tags', 'fa-book' => 'fa-book', 'fa-bookmark' => 'fa-bookmark', 'fa-print' => 'fa-print', 'fa-camera' => 'fa-camera', 'fa-font' => 'fa-font', 'fa-bold' => 'fa-bold', 'fa-italic' => 'fa-italic', 'fa-text-height' => 'fa-text-height', 'fa-text-width' => 'fa-text-width', 'fa-align-left' => 'fa-align-left', 'fa-align-center' => 'fa-align-center', 'fa-align-right' => 'fa-align-right', 'fa-align-justify' => 'fa-align-justify', 'fa-list' => 'fa-list', 'fa-outdent' => 'fa-outdent', 'fa-indent' => 'fa-indent', 'fa-video-camera' => 'fa-video-camera', 'fa-picture-o' => 'fa-picture-o', 'fa-pencil' => 'fa-pencil', 'fa-map-marker' => 'fa-map-marker', 'fa-adjust' => 'fa-adjust', 'fa-tint' => 'fa-tint', 'fa-pencil-square-o' => 'fa-pencil-square-o', 'fa-share-square-o' => 'fa-share-square-o', 'fa-check-square-o' => 'fa-check-square-o', 'fa-arrows' => 'fa-arrows', 'fa-step-backward' => 'fa-step-backward', 'fa-fast-backward' => 'fa-fast-backward', 'fa-backward' => 'fa-backward', 'fa-play' => 'fa-play', 'fa-pause' => 'fa-pause', 'fa-stop' => 'fa-stop', 'fa-forward' => 'fa-forward', 'fa-fast-forward' => 'fa-fast-forward', 'fa-step-forward' => 'fa-step-forward', 'fa-eject' => 'fa-eject', 'fa-chevron-left' => 'fa-chevron-left', 'fa-chevron-right' => 'fa-chevron-right', 'fa-plus-circle' => 'fa-plus-circle', 'fa-minus-circle' => 'fa-minus-circle', 'fa-times-circle' => 'fa-times-circle', 'fa-check-circle' => 'fa-check-circle', 'fa-question-circle' => 'fa-question-circle', 'fa-info-circle' => 'fa-info-circle', 'fa-crosshairs' => 'fa-crosshairs', 'fa-times-circle-o' => 'fa-times-circle-o', 'fa-check-circle-o' => 'fa-check-circle-o', 'fa-ban' => 'fa-ban', 'fa-arrow-left' => 'fa-arrow-left', 'fa-arrow-right' => 'fa-arrow-right', 'fa-arrow-up' => 'fa-arrow-up', 'fa-arrow-down' => 'fa-arrow-down', 'fa-share' => 'fa-share', 'fa-expand' => 'fa-expand', 'fa-compress' => 'fa-compress', 'fa-plus' => 'fa-plus', 'fa-minus' => 'fa-minus', 'fa-asterisk' => 'fa-asterisk', 'fa-exclamation-circle' => 'fa-exclamation-circle', 'fa-gift' => 'fa-gift', 'fa-leaf' => 'fa-leaf', 'fa-fire' => 'fa-fire', 'fa-eye' => 'fa-eye', 'fa-eye-slash' => 'fa-eye-slash', 'fa-exclamation-triangle' => 'fa-exclamation-triangle', 'fa-plane' => 'fa-plane', 'fa-calendar' => 'fa-calendar', 'fa-random' => 'fa-random', 'fa-comment' => 'fa-comment', 'fa-magnet' => 'fa-magnet', 'fa-chevron-up' => 'fa-chevron-up', 'fa-chevron-down' => 'fa-chevron-down', 'fa-retweet' => 'fa-retweet', 'fa-shopping-cart' => 'fa-shopping-cart', 'fa-folder' => 'fa-folder', 'fa-folder-open' => 'fa-folder-open', 'fa-arrows-v' => 'fa-arrows-v', 'fa-arrows-h' => 'fa-arrows-h', 'fa-bar-chart' => 'fa-bar-chart', 'fa-twitter-square' => 'fa-twitter-square', 'fa-facebook-square' => 'fa-facebook-square', 'fa-camera-retro' => 'fa-camera-retro', 'fa-key' => 'fa-key', 'fa-cogs' => 'fa-cogs', 'fa-comments' => 'fa-comments', 'fa-thumbs-o-up' => 'fa-thumbs-o-up', 'fa-thumbs-o-down' => 'fa-thumbs-o-down', 'fa-star-half' => 'fa-star-half', 'fa-heart-o' => 'fa-heart-o', 'fa-sign-out' => 'fa-sign-out', 'fa-linkedin-square' => 'fa-linkedin-square', 'fa-thumb-tack' => 'fa-thumb-tack', 'fa-external-link' => 'fa-external-link', 'fa-sign-in' => 'fa-sign-in', 'fa-trophy' => 'fa-trophy', 'fa-github-square' => 'fa-github-square', 'fa-upload' => 'fa-upload', 'fa-lemon-o' => 'fa-lemon-o', 'fa-phone' => 'fa-phone', 'fa-square-o' => 'fa-square-o', 'fa-bookmark-o' => 'fa-bookmark-o', 'fa-phone-square' => 'fa-phone-square', 'fa-twitter' => 'fa-twitter', 'fa-facebook' => 'fa-facebook', 'fa-github' => 'fa-github', 'fa-unlock' => 'fa-unlock', 'fa-credit-card' => 'fa-credit-card', 'fa-rss' => 'fa-rss', 'fa-hdd-o' => 'fa-hdd-o', 'fa-bullhorn' => 'fa-bullhorn', 'fa-bell' => 'fa-bell', 'fa-certificate' => 'fa-certificate', 'fa-hand-o-right' => 'fa-hand-o-right', 'fa-hand-o-left' => 'fa-hand-o-left', 'fa-hand-o-up' => 'fa-hand-o-up', 'fa-hand-o-down' => 'fa-hand-o-down', 'fa-arrow-circle-left' => 'fa-arrow-circle-left', 'fa-arrow-circle-right' => 'fa-arrow-circle-right', 'fa-arrow-circle-up' => 'fa-arrow-circle-up', 'fa-arrow-circle-down' => 'fa-arrow-circle-down', 'fa-globe' => 'fa-globe', 'fa-wrench' => 'fa-wrench', 'fa-tasks' => 'fa-tasks', 'fa-filter' => 'fa-filter', 'fa-briefcase' => 'fa-briefcase', 'fa-arrows-alt' => 'fa-arrows-alt', 'fa-users' => 'fa-users', 'fa-link' => 'fa-link', 'fa-cloud' => 'fa-cloud', 'fa-flask' => 'fa-flask', 'fa-scissors' => 'fa-scissors', 'fa-files-o' => 'fa-files-o', 'fa-paperclip' => 'fa-paperclip', 'fa-floppy-o' => 'fa-floppy-o', 'fa-square' => 'fa-square', 'fa-bars' => 'fa-bars', 'fa-list-ul' => 'fa-list-ul', 'fa-list-ol' => 'fa-list-ol', 'fa-strikethrough' => 'fa-strikethrough', 'fa-underline' => 'fa-underline', 'fa-table' => 'fa-table', 'fa-magic' => 'fa-magic', 'fa-truck' => 'fa-truck', 'fa-pinterest' => 'fa-pinterest', 'fa-pinterest-square' => 'fa-pinterest-square', 'fa-google-plus-square' => 'fa-google-plus-square', 'fa-google-plus' => 'fa-google-plus', 'fa-money' => 'fa-money', 'fa-caret-down' => 'fa-caret-down', 'fa-caret-up' => 'fa-caret-up', 'fa-caret-left' => 'fa-caret-left', 'fa-caret-right' => 'fa-caret-right', 'fa-columns' => 'fa-columns', 'fa-sort' => 'fa-sort', 'fa-sort-desc' => 'fa-sort-desc', 'fa-sort-asc' => 'fa-sort-asc', 'fa-envelope' => 'fa-envelope', 'fa-linkedin' => 'fa-linkedin', 'fa-undo' => 'fa-undo', 'fa-gavel' => 'fa-gavel', 'fa-tachometer' => 'fa-tachometer', 'fa-comment-o' => 'fa-comment-o', 'fa-comments-o' => 'fa-comments-o', 'fa-bolt' => 'fa-bolt', 'fa-sitemap' => 'fa-sitemap', 'fa-umbrella' => 'fa-umbrella', 'fa-clipboard' => 'fa-clipboard', 'fa-lightbulb-o' => 'fa-lightbulb-o', 'fa-exchange' => 'fa-exchange', 'fa-cloud-download' => 'fa-cloud-download', 'fa-cloud-upload' => 'fa-cloud-upload', 'fa-user-md' => 'fa-user-md', 'fa-stethoscope' => 'fa-stethoscope', 'fa-suitcase' => 'fa-suitcase', 'fa-bell-o' => 'fa-bell-o', 'fa-coffee' => 'fa-coffee', 'fa-cutlery' => 'fa-cutlery', 'fa-file-text-o' => 'fa-file-text-o', 'fa-building-o' => 'fa-building-o', 'fa-hospital-o' => 'fa-hospital-o', 'fa-ambulance' => 'fa-ambulance', 'fa-medkit' => 'fa-medkit', 'fa-fighter-jet' => 'fa-fighter-jet', 'fa-beer' => 'fa-beer', 'fa-h-square' => 'fa-h-square', 'fa-plus-square' => 'fa-plus-square', 'fa-angle-double-left' => 'fa-angle-double-left', 'fa-angle-double-right' => 'fa-angle-double-right', 'fa-angle-double-up' => 'fa-angle-double-up', 'fa-angle-double-down' => 'fa-angle-double-down', 'fa-angle-left' => 'fa-angle-left', 'fa-angle-right' => 'fa-angle-right', 'fa-angle-up' => 'fa-angle-up', 'fa-angle-down' => 'fa-angle-down', 'fa-desktop' => 'fa-desktop', 'fa-laptop' => 'fa-laptop', 'fa-tablet' => 'fa-tablet', 'fa-mobile' => 'fa-mobile', 'fa-circle-o' => 'fa-circle-o', 'fa-quote-left' => 'fa-quote-left', 'fa-quote-right' => 'fa-quote-right', 'fa-spinner' => 'fa-spinner', 'fa-circle' => 'fa-circle', 'fa-reply' => 'fa-reply', 'fa-github-alt' => 'fa-github-alt', 'fa-folder-o' => 'fa-folder-o', 'fa-folder-open-o' => 'fa-folder-open-o', 'fa-smile-o' => 'fa-smile-o', 'fa-frown-o' => 'fa-frown-o', 'fa-meh-o' => 'fa-meh-o', 'fa-gamepad' => 'fa-gamepad', 'fa-keyboard-o' => 'fa-keyboard-o', 'fa-flag-o' => 'fa-flag-o', 'fa-flag-checkered' => 'fa-flag-checkered', 'fa-terminal' => 'fa-terminal', 'fa-code' => 'fa-code', 'fa-reply-all' => 'fa-reply-all', 'fa-star-half-o' => 'fa-star-half-o', 'fa-location-arrow' => 'fa-location-arrow', 'fa-crop' => 'fa-crop', 'fa-code-fork' => 'fa-code-fork', 'fa-chain-broken' => 'fa-chain-broken', 'fa-question' => 'fa-question', 'fa-info' => 'fa-info', 'fa-exclamation' => 'fa-exclamation', 'fa-superscript' => 'fa-superscript', 'fa-subscript' => 'fa-subscript', 'fa-eraser' => 'fa-eraser', 'fa-puzzle-piece' => 'fa-puzzle-piece', 'fa-microphone' => 'fa-microphone', 'fa-microphone-slash' => 'fa-microphone-slash', 'fa-shield' => 'fa-shield', 'fa-calendar-o' => 'fa-calendar-o', 'fa-fire-extinguisher' => 'fa-fire-extinguisher', 'fa-rocket' => 'fa-rocket', 'fa-maxcdn' => 'fa-maxcdn', 'fa-chevron-circle-left' => 'fa-chevron-circle-left', 'fa-chevron-circle-right' => 'fa-chevron-circle-right', 'fa-chevron-circle-up' => 'fa-chevron-circle-up', 'fa-chevron-circle-down' => 'fa-chevron-circle-down', 'fa-html5' => 'fa-html5', 'fa-css3' => 'fa-css3', 'fa-anchor' => 'fa-anchor', 'fa-unlock-alt' => 'fa-unlock-alt', 'fa-bullseye' => 'fa-bullseye', 'fa-ellipsis-h' => 'fa-ellipsis-h', 'fa-ellipsis-v' => 'fa-ellipsis-v', 'fa-rss-square' => 'fa-rss-square', 'fa-play-circle' => 'fa-play-circle', 'fa-ticket' => 'fa-ticket', 'fa-minus-square' => 'fa-minus-square', 'fa-minus-square-o' => 'fa-minus-square-o', 'fa-level-up' => 'fa-level-up', 'fa-level-down' => 'fa-level-down', 'fa-check-square' => 'fa-check-square', 'fa-pencil-square' => 'fa-pencil-square', 'fa-external-link-square' => 'fa-external-link-square', 'fa-share-square' => 'fa-share-square', 'fa-compass' => 'fa-compass', 'fa-caret-square-o-down' => 'fa-caret-square-o-down', 'fa-caret-square-o-up' => 'fa-caret-square-o-up', 'fa-caret-square-o-right' => 'fa-caret-square-o-right', 'fa-eur' => 'fa-eur', 'fa-gbp' => 'fa-gbp', 'fa-usd' => 'fa-usd', 'fa-inr' => 'fa-inr', 'fa-jpy' => 'fa-jpy', 'fa-rub' => 'fa-rub', 'fa-krw' => 'fa-krw', 'fa-btc' => 'fa-btc', 'fa-file' => 'fa-file', 'fa-file-text' => 'fa-file-text', 'fa-sort-alpha-asc' => 'fa-sort-alpha-asc', 'fa-sort-alpha-desc' => 'fa-sort-alpha-desc', 'fa-sort-amount-asc' => 'fa-sort-amount-asc', 'fa-sort-amount-desc' => 'fa-sort-amount-desc', 'fa-sort-numeric-asc' => 'fa-sort-numeric-asc', 'fa-sort-numeric-desc' => 'fa-sort-numeric-desc', 'fa-thumbs-up' => 'fa-thumbs-up', 'fa-thumbs-down' => 'fa-thumbs-down', 'fa-youtube-square' => 'fa-youtube-square', 'fa-youtube' => 'fa-youtube', 'fa-xing' => 'fa-xing', 'fa-xing-square' => 'fa-xing-square', 'fa-youtube-play' => 'fa-youtube-play', 'fa-dropbox' => 'fa-dropbox', 'fa-stack-overflow' => 'fa-stack-overflow', 'fa-instagram' => 'fa-instagram', 'fa-flickr' => 'fa-flickr', 'fa-adn' => 'fa-adn', 'fa-bitbucket' => 'fa-bitbucket', 'fa-bitbucket-square' => 'fa-bitbucket-square', 'fa-tumblr' => 'fa-tumblr', 'fa-tumblr-square' => 'fa-tumblr-square', 'fa-long-arrow-down' => 'fa-long-arrow-down', 'fa-long-arrow-up' => 'fa-long-arrow-up', 'fa-long-arrow-left' => 'fa-long-arrow-left', 'fa-long-arrow-right' => 'fa-long-arrow-right', 'fa-apple' => 'fa-apple', 'fa-windows' => 'fa-windows', 'fa-android' => 'fa-android', 'fa-linux' => 'fa-linux', 'fa-dribbble' => 'fa-dribbble', 'fa-skype' => 'fa-skype', 'fa-foursquare' => 'fa-foursquare', 'fa-trello' => 'fa-trello', 'fa-female' => 'fa-female', 'fa-male' => 'fa-male', 'fa-gratipay' => 'fa-gratipay', 'fa-sun-o' => 'fa-sun-o', 'fa-moon-o' => 'fa-moon-o', 'fa-archive' => 'fa-archive', 'fa-bug' => 'fa-bug', 'fa-vk' => 'fa-vk', 'fa-weibo' => 'fa-weibo', 'fa-renren' => 'fa-renren', 'fa-pagelines' => 'fa-pagelines', 'fa-stack-exchange' => 'fa-stack-exchange', 'fa-arrow-circle-o-right' => 'fa-arrow-circle-o-right', 'fa-arrow-circle-o-left' => 'fa-arrow-circle-o-left', 'fa-caret-square-o-left' => 'fa-caret-square-o-left', 'fa-dot-circle-o' => 'fa-dot-circle-o', 'fa-wheelchair' => 'fa-wheelchair', 'fa-vimeo-square' => 'fa-vimeo-square', 'fa-try' => 'fa-try', 'fa-plus-square-o' => 'fa-plus-square-o', 'fa-space-shuttle' => 'fa-space-shuttle', 'fa-slack' => 'fa-slack', 'fa-envelope-square' => 'fa-envelope-square', 'fa-wordpress' => 'fa-wordpress', 'fa-openid' => 'fa-openid', 'fa-university' => 'fa-university', 'fa-graduation-cap' => 'fa-graduation-cap', 'fa-yahoo' => 'fa-yahoo', 'fa-google' => 'fa-google', 'fa-reddit' => 'fa-reddit', 'fa-reddit-square' => 'fa-reddit-square', 'fa-stumbleupon-circle' => 'fa-stumbleupon-circle', 'fa-stumbleupon' => 'fa-stumbleupon', 'fa-delicious' => 'fa-delicious', 'fa-digg' => 'fa-digg', 'fa-pied-piper-pp' => 'fa-pied-piper-pp', 'fa-pied-piper-alt' => 'fa-pied-piper-alt', 'fa-drupal' => 'fa-drupal', 'fa-joomla' => 'fa-joomla', 'fa-language' => 'fa-language', 'fa-fax' => 'fa-fax', 'fa-building' => 'fa-building', 'fa-child' => 'fa-child', 'fa-paw' => 'fa-paw', 'fa-spoon' => 'fa-spoon', 'fa-cube' => 'fa-cube', 'fa-cubes' => 'fa-cubes', 'fa-behance' => 'fa-behance', 'fa-behance-square' => 'fa-behance-square', 'fa-steam' => 'fa-steam', 'fa-steam-square' => 'fa-steam-square', 'fa-recycle' => 'fa-recycle', 'fa-car' => 'fa-car', 'fa-taxi' => 'fa-taxi', 'fa-tree' => 'fa-tree', 'fa-spotify' => 'fa-spotify', 'fa-deviantart' => 'fa-deviantart', 'fa-soundcloud' => 'fa-soundcloud', 'fa-database' => 'fa-database', 'fa-file-pdf-o' => 'fa-file-pdf-o', 'fa-file-word-o' => 'fa-file-word-o', 'fa-file-excel-o' => 'fa-file-excel-o', 'fa-file-powerpoint-o' => 'fa-file-powerpoint-o', 'fa-file-image-o' => 'fa-file-image-o', 'fa-file-archive-o' => 'fa-file-archive-o', 'fa-file-audio-o' => 'fa-file-audio-o', 'fa-file-video-o' => 'fa-file-video-o', 'fa-file-code-o' => 'fa-file-code-o', 'fa-vine' => 'fa-vine', 'fa-codepen' => 'fa-codepen', 'fa-jsfiddle' => 'fa-jsfiddle', 'fa-life-ring' => 'fa-life-ring', 'fa-circle-o-notch' => 'fa-circle-o-notch', 'fa-rebel' => 'fa-rebel', 'fa-empire' => 'fa-empire', 'fa-git-square' => 'fa-git-square', 'fa-git' => 'fa-git', 'fa-hacker-news' => 'fa-hacker-news', 'fa-tencent-weibo' => 'fa-tencent-weibo', 'fa-qq' => 'fa-qq', 'fa-weixin' => 'fa-weixin', 'fa-paper-plane' => 'fa-paper-plane', 'fa-paper-plane-o' => 'fa-paper-plane-o', 'fa-history' => 'fa-history', 'fa-circle-thin' => 'fa-circle-thin', 'fa-header' => 'fa-header', 'fa-paragraph' => 'fa-paragraph', 'fa-sliders' => 'fa-sliders', 'fa-share-alt' => 'fa-share-alt', 'fa-share-alt-square' => 'fa-share-alt-square', 'fa-bomb' => 'fa-bomb', 'fa-futbol-o' => 'fa-futbol-o', 'fa-tty' => 'fa-tty', 'fa-binoculars' => 'fa-binoculars', 'fa-plug' => 'fa-plug', 'fa-slideshare' => 'fa-slideshare', 'fa-twitch' => 'fa-twitch', 'fa-yelp' => 'fa-yelp', 'fa-newspaper-o' => 'fa-newspaper-o', 'fa-wifi' => 'fa-wifi', 'fa-calculator' => 'fa-calculator', 'fa-paypal' => 'fa-paypal', 'fa-google-wallet' => 'fa-google-wallet', 'fa-cc-visa' => 'fa-cc-visa', 'fa-cc-mastercard' => 'fa-cc-mastercard', 'fa-cc-discover' => 'fa-cc-discover', 'fa-cc-amex' => 'fa-cc-amex', 'fa-cc-paypal' => 'fa-cc-paypal', 'fa-cc-stripe' => 'fa-cc-stripe', 'fa-bell-slash' => 'fa-bell-slash', 'fa-bell-slash-o' => 'fa-bell-slash-o', 'fa-trash' => 'fa-trash', 'fa-copyright' => 'fa-copyright', 'fa-at' => 'fa-at', 'fa-eyedropper' => 'fa-eyedropper', 'fa-paint-brush' => 'fa-paint-brush', 'fa-birthday-cake' => 'fa-birthday-cake', 'fa-area-chart' => 'fa-area-chart', 'fa-pie-chart' => 'fa-pie-chart', 'fa-line-chart' => 'fa-line-chart', 'fa-lastfm' => 'fa-lastfm', 'fa-lastfm-square' => 'fa-lastfm-square', 'fa-toggle-off' => 'fa-toggle-off', 'fa-toggle-on' => 'fa-toggle-on', 'fa-bicycle' => 'fa-bicycle', 'fa-bus' => 'fa-bus', 'fa-ioxhost' => 'fa-ioxhost', 'fa-angellist' => 'fa-angellist', 'fa-cc' => 'fa-cc', 'fa-ils' => 'fa-ils', 'fa-meanpath' => 'fa-meanpath', 'fa-buysellads' => 'fa-buysellads', 'fa-connectdevelop' => 'fa-connectdevelop', 'fa-dashcube' => 'fa-dashcube', 'fa-forumbee' => 'fa-forumbee', 'fa-leanpub' => 'fa-leanpub', 'fa-sellsy' => 'fa-sellsy', 'fa-shirtsinbulk' => 'fa-shirtsinbulk', 'fa-simplybuilt' => 'fa-simplybuilt', 'fa-skyatlas' => 'fa-skyatlas', 'fa-cart-plus' => 'fa-cart-plus', 'fa-cart-arrow-down' => 'fa-cart-arrow-down', 'fa-diamond' => 'fa-diamond', 'fa-ship' => 'fa-ship', 'fa-user-secret' => 'fa-user-secret', 'fa-motorcycle' => 'fa-motorcycle', 'fa-street-view' => 'fa-street-view', 'fa-heartbeat' => 'fa-heartbeat', 'fa-venus' => 'fa-venus', 'fa-mars' => 'fa-mars', 'fa-mercury' => 'fa-mercury', 'fa-transgender' => 'fa-transgender', 'fa-transgender-alt' => 'fa-transgender-alt', 'fa-venus-double' => 'fa-venus-double', 'fa-mars-double' => 'fa-mars-double', 'fa-venus-mars' => 'fa-venus-mars', 'fa-mars-stroke' => 'fa-mars-stroke', 'fa-mars-stroke-v' => 'fa-mars-stroke-v', 'fa-mars-stroke-h' => 'fa-mars-stroke-h', 'fa-neuter' => 'fa-neuter', 'fa-genderless' => 'fa-genderless', 'fa-facebook-official' => 'fa-facebook-official', 'fa-pinterest-p' => 'fa-pinterest-p', 'fa-whatsapp' => 'fa-whatsapp', 'fa-server' => 'fa-server', 'fa-user-plus' => 'fa-user-plus', 'fa-user-times' => 'fa-user-times', 'fa-bed' => 'fa-bed', 'fa-viacoin' => 'fa-viacoin', 'fa-train' => 'fa-train', 'fa-subway' => 'fa-subway', 'fa-medium' => 'fa-medium', 'fa-y-combinator' => 'fa-y-combinator', 'fa-optin-monster' => 'fa-optin-monster', 'fa-opencart' => 'fa-opencart', 'fa-expeditedssl' => 'fa-expeditedssl', 'fa-battery-full' => 'fa-battery-full', 'fa-battery-three-quarters' => 'fa-battery-three-quarters', 'fa-battery-half' => 'fa-battery-half', 'fa-battery-quarter' => 'fa-battery-quarter', 'fa-battery-empty' => 'fa-battery-empty', 'fa-mouse-pointer' => 'fa-mouse-pointer', 'fa-i-cursor' => 'fa-i-cursor', 'fa-object-group' => 'fa-object-group', 'fa-object-ungroup' => 'fa-object-ungroup', 'fa-sticky-note' => 'fa-sticky-note', 'fa-sticky-note-o' => 'fa-sticky-note-o', 'fa-cc-jcb' => 'fa-cc-jcb', 'fa-cc-diners-club' => 'fa-cc-diners-club', 'fa-clone' => 'fa-clone', 'fa-balance-scale' => 'fa-balance-scale', 'fa-hourglass-o' => 'fa-hourglass-o', 'fa-hourglass-start' => 'fa-hourglass-start', 'fa-hourglass-half' => 'fa-hourglass-half', 'fa-hourglass-end' => 'fa-hourglass-end', 'fa-hourglass' => 'fa-hourglass', 'fa-hand-rock-o' => 'fa-hand-rock-o', 'fa-hand-paper-o' => 'fa-hand-paper-o', 'fa-hand-scissors-o' => 'fa-hand-scissors-o', 'fa-hand-lizard-o' => 'fa-hand-lizard-o', 'fa-hand-spock-o' => 'fa-hand-spock-o', 'fa-hand-pointer-o' => 'fa-hand-pointer-o', 'fa-hand-peace-o' => 'fa-hand-peace-o', 'fa-trademark' => 'fa-trademark', 'fa-registered' => 'fa-registered', 'fa-creative-commons' => 'fa-creative-commons', 'fa-gg' => 'fa-gg', 'fa-gg-circle' => 'fa-gg-circle', 'fa-tripadvisor' => 'fa-tripadvisor', 'fa-odnoklassniki' => 'fa-odnoklassniki', 'fa-odnoklassniki-square' => 'fa-odnoklassniki-square', 'fa-get-pocket' => 'fa-get-pocket', 'fa-wikipedia-w' => 'fa-wikipedia-w', 'fa-safari' => 'fa-safari', 'fa-chrome' => 'fa-chrome', 'fa-firefox' => 'fa-firefox', 'fa-opera' => 'fa-opera', 'fa-internet-explorer' => 'fa-internet-explorer', 'fa-television' => 'fa-television', 'fa-contao' => 'fa-contao', 'fa-500px' => 'fa-500px', 'fa-amazon' => 'fa-amazon', 'fa-calendar-plus-o' => 'fa-calendar-plus-o', 'fa-calendar-minus-o' => 'fa-calendar-minus-o', 'fa-calendar-times-o' => 'fa-calendar-times-o', 'fa-calendar-check-o' => 'fa-calendar-check-o', 'fa-industry' => 'fa-industry', 'fa-map-pin' => 'fa-map-pin', 'fa-map-signs' => 'fa-map-signs', 'fa-map-o' => 'fa-map-o', 'fa-map' => 'fa-map', 'fa-commenting' => 'fa-commenting', 'fa-commenting-o' => 'fa-commenting-o', 'fa-houzz' => 'fa-houzz', 'fa-vimeo' => 'fa-vimeo', 'fa-black-tie' => 'fa-black-tie', 'fa-fonticons' => 'fa-fonticons', 'fa-reddit-alien' => 'fa-reddit-alien', 'fa-edge' => 'fa-edge', 'fa-credit-card-alt' => 'fa-credit-card-alt', 'fa-codiepie' => 'fa-codiepie', 'fa-modx' => 'fa-modx', 'fa-fort-awesome' => 'fa-fort-awesome', 'fa-usb' => 'fa-usb', 'fa-product-hunt' => 'fa-product-hunt', 'fa-mixcloud' => 'fa-mixcloud', 'fa-scribd' => 'fa-scribd', 'fa-pause-circle' => 'fa-pause-circle', 'fa-pause-circle-o' => 'fa-pause-circle-o', 'fa-stop-circle' => 'fa-stop-circle', 'fa-stop-circle-o' => 'fa-stop-circle-o', 'fa-shopping-bag' => 'fa-shopping-bag', 'fa-shopping-basket' => 'fa-shopping-basket', 'fa-hashtag' => 'fa-hashtag', 'fa-bluetooth' => 'fa-bluetooth', 'fa-bluetooth-b' => 'fa-bluetooth-b', 'fa-percent' => 'fa-percent', 'fa-gitlab' => 'fa-gitlab', 'fa-wpbeginner' => 'fa-wpbeginner', 'fa-wpforms' => 'fa-wpforms', 'fa-envira' => 'fa-envira', 'fa-universal-access' => 'fa-universal-access', 'fa-wheelchair-alt' => 'fa-wheelchair-alt', 'fa-question-circle-o' => 'fa-question-circle-o', 'fa-blind' => 'fa-blind', 'fa-audio-description' => 'fa-audio-description', 'fa-volume-control-phone' => 'fa-volume-control-phone', 'fa-braille' => 'fa-braille', 'fa-assistive-listening-systems' => 'fa-assistive-listening-systems', 'fa-american-sign-language-interpreting' => 'fa-american-sign-language-interpreting', 'fa-deaf' => 'fa-deaf', 'fa-glide' => 'fa-glide', 'fa-glide-g' => 'fa-glide-g', 'fa-sign-language' => 'fa-sign-language', 'fa-low-vision' => 'fa-low-vision', 'fa-viadeo' => 'fa-viadeo', 'fa-viadeo-square' => 'fa-viadeo-square', 'fa-snapchat' => 'fa-snapchat', 'fa-snapchat-ghost' => 'fa-snapchat-ghost', 'fa-snapchat-square' => 'fa-snapchat-square', 'fa-pied-piper' => 'fa-pied-piper', 'fa-first-order' => 'fa-first-order', 'fa-yoast' => 'fa-yoast', 'fa-themeisle' => 'fa-themeisle', 'fa-google-plus-official' => 'fa-google-plus-official', 'fa-font-awesome' => 'fa-font-awesome'
	);
  return $icons;
}

/* Icon Array */
function thb_getSvgIconArray($empty = true){
	$icons = array(
		'Arrows Anticlockwise' => 'arrows_anticlockwise.svg',
		'Arrows Anticlockwise Dashed' => 'arrows_anticlockwise_dashed.svg',
		'Arrows Button Down' => 'arrows_button_down.svg',
		'Arrows Button Off' => 'arrows_button_off.svg',
		'Arrows Button On' => 'arrows_button_on.svg',
		'Arrows Button Up' => 'arrows_button_up.svg',
		'Arrows Check' => 'arrows_check.svg',
		'Arrows Circle Check' => 'arrows_circle_check.svg',
		'Arrows Circle Down' => 'arrows_circle_down.svg',
		'Arrows Circle Downleft' => 'arrows_circle_downleft.svg',
		'Arrows Circle Downright' => 'arrows_circle_downright.svg',
		'Arrows Circle Left' => 'arrows_circle_left.svg',
		'Arrows Circle Minus' => 'arrows_circle_minus.svg',
		'Arrows Circle Plus' => 'arrows_circle_plus.svg',
		'Arrows Circle Remove' => 'arrows_circle_remove.svg',
		'Arrows Circle Right' => 'arrows_circle_right.svg',
		'Arrows Circle Up' => 'arrows_circle_up.svg',
		'Arrows Circle Upleft' => 'arrows_circle_upleft.svg',
		'Arrows Circle Upright' => 'arrows_circle_upright.svg',
		'Arrows Clockwise' => 'arrows_clockwise.svg',
		'Arrows Clockwise Dashed' => 'arrows_clockwise_dashed.svg',
		'Arrows Compress' => 'arrows_compress.svg',
		'Arrows Deny' => 'arrows_deny.svg',
		'Arrows Diagonal' => 'arrows_diagonal.svg',
		'Arrows Diagonal2' => 'arrows_diagonal2.svg',
		'Arrows Down' => 'arrows_down.svg',
		'Arrows Down Double-34' => 'arrows_down_double-34.svg',
		'Arrows Downleft' => 'arrows_downleft.svg',
		'Arrows Downright' => 'arrows_downright.svg',
		'Arrows Drag Down' => 'arrows_drag_down.svg',
		'Arrows Drag Down Dashed' => 'arrows_drag_down_dashed.svg',
		'Arrows Drag Horiz' => 'arrows_drag_horiz.svg',
		'Arrows Drag Left' => 'arrows_drag_left.svg',
		'Arrows Drag Left Dashed' => 'arrows_drag_left_dashed.svg',
		'Arrows Drag Right' => 'arrows_drag_right.svg',
		'Arrows Drag Right Dashed' => 'arrows_drag_right_dashed.svg',
		'Arrows Drag Up' => 'arrows_drag_up.svg',
		'Arrows Drag Up Dashed' => 'arrows_drag_up_dashed.svg',
		'Arrows Drag Vert' => 'arrows_drag_vert.svg',
		'Arrows Exclamation' => 'arrows_exclamation.svg',
		'Arrows Expand' => 'arrows_expand.svg',
		'Arrows Expand Diagonal1' => 'arrows_expand_diagonal1.svg',
		'Arrows Expand Horizontal1' => 'arrows_expand_horizontal1.svg',
		'Arrows Expand Vertical1' => 'arrows_expand_vertical1.svg',
		'Arrows Fit Horizontal' => 'arrows_fit_horizontal.svg',
		'Arrows Fit Vertical' => 'arrows_fit_vertical.svg',
		'Arrows Glide' => 'arrows_glide.svg',
		'Arrows Glide Horizontal' => 'arrows_glide_horizontal.svg',
		'Arrows Glide Vertical' => 'arrows_glide_vertical.svg',
		'Arrows Hamburger 2' => 'arrows_hamburger 2.svg',
		'Arrows Hamburger1' => 'arrows_hamburger1.svg',
		'Arrows Horizontal' => 'arrows_horizontal.svg',
		'Arrows Info' => 'arrows_info.svg',
		'Arrows Keyboard Alt' => 'arrows_keyboard_alt.svg',
		'Arrows Keyboard Cmd-29' => 'arrows_keyboard_cmd-29.svg',
		'Arrows Keyboard Delete' => 'arrows_keyboard_delete.svg',
		'Arrows Keyboard Down-28' => 'arrows_keyboard_down-28.svg',
		'Arrows Keyboard Left' => 'arrows_keyboard_left.svg',
		'Arrows Keyboard Return' => 'arrows_keyboard_return.svg',
		'Arrows Keyboard Right' => 'arrows_keyboard_right.svg',
		'Arrows Keyboard Shift' => 'arrows_keyboard_shift.svg',
		'Arrows Keyboard Tab' => 'arrows_keyboard_tab.svg',
		'Arrows Keyboard Up' => 'arrows_keyboard_up.svg',
		'Arrows Left' => 'arrows_left.svg',
		'Arrows Left Double-32' => 'arrows_left_double-32.svg',
		'Arrows Minus' => 'arrows_minus.svg',
		'Arrows Move' => 'arrows_move.svg',
		'Arrows Move2' => 'arrows_move2.svg',
		'Arrows Move Bottom' => 'arrows_move_bottom.svg',
		'Arrows Move Left' => 'arrows_move_left.svg',
		'Arrows Move Right' => 'arrows_move_right.svg',
		'Arrows Move Top' => 'arrows_move_top.svg',
		'Arrows Plus' => 'arrows_plus.svg',
		'Arrows Question' => 'arrows_question.svg',
		'Arrows Remove' => 'arrows_remove.svg',
		'Arrows Right' => 'arrows_right.svg',
		'Arrows Right Double-31' => 'arrows_right_double-31.svg',
		'Arrows Rotate' => 'arrows_rotate.svg',
		'Arrows Rotate Anti' => 'arrows_rotate_anti.svg',
		'Arrows Rotate Anti Dashed' => 'arrows_rotate_anti_dashed.svg',
		'Arrows Rotate Dashed' => 'arrows_rotate_dashed.svg',
		'Arrows Shrink' => 'arrows_shrink.svg',
		'Arrows Shrink Diagonal1' => 'arrows_shrink_diagonal1.svg',
		'Arrows Shrink Diagonal2' => 'arrows_shrink_diagonal2.svg',
		'Arrows Shrink Horizonal2' => 'arrows_shrink_horizonal2.svg',
		'Arrows Shrink Horizontal1' => 'arrows_shrink_horizontal1.svg',
		'Arrows Shrink Vertical1' => 'arrows_shrink_vertical1.svg',
		'Arrows Shrink Vertical2' => 'arrows_shrink_vertical2.svg',
		'Arrows Sign Down' => 'arrows_sign_down.svg',
		'Arrows Sign Left' => 'arrows_sign_left.svg',
		'Arrows Sign Right' => 'arrows_sign_right.svg',
		'Arrows Sign Up' => 'arrows_sign_up.svg',
		'Arrows Slide Down1' => 'arrows_slide_down1.svg',
		'Arrows Slide Down2' => 'arrows_slide_down2.svg',
		'Arrows Slide Left1' => 'arrows_slide_left1.svg',
		'Arrows Slide Left2' => 'arrows_slide_left2.svg',
		'Arrows Slide Right1' => 'arrows_slide_right1.svg',
		'Arrows Slide Right2' => 'arrows_slide_right2.svg',
		'Arrows Slide Up1' => 'arrows_slide_up1.svg',
		'Arrows Slide Up2' => 'arrows_slide_up2.svg',
		'Arrows Slim Down' => 'arrows_slim_down.svg',
		'Arrows Slim Down Dashed' => 'arrows_slim_down_dashed.svg',
		'Arrows Slim Left' => 'arrows_slim_left.svg',
		'Arrows Slim Left Dashed' => 'arrows_slim_left_dashed.svg',
		'Arrows Slim Right' => 'arrows_slim_right.svg',
		'Arrows Slim Right Dashed' => 'arrows_slim_right_dashed.svg',
		'Arrows Slim Up' => 'arrows_slim_up.svg',
		'Arrows Slim Up Dashed' => 'arrows_slim_up_dashed.svg',
		'Arrows Square Check' => 'arrows_square_check.svg',
		'Arrows Square Down' => 'arrows_square_down.svg',
		'Arrows Square Downleft' => 'arrows_square_downleft.svg',
		'Arrows Square Downright' => 'arrows_square_downright.svg',
		'Arrows Square Left' => 'arrows_square_left.svg',
		'Arrows Square Minus' => 'arrows_square_minus.svg',
		'Arrows Square Plus' => 'arrows_square_plus.svg',
		'Arrows Square Remove' => 'arrows_square_remove.svg',
		'Arrows Square Right' => 'arrows_square_right.svg',
		'Arrows Square Up' => 'arrows_square_up.svg',
		'Arrows Square Upleft' => 'arrows_square_upleft.svg',
		'Arrows Square Upright' => 'arrows_square_upright.svg',
		'Arrows Squares' => 'arrows_squares.svg',
		'Arrows Stretch Diagonal1' => 'arrows_stretch_diagonal1.svg',
		'Arrows Stretch Diagonal2' => 'arrows_stretch_diagonal2.svg',
		'Arrows Stretch Diagonal3' => 'arrows_stretch_diagonal3.svg',
		'Arrows Stretch Diagonal4' => 'arrows_stretch_diagonal4.svg',
		'Arrows Stretch Horizontal1' => 'arrows_stretch_horizontal1.svg',
		'Arrows Stretch Horizontal2' => 'arrows_stretch_horizontal2.svg',
		'Arrows Stretch Vertical1' => 'arrows_stretch_vertical1.svg',
		'Arrows Stretch Vertical2' => 'arrows_stretch_vertical2.svg',
		'Arrows Switch Horizontal' => 'arrows_switch_horizontal.svg',
		'Arrows Switch Vertical' => 'arrows_switch_vertical.svg',
		'Arrows Up' => 'arrows_up.svg',
		'Arrows Up Double' => 'arrows_up_double.svg',
		'Arrows Upright' => 'arrows_upright.svg',
		'Arrows Vertical' => 'arrows_vertical.svg',
		'Basic Accelerator' => 'basic_accelerator.svg',
		'Basic Alarm' => 'basic_alarm.svg',
		'Basic Anchor' => 'basic_anchor.svg',
		'Basic Anticlockwise' => 'basic_anticlockwise.svg',
		'Basic Archive' => 'basic_archive.svg',
		'Basic Archive Full' => 'basic_archive_full.svg',
		'Basic Ban' => 'basic_ban.svg',
		'Basic Battery Charge' => 'basic_battery_charge.svg',
		'Basic Battery Empty' => 'basic_battery_empty.svg',
		'Basic Battery Full' => 'basic_battery_full.svg',
		'Basic Battery Half' => 'basic_battery_half.svg',
		'Basic Bolt' => 'basic_bolt.svg',
		'Basic Book' => 'basic_book.svg',
		'Basic Book Pen' => 'basic_book_pen.svg',
		'Basic Book Pencil' => 'basic_book_pencil.svg',
		'Basic Bookmark' => 'basic_bookmark.svg',
		'Basic Calculator' => 'basic_calculator.svg',
		'Basic Calendar' => 'basic_calendar.svg',
		'Basic Cards Diamonds' => 'basic_cards_diamonds.svg',
		'Basic Cards Hearts' => 'basic_cards_hearts.svg',
		'Basic Case' => 'basic_case.svg',
		'Basic Chronometer' => 'basic_chronometer.svg',
		'Basic Clessidre' => 'basic_clessidre.svg',
		'Basic Clock' => 'basic_clock.svg',
		'Basic Clockwise' => 'basic_clockwise.svg',
		'Basic Cloud' => 'basic_cloud.svg',
		'Basic Clubs' => 'basic_clubs.svg',
		'Basic Compass' => 'basic_compass.svg',
		'Basic Cup' => 'basic_cup.svg',
		'Basic Diamonds' => 'basic_diamonds.svg',
		'Basic Display' => 'basic_display.svg',
		'Basic Download' => 'basic_download.svg',
		'Basic Elaboration Bookmark Checck' => 'basic_elaboration_bookmark_checck.svg',
		'Basic Elaboration Bookmark Minus' => 'basic_elaboration_bookmark_minus.svg',
		'Basic Elaboration Bookmark Plus' => 'basic_elaboration_bookmark_plus.svg',
		'Basic Elaboration Bookmark Remove' => 'basic_elaboration_bookmark_remove.svg',
		'Basic Elaboration Briefcase Check' => 'basic_elaboration_briefcase_check.svg',
		'Basic Elaboration Briefcase Download' => 'basic_elaboration_briefcase_download.svg',
		'Basic Elaboration Briefcase Flagged' => 'basic_elaboration_briefcase_flagged.svg',
		'Basic Elaboration Briefcase Minus' => 'basic_elaboration_briefcase_minus.svg',
		'Basic Elaboration Briefcase Plus' => 'basic_elaboration_briefcase_plus.svg',
		'Basic Elaboration Briefcase Refresh' => 'basic_elaboration_briefcase_refresh.svg',
		'Basic Elaboration Briefcase Remove' => 'basic_elaboration_briefcase_remove.svg',
		'Basic Elaboration Briefcase Search' => 'basic_elaboration_briefcase_search.svg',
		'Basic Elaboration Briefcase Star' => 'basic_elaboration_briefcase_star.svg',
		'Basic Elaboration Briefcase Upload' => 'basic_elaboration_briefcase_upload.svg',
		'Basic Elaboration Browser Check' => 'basic_elaboration_browser_check.svg',
		'Basic Elaboration Browser Download' => 'basic_elaboration_browser_download.svg',
		'Basic Elaboration Browser Minus' => 'basic_elaboration_browser_minus.svg',
		'Basic Elaboration Browser Plus' => 'basic_elaboration_browser_plus.svg',
		'Basic Elaboration Browser Refresh' => 'basic_elaboration_browser_refresh.svg',
		'Basic Elaboration Browser Remove' => 'basic_elaboration_browser_remove.svg',
		'Basic Elaboration Browser Search' => 'basic_elaboration_browser_search.svg',
		'Basic Elaboration Browser Star' => 'basic_elaboration_browser_star.svg',
		'Basic Elaboration Browser Upload' => 'basic_elaboration_browser_upload.svg',
		'Basic Elaboration Calendar Check' => 'basic_elaboration_calendar_check.svg',
		'Basic Elaboration Calendar Cloud' => 'basic_elaboration_calendar_cloud.svg',
		'Basic Elaboration Calendar Download' => 'basic_elaboration_calendar_download.svg',
		'Basic Elaboration Calendar Empty' => 'basic_elaboration_calendar_empty.svg',
		'Basic Elaboration Calendar Flagged' => 'basic_elaboration_calendar_flagged.svg',
		'Basic Elaboration Calendar Heart' => 'basic_elaboration_calendar_heart.svg',
		'Basic Elaboration Calendar Minus' => 'basic_elaboration_calendar_minus.svg',
		'Basic Elaboration Calendar Next' => 'basic_elaboration_calendar_next.svg',
		'Basic Elaboration Calendar Noaccess' => 'basic_elaboration_calendar_noaccess.svg',
		'Basic Elaboration Calendar Pencil' => 'basic_elaboration_calendar_pencil.svg',
		'Basic Elaboration Calendar Plus' => 'basic_elaboration_calendar_plus.svg',
		'Basic Elaboration Calendar Previous' => 'basic_elaboration_calendar_previous.svg',
		'Basic Elaboration Calendar Refresh' => 'basic_elaboration_calendar_refresh.svg',
		'Basic Elaboration Calendar Remove' => 'basic_elaboration_calendar_remove.svg',
		'Basic Elaboration Calendar Search' => 'basic_elaboration_calendar_search.svg',
		'Basic Elaboration Calendar Star' => 'basic_elaboration_calendar_star.svg',
		'Basic Elaboration Calendar Upload' => 'basic_elaboration_calendar_upload.svg',
		'Basic Elaboration Cloud Check' => 'basic_elaboration_cloud_check.svg',
		'Basic Elaboration Cloud Download' => 'basic_elaboration_cloud_download.svg',
		'Basic Elaboration Cloud Minus' => 'basic_elaboration_cloud_minus.svg',
		'Basic Elaboration Cloud Noaccess' => 'basic_elaboration_cloud_noaccess.svg',
		'Basic Elaboration Cloud Plus' => 'basic_elaboration_cloud_plus.svg',
		'Basic Elaboration Cloud Refresh' => 'basic_elaboration_cloud_refresh.svg',
		'Basic Elaboration Cloud Remove' => 'basic_elaboration_cloud_remove.svg',
		'Basic Elaboration Cloud Search' => 'basic_elaboration_cloud_search.svg',
		'Basic Elaboration Cloud Upload' => 'basic_elaboration_cloud_upload.svg',
		'Basic Elaboration Document Check' => 'basic_elaboration_document_check.svg',
		'Basic Elaboration Document Cloud' => 'basic_elaboration_document_cloud.svg',
		'Basic Elaboration Document Download' => 'basic_elaboration_document_download.svg',
		'Basic Elaboration Document Flagged' => 'basic_elaboration_document_flagged.svg',
		'Basic Elaboration Document Graph' => 'basic_elaboration_document_graph.svg',
		'Basic Elaboration Document Heart' => 'basic_elaboration_document_heart.svg',
		'Basic Elaboration Document Minus' => 'basic_elaboration_document_minus.svg',
		'Basic Elaboration Document Next' => 'basic_elaboration_document_next.svg',
		'Basic Elaboration Document Noaccess' => 'basic_elaboration_document_noaccess.svg',
		'Basic Elaboration Document Note' => 'basic_elaboration_document_note.svg',
		'Basic Elaboration Document Pencil' => 'basic_elaboration_document_pencil.svg',
		'Basic Elaboration Document Picture' => 'basic_elaboration_document_picture.svg',
		'Basic Elaboration Document Plus' => 'basic_elaboration_document_plus.svg',
		'Basic Elaboration Document Previous' => 'basic_elaboration_document_previous.svg',
		'Basic Elaboration Document Refresh' => 'basic_elaboration_document_refresh.svg',
		'Basic Elaboration Document Remove' => 'basic_elaboration_document_remove.svg',
		'Basic Elaboration Document Search' => 'basic_elaboration_document_search.svg',
		'Basic Elaboration Document Star' => 'basic_elaboration_document_star.svg',
		'Basic Elaboration Document Upload' => 'basic_elaboration_document_upload.svg',
		'Basic Elaboration Folder Check' => 'basic_elaboration_folder_check.svg',
		'Basic Elaboration Folder Cloud' => 'basic_elaboration_folder_cloud.svg',
		'Basic Elaboration Folder Document' => 'basic_elaboration_folder_document.svg',
		'Basic Elaboration Folder Download' => 'basic_elaboration_folder_download.svg',
		'Basic Elaboration Folder Flagged' => 'basic_elaboration_folder_flagged.svg',
		'Basic Elaboration Folder Graph' => 'basic_elaboration_folder_graph.svg',
		'Basic Elaboration Folder Heart' => 'basic_elaboration_folder_heart.svg',
		'Basic Elaboration Folder Minus' => 'basic_elaboration_folder_minus.svg',
		'Basic Elaboration Folder Next' => 'basic_elaboration_folder_next.svg',
		'Basic Elaboration Folder Noaccess' => 'basic_elaboration_folder_noaccess.svg',
		'Basic Elaboration Folder Note' => 'basic_elaboration_folder_note.svg',
		'Basic Elaboration Folder Pencil' => 'basic_elaboration_folder_pencil.svg',
		'Basic Elaboration Folder Picture' => 'basic_elaboration_folder_picture.svg',
		'Basic Elaboration Folder Plus' => 'basic_elaboration_folder_plus.svg',
		'Basic Elaboration Folder Previous' => 'basic_elaboration_folder_previous.svg',
		'Basic Elaboration Folder Refresh' => 'basic_elaboration_folder_refresh.svg',
		'Basic Elaboration Folder Remove' => 'basic_elaboration_folder_remove.svg',
		'Basic Elaboration Folder Search' => 'basic_elaboration_folder_search.svg',
		'Basic Elaboration Folder Star' => 'basic_elaboration_folder_star.svg',
		'Basic Elaboration Folder Upload' => 'basic_elaboration_folder_upload.svg',
		'Basic Elaboration Mail Check' => 'basic_elaboration_mail_check.svg',
		'Basic Elaboration Mail Cloud' => 'basic_elaboration_mail_cloud.svg',
		'Basic Elaboration Mail Document' => 'basic_elaboration_mail_document.svg',
		'Basic Elaboration Mail Download' => 'basic_elaboration_mail_download.svg',
		'Basic Elaboration Mail Flagged' => 'basic_elaboration_mail_flagged.svg',
		'Basic Elaboration Mail Heart' => 'basic_elaboration_mail_heart.svg',
		'Basic Elaboration Mail Next' => 'basic_elaboration_mail_next.svg',
		'Basic Elaboration Mail Noaccess' => 'basic_elaboration_mail_noaccess.svg',
		'Basic Elaboration Mail Note' => 'basic_elaboration_mail_note.svg',
		'Basic Elaboration Mail Pencil' => 'basic_elaboration_mail_pencil.svg',
		'Basic Elaboration Mail Picture' => 'basic_elaboration_mail_picture.svg',
		'Basic Elaboration Mail Previous' => 'basic_elaboration_mail_previous.svg',
		'Basic Elaboration Mail Refresh' => 'basic_elaboration_mail_refresh.svg',
		'Basic Elaboration Mail Remove' => 'basic_elaboration_mail_remove.svg',
		'Basic Elaboration Mail Search' => 'basic_elaboration_mail_search.svg',
		'Basic Elaboration Mail Star' => 'basic_elaboration_mail_star.svg',
		'Basic Elaboration Mail Upload' => 'basic_elaboration_mail_upload.svg',
		'Basic Elaboration Message Check' => 'basic_elaboration_message_check.svg',
		'Basic Elaboration Message Dots' => 'basic_elaboration_message_dots.svg',
		'Basic Elaboration Message Happy' => 'basic_elaboration_message_happy.svg',
		'Basic Elaboration Message Heart' => 'basic_elaboration_message_heart.svg',
		'Basic Elaboration Message Minus' => 'basic_elaboration_message_minus.svg',
		'Basic Elaboration Message Note' => 'basic_elaboration_message_note.svg',
		'Basic Elaboration Message Plus' => 'basic_elaboration_message_plus.svg',
		'Basic Elaboration Message Refresh' => 'basic_elaboration_message_refresh.svg',
		'Basic Elaboration Message Remove' => 'basic_elaboration_message_remove.svg',
		'Basic Elaboration Message Sad' => 'basic_elaboration_message_sad.svg',
		'Basic Elaboration Smartphone Cloud' => 'basic_elaboration_smartphone_cloud.svg',
		'Basic Elaboration Smartphone Heart' => 'basic_elaboration_smartphone_heart.svg',
		'Basic Elaboration Smartphone Noaccess' => 'basic_elaboration_smartphone_noaccess.svg',
		'Basic Elaboration Smartphone Note' => 'basic_elaboration_smartphone_note.svg',
		'Basic Elaboration Smartphone Pencil' => 'basic_elaboration_smartphone_pencil.svg',
		'Basic Elaboration Smartphone Picture' => 'basic_elaboration_smartphone_picture.svg',
		'Basic Elaboration Smartphone Refresh' => 'basic_elaboration_smartphone_refresh.svg',
		'Basic Elaboration Smartphone Search' => 'basic_elaboration_smartphone_search.svg',
		'Basic Elaboration Tablet Cloud' => 'basic_elaboration_tablet_cloud.svg',
		'Basic Elaboration Tablet Heart' => 'basic_elaboration_tablet_heart.svg',
		'Basic Elaboration Tablet Noaccess' => 'basic_elaboration_tablet_noaccess.svg',
		'Basic Elaboration Tablet Note' => 'basic_elaboration_tablet_note.svg',
		'Basic Elaboration Tablet Pencil' => 'basic_elaboration_tablet_pencil.svg',
		'Basic Elaboration Tablet Picture' => 'basic_elaboration_tablet_picture.svg',
		'Basic Elaboration Tablet Refresh' => 'basic_elaboration_tablet_refresh.svg',
		'Basic Elaboration Tablet Search' => 'basic_elaboration_tablet_search.svg',
		'Basic Elaboration Todolist 2' => 'basic_elaboration_todolist_2.svg',
		'Basic Elaboration Todolist Check' => 'basic_elaboration_todolist_check.svg',
		'Basic Elaboration Todolist Cloud' => 'basic_elaboration_todolist_cloud.svg',
		'Basic Elaboration Todolist Download' => 'basic_elaboration_todolist_download.svg',
		'Basic Elaboration Todolist Flagged' => 'basic_elaboration_todolist_flagged.svg',
		'Basic Elaboration Todolist Minus' => 'basic_elaboration_todolist_minus.svg',
		'Basic Elaboration Todolist Noaccess' => 'basic_elaboration_todolist_noaccess.svg',
		'Basic Elaboration Todolist Pencil' => 'basic_elaboration_todolist_pencil.svg',
		'Basic Elaboration Todolist Plus' => 'basic_elaboration_todolist_plus.svg',
		'Basic Elaboration Todolist Refresh' => 'basic_elaboration_todolist_refresh.svg',
		'Basic Elaboration Todolist Remove' => 'basic_elaboration_todolist_remove.svg',
		'Basic Elaboration Todolist Search' => 'basic_elaboration_todolist_search.svg',
		'Basic Elaboration Todolist Star' => 'basic_elaboration_todolist_star.svg',
		'Basic Elaboration Todolist Upload' => 'basic_elaboration_todolist_upload.svg',
		'Basic Exclamation' => 'basic_exclamation.svg',
		'Basic Eye' => 'basic_eye.svg',
		'Basic Eye Closed' => 'basic_eye_closed.svg',
		'Basic Female' => 'basic_female.svg',
		'Basic Flag1' => 'basic_flag1.svg',
		'Basic Flag2' => 'basic_flag2.svg',
		'Basic Floppydisk' => 'basic_floppydisk.svg',
		'Basic Folder' => 'basic_folder.svg',
		'Basic Folder Multiple' => 'basic_folder_multiple.svg',
		'Basic Gear' => 'basic_gear.svg',
		'Basic Geolocalize-01' => 'basic_geolocalize-01.svg',
		'Basic Geolocalize-05' => 'basic_geolocalize-05.svg',
		'Basic Globe' => 'basic_globe.svg',
		'Basic Gunsight' => 'basic_gunsight.svg',
		'Basic Hammer' => 'basic_hammer.svg',
		'Basic Headset' => 'basic_headset.svg',
		'Basic Heart' => 'basic_heart.svg',
		'Basic Heart Broken' => 'basic_heart_broken.svg',
		'Basic Helm' => 'basic_helm.svg',
		'Basic Home' => 'basic_home.svg',
		'Basic Info' => 'basic_info.svg',
		'Basic Ipod' => 'basic_ipod.svg',
		'Basic Joypad' => 'basic_joypad.svg',
		'Basic Key' => 'basic_key.svg',
		'Basic Keyboard' => 'basic_keyboard.svg',
		'Basic Laptop' => 'basic_laptop.svg',
		'Basic Life Buoy' => 'basic_life_buoy.svg',
		'Basic Lightbulb' => 'basic_lightbulb.svg',
		'Basic Link' => 'basic_link.svg',
		'Basic Lock' => 'basic_lock.svg',
		'Basic Lock Open' => 'basic_lock_open.svg',
		'Basic Magic Mouse' => 'basic_magic_mouse.svg',
		'Basic Magnifier' => 'basic_magnifier.svg',
		'Basic Magnifier Minus' => 'basic_magnifier_minus.svg',
		'Basic Magnifier Plus' => 'basic_magnifier_plus.svg',
		'Basic Mail' => 'basic_mail.svg',
		'Basic Mail Multiple' => 'basic_mail_multiple.svg',
		'Basic Mail Open' => 'basic_mail_open.svg',
		'Basic Mail Open Text' => 'basic_mail_open_text.svg',
		'Basic Male' => 'basic_male.svg',
		'Basic Map' => 'basic_map.svg',
		'Basic Message' => 'basic_message.svg',
		'Basic Message Multiple' => 'basic_message_multiple.svg',
		'Basic Message Txt' => 'basic_message_txt.svg',
		'Basic Mixer2' => 'basic_mixer2.svg',
		'Basic Mouse' => 'basic_mouse.svg',
		'Basic Notebook' => 'basic_notebook.svg',
		'Basic Notebook Pen' => 'basic_notebook_pen.svg',
		'Basic Notebook Pencil' => 'basic_notebook_pencil.svg',
		'Basic Paperplane' => 'basic_paperplane.svg',
		'Basic Pencil Ruler' => 'basic_pencil_ruler.svg',
		'Basic Pencil Ruler Pen ' => 'basic_pencil_ruler_pen .svg',
		'Basic Photo' => 'basic_photo.svg',
		'Basic Picture' => 'basic_picture.svg',
		'Basic Picture Multiple' => 'basic_picture_multiple.svg',
		'Basic Pin1' => 'basic_pin1.svg',
		'Basic Pin2' => 'basic_pin2.svg',
		'Basic Postcard' => 'basic_postcard.svg',
		'Basic Postcard Multiple' => 'basic_postcard_multiple.svg',
		'Basic Printer' => 'basic_printer.svg',
		'Basic Question' => 'basic_question.svg',
		'Basic Rss' => 'basic_rss.svg',
		'Basic Server' => 'basic_server.svg',
		'Basic Server2' => 'basic_server2.svg',
		'Basic Server Cloud' => 'basic_server_cloud.svg',
		'Basic Server Download' => 'basic_server_download.svg',
		'Basic Server Upload' => 'basic_server_upload.svg',
		'Basic Settings' => 'basic_settings.svg',
		'Basic Share' => 'basic_share.svg',
		'Basic Sheet' => 'basic_sheet.svg',
		'Basic Sheet Multiple ' => 'basic_sheet_multiple .svg',
		'Basic Sheet Pen' => 'basic_sheet_pen.svg',
		'Basic Sheet Pencil' => 'basic_sheet_pencil.svg',
		'Basic Sheet Txt ' => 'basic_sheet_txt .svg',
		'Basic Signs' => 'basic_signs.svg',
		'Basic Smartphone' => 'basic_smartphone.svg',
		'Basic Spades' => 'basic_spades.svg',
		'Basic Spread' => 'basic_spread.svg',
		'Basic Spread Bookmark' => 'basic_spread_bookmark.svg',
		'Basic Spread Text' => 'basic_spread_text.svg',
		'Basic Spread Text Bookmark' => 'basic_spread_text_bookmark.svg',
		'Basic Star' => 'basic_star.svg',
		'Basic Tablet' => 'basic_tablet.svg',
		'Basic Target' => 'basic_target.svg',
		'Basic Todo' => 'basic_todo.svg',
		'Basic Todo Pen ' => 'basic_todo_pen .svg',
		'Basic Todo Pencil' => 'basic_todo_pencil.svg',
		'Basic Todo Txt' => 'basic_todo_txt.svg',
		'Basic Todolist Pen' => 'basic_todolist_pen.svg',
		'Basic Todolist Pencil' => 'basic_todolist_pencil.svg',
		'Basic Trashcan' => 'basic_trashcan.svg',
		'Basic Trashcan Full' => 'basic_trashcan_full.svg',
		'Basic Trashcan Refresh' => 'basic_trashcan_refresh.svg',
		'Basic Trashcan Remove' => 'basic_trashcan_remove.svg',
		'Basic Upload' => 'basic_upload.svg',
		'Basic Usb' => 'basic_usb.svg',
		'Basic Video' => 'basic_video.svg',
		'Basic Watch' => 'basic_watch.svg',
		'Basic Webpage' => 'basic_webpage.svg',
		'Basic Webpage Img Txt' => 'basic_webpage_img_txt.svg',
		'Basic Webpage Multiple' => 'basic_webpage_multiple.svg',
		'Basic Webpage Txt' => 'basic_webpage_txt.svg',
		'Basic World' => 'basic_world.svg',
		'Ecommerce Bag' => 'ecommerce_bag.svg',
		'Ecommerce Bag Check' => 'ecommerce_bag_check.svg',
		'Ecommerce Bag Cloud' => 'ecommerce_bag_cloud.svg',
		'Ecommerce Bag Download' => 'ecommerce_bag_download.svg',
		'Ecommerce Bag Minus' => 'ecommerce_bag_minus.svg',
		'Ecommerce Bag Plus' => 'ecommerce_bag_plus.svg',
		'Ecommerce Bag Refresh' => 'ecommerce_bag_refresh.svg',
		'Ecommerce Bag Remove' => 'ecommerce_bag_remove.svg',
		'Ecommerce Bag Search' => 'ecommerce_bag_search.svg',
		'Ecommerce Bag Upload' => 'ecommerce_bag_upload.svg',
		'Ecommerce Banknote' => 'ecommerce_banknote.svg',
		'Ecommerce Banknotes' => 'ecommerce_banknotes.svg',
		'Ecommerce Basket' => 'ecommerce_basket.svg',
		'Ecommerce Basket Check' => 'ecommerce_basket_check.svg',
		'Ecommerce Basket Cloud' => 'ecommerce_basket_cloud.svg',
		'Ecommerce Basket Download' => 'ecommerce_basket_download.svg',
		'Ecommerce Basket Minus' => 'ecommerce_basket_minus.svg',
		'Ecommerce Basket Plus' => 'ecommerce_basket_plus.svg',
		'Ecommerce Basket Refresh' => 'ecommerce_basket_refresh.svg',
		'Ecommerce Basket Remove' => 'ecommerce_basket_remove.svg',
		'Ecommerce Basket Search' => 'ecommerce_basket_search.svg',
		'Ecommerce Basket Upload' => 'ecommerce_basket_upload.svg',
		'Ecommerce Bath' => 'ecommerce_bath.svg',
		'Ecommerce Cart' => 'ecommerce_cart.svg',
		'Ecommerce Cart Check' => 'ecommerce_cart_check.svg',
		'Ecommerce Cart Cloud' => 'ecommerce_cart_cloud.svg',
		'Ecommerce Cart Content' => 'ecommerce_cart_content.svg',
		'Ecommerce Cart Download' => 'ecommerce_cart_download.svg',
		'Ecommerce Cart Minus' => 'ecommerce_cart_minus.svg',
		'Ecommerce Cart Plus' => 'ecommerce_cart_plus.svg',
		'Ecommerce Cart Refresh' => 'ecommerce_cart_refresh.svg',
		'Ecommerce Cart Remove' => 'ecommerce_cart_remove.svg',
		'Ecommerce Cart Search' => 'ecommerce_cart_search.svg',
		'Ecommerce Cart Upload' => 'ecommerce_cart_upload.svg',
		'Ecommerce Cent' => 'ecommerce_cent.svg',
		'Ecommerce Colon' => 'ecommerce_colon.svg',
		'Ecommerce Creditcard' => 'ecommerce_creditcard.svg',
		'Ecommerce Diamond' => 'ecommerce_diamond.svg',
		'Ecommerce Dollar' => 'ecommerce_dollar.svg',
		'Ecommerce Euro' => 'ecommerce_euro.svg',
		'Ecommerce Franc' => 'ecommerce_franc.svg',
		'Ecommerce Gift' => 'ecommerce_gift.svg',
		'Ecommerce Graph1' => 'ecommerce_graph1.svg',
		'Ecommerce Graph2' => 'ecommerce_graph2.svg',
		'Ecommerce Graph3' => 'ecommerce_graph3.svg',
		'Ecommerce Graph Decrease' => 'ecommerce_graph_decrease.svg',
		'Ecommerce Graph Increase' => 'ecommerce_graph_increase.svg',
		'Ecommerce Guarani' => 'ecommerce_guarani.svg',
		'Ecommerce Kips' => 'ecommerce_kips.svg',
		'Ecommerce Lira' => 'ecommerce_lira.svg',
		'Ecommerce Megaphone' => 'ecommerce_megaphone.svg',
		'Ecommerce Money' => 'ecommerce_money.svg',
		'Ecommerce Naira' => 'ecommerce_naira.svg',
		'Ecommerce Pesos' => 'ecommerce_pesos.svg',
		'Ecommerce Pound' => 'ecommerce_pound.svg',
		'Ecommerce Receipt' => 'ecommerce_receipt.svg',
		'Ecommerce Receipt Bath' => 'ecommerce_receipt_bath.svg',
		'Ecommerce Receipt Cent' => 'ecommerce_receipt_cent.svg',
		'Ecommerce Receipt Dollar' => 'ecommerce_receipt_dollar.svg',
		'Ecommerce Receipt Euro' => 'ecommerce_receipt_euro.svg',
		'Ecommerce Receipt Franc' => 'ecommerce_receipt_franc.svg',
		'Ecommerce Receipt Guarani' => 'ecommerce_receipt_guarani.svg',
		'Ecommerce Receipt Kips' => 'ecommerce_receipt_kips.svg',
		'Ecommerce Receipt Lira' => 'ecommerce_receipt_lira.svg',
		'Ecommerce Receipt Naira' => 'ecommerce_receipt_naira.svg',
		'Ecommerce Receipt Pesos' => 'ecommerce_receipt_pesos.svg',
		'Ecommerce Receipt Pound' => 'ecommerce_receipt_pound.svg',
		'Ecommerce Receipt Rublo' => 'ecommerce_receipt_rublo.svg',
		'Ecommerce Receipt Rupee' => 'ecommerce_receipt_rupee.svg',
		'Ecommerce Receipt Tugrik' => 'ecommerce_receipt_tugrik.svg',
		'Ecommerce Receipt Won' => 'ecommerce_receipt_won.svg',
		'Ecommerce Receipt Yen' => 'ecommerce_receipt_yen.svg',
		'Ecommerce Receipt Yen2' => 'ecommerce_receipt_yen2.svg',
		'Ecommerce Recept Colon' => 'ecommerce_recept_colon.svg',
		'Ecommerce Rublo' => 'ecommerce_rublo.svg',
		'Ecommerce Rupee' => 'ecommerce_rupee.svg',
		'Ecommerce Safe' => 'ecommerce_safe.svg',
		'Ecommerce Sale' => 'ecommerce_sale.svg',
		'Ecommerce Sales' => 'ecommerce_sales.svg',
		'Ecommerce Ticket' => 'ecommerce_ticket.svg',
		'Ecommerce Tugriks' => 'ecommerce_tugriks.svg',
		'Ecommerce Wallet' => 'ecommerce_wallet.svg',
		'Ecommerce Won' => 'ecommerce_won.svg',
		'Ecommerce Yen' => 'ecommerce_yen.svg',
		'Ecommerce Yen2' => 'ecommerce_yen2.svg',
		'Music Beginning Button' => 'music_beginning_button.svg',
		'Music Bell' => 'music_bell.svg',
		'Music Cd' => 'music_cd.svg',
		'Music Diapason' => 'music_diapason.svg',
		'Music Eject Button' => 'music_eject_button.svg',
		'Music End Button' => 'music_end_button.svg',
		'Music Fastforward Button' => 'music_fastforward_button.svg',
		'Music Headphones' => 'music_headphones.svg',
		'Music Ipod' => 'music_ipod.svg',
		'Music Loudspeaker' => 'music_loudspeaker.svg',
		'Music Microphone' => 'music_microphone.svg',
		'Music Microphone Old' => 'music_microphone_old.svg',
		'Music Mixer' => 'music_mixer.svg',
		'Music Mute' => 'music_mute.svg',
		'Music Note Multiple' => 'music_note_multiple.svg',
		'Music Note Single' => 'music_note_single.svg',
		'Music Pause Button' => 'music_pause_button.svg',
		'Music Play Button' => 'music_play_button.svg',
		'Music Playlist' => 'music_playlist.svg',
		'Music Radio Ghettoblaster' => 'music_radio_ghettoblaster.svg',
		'Music Radio Portable' => 'music_radio_portable.svg',
		'Music Record' => 'music_record.svg',
		'Music Recordplayer' => 'music_recordplayer.svg',
		'Music Repeat Button' => 'music_repeat_button.svg',
		'Music Rewind Button' => 'music_rewind_button.svg',
		'Music Shuffle Button' => 'music_shuffle_button.svg',
		'Music Stop Button' => 'music_stop_button.svg',
		'Music Tape' => 'music_tape.svg',
		'Music Volume Down' => 'music_volume_down.svg',
		'Music Volume Up' => 'music_volume_up.svg',
		'Software Add Vectorpoint' => 'software_add_vectorpoint.svg',
		'Software Box Oval' => 'software_box_oval.svg',
		'Software Box Polygon' => 'software_box_polygon.svg',
		'Software Box Rectangle' => 'software_box_rectangle.svg',
		'Software Box Roundedrectangle' => 'software_box_roundedrectangle.svg',
		'Software Character' => 'software_character.svg',
		'Software Crop' => 'software_crop.svg',
		'Software Eyedropper' => 'software_eyedropper.svg',
		'Software Font Allcaps' => 'software_font_allcaps.svg',
		'Software Font Baseline Shift' => 'software_font_baseline_shift.svg',
		'Software Font Horizontal Scale' => 'software_font_horizontal_scale.svg',
		'Software Font Kerning' => 'software_font_kerning.svg',
		'Software Font Leading' => 'software_font_leading.svg',
		'Software Font Size' => 'software_font_size.svg',
		'Software Font Smallcapital' => 'software_font_smallcapital.svg',
		'Software Font Smallcaps' => 'software_font_smallcaps.svg',
		'Software Font Strikethrough' => 'software_font_strikethrough.svg',
		'Software Font Tracking' => 'software_font_tracking.svg',
		'Software Font Underline' => 'software_font_underline.svg',
		'Software Font Vertical Scale' => 'software_font_vertical_scale.svg',
		'Software Horizontal Align Center' => 'software_horizontal_align_center.svg',
		'Software Horizontal Align Left' => 'software_horizontal_align_left.svg',
		'Software Horizontal Align Right' => 'software_horizontal_align_right.svg',
		'Software Horizontal Distribute Center' => 'software_horizontal_distribute_center.svg',
		'Software Horizontal Distribute Left' => 'software_horizontal_distribute_left.svg',
		'Software Horizontal Distribute Right' => 'software_horizontal_distribute_right.svg',
		'Software Indent Firstline' => 'software_indent_firstline.svg',
		'Software Indent Left' => 'software_indent_left.svg',
		'Software Indent Right' => 'software_indent_right.svg',
		'Software Lasso' => 'software_lasso.svg',
		'Software Layers1' => 'software_layers1.svg',
		'Software Layers2' => 'software_layers2.svg',
		'Software Layout-8boxes' => 'software_layout-8boxes.svg',
		'Software Layout' => 'software_layout.svg',
		'Software Layout 2columns' => 'software_layout_2columns.svg',
		'Software Layout 3columns' => 'software_layout_3columns.svg',
		'Software Layout 4boxes' => 'software_layout_4boxes.svg',
		'Software Layout 4columns' => 'software_layout_4columns.svg',
		'Software Layout 4lines' => 'software_layout_4lines.svg',
		'Software Layout Header' => 'software_layout_header.svg',
		'Software Layout Header 2columns' => 'software_layout_header_2columns.svg',
		'Software Layout Header 3columns' => 'software_layout_header_3columns.svg',
		'Software Layout Header 4boxes' => 'software_layout_header_4boxes.svg',
		'Software Layout Header 4columns' => 'software_layout_header_4columns.svg',
		'Software Layout Header Complex' => 'software_layout_header_complex.svg',
		'Software Layout Header Complex2' => 'software_layout_header_complex2.svg',
		'Software Layout Header Complex3' => 'software_layout_header_complex3.svg',
		'Software Layout Header Complex4' => 'software_layout_header_complex4.svg',
		'Software Layout Header Sideleft' => 'software_layout_header_sideleft.svg',
		'Software Layout Header Sideright' => 'software_layout_header_sideright.svg',
		'Software Layout Sidebar Left' => 'software_layout_sidebar_left.svg',
		'Software Layout Sidebar Right' => 'software_layout_sidebar_right.svg',
		'Software Magnete' => 'software_magnete.svg',
		'Software Pages' => 'software_pages.svg',
		'Software Paintbrush' => 'software_paintbrush.svg',
		'Software Paintbucket' => 'software_paintbucket.svg',
		'Software Paintroller' => 'software_paintroller.svg',
		'Software Paragraph' => 'software_paragraph.svg',
		'Software Paragraph Align Left' => 'software_paragraph_align_left.svg',
		'Software Paragraph Align Right' => 'software_paragraph_align_right.svg',
		'Software Paragraph Center' => 'software_paragraph_center.svg',
		'Software Paragraph Justify All' => 'software_paragraph_justify_all.svg',
		'Software Paragraph Justify Center' => 'software_paragraph_justify_center.svg',
		'Software Paragraph Justify Left' => 'software_paragraph_justify_left.svg',
		'Software Paragraph Justify Right' => 'software_paragraph_justify_right.svg',
		'Software Paragraph Space After' => 'software_paragraph_space_after.svg',
		'Software Paragraph Space Before' => 'software_paragraph_space_before.svg',
		'Software Pathfinder Exclude' => 'software_pathfinder_exclude.svg',
		'Software Pathfinder Intersect' => 'software_pathfinder_intersect.svg',
		'Software Pathfinder Subtract' => 'software_pathfinder_subtract.svg',
		'Software Pathfinder Unite' => 'software_pathfinder_unite.svg',
		'Software Pen' => 'software_pen.svg',
		'Software Pen Add' => 'software_pen_add.svg',
		'Software Pen Remove' => 'software_pen_remove.svg',
		'Software Pencil' => 'software_pencil.svg',
		'Software Polygonallasso' => 'software_polygonallasso.svg',
		'Software Reflect Horizontal' => 'software_reflect_horizontal.svg',
		'Software Reflect Vertical' => 'software_reflect_vertical.svg',
		'Software Remove Vectorpoint' => 'software_remove_vectorpoint.svg',
		'Software Scale Expand' => 'software_scale_expand.svg',
		'Software Scale Reduce' => 'software_scale_reduce.svg',
		'Software Selection Oval' => 'software_selection_oval.svg',
		'Software Selection Polygon' => 'software_selection_polygon.svg',
		'Software Selection Rectangle' => 'software_selection_rectangle.svg',
		'Software Selection Roundedrectangle' => 'software_selection_roundedrectangle.svg',
		'Software Shape Oval' => 'software_shape_oval.svg',
		'Software Shape Polygon' => 'software_shape_polygon.svg',
		'Software Shape Rectangle' => 'software_shape_rectangle.svg',
		'Software Shape Roundedrectangle' => 'software_shape_roundedrectangle.svg',
		'Software Slice' => 'software_slice.svg',
		'Software Transform Bezier' => 'software_transform_bezier.svg',
		'Software Vector Box' => 'software_vector_box.svg',
		'Software Vector Composite' => 'software_vector_composite.svg',
		'Software Vector Line' => 'software_vector_line.svg',
		'Software Vertical Align Bottom' => 'software_vertical_align_bottom.svg',
		'Software Vertical Align Center' => 'software_vertical_align_center.svg',
		'Software Vertical Align Top' => 'software_vertical_align_top.svg',
		'Software Vertical Distribute Bottom' => 'software_vertical_distribute_bottom.svg',
		'Software Vertical Distribute Center' => 'software_vertical_distribute_center.svg',
		'Software Vertical Distribute Top' => 'software_vertical_distribute_top.svg',
		'Weather Aquarius' => 'weather_aquarius.svg',
		'Weather Aries' => 'weather_aries.svg',
		'Weather Cancer' => 'weather_cancer.svg',
		'Weather Capricorn' => 'weather_capricorn.svg',
		'Weather Cloud' => 'weather_cloud.svg',
		'Weather Cloud Drop' => 'weather_cloud_drop.svg',
		'Weather Cloud Lightning' => 'weather_cloud_lightning.svg',
		'Weather Cloud Snowflake' => 'weather_cloud_snowflake.svg',
		'Weather Downpour Fullmoon' => 'weather_downpour_fullmoon.svg',
		'Weather Downpour Halfmoon' => 'weather_downpour_halfmoon.svg',
		'Weather Downpour Sun' => 'weather_downpour_sun.svg',
		'Weather Drop' => 'weather_drop.svg',
		'Weather First Quarter ' => 'weather_first_quarter .svg',
		'Weather Fog' => 'weather_fog.svg',
		'Weather Fog Fullmoon' => 'weather_fog_fullmoon.svg',
		'Weather Fog Halfmoon' => 'weather_fog_halfmoon.svg',
		'Weather Fog Sun' => 'weather_fog_sun.svg',
		'Weather Fullmoon' => 'weather_fullmoon.svg',
		'Weather Gemini' => 'weather_gemini.svg',
		'Weather Hail' => 'weather_hail.svg',
		'Weather Hail Fullmoon' => 'weather_hail_fullmoon.svg',
		'Weather Hail Halfmoon' => 'weather_hail_halfmoon.svg',
		'Weather Hail Sun' => 'weather_hail_sun.svg',
		'Weather Last Quarter' => 'weather_last_quarter.svg',
		'Weather Leo' => 'weather_leo.svg',
		'Weather Libra' => 'weather_libra.svg',
		'Weather Lightning' => 'weather_lightning.svg',
		'Weather Mistyrain' => 'weather_mistyrain.svg',
		'Weather Mistyrain Fullmoon' => 'weather_mistyrain_fullmoon.svg',
		'Weather Mistyrain Halfmoon' => 'weather_mistyrain_halfmoon.svg',
		'Weather Mistyrain Sun' => 'weather_mistyrain_sun.svg',
		'Weather Moon' => 'weather_moon.svg',
		'Weather Moondown Full' => 'weather_moondown_full.svg',
		'Weather Moondown Half' => 'weather_moondown_half.svg',
		'Weather Moonset Full' => 'weather_moonset_full.svg',
		'Weather Moonset Half' => 'weather_moonset_half.svg',
		'Weather Move2' => 'weather_move2.svg',
		'Weather Newmoon' => 'weather_newmoon.svg',
		'Weather Pisces' => 'weather_pisces.svg',
		'Weather Rain' => 'weather_rain.svg',
		'Weather Rain Fullmoon' => 'weather_rain_fullmoon.svg',
		'Weather Rain Halfmoon' => 'weather_rain_halfmoon.svg',
		'Weather Rain Sun' => 'weather_rain_sun.svg',
		'Weather Sagittarius' => 'weather_sagittarius.svg',
		'Weather Scorpio' => 'weather_scorpio.svg',
		'Weather Snow' => 'weather_snow.svg',
		'Weather Snow Fullmoon' => 'weather_snow_fullmoon.svg',
		'Weather Snow Halfmoon' => 'weather_snow_halfmoon.svg',
		'Weather Snow Sun' => 'weather_snow_sun.svg',
		'Weather Snowflake' => 'weather_snowflake.svg',
		'Weather Star' => 'weather_star.svg',
		'Weather Storm-11' => 'weather_storm-11.svg',
		'Weather Storm-32' => 'weather_storm-32.svg',
		'Weather Storm Fullmoon' => 'weather_storm_fullmoon.svg',
		'Weather Storm Halfmoon' => 'weather_storm_halfmoon.svg',
		'Weather Storm Sun' => 'weather_storm_sun.svg',
		'Weather Sun' => 'weather_sun.svg',
		'Weather Sundown' => 'weather_sundown.svg',
		'Weather Sunset' => 'weather_sunset.svg',
		'Weather Taurus' => 'weather_taurus.svg',
		'Weather Tempest' => 'weather_tempest.svg',
		'Weather Tempest Fullmoon' => 'weather_tempest_fullmoon.svg',
		'Weather Tempest Halfmoon' => 'weather_tempest_halfmoon.svg',
		'Weather Tempest Sun' => 'weather_tempest_sun.svg',
		'Weather Variable Fullmoon' => 'weather_variable_fullmoon.svg',
		'Weather Variable Halfmoon' => 'weather_variable_halfmoon.svg',
		'Weather Variable Sun' => 'weather_variable_sun.svg',
		'Weather Virgo' => 'weather_virgo.svg',
		'Weather Waning Cresent' => 'weather_waning_cresent.svg',
		'Weather Waning Gibbous' => 'weather_waning_gibbous.svg',
		'Weather Waxing Cresent' => 'weather_waxing_cresent.svg',
		'Weather Waxing Gibbous' => 'weather_waxing_gibbous.svg',
		'Weather Wind' => 'weather_wind.svg',
		'Weather Wind E' => 'weather_wind_E.svg',
		'Weather Wind N' => 'weather_wind_N.svg',
		'Weather Wind NE' => 'weather_wind_NE.svg',
		'Weather Wind NW' => 'weather_wind_NW.svg',
		'Weather Wind S' => 'weather_wind_S.svg',
		'Weather Wind SE' => 'weather_wind_SE.svg',
		'Weather Wind SW' => 'weather_wind_SW.svg',
		'Weather Wind W' => 'weather_wind_W.svg',
		'Weather Wind Fullmoon' => 'weather_wind_fullmoon.svg',
		'Weather Wind Halfmoon' => 'weather_wind_halfmoon.svg',
		'Weather Wind Sun' => 'weather_wind_sun.svg',
		'Weather Windgust' => 'weather_windgust.svg'
	);
	if ($empty) {
		$icons = array('Empty'=>'') + $icons;	
	}
	return $icons;
}
/* Youtube & Vimeo Embeds */
function thb_remove_youtube_controls($code){
	$return = '';
  if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false || strpos($code, 'player.vimeo.com') !== false){
  		if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false) {
      	$return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&modestbranding=1", $code);
  		} else {
      	$return = $code;
  		}
      $return = '<div class="flex-video widescreen'.(strpos($code, 'player.vimeo.com') !== false ? ' vimeo' : ' youtube').'">'.$return.'</div>';
  } else if (strpos($code, 'soundcloud.com') !== false) {
      $return = '<div class="flex-video">'.$code.'</div>';
  } else {
      $return = $code;
  }
  return $return;
}
 
add_filter('embed_handler_html', 'thb_remove_youtube_controls');
add_filter('embed_oembed_html', 'thb_remove_youtube_controls');
/* Social Sharing */
function thb_social_article_detail($btn = true) {
	$id = get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = wp_get_attachment_image_src($image_id,'full');
	
	if (is_singular('post')) {
		$sharing_type = ot_get_option('sharing_buttons',array('facebook', 'twitter', 'pinterest', 'google-plus'));
	} else if (is_singular('portfolio')) {
		$sharing_type = ot_get_option('sharing_buttons_portfolio',array('facebook', 'twitter', 'pinterest', 'google-plus'));
	} else if (is_singular('product')) {
		$sharing_type = ot_get_option('sharing_buttons_product',array('facebook', 'twitter', 'pinterest', 'google-plus'));
	}
 ?>
<aside class="share_wrapper">
	<a href="#" class="<?php if (!$btn) { ?>btn<?php } ?> share-post-link"><?php esc_html_e('Share', 'notio'); ?></a>
	<div class="share_container">
		<div class="spacer"></div>
		<div class="row max_width align-center">
			<div class="small-12 large-10 columns">
				<div class="vcenter">
					<div class="product_share">
						<h4><?php esc_html_e('Share This Work', 'notio'); ?></h4>
						<?php if (in_array('facebook',$sharing_type)) { ?>
						<a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="social facebook boxed-icon white-fill"><i class="fa fa-facebook"></i></a>
						<?php } ?>
						<?php if (in_array('twitter',$sharing_type)) { ?>
						<a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( get_bloginfo( 'name' ) ) . ''; ?>" class="social twitter boxed-icon white-fill"><i class="fa fa-twitter"></i></a>
						<?php } ?>
						<?php if (in_array('pinterest',$sharing_type)) { ?>
						<a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . '&description='.htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" class="social pinterest boxed-icon white-fill" nopin="nopin" data-pin-no-hover="true"><i class="fa fa-pinterest"></i></a>
						<?php } ?>
						<?php if (in_array('google-plus',$sharing_type)) { ?>
						<a href="<?php echo 'http://plus.google.com/share?url=' . esc_url( $permalink ) . ''; ?>" class="social google-plus boxed-icon white-fill"><i class="fa fa-google-plus"></i></a>
						<?php } ?>
						<?php if (in_array('linkedin',$sharing_type)) { ?>
						<a href="<?php echo 'https://www.linkedin.com/cws/share?url=' . esc_url( $permalink ) . ''; ?>" class="social linkedin boxed-icon white-fill"><i class="fa fa-linkedin"></i></a>
						<?php } ?>
						<?php if (in_array('whatsapp',$sharing_type)) { ?>
						<a href="<?php echo 'whatsapp://send?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . ''; ?>" class="whatsapp social boxed-icon white-fill" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
						<?php } ?>
						<?php if (in_array('vkontakte',$sharing_type)) { ?>
						<a href="<?php echo 'http://vk.com/share.php?url=' . esc_url( $permalink ) . ''; ?>" class="social vk boxed-icon white-fill"><i class="fa fa-vk"></i></a>
						<?php } ?>
						<?php if (in_array('email',$sharing_type)) { ?>
						<a href="<?php echo 'mailto:?Subject=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . ''; ?>" class="email social boxed-icon white-fill"><i class="fa fa-envelope"></i></a>
						<?php } ?>
					</div>
					<div class="product_copy">
						<h4><?php esc_html_e('Copy Link to Clipboard', 'notio'); ?></h4>
						<form>
							<input type="text" class="copy-value" value="<?php the_permalink(); ?>" readonly/>
							<a class="btn blue"><?php esc_html_e('Copy', 'notio'); ?></a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</aside>
<?php
}
add_action( 'thb_social_article_detail', 'thb_social_article_detail', 3, 3 );

/* Thb Header Search */
function thb_quick_search() {
 ?>
	<a href="#searchpopup" class="quick_search"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
			<path d="M19.769,18.408l-5.408-5.357c1.109-1.364,1.777-3.095,1.777-4.979c0-4.388-3.604-7.958-8.033-7.958
				c-4.429,0-8.032,3.57-8.032,7.958s3.604,7.958,8.032,7.958c1.805,0,3.468-0.601,4.811-1.6l5.435,5.384
				c0.196,0.194,0.453,0.29,0.71,0.29c0.256,0,0.513-0.096,0.709-0.29C20.16,19.426,20.16,18.796,19.769,18.408z M2.079,8.072
				c0-3.292,2.703-5.97,6.025-5.97s6.026,2.678,6.026,5.97c0,3.292-2.704,5.969-6.026,5.969S2.079,11.364,2.079,8.072z"/>
	</svg></a>
<?php
	function thb_add_searchform() { 
		?>
		<aside id="searchpopup">
			<div class="spacer"></div>
			<div class="vcenter">
					<p><?php esc_html_e('SEARCH AND PRESS ENTER', 'notio'); ?></p>
					<?php get_search_form(); ?>
			</div>
		</aside>
		<?php
	}
	add_action( 'wp_footer', 'thb_add_searchform', 100 );
}
add_action( 'thb_quick_search', 'thb_quick_search',3 );

/* Thb Tweets */
function thb_gettweets($count = 5) {
	
	$cache = get_transient( 'thb_twitter_'. ot_get_option('twitter_bar_accesstoken') .'_'.$count);
	
	switch (ot_get_option('twitter_cache', '1')) {
		case '1h':
			$cache_time = 3600;
			break;
		case '1':
			$cache_time = DAY_IN_SECONDS;
			break;
		case '7':
			$cache_time = WEEK_IN_SECONDS;
			break;
		case '30':
			$cache_time = DAY_IN_SECONDS * 30;
			break;
	}
	
	if ( '' == ot_get_option('twitter_bar_accesstoken')
	     || '' == ot_get_option('twitter_bar_accesstokensecret')
	     || '' == ot_get_option('twitter_bar_consumerkey')
	     || '' == ot_get_option('twitter_bar_consumersecret')
	) {
		return new WP_Error( 'twitter_param_incomplete', 'Make sure you are passing in the correct parameters' );
	}
	if ( empty( $cache ) ) {
		$settings = array(
			'oauth_access_token' => ot_get_option('twitter_bar_accesstoken'),
			'oauth_access_token_secret' => ot_get_option('twitter_bar_accesstokensecret'),
			'consumer_key' => ot_get_option('twitter_bar_consumerkey'),
			'consumer_secret' => ot_get_option('twitter_bar_consumersecret')
		);
		
		$connection = new thb_TwitterAPIExchange($settings);
		$url            = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield       = '?screen_name='.ot_get_option('twitter_bar_username').'&count='.$count;
		$request_method = 'GET';
		
		$response = $connection
			->set_get_field( $getfield )
			->build_oauth( $url, $request_method )
			->process_request();
		
		$response = json_decode( $response, true );

		if( isset($response['errors']) ) {
			foreach($response['errors'] as $error) {
				echo $error['message'];	
			}
			 set_transient( 'thb_twitter_'. ot_get_option('twitter_bar_accesstoken') .'_'.$count, '', 0 );
			return;
		} else {
	    foreach($response as $tweet) { 
	    	$tweets[] =  array( 
	    		'tweet' => $connection->getHelper()->thb_getTweetText($tweet),
	    		'url' => $connection->getHelper()->thb_getTweetURL($tweet),
	    		'time' => $connection->getHelper()->thb_getTweetTime($tweet)
	    	);
	    }
	    set_transient( 'thb_twitter_'. ot_get_option('twitter_bar_accesstoken') .'_'.$count, $tweets, $cache_time );
	    return $tweets;
	  }	
	} else {
		return $cache;
	}
}
/* Post Categories Array */
function thb_blogCategories(){
	$blog_categories = get_categories();
	$out = array();
	foreach($blog_categories as $category) {
		$out[$category->name] = $category->cat_ID;
	}
	return $out;
}

/* Portfolio Categories Array */
function thb_portfolioCategories(){
	$portfolio_categories = get_categories(array('taxonomy'=>'project-category'));
	$out = array();
	foreach($portfolio_categories as $portfolio_category) {
		$out[$portfolio_category->cat_name] = $portfolio_category->term_id;
	}
	return $out;
}

/* Human time */
function thb_human_time_diff_enhanced( $duration = 60 ) {

	$post_time = get_the_time('U');
	$human_time = '';

	$time_now = date('U');

	// use human time if less that $duration days ago (60 days by default)
	// 60 seconds * 60 minutes * 24 hours * $duration days
	if ( $post_time > $time_now - ( 60 * 60 * 24 * $duration ) ) {
		$human_time = sprintf( __( '%s ago', 'notio'), human_time_diff( $post_time, current_time( 'timestamp' ) ) );
	} else {
		$human_time = get_the_date();
	}

	return $human_time;

}
/* Site Bars */
function thb_site_bars() {
	$site_bars = ot_get_option('site_bars', 'on');
	$left_bar = ot_get_option('left_bar');
	$right_bar = ot_get_option('right_bar');
	$site_bars_portfolio = ot_get_option('site_bars_portfolio', 'off');
	$site_bars_portfolio_list = ot_get_option('site_bars_portfolio_list');
	$site_bars_portfolio_position = ot_get_option('site_bars_portfolio_position', 'left');
	$out = '';
	if($site_bars != 'off') { 
		if ($site_bars_portfolio == 'on') {
			ob_start();	
			?>
				<div class="thb-quick-portfolio">
					<div class="thb-quick-inner">
						<?php 
							foreach ($site_bars_portfolio_list as $portfolio) { 
								$id = $portfolio['portfolio'];
								$image_id = get_post_thumbnail_id($id);
								$image_url = wp_get_attachment_image_src($image_id,'medium');
								$main_color_title = get_post_meta($id, 'main_color_title', true);
								
								$categories = get_the_term_list( $id, 'project-category', '', ', ', '' ); 
								
								$thb_categories = '';
								if ($categories !== '' && !empty($categories)) {
									$thb_categories = strip_tags($categories);
								}
						?>
							<a class="quick-portfolio <?php echo esc_attr($main_color_title); ?>" id="qp-portfolio-<?php echo esc_attr($id); ?>" href="<?php echo get_the_permalink($portfolio['portfolio']); ?>">
								<div class="figure" style="background-image: url(<?php echo esc_url($image_url[0]); ?>);"></div>
								<div class="qp-content">
									<h5><?php echo get_the_title($portfolio['portfolio']); ?></h5>
									<?php if ($thb_categories) { ?>
									<aside class="thb-categories"><?php echo esc_html($thb_categories); ?></aside>
									<?php } ?>
								</div>
							</a>
						<?php } ?>
					</div>
				</div>
			<?php
			$out = ob_get_clean();
		}
	?>
		<!-- Start Left Bar -->
		<aside id="bar-left" class="bar-side left-side site_bars_portfolio-<?php echo esc_attr($site_bars_portfolio); ?> <?php if ($site_bars_portfolio_position == 'left') { echo 'active'; } ?>">
			<div class="abs"><?php echo wp_kses_post($left_bar); ?></div>
			<?php echo ($site_bars_portfolio_position == 'left' ? $out : ''); ?>
		</aside>
		<!-- End Left Bar -->
		
		<!-- Start Right Bar -->
		<aside id="bar-right" class="bar-side right-side site_bars_portfolio-<?php echo esc_attr($site_bars_portfolio); ?> <?php if ($site_bars_portfolio_position == 'right') { echo 'active'; } ?>">
			<div class="abs right-side"><?php echo wp_kses_post($right_bar); ?></div>
			<?php echo ($site_bars_portfolio_position == 'right' ? $out : ''); ?>
		</aside>
		<!-- End Right Bar -->
	<?php
	}
}
add_action( 'thb_site_bars', 'thb_site_bars', 10 );

/* Social Icons */
function thb_social($socials, $text = false) {
	if (sizeof($socials) > 0 && $socials !== '') {
		foreach ($socials as $social) {
			?>
			<a href="<?php echo esc_url($social['href']); ?>" class="<?php echo esc_attr($social['social_network']); ?> icon-1x" target="_blank">
				<i class="fa fa-<?php echo esc_attr($social['social_network']); ?>"></i>
				<?php if ($text) { ?><span><?php echo esc_attr($social['social_network']); ?></span><?php } ?>
			</a><?php
		}
	}
}
add_action( 'thb_social_links', 'thb_social', 3 , 2 );

/* Blog Pagination */
function thb_blog_pagination() {
	$blog_pagination_style = ot_get_option('blog_pagination_style', 'style1');
	
	if ($blog_pagination_style == 'style1' || is_archive()) {
	?>
		<div class="row align-center">
			<div class="small-12 medium-10 large-9 columns">
				<?php the_posts_pagination(array(
					'prev_text' 	=> '<span>'.esc_html__( "prev", 'notio' ).'</span>',
					'next_text' 	=> '<span>'.esc_html__( "next", 'notio' ).'</span>',
					'mid_size'		=> 1
				)); ?>
			</div>
		</div>
	<?php
	} else if ($blog_pagination_style == 'style2') {
	?>
	<div class="row pagination-space">
		<div class="small-12 columns text-center">
			<a href="#" class="thb_load_more btn" title="<?php esc_html_e('Load More', 'notio'); ?>" data-count="<?php echo esc_attr(get_option('posts_per_page')); ?>"><span><?php esc_html_e('Load More', 'notio'); ?></span></a>
		</div>
	</div>
	<?php
	} else if ($blog_pagination_style == 'style3') {
	?>
	<div class="row pagination-space">
		<div class="thb-preloader"><?php get_template_part( 'assets/img/preloader.svg' ); ?></div>
	</div>
	<?php
	} else if ($blog_pagination_style == 'style4') {
	?>
		<?php if ( get_next_posts_link() || get_previous_posts_link()) { ?>
		<div class="blog_nav row expanded">
			<?php if ( get_next_posts_link() ) : ?>
				<a href="<?php echo next_posts(); ?>" class="blog-link next small-12 medium-6 columns"><?php _e( 'Older', 'notio' ); ?></a>
			<?php endif; ?>
		
			<?php if ( get_previous_posts_link() ) : ?>
				<a href="<?php echo previous_posts(); ?>" class="blog-link prev small-12 medium-6 columns"><?php _e( 'Newer', 'notio' ); ?></a>
			<?php endif; ?>
		</div>
		<?php } ?>
	<?php
	}
}
add_action( 'thb_blog_pagination', 'thb_blog_pagination',3 );

/* Display Post Bottom Elements */
function thb_PostMeta() {
	if (ot_get_option('thb_logo')) { $logo = ot_get_option('thb_logo'); } else { $logo = Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/logo.png'; }
	$post_meta = ot_get_option('post_meta') ? ot_get_option('post_meta') : array();
	
	$image_id = get_post_thumbnail_id();
	$image_link = wp_get_attachment_image_src($image_id,'full');
	?>
	<aside class="post-bottom-meta hide">
		<strong rel="author" itemprop="author" class="author vcard"><span class="fn"><?php the_author(); ?></span></strong>
		<time class="date published time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time>
		<meta itemprop="dateModified" class="date updated" content="<?php the_modified_date('c'); ?>">
		<span class="hide" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
			<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
				<meta itemprop="url" content="<?php echo esc_url($logo); ?>">
			</span>
			<meta itemprop="url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
		</span>
		<?php if ( has_post_thumbnail() ) { ?>
		<span class="hide" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
		  <meta itemprop="url" content="<?php echo esc_attr($image_link[0]); ?>">
		  <meta itemprop="width" content="<?php echo esc_attr($image_link[1]); ?>">
		  <meta itemprop="height" content="<?php echo esc_attr($image_link[2]); ?>">
		</span>
		<?php } ?>
		<meta itemscope itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>">
	</aside>
	<?php
}
add_action( 'thb_PostMeta', 'thb_PostMeta' );

/* Author Box */
function thb_author($id) {
	$id = $id ? $id : get_the_author_meta( 'ID' );
	?>
	<?php if(get_the_author_meta('description', $id ) != '') { ?>
	<section id="authorpage" class="authorpage cf">
	<?php echo get_avatar( $id , '140'); ?>
	<div class="author-content">
		<h3><a href="<?php echo get_author_posts_url( $id ); ?>" class="author-link"><?php the_author_meta('display_name', $id ); ?></a></h3>
		<p><?php the_author_meta('description', $id ); ?></p>
		<?php if(get_the_author_meta('url', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('url', $id ); ?>" class="square-icon" target="_blank"><i class="fa fa-link"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('twitter', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('twitter', $id ); ?>" class="square-icon twitter" target="_blank"><i class="fa fa-twitter"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('facebook', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('facebook', $id ); ?>" class="square-icon facebook" target="_blank"><i class="fa fa-facebook"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('googleplus', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('googleplus', $id ); ?>" class="square-icon google-plus" target="_blank"><i class="fa fa-google-plus"></i></a>
		<?php } ?>
	</div>
	</section>
	<?php
	}
}
add_action( 'thb_author', 'thb_author',3 );

/* Related Posts */
function thb_related_posts() {
	$postId = get_the_id();
	$tags = wp_get_post_tags($postId);

	if ($tags) {
	  $tag_ids = array();
		foreach($tags as $individual_tag) { $tag_ids[] = $individual_tag->term_id; }
	  $args = array(
	    'tag__in' => $tag_ids,
	    'post__not_in' => array($postId),
	    'posts_per_page' => 4,
	    'ignore_sticky_posts' => 1,
	    'no_found_rows' => true,
	  );
		$related_posts = new WP_Query( $args );
		
		?>
		<?php if ($related_posts->have_posts()) : ?>
		<aside class="related-posts cf hide-on-print">
			<h5 class="related-title"><?php esc_html_e( 'Related News', 'notio' ); ?></h5>
			<div class="row">
		  	<?php while ($related_posts->have_posts()) : $related_posts->the_post(); get_template_part( 'inc/templates/postbits/related' ); endwhile; ?>
		  </div>
		</aside>
		<?php endif; 
		wp_reset_postdata(); 
	}
	?>
	<?php
	
}
add_action( 'thb_related', 'thb_related_posts', 3 );

/* Load Template */
function thb_load_template_part($template_name) {
    ob_start();
    get_template_part($template_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}
/* Portfolio Navigation */
function thb_portfolio_nav() {
	$prev = get_previous_post();
	$next = get_next_post();
	$portfolio_nav_cat = ot_get_option('portfolio_nav_cat', 'off');
	$keyboard_nav = ot_get_option('keyboard_nav', 'on');
	if (is_singular('portfolio')) {
		$in_same_term = $portfolio_nav_cat == 'on' ? true : false;
		$prev = get_adjacent_post( $in_same_term, false, true, 'project-category' );
		$next = get_adjacent_post( $in_same_term, false, false, 'project-category' );	
	}
	if (
		(is_singular('portfolio') && 'on' === ot_get_option('portfolio_nav', 'on')) || 
		(is_singular('post') && 'on' === ot_get_option('blog_nav', 'on')) ||
		(is_singular('product') && 'on' === ot_get_option('product_nav', 'on'))
	) {
	?>
	<div class="portfolio_nav">
		<div class="row full-width-row">
			<div class="small-5 columns">
				<?php
					if ($prev) {
					?>
					<a href="<?php echo get_permalink($prev->ID); ?>" class="post_nav_link prev">
						<figure>
							<?php echo get_the_post_thumbnail($prev->ID, array(50,50)); ?>
							<?php get_template_part('assets/svg/arrows_left.svg'); ?>
						</figure>
						
						<strong>
							<?php if (is_singular('portfolio')) { ?>
								<?php if ($keyboard_nav === 'on') { esc_html_e('Previous Project (p)', 'notio'); } else { esc_html_e('Previous Project', 'notio'); }?>
							<?php } else if (is_singular('product')) { ?>
								<?php if ($keyboard_nav === 'on') { esc_html_e('Previous Product (p)', 'notio'); } else { esc_html_e('Previous Product', 'notio'); } ?>
							<?php } else { ?>
								<?php if ($keyboard_nav === 'on') { esc_html_e('Previous Post (p)', 'notio'); } else { esc_html_e('Previous Post', 'notio'); } ?>
							<?php } ?>
						</strong>
						<span><?php echo esc_html($prev->post_title); ?></span>
					</a>
				<?php
				}
				?>
			</div>
			<div class="small-2 columns center_link">
				<?php do_action( 'thb_social_article_detail', array(false) ); ?>
			</div>
			<div class="small-5 columns">
				<?php
				if ($next) {
				?>
					<a href="<?php echo get_permalink($next->ID); ?>" class="post_nav_link next">
						
						<strong>
							<?php if (is_singular('portfolio')) { ?>
								<?php if ($keyboard_nav === 'on') { esc_html_e('Next Project (n)', 'notio'); } else { esc_html_e('Next Project', 'notio'); } ?>
							<?php } else if (is_singular('product')) { ?>
								<?php if ($keyboard_nav === 'on') { esc_html_e('Next Product (p)', 'notio'); } else { esc_html_e('Next Product', 'notio');} ?>
							<?php } else { ?>
								<?php if ($keyboard_nav === 'on') { esc_html_e('Next Post (n)', 'notio'); } else { esc_html_e('Next Post', 'notio'); } ?>
							<?php } ?>
						</strong>
						<span><?php echo esc_html($next->post_title); ?></span>
						<figure>
							<?php echo get_the_post_thumbnail($next->ID, array(50,50)); ?>
							<?php get_template_part('assets/svg/arrows_right.svg'); ?>
						</figure>
					</a>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
	}
}
add_action( 'thb_post_navigation', 'thb_portfolio_nav', 3 );
add_action( 'woocommerce_after_single_product', 'thb_portfolio_nav', 99 );

/* Add Shortcode */
function thb_add_short( $name, $call ) {

  $func = 'add' . '_shortcode';
  return $func( $name, $call );
  
}
/* Encoding */
function thb_encode( $value ) {

  $func = 'base64' . '_encode';
  return $func( $value );
  
}
function thb_decode( $value ) {

  $func = 'base64' . '_decode';
  return $func( $value );
  
}

/* WooCommerce Check */
function thb_wc_supported() {
	return is_array( get_option( 'active_plugins' ) ) && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
}
function thb_is_woocommerce() {
	if (!thb_wc_supported()) {
		return false;	
	}
	return (is_woocommerce() || is_cart() || is_checkout() || is_account_page());
}

/* Custom Background Support */
function thb_change_custom_background_cb() {
    $background = get_background_image();
    $color = get_background_color();
 
    if ( ! $background && ! $color )
        return;
 
    $style = $color ? "background-color: #$color;" : '';
 
    if ( $background ) {
        $image = " background-image: url('$background');";
 
        $repeat = get_theme_mod( 'background_repeat', 'repeat' );
 
        if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
            $repeat = 'repeat';
 
        $repeat = " background-repeat: $repeat;";
 
        $position = get_theme_mod( 'background_position_x', 'left' );
 
        if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
            $position = 'left';
 
        $position = " background-position: top $position;";
 
        $attachment = get_theme_mod( 'background_attachment', 'scroll' );
 
        if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
            $attachment = 'scroll';
 
        $attachment = " background-attachment: $attachment;";
 
        $style .= $image . $repeat . $position . $attachment;
    }
?>
<style type="text/css">
body.custom-background #wrapper div[role="main"] { <?php echo trim( $style ); ?> }
</style>
<?php
}

// DNS Prefetching
function thb_dns_prefetch() {
	echo '<meta http-equiv="x-dns-prefetch-control" content="on">
	<link rel="dns-prefetch" href="//fonts.googleapis.com" />
	<link rel="dns-prefetch" href="//fonts.gstatic.com" />
	<link rel="dns-prefetch" href="//0.gravatar.com/" />
	<link rel="dns-prefetch" href="//2.gravatar.com/" />
	<link rel="dns-prefetch" href="//1.gravatar.com/" />';
}
add_action('wp_head', 'thb_dns_prefetch', 0);


/*--------------------------------------------------------------------*/         							
/*  FOOTER TYPE EDIT									 					
/*--------------------------------------------------------------------*/
function thb_footer_admin() {  
  echo sprintf(
  	__( 'Thank you for choosing %1$sFuel Themes%2$s', 'notio' ),
  	'<a href="http://fuelthemes.net/?ref=wp_footer" target="blank">',
  	'</a>'
  );
}
add_filter('admin_footer_text', 'thb_footer_admin'); 