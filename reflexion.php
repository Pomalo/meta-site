<?php
/*
Template Name: Reflexions
*/

get_header(); ?>

<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p class="serif">Lire le reste de ce billet &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
</div>

<div id="content" class="narrowcolumn">

<?php
if (is_page() ) {
$category = get_post_meta($posts[0]->ID, 'category', true);
}
if ($category) {
  $cat = get_cat_ID($category);
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $post_per_page = 4; // -1 shows all posts
  $do_not_show_stickies = 1; // 0 to show stickies
  $args=array(
    'category__in' => array($cat),
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
    'posts_per_page' => $post_per_page,
    'caller_get_posts' => $do_not_show_stickies
  );
  $temp = $wp_query;  // assign orginal query to temp variable for later use   
  $wp_query = null;
  $wp_query = new WP_Query($args); 
  if( have_posts() ) : 
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Lien permanent vers <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <small><?php the_time('j F Y') ?></small> par <em class="author"><?php the_author() ?></em>
        <div class="entry">
	  <?php global $more; $more = FALSE; ?>
          <?php the_content('Lire le reste de ce billet'); ?>
        </div>
        <p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posté dans <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('Pas de commentaires »', '1 Commentaire »', '% Commentaires »'); ?></p>
      </div>
    <?php endwhile; ?>
    <div class="navigation">
      <div class="alignleft"><?php next_posts_link('« Billets précedents') ?></div>
      <div class="alignright"><?php previous_posts_link('Billets suivants »') ?></div>
    </div>
  <?php else : ?>

		<h2 class="center">Vide !</h2>
		<p class="center">Désolé, ce que vous cherchez ne se trouve pas là...</p>
		<?php get_search_form(); ?>

	<?php endif; 
	
	$wp_query = $temp;  //reset back to original query
	
}  // if ($category)
?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>