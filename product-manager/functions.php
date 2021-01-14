<?php

// register jquery and style on initialization
add_action('init', 'register_script');
function register_script() {
	$dir = plugin_dir_url(__FILE__);
    wp_enqueue_script( 'custom_jquery', $dir . '/js/script.js', array('jquery'), '1.1.1', true );
    wp_enqueue_script('oxfam_js_cookie', 'http://code.jquery.com/jquery-1.7.1.min.js', array(), null, true);
    wp_enqueue_style( 'my_style', $dir . '/css/style.css',false,'1.1','all');
}
//use the registered jquery and style above
add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_style(){
   wp_enqueue_script('custom_jquery');
   wp_enqueue_script('oxfam_js_cookie');
   wp_enqueue_style( 'new_style' );
}

function wc_plugin_options(){?>
<h1>Product Boxes!</h1>

<?php $custom_terms = get_terms('categories');

foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'boxproduct',
        'tax_query' => array(
            array(
                'taxonomy' => 'categories',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );?>
     <div class="container"  style="display: inline-block;padding: 20px;width: 100%">
     <div class="row" style="display: inline-flex; ">
     <?php $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<h2>'.$custom_term->name.'</h2>'; $catname = $custom_term->name;
        echo '<br/>';
        while($loop->have_posts()) : $loop->the_post();?>
        	<div class="insidecontainer col-md-4">
        	<p class="image"><?php the_post_thumbnail('thumbnail');?></p>
        	<div class="middle">
		    <div class="text">Add</div>
		    </div>
            <p><?php the_title();?></p>
        	</div>
        <?php endwhile;
     }
     ?>
     </div>
     </div>
<?php }
}

?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".text").click(function(){
        //$(".text").html("Product is added");
		alert("image added to the cart");
	})
});
</script>
