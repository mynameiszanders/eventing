<?php

/**
 * Common function
 *
 * @category	Eventing
 * @package		Common
 * @subpackage	Show404
 * @see			/index.php
 */

	if(!function_exists('show_404')) {
		/**
		 * Show 404
		 *
		 * Calls show_doc(404), trying to find a user error document. If this fails,
		 * default to the not-so-pretty show_error().
		 *
		 * @return void
		 */
		function show_404() {
			show_doc(404) || show_error(
				'The page you requested does not exist.',
				'404 Not Found'
			);
		}
	}