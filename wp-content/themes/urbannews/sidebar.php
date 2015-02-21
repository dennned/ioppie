<?php global $data; ?>

<div id="section-five" class="grid4 col">

	<div class="section-inner">

		<?php if($data['check_search'] !='0') { ?>

			<form id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">

			<input value="<?php _e('Поиск...', 'siiimple'); ?>" onfocus="if(this.value=='Поиск...'){this.value='';}" onblur="if(this.value=='')	{this.value='Поиск...';}" name="s" type="text" id="s" maxlength="99" />

		</form>

		<?php } ?>

		<?php if($data['check_social'] !='0') { ?>

		<div id="recent-posts-2" class="sidebar">
		<h3 class="widgettitle">
			<span class="title-wrap">Следить за нами</span>
		</h3>
		<ul class="social-media-sidebar">

		<?php if($data['check_facebook'] !='0') { ?>

		<li>

			<a href="<?php echo $data['facebook_link']; ?>/" title="Ссылка на Facebook" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/facebook.png" alt="Facebook"></a>

			<h2>

				<?php
    			$page_id = $data['facebook_id'];

    			$xml = @simplexml_load_file("http://api.facebook.com/restserver.php?method=facebook.fql.query&query=SELECT%20fan_count%20FROM%20page%20WHERE%20page_id=".$page_id."") or die ("try disabling Facebook option in Theme Options or make sure your host server supports remote file access.");
    			$fans = $xml->page->fan_count;

    			if ($fans) {
    				$fans.=' подписчика';
    			} else {
					$fans = "<a href=".$data['facebook_link'].">Мы в Facebook</a>";
				}

				echo $fans;
    			?>

    		</h2>

    		<p><a href="<?php echo $data['facebook_link']; ?>/" title="Ссылка на Facebook" rel="home"> <?php echo $data['facebook_text']; ?> </a></p>

    	</li>

    	<?php } ?>

		<li><a href="<?php echo $data['twitter_link']; ?>/" title="Ссылка на Youtube" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/youtube.jpg" alt="Youtube"></a>

			<?php
			// get number subsc
			function get_yt_subs($username) {

				$xmlData = file_get_contents('http://gdata.youtube.com/feeds/api/users/' . strtolower($username));
				$xmlData = str_replace('yt:', 'yt', $xmlData);
				$xml = new SimpleXMLElement($xmlData);
				$subs = $xml->ytstatistics['subscriberCount'];
				return($subs);
			}

			$subsResult='';
			$subs = get_yt_subs($data['twitter_id']);
			if ($subs) {
				$subsResult = $subs.' подписчика';
			} else {
				$subsResult = "<a href=".$data['twitter_link'].">Мы на Youtube</a>";
			}
			?>

			<h2><?php echo $subsResult; ?></h2>
			<p><a href="<?php echo $data['twitter_link']; ?>/" title="Ссылка на Youtube" rel="home"> <?php echo $data['twitter_text']; ?></a></p>

		</li>

		</ul>
		</div>

		<?php } ?>

		<div class="clear"></div>

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 01') ) : ?><?php endif; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 02') ) : ?><?php endif; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 03') ) : ?><?php endif; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 04') ) : ?><?php endif; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 05') ) : ?><?php endif; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 06') ) : ?><?php endif; ?>

	</div><!-- SECTION INNER -->

</div><!-- END FIVE -->