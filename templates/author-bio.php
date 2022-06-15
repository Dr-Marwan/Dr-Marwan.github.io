<?php
/**
 * The template to display the Author bio
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */
?>

<div class="author_info author vcard" itemprop="author" itemscope itemtype="//schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<?php 
		$petermason_mult = petermason_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 280*$petermason_mult ); 
		?>
	</div><div class="author_description">
		<h5 class="author_title" itemprop="name"><?php echo wp_kses_data(sprintf(__('About %s', 'petermason'), '<span class="fn">'.get_the_author().'</span>')); ?></h5>

		<div class="author_bio" itemprop="description">
			<?php echo wpautop(get_the_author_meta( 'description' )); ?>
			<a class="author_link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( esc_html__('VIEW MORE POST', 'petermason' )); ?>
			</a>
		</div><!-- .author_bio -->

	</div><!-- .author_description -->

</div><!-- .author_info -->
