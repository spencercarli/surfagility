<?php 
  $author_email = get_the_author_meta('email');
?>
<div class="display-small post-author small-bold bio-name">
  <?php the_author_posts_link(); ?>
</div>
<div class="author-bio">
<?php
  if ( get_the_author_meta('description') ) :
    echo get_the_author_meta('description');
  endif;
?>
</div>
 <div class="author-social">
  <?php get_template_part( 'partials/author', 'social' ); ?>
</div>