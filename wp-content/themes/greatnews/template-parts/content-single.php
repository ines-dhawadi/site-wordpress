<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */
$options = great_news_get_theme_options();
?>

<article>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-image">
		<img src="<?php the_post_thumbnail_url(); ?>">
	</div>
<?php endif; ?>


	<div class="entry-container">
		<div class="entry-meta">
			<span class="cat-links">
				<?php
				if ( ! $options['single_post_hide_category'] ) :
					great_news_single_categories();
				endif;
				?>
			</span><!-- .cat-links -->

			<?php
			if ( ! $options['single_post_hide_date'] ) :
				great_news_posted_on();
			endif;
			?>
		</div><!-- .entry-meta -->

		<header class="entry-header">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</header>

		<div class="entry-content">
		<p><?php the_content(); ?></p>
		</div><!-- .entry-content -->

		<?php
		 if ( ! $options['single_post_hide_author'] ) :
            echo great_news_author( get_the_author_meta('ID') );
        endif;
        ?>
	</div>
</article>
