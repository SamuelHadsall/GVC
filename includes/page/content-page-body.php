<?php global $gvc; ?>
<?php while ( have_posts() ) : the_post(); ?>
	<!-- post start -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<section class="page-content gvc-clearfix">
			<?php the_content(); ?>
		</section>

	</article>
	<!-- post end -->
<?php endwhile; ?>
<?php if ($gvc['gvc-page-comments'] && $gvc['gvc-page-comments'] == 1) {comments_template();} ?>
