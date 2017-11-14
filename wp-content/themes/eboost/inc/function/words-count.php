<?php
/**
* Returns word count of the sentences.
*
* @since @since eboost 1.0.0
*/
if ( ! function_exists( 'eboost_words_count' ) ) :
	function eboost_words_count( $length = 25, $eboost_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $eboost_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;