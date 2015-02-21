<?php global $data; ?>

<form id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
	
<input value="<?php _e('Поиск...', 'siiimple'); ?>" onfocus="if(this.value=='Поиск...'){this.value='';}" onblur="if(this.value==''){this.value='Поиск...';}" name="s" type="text" id="s" maxlength="99" />

</form>