<?php
/**
 * Core functions for registering dynamic blocks.
 *
 * @package HussainasDynamicBlocks
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initializes the block registration process.
 *
 * Hooks the main registration function into WordPress's 'init' action.
 */
function hussainas_register_dynamic_blocks_init() {
	// Register all blocks on 'init'.
	add_action( 'init', 'hussainas_register_all_blocks' );
}
// Fire the initializer.
hussainas_register_dynamic_blocks_init();


/**
 * Scans the /blocks/ directory and registers all found blocks.
 *
 * This function iterates over subdirectories in the /blocks/ folder.
 * For each subdirectory, it uses register_block_type_from_metadata()
 * to register the block based on its block.json file.
 *
 * This is the modern, preferred method for block registration.
 */
function hussainas_register_all_blocks() {
	
	// Define the path to the blocks directory.
	$blocks_dir = HUSSAINAS_BLOCK_UTILITY_PATH . 'blocks/';

	// Check if the blocks directory exists.
	if ( ! is_dir( $blocks_dir ) ) {
		// Optional: Log an error or return early.
		return;
	}

	// Scan the directory for block folders (subdirectories).
	// GLOB_ONLYDIR ensures we only get directories.
	$block_folders = glob( $blocks_dir . '*', GLOB_ONLYDIR );

	// If no block folders are found, do nothing.
	if ( empty( $block_folders ) ) {
		return;
	}

	// Loop through each found block folder and register it.
	foreach ( $block_folders as $block_path ) {
		/**
		 * register_block_type_from_metadata() is a powerful function.
		 * It automatically reads the block.json file, registers the block,
		 * and hooks up the 'render' file (if specified in block.json)
		 * to the 'render_callback'.
		 */
		register_block_type_from_metadata( $block_path );
	}
}
