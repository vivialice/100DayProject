<?php // If there are no posts to display, such as an empty archive page ?>

<?php if ( ! have_posts() ) : ?>

	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<section class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</section><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>

<?php // if there are posts, Start the Loop. ?>

<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<a href="<?php echo get_permalink(); ?>">


					<div class="featImg">
						<?php echo get_the_post_thumbnail($post_id, 'bigSquare'); ?>
					</div> <!-- end .featImg -->
					<div class="featCopy">	
							<h2 class="entry-title">
					          <?php the_title(); ?>
					      </h2>
						<p><?php echo the_field('short_desc') ?></p>
						<p class="readMore">read more &#8702</p>
					</div> <!-- end .featCopy -->
					
					<?php wp_link_pages( array(
	          'before' => '<div class="page-link"> Pages:',
	          'after' => '</div>'
	        )); ?>

			</a>

		</article><!-- #post-## -->

		<?php comments_template( '', true ); ?>


<?php endwhile; // End the loop. Whew. ?>

<?php // Display navigation to next/previous pages when applicable ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <p class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></p>
  <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></p>
<?php endif; ?>
