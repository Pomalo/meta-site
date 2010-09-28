<?php get_header(); ?>

	<div id="content" class="widecolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			le <small><?php the_time('j F Y') ?></small> par <em class="author"><?php the_author() ?></em>

			<div class="entry">
				<?php the_content('<p class="serif">Lire le reste de ce billet &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<small>
						Ce billet a été posté
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						le <?php the_time('l, F jS, Y') ?> à <?php the_time() ?>
						dans <?php the_category(', ') ?>.
						Suivez les commentaires grâce au flux <?php post_comments_feed_link('RSS 2.0'); ?>.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Laissez <a href="#respond">un commentaire</a>, ou <a href="<?php trackback_url(); ?>" rel="trackback">un retrolien</a> depuis votre site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Les commentaires sont fermés, mais vous pouvez laisser <a href="<?php trackback_url(); ?> " rel="trackback">un retrolien</a> depuis votre site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Vous pouvez descendre pour laisser un commentaire. Pinging n'est pas permis actuellement.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Ni les commentaires ni les pings ne sont ouverts.

						<?php } edit_post_link('Edit this entry','','.'); ?>

					</small>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Désolé, aucun billet ne correspond à votre requête.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
