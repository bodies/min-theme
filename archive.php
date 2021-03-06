<?php get_header(); ?>
<div id="content">
    <div id="main-content">
<?php if (have_posts()) : ?>
    <?php $post = $posts[0]; /* Hack. Set $post so that the_date() works. */ ?>
        <div class="page-header">
            <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
        </div>
    <?php while (have_posts()) : the_post(); ?>
        <div class="post"  id="post-<?php the_ID(); ?>">
	        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		    <span class="date"><?php the_time(__('m/j/Y','m_n')) ?></span>
			<div class="entry">
				<?php the_content('<div class="more">'.__('Continue Reading','m_n').' &raquo;</div>'); ?>
			</div>
			<span class="number-of-comments"><a href="<?php the_permalink() ?>#comments" title="title"><?php comments_number(__('No Comments','m_n'), __('1 Comment','m_n'), __('% Comments','m_n'));?></a></span>
		</div>
	<?php endwhile; ?>

        <div class="pagination clearfix">
			<div class="prev"><?php next_posts_link('&laquo; '.__('Previous posts','m_n')) ?></div>
			<div class="next"><?php previous_posts_link(__('Newer posts','m_n').' &raquo;') ?></div>
		</div>
<?php else : ?>
		<h2>Not found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
