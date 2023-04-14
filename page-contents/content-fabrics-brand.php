     <?php
//Exit if Directly accessed
if (!defined('ABSPATH')) {
    exit;
}

/**
 * The Template Used For Displaying Home page Content
 *
 * @package WordPress
 * @subpackage Belliny
 * @since Belliny 1.0
 */
?><div id="main">
	 <div class="wrap">
	 	<?php if (is_user_logged_in()){ ?>
	 	           <div class="collections-sec">
                <div class="wrap">
                <div class="main-title login-header" >
                        <?php $fabrics_brand_title = get_field('fabrics_brand_title');?>
                <?php if (isset($fabrics_brand_title) && !empty($fabrics_brand_title)): ?>
                        <h2><?php echo $fabrics_brand_title; ?></h2>
                        <?php endif;?>
                    </div>
                    <div class="collections-list collection-login">
                        <div class="collection-slider owl-carousel owl-theme">
                            
                          <?php
					$args = array('post_type' => 'collecties', 'posts_per_page' => 6, 'order' => 'ASC');
					$the_query = new WP_Query($args);
							?>
					<?php if ($the_query->have_posts()): ?>
                                <?php while ($the_query->have_posts()): $the_query->the_post();?>

                            <div class="item">
                                <div class="collection-block" >
                                    <a href="<?php the_permalink();?>">
                                
                                       <?php the_post_thumbnail( 'homepage-thumb' ); ?>
                                        
                                        <figure>
                                            <!-- <img src="<?php //echo get_field('banner_img'); ?>" alt="collection" width="244"
                                                height="162"> -->
                                        </figure>
                                    </a>
                                    <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                    <?php echo get_field('collecties_des');
                                    $price_list=get_field('price_list') ?>
                                    <a href="<?php if($price_list){ echo $price_list['url']; }?>" class="button" download><span>Download prijslijst</span></a>
                                </div>
                            </div>
                            
<?php endwhile;?>
<?php endif;?>
                            <?php wp_reset_postdata();?>

                        </div>

                    </div>
                </div>
                <img class="pattern" src="<?php echo get_template_directory_uri(); ?>/images/pattern.svg" alt="pattern" width="442" height="155" data-sal="slide-up"
                    data-sal-delay="50" data-sal-duration="800">
            </div>
        <?php }else { ?>	 	<br>
	 	<br>
	 	<br>
	 	<br>
	 	<br><br><?php

        	echo "<a href='http://64.4.160.99/beliny/dealer-login/'><h1> please login</h1></a>";
        } ?>
	 </div>
	</div>