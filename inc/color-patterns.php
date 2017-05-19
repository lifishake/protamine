<?php
	$css = '

.entry-content a:focus,
.entry-content a:hover,
.entry-summary a:focus,
.entry-summary a:hover,
.widget a:focus,
.widget a:hover,
.site-footer .widget-area a:focus,
.site-footer .widget-area a:hover,
.sidebar-inline .widget-column a:focus,
.sidebar-inline .widget-column a:hover,
.posts-navigation a:focus,
.posts-navigation a:hover,
.comment-reply-link:focus,
.comment-reply-link:hover,
.entry-title a:focus,
.entry-title a:hover,
.entry-meta a:focus,
.entry-meta a:hover,
.entry-footer a:focus,
.entry-footer a:hover,
.entry-footer .cat-links a:focus,
.entry-footer .cat-links a:hover,
.entry-footer .date-links a:focus,
.entry-footer .date-links a:hover,
.entry-footer .tags-links a:focus,
.entry-footer .tags-links a:hover,
.post-navigation a:focus,
.post-navigation a:hover,
.pagination a:not(.prev):not(.next):focus,
.pagination a:not(.prev):not(.next):hover,
.comments-pagination a:not(.prev):not(.next):focus,
.comments-pagination a:not(.prev):not(.next):hover,
.edit-link a:focus,
.edit-link a:hover,
.site-info a:focus,
.site-info a:hover,
.widget .widget-title a:focus,
.widget .widget-title a:hover,
.widget ul li a:focus,
.widget ul li a:hover {
	color: hsl( ' . $hue . ', ' . $saturation . ', 93% ); /* base: #000; */
}

.site-navigation-fixed.navigation-top:before,
.dropdown-toggle,
.menu-toggle,
.page-title,
.page .entry-title,
h2.widget-title,
h2.sidebar-inline-title,
mark,
.post-navigation a:focus .icon,
.post-navigation a:hover .icon,
.site-content .site-content-light,
.mention {
	color: hsl( ' . $hue . ', ' . $saturation . ', 87% ); /* base: #222; */
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
textarea:focus,
.bypostauthor > .comment-body > .comment-meta > .comment-author .avatar {
	border-color: hsl( ' . $hue . ', ' . $reduced_saturation . ', 80% ); /* base: #333; */
}

span.highlight,
h2,
input[type="text"],
input[type="email"],
input[type="url"],
input[type="search"],
textarea,
input[type="text"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
textarea:focus,
.taxonomy-description,
.site-info a {
	color: hsl( ' . $hue . ', ' . $saturation . ', 60% ); /* base: #666; */
}

.navigation-top .menu-scroll-up,
h5,
.entry-meta,
.entry-meta a,
.no-comments,
.comment-awaiting-moderation,
.page-numbers.current,
.navigation-top .current-menu-item > a,
.navigation-top .current_page_item > a,
.main-navigation a:hover {
	color: hsl( ' . $hue . ', ' . $saturation . ', 54% ); /* base: #767676; */
}

.entry-footer .cat-links .icon,
.entry-footer .date-links .icon,
.entry-footer .tags-links .icon {
	color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
}

.prev.page-numbers,
.next.page-numbers {
	background-color: hsl( ' . $hue . ', ' . $saturation . ', 13% ); /* base: #ddd; */
}


.site-title,
.site-title a {
	color: hsl( ' . $hue . ', ' . $saturation . ', 60% );
}

.site-title a:hover,
.site-title a:active
{
	color: hsl( ' . $hue . ', ' . $saturation . ', 76% );
}

.assistive-text {
	color: hsl( ' . $hue . ', ' . $saturation . ', 13% ); /* base: #eee; */
}

pre,
mark,
ins {
	background: hsl( ' . $hue . ', ' . $saturation . ', 7% ); /* base: #eee; */
}
.main-navigation > div > ul,
.pagination,
.comments-pagination,
.entry-footer,
.site-footer{
	border-top-color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #eee; */
}

ol.comment-list li article,
.main-navigation li,
.entry-footer,
tr {
	border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 13% ); /* base: #eee; */
}

.site-header {
	background-color: hsl( ' . $hue . ', ' . $saturation . ', 2% ); /* base: #fafafa; */
}

.menu-scroll-up,
.menu-scroll-up:hover,
.menu-scroll-up:focus {
	background-color: transparent;
}


@media screen and (min-width: 48em) {

	.nav-links .nav-previous .nav-title .icon,
	.nav-links .nav-next .nav-title .icon {
		color: hsl( ' . $hue . ', ' . $saturation . ', 80% ); /* base: #222; */
	}

	.main-navigation li li:hover,
	.main-navigation li li.focus {
		background: hsl( ' . $hue . ', ' . $saturation . ', 54% ); /* base: #767676; */
	}

	abbr[title] {
		border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 54% ); /* base: #767676; */;
	}

	.main-navigation ul ul {
		border-color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
		background: hsl( ' . $hue . ', ' . $saturation . ', 0% ); /* base: #fff; */
	}

	.main-navigation ul li.menu-item-has-children:before,
	.main-navigation ul li.page_item_has_children:before {
		border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 27% ); /* base: #bbb; */
	}

	.main-navigation ul li.menu-item-has-children:after,
	.main-navigation ul li.page_item_has_children:after {
		border-bottom-color: hsl( ' . $hue . ', ' . $saturation . ', 0% ); /* base: #fff; */
	}

	.main-navigation li li.focus > a,
	.main-navigation li li:focus > a,
	.main-navigation li li:hover > a,
	.main-navigation li li a:hover,
	.main-navigation li li a:focus,
	.main-navigation li li.current_page_item a:hover,
	.main-navigation li li.current-menu-item a:hover,
	.main-navigation li li.current_page_item a:focus,
	.main-navigation li li.current-menu-item a:focus {
		color: hsl( ' . $hue . ', ' . $saturation . ', 0% ); /* base: #fff; */
	}
}';
return $css;
}
