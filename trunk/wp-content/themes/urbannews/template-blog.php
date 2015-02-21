<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template Blog
 */
global $data;
get_header(); ?>

<div class="container blog-template page-sidebar" id="single">

	<div class="grid11 col">
	
		<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
	
		<div class="blog-title-wrap">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
		
		<?php endwhile; ?><?php endif; ?>

		 <?php
                if ( get_query_var('paged') ) {
                        $paged = get_query_var('paged');
                } elseif ( get_query_var('page') ) {
                        $paged = get_query_var('page');
                } else {
                        $paged = 1;
                }
                query_posts( array( 'post_type' => 'post', 'cat' => $data['blog_cat'],'paged' => $paged ) );
                if ( have_posts() ) : $count = 0; while ( have_posts() ) : the_post(); $count++;
                ?>
		
		<!-- SUB TEXT -->
		<?php $subtext = get_post_meta($post->ID, 'siiimple_subtext', TRUE); ?>
		
		<!-- IMG CAPTION -->
		<?php $imgCaption = get_post_meta($post->ID, 'siiimple_img_caption', TRUE); ?>
		
		<!-- SET VIEWS -->
		<?php setPostViews(get_the_ID()); ?>
	
		<div class="post blog-post" id="post-<?php the_ID(); ?>">
			
			<div class="img-wrap">
		
				<?php get_template_part( 'content', get_post_format() ); ?>
			
			</div>
			
			<div class="left-content">
			
				<ul>
				
					<li class="posted"><?php _e('<span class="emphasis">Отправлено</span>','siiimple') ?>&nbsp;<?php the_time('M j, Y') ?></li>
					
					<li class="written"><?php _e('<span class="emphasis">Автор</span>','siiimple') ?>&nbsp;<?php the_author_meta('display_name'); ?></li>
					
					<li class="comments"><span class="comments"><?php comments_popup_link(__('Комментариев нет', 'siiimple'), __('1 Комментарии', 'siiimple'), __('% Комментариев', 'siiimple')); ?></span></li>
        			
        			<li class="category"><?php echo get_the_category_list( __( ', ', 'siiimple' ) ); ?></li>			
					
					<?php the_tags( '<li class="tags">', ', ', '</li>'); ?>
					
					<li class="views"><?php echo getPostViews(get_the_ID()); ?></li>
					
				</ul><!-- END UL -->
				
       		</div><!-- END LEFT CONTENT -->
			
			<div class="right-content">

				<p><?php echo excerpt(150); ?>…[&nbsp;<a href="<?php the_permalink(); ?>">подробнее</a>&nbsp;]</p>
			
			</div><!-- END RIGHT CONTENT -->
			
			<div class="clear"></div>
			
		</div><!-- end post -->
		
		<div class="clear"></div>
		
		<?php endwhile; ?><?php endif; ?>
		
		<div class="clear" style="height:30px;"></div>
		
		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
		
	</div><!-- END GRID 11 -->
	
	<?php get_sidebar(); ?>
	
	</div><!-- some weird div -->
	
</div><!-- end container -->
	
<?php get_footer(); ?>