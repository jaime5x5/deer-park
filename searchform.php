<form  action="<?php bloginfo( 'siteurl' ); ?>/" method="get">
    <fieldset class="WGA-custom-search-form">
        
        <input class="textbox" value="I'm looking for..." name="s" id="s" onfocus="if (this.value == 'I\'m looking for...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'I\'m looking for...';}" type="text">
        <input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />

        <input type="hidden" value="post" name="post_type" id="post_type" />
    </fieldset>
</form>