<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The Best
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-page', get_post_format() );

			the_post_navigation( array(
            'prev_text'                  => __( '이전 글로 가기' ),
            'next_text'                  => __( '' )
        ));
			// If comments are open or we have at least one comment, load up the comment template.

				comments_template();


		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
