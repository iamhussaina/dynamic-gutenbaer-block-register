<?php
/**
 * Main loader for the Dynamic Block Utility.
 *
 * This file acts as the entry point, defining constants and
 * including the core registration logic.
 *
 * @package HussainasDynamicBlocks
 * @version     1.0.0
 * @author      Hussain Ahmed Shrabon
 * @license     MIT
 * @link        https://github.com/iamhussaina
 * @textdomain  hussainas
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define a constant for the utility's base path.
 *
 * This makes it easier to reference files within the utility.
 */
if ( ! defined( 'HUSSAINAS_BLOCK_UTILITY_PATH' ) ) {
	define( 'HUSSAINAS_BLOCK_UTILITY_PATH', trailingslashit( __DIR__ ) );
}

/**
 * Include the core block registration file.
 *
 * This file contains the logic to find and register all blocks
 * defined in the /blocks/ directory.
 */
require_once HUSSAINAS_BLOCK_UTILITY_PATH . 'includes/block-registration.php';
