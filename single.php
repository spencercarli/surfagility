<?php
/**
 * The single entry file.
 *
 */
get_header(); ?>
<!-- container div starts in header -->
<!-- row div starts in header -->
<div class="main-container">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php $postid = get_the_ID();?>
  <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'large');?>
  <?php if ($large_image_url) : ?>
    <?php $featured_image = true; ?>
    <div class="post-cover-img" style="background-image:url('<?php echo $large_image_url[0]?>')"> </div>
    <div class="post-wrapper top-large-pad">
  <?php else: ?>
    <div class="post-wrapper top-small-pad">
  <?php endif; ?>
      <div class="col-lg-7 col-lg-offset-3 col-sm-10 col-sm-offset-1">
        <h1 class="post-title" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h1>
        <div class="display-small post-author small-bold">
                By <?php the_author_posts_link(); ?>
            </div>
        <div class="post-subtitle">
            <?php if (function_exists('the_subtitle')){ the_subtitle(); }?> 
        </div>
        <div class="only-display-small post-author small-bold">
          <span class="glyphicon glyphicon-copyright-mark"></span>
          <?php the_author_posts_link(); ?>
        </div>
        <div class="post-info">
          <span class="post-date small-light-text">
            <span class="glyphicon glyphicon-calendar"></span>
            <?php the_time('F jS, Y') ?>
          </span>
          <span class="post-readtime small-light-text">
            <span class="glyphicon glyphicon-time"></span>
            <?php echo round(wcount() / 250, 0); ?> minute read
          </span> 
        </div>
        <div class="post-entry">
            <?php the_content(); ?>
        </div>
        <div class="post-extras">
          <?php get_template_part('partials/post', 'metadata'); ?>
        </div>
        <div class="wp-pagination">
          <?php wp_link_pages(); ?>
        </div>
        <?php endwhile; ?>
        <div class="navigation">
          <div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
          <div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
        </div>
        <div class="author-footer row only-display-small">
          <div class="row">
            <div class="col-xs-12">
              <hr>
              <div class="col-xs-3"><?php get_template_part( 'partials/author', 'img' ); ?></div>
              <div class="col-xs-7"><?php get_template_part( 'partials/author', 'bio'); ?></div>
            </div>
          </div>
        </div>
      
        <?php else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
      </div>
      <!-- <div class="col-lg-4 col-sm-4 post-sidebar">
        <div class="sidebar-body row <?php if ( ! $featured_image ) : echo "lower-post-sidebar";  endif; ?>">
          <div class="sidebar-inner">
            <?php $author_email = get_the_author_meta('email'); ?>
            <div class="author-photo" style="background-image: url('http://www.gravatar.com/avatar/<?php echo md5($author_email)?>s=64')"></div>
            <div class="display-small post-author small-bold">
                By <?php the_author_posts_link(); ?>
            </div>
            <div class="author-bio">
              <?php if ( get_the_author_meta('description') ) : ?>
                  <div class="section-seperator"></div>
                  <?php echo get_the_author_meta('description'); ?>
                  <div class="section-seperator"></div>
              <?php endif; ?>
            </div>
            <?php get_template_part( 'partials/author', 'social' ); ?>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
<?php comments_template(); ?>
<!-- row div ends in footer -->
<!-- container div ends in footer -->
<?php get_footer(); ?>