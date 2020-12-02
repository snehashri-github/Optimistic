<?php 
//default is to list all posts
add_shortcode( 'list-posts', 'parameters_shortcode' );
function parameters_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'type' => 'post',
        'limit' => '',
		'order' => '',
        'orderby' => '',
        'category' => '',
    ), $atts ) );
 
    // define query parameters based on attributes
    $atts = array(
        'post_type' => $type,  
		'order' => $order,
        'posts_per_page' => $limit,
        'orderby' => $orderby,
        'category_name' => $category,
    );
    $query = new WP_Query( $atts );
    // run the loop based on the query
    if ( $query->have_posts() ) { 
	while ($query->have_posts()) :
        $query->the_post();?>
        <ul class="listing ">
            <ul class="listings ">
                <li><?php the_title(); ?>
					<ul class="listings ">
						<li>Content section:-<?php the_content(); ?></li>
					</ul>
				</li>
            </ul>
        </ul>
    <?php
	endwhile;	
    } 
	else {?>
	<div class="container">
		<?php echo "No result found for this category";?>
		</div>
	<?php }
}
