<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		    <?php if (in_category('reflexion') || in_category('histoire')) continue; ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Lien permanent vers <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('j F Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content('Lire le reste de ce billet &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posté dans <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('Pas de commentaires &#187;', '1 Commentaire &#187;', '% Commentaires &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Billets précédents') ?></div>
			<div class="alignright"><?php previous_posts_link('Billets suivants &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Vide !</h2>
		<p class="center">Désolé, cherchez autre chose, ou cherchez ailleurs...</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
