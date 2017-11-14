<?php
/**
 * Template Name: Front page
 * The template for displaying home page.
 * @package Eboost
 */
get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
	include( get_home_template() );
    }
else{	
	/**
	 * eboost_homepage hook
	 * @since Charitize 1.0.0
	 *
	 * @hooked eboost_homepage -  10
	 * @sub_hooked eboost_homepage -  30
	 */
	do_action( 'eboost_homepage' );
	$eboost_static_page = absint($eboost_customizer_all_values['eboost-enable-static-page']);
	if ($eboost_static_page == 1) { ?>
	<div class="wrapper page-inner-title">
		<div class = "thumb-overlay">
			<div class="container">
			    <div class="row">
			        <div class="col-md-12 col-sm-12 col-xs-12">
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="content" class="site-content">
		<div class="container tb-post-content">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'single'  );


							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php
				get_sidebar();
			?>
		</div>
	</div>
	<?php }
}
get_footer();