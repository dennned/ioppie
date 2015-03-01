<?php global $data; ?>

	<div id="front">

		<h2 class="sub-header">
			<span class="title-wrap">
				<a href="<?php echo $data['section3_link'] ?>"><?php echo $data['section3_header'] ?>&nbsp;&rsaquo;&rsaquo;</a>
			</span>
		</h2>
		
		<ul>
			<?php $count=0;
			
			$xmlFeed = isset($data['section3_link']) ? $data['section3_link'] : '';
			
			if (($response_xml_data = file_get_contents($xmlFeed))===false) {
				echo "Error fetching XML\n";
			} else {
				$xml = simplexml_load_file($xmlFeed);
				foreach ($xml->entry as $item) {
					//var_dump((string)$item->title);
				}
			}
			
			$xml = new XMLReader();
			$xml->open('http://gdata.youtube.com/feeds/api/videos/fMoAISMBs7E');
			
			$r = array();
			while($xml->read()) {
				//$r[] = array($xml->name => $xml->value);
				
				//var_dump($xml->name);
			}
			
			//var_dump($r);
			
			
			
			
			$v = getYouTubeInfo('fMoAISMBs7E');
			var_dump($v);
			
			
			
			
			// Get & Parse YouTube XML data
			function getYouTubeInfo($id){
			
				//$xml_data = @file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$id);
				
				$xml_data = @file_get_contents("http://gdata.youtube.com/feeds/api/playlists/PLMXVftzmkndx4vOOOiA9E397OiiWfCFWY");
				
				if(strlen($xml_data) < 25){
					// Not enough data
					return $this->getYouTubeInfoBasic($id);
				}
				$doc = new DOMDocument();
				$doc->preserveWhiteSpace = false;
				if( ! $doc->loadXML($xml_data) ){
					// Failed Loading XML Doc
					return $this->getYouTubeInfoBasic($id);
				}
			
				$ret = array();
			
				// Get Thumbnail HREFs
				$media = $doc->getElementsByTagNameNS("*","thumbnail");
			
				if($media){
					foreach($media as $node){
						$ret["thumbnails"][] = $node->getAttribute("url");
					}
				}
			
				// Get Video Title
				$titles = $doc->getElementsByTagNameNS("*","title");
			
				if($titles){
					$ret["title"] = $titles->item(0)->nodeValue;
				}
				
				// Get Description
				// Get Video Title
				$description = $doc->getElementsByTagNameNS("*","description");
				if($description){
					$ret["description"] = $description->item(0)->nodeValue;
				}
				//var_dump($description);
			
				// Get Link to Video
				$link = $doc->getElementsByTagNameNS("*","player");
			
				if($link){
					if( $link->item(0) ){
						$ret['url'] = $link->item(0)->getAttribute("url");
					}
				}
			
				return $ret;
			}
			
			// If the above function doesn't work (i.e. the XML is not available,
			//    this function will be called to grab the information manually and check if a video exists by checking for thumbnails
			function getYouTubeInfoBasic($id){
			
				$check = @get_headers("http://img.youtube.com/vi/".$id."/1.jpg",true);
			
				// Check if Thumbnail exists
				if( strpos($check[0],"404") > 0 || strpos($check[0],"400") > 0){
					return false;
				}
			
				$ret = array();
				$ret['thumbnails'][] = "http://img.youtube.com/vi/".$id."/1.jpg";
				$ret['thumbnails'][] = "http://img.youtube.com/vi/".$id."/2.jpg";
				$ret['thumbnails'][] = "http://img.youtube.com/vi/".$id."/3.jpg";
			
				$ret['title'] = "Watch Video";
				$ret['url'] = "http://www.youtube.com/watch?v=".$id;
			
				return $ret;
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			$args=array( 'showposts' => '13','cat' => $data['section3_cat'] );  $my_query = new WP_Query($args);
			if ( $my_query->have_posts()  ) { while ($my_query->have_posts()) : $my_query->the_post(); 
			$video = get_post_meta($post->ID, 'siiimple_video', TRUE);
			//var_dump($data['section3_link']);
			$count++; ?>
			
			<?php if ($count == 1) { ?>
			
			<?php $thumb = get_post_thumbnail_id();$img_url = wp_get_attachment_url( $thumb,'index-blog' );$image = aq_resize( $img_url, 250,270, true ); ?>	

			<li class="first-cat">
			
				<div class="cat-wrp">
				
					<?php if ($image) { ?>
					<h2 class="cat-header-first"><span class="date-area"><?php the_time('F j, Y') ?></span><br/><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<img src="<?php echo $image ?>" class="img-feat" alt="<?php the_title(); ?>"/>
					<?php } ?>
				
				</div>
				
			</li>
				
			<?php } else if ($count == 1 && $video){ ?> 
			
			<?php $video = get_post_meta($post->ID, 'siiimple_video', TRUE); ?>
				
				<div class="cat-wrap-small">
				
					<li>
			
						<a class="various fancybox.iframe" href="<?php echo $video; ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>"/></a>
				
						<span class="play-icon"></span>
				
					</li>
				
				</div>	

			<?php } else { ?> 
			
			<?php 
			$thumb2 = get_post_thumbnail_id();
			$img_url2 = wp_get_attachment_url( $thumb2,'index-blog' );
			$image2 = aq_resize( $img_url2, 80,80, true );
			$video = get_post_meta($post->ID, 'siiimple_video', TRUE); 
			?>
			
			<?php 
			$thumb21 = get_post_thumbnail_id();
			$img_url21 = wp_get_attachment_url( $thumb21,'index-blog' );
			$image21 = aq_resize( $img_url2, 500, true ); 
			?>
				
				<li class="cat-wrap-small">
					
					<?php if ($image2) { ?>
					
						<img src="<?php echo $image2 ?>" class="img-cat-small" alt="image"/>
						<a class="photo-gallery extend" href="<?php echo $image21; ?>"><span class="icon-eye-2"></span></a>
						<a class="page-link" href="<?php the_permalink(); ?>"><span class="icon-link-2"></span></a>
					
					<?php } else if (!$image2) { ?>
					
						<img src="<?php echo get_template_directory_uri(); ?>/framework/images/no-img-small.jpg" alt="<?php the_title(); ?>"/>

					<?php } ?>
				
				</li>
				
			<?php } ?>
			
			<?php endwhile; } ?>
			<?php wp_reset_query(); ?>

		</ul>
	
	</div>

<div class="clear"></div>