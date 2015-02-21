<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 */
global $data;
get_header(); ?>

<div class="container page-content page-sidebar bbpresstester" id="page-template">

	<div class="grid11 col">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php $thumb = get_post_thumbnail_id();$img_url = wp_get_attachment_url( $thumb,'index-blog' );$image = aq_resize( $img_url, 659, true ); ?>
		
		<!-- SUB TEXT -->
		<?php $subtext = get_post_meta($post->ID, 'siiimple_subtext_page', TRUE); ?>
		
		<!-- PAGE GALLERY -->
		<?php $page_gallery = get_post_meta($post->ID, 'siiimple_basic_page_gallery', TRUE); ?>
		
		<!-- VIDEO -->
		<?php $video_page = get_post_meta($post->ID, 'siiimple_video_page', TRUE); ?>
		
		<!-- SET VIEWS -->
		<?php setPostViews(get_the_ID()); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
		
		<div class="img-wrap">
			
			<?php if ($image) { ?>
			
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
				<img src="<?php echo $image ?>" class="single-img" alt="image"/>
				
			<?php } else if ($video_page) { ?>
  	    		
  	    		<iframe src="<?php echo $video_page; ?>" width="659" height="400" frameborder="0" class="vid"></iframe>
  	    		
  	    		<div class="clear" style="height:10px;"></div>
			
			<?php } else if ( $page_gallery == '1' ) { ?>
					
					<div class="flexslider_gallery loading">
  	    
  	    				<ul class="slides">
  	    	
  	    					<?php 
	  	    				$args = array(
	  	    				'orderby' => 'menu_order',
	  	    				'post_type' => 'attachment',
	  	    				'post_parent'    => get_the_ID(),
	  	    				'post_mime_type' => 'image',
	  	    				'post_status'    => null,
	  	    				'numberposts'    => -1,
	  	    				);
	  	    				$attachments = get_posts($args);
	  	    				?>
	  	    	
	  	   					<?php if ($attachments) : ?>
					 
	  	    				<?php foreach ($attachments as $attachment) : ?>
                        	
	  	    				<?php $attachment_url = wp_get_attachment_url($attachment->ID , 'full');  ?>
							<?php $image_gallery = aq_resize($attachment_url, 659, true); //resize & retain image proportions (soft crop) ?>
				
								<li class="page_gallery_img_wrap"><img src="<?php echo $image_gallery ?>"/></li>
					
		  	    			<?php endforeach; ?>
                        
		  	    			<?php endif; ?>
		  	    
		  				</ul>
  	    	
  	    			</div><!--FLEXSLIDER LOADING-->
			
			<?php } ?>
			
			</div><!-- END IMG WRAP -->
			
			<!-- CLEAR -->
			<div class="clear"></div>
			
			<?php if ($subtext && $image) { ?>
			
			<h3 class="subtext-area"><?php echo $subtext ?>&nbsp;<span class="end">&diams;</span></h3>
			
			<?php } ?>
			
			<div class="left-content">
			
				<ul>
				
					<li class="posted"><?php the_time('M j, Y') ?></li>
				
					<li class="written"><?php the_author_meta('display_name'); ?></li>
				
					<li class="comments"><span class="comments"><?php comments_popup_link(__('Комментариев нет', 'siiimple'), __('1 Комментарии', 'siiimple'), __('% Комментариев', 'siiimple')); ?></span></li>
        			
        			<li class="views"><?php echo getPostViews(get_the_ID()); ?></li>
					
				</ul><!-- END UL -->
				
				<?php 
					global $wpdb;
					$images = get_post_meta( get_the_ID(), 'siiimple_sidebar_img', false );
					$images = implode( ',' , $images );
					// Re-arrange images with 'menu_order'
					$images = $wpdb->get_col( "
    				SELECT ID FROM {$wpdb->posts}
    				WHERE post_type = 'attachment'
    				AND ID in ({$images})
    				ORDER BY menu_order ASC
					" );
				
					foreach ( $images as $att )
					{
    		
    				$src = wp_get_attachment_image_src( $att, 'thumbnail' );
    				$src = $src[0];
    				// Show image
   	 				echo "<img src='{$src}' class='sidebar-img'/>";
					} 
				?>

			<?php include (trailingslashit( get_template_directory() ) . '/framework/includes/related.php'); ?>
			
			<?php if($data['disable_ratings'] !='disable') { ?> 
			<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
			<?php } ?>
       			
       		</div><!-- END LEFT CONTENT -->
			
			<div class="right-content">
			
				<?php if (!$image) { ?>
				<h2 class="no-image"><span class="date-area"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'siiimple'); ?></span><br/><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php } ?>			
				
				<?php if ($subtext && !$image) { ?>
			
				<h3 class="subtext-area"><?php echo $subtext ?>&nbsp;<span class="end">&diams;</span></h3>
			
				<?php } ?>
				
				<div class="content-wrap">
			
					<?php the_content('<p>Прочитайте остальную часть &raquo;</p>'); ?>
			
				</div>
			
			</div><!-- END RIGHT CONTENT -->
			
			<!-- CLEAR -->
		<div class="clear"></div>
		
		<?php include (TEMPLATEPATH . '/framework/includes/share.php'); ?>
			
		</div><!-- END POST -->
		
		<!-- CLEAR -->
		<div class="clear"></div>

		<?php comments_template(); ?>
		
		<?php endwhile; endif; ?>
		
	</div><!-- END GRID 11 -->
	
	</div><!-- some weird div -->
	
</div><!-- end container -->
	
<?php get_footer(); ?>