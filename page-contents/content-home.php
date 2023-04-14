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
?>
 <div id="main"><?php $banner_img = get_field('banner_img');?>
            <!-- main-banner start -->
            <div class="main-banner">
                <div class="banner-slider owl-carousel">
                    <?php if( have_rows('banner_slider') ):
                          while( have_rows('banner_slider') ) : the_row();
                             $slider_image = get_sub_field('slider_image','homepage-banner  ');?>
                    <div class="item">
                        <div class="banner-image" style="background-image: url(<?php echo  $slider_image;?>)">

                        </div>
                    </div>
                  <?php endwhile;
                  endif; ?>
                </div>

                <div class="banner-details" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                    <img class="banner-logo lozad" src="<?php echo $banner_details = get_field('banner_details');?>" alt="belliny-fabrics-furniture"
                        width="588" height="226">
                </div>
                <img class="pattern" src="<?php echo $pattern = get_field('pattern');?>" alt="pattern" width="442" height="155" data-sal="slide-up"
                    data-sal-delay="50" data-sal-duration="800">
                </div>

         

            <!-- home-about-sec start -->
            <div class="home-about-sec">
                <img class="pattern" src="<?php echo $pattern; ?>" alt="pattern" width="442" height="155" data-sal="slide-up"
                    data-sal-delay="50" data-sal-duration="800">
                <div class="wrap">
                    <div class="home-about-details">
                        <?php $slider_title = get_field('slider_title');?>
                        <?php if (isset($slider_title) && !empty($slider_title)): ?>
                        <h1 data-sal="slide-up" data-sal-delay="50" data-sal-duration="800"><?php echo $slider_title; ?></h1>
                        <?php endif;?>

                        <?php $slider_desc = get_field('slider_desc');?>
                        <?php if (isset($slider_desc) && !empty($slider_desc)): ?>
                        <div class="details" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                            <p><?php echo $slider_desc; ?></p>
                        <?php endif;?>
                            <a href="about-us" class="button"><span>Lees meer</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- home-about-sec end -->

            <!-- portfolio-sec start -->
            <div class="portfolio-sec">
                <div class="wrap">
                    <div class="main-title" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                        <?php $portfolio_title = get_field('portfolio_title');?>
                        <?php if (isset($portfolio_title) && !empty($portfolio_title)): ?>
                        <h2><?php echo $portfolio_title; ?></h2>
                        <?php endif;?>
                    </div>
                    <div class="masonry">
                        <ul id="project-list">
                            <?php
                            $args = array('post_type' => 'portfolio', 'posts_per_page' => 9, 'order' => 'ASC');
                            $the_query = new WP_Query($args);
                            ?>
                            <?php if ($the_query->have_posts()): ?>
                                <?php while ($the_query->have_posts()): $the_query->the_post();?>
					<li data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
					<div class="masonry-list">
					<div class="masonry-list-image-box">
					<a href="<?php echo get_the_permalink(); ?>">
					<figure>
					    <img src="<?php echo get_field('portfolio_image'); ?>" alt="Project" width="334" height="302">
					</figure>
					<div class="masonry-details">
					    <h4><?php the_title();?></h4>
					    <h6><?php echo get_field('sub_title'); ?></h6>
					</div>
					</a>
					</div>
					<!--/.masonry-list-image-box-->
					</div>
					<!--/.masonry-list-->
					</li>
					<?php endwhile;?>
<?php endif;?>
                            <?php wp_reset_postdata();?>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- portfolio-sec end -->

            <!-- home-fabrics-sec start -->
            <?php $home_fabrics_img = get_field('home_fabrics_img');?>
                <?php if (isset($home_fabrics_img) && !empty($home_fabrics_img)): ?>
            <div class="home-fabrics-sec" style="background-image: url('<?php echo $home_fabrics_img; ?>');">
                <?php endif;?>

                <?php $fabric_pattern = get_field('fabric_pattern');?>
                <?php if (isset($fabric_pattern) && !empty($fabric_pattern)): ?>
                <img class="pattern" src="<?php echo $fabric_pattern; ?>" alt="pattern" width="442" height="155" data-sal="slide-up"
                    data-sal-delay="50" data-sal-duration="800">
                    <?php endif;?>
                <div class="wrap">
                    <div class="main-title" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                        <?php $title = get_field('title');?>
                <?php if (isset($title) && !empty($title)): ?>
                        <h2><?php echo $title; ?></h2>
                        <?php endif;?>
                    </div>
                    <div class="fabrics-inner">
                        <?php $fabric_inner_desc = get_field('fabric_inner_desc');?>
                <?php if (isset($fabric_inner_desc) && !empty($fabric_inner_desc)): ?>
                        <div class="fab-details" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                            <p><?php echo $fabric_inner_desc; ?></p>
                            <a href="fabrics" class="button"><span>Lees meer</span></a>
                        </div>
                        <?php endif;?>
                        <div class="fab-slider-sec" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                            <div class="fab-slider owl-carousel owl-theme">
                               <?php
$args = array('post_type' => 'stoffen', 'posts_per_page' => 3, 'order' => 'DESC');
$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()): ?>
                                <?php while ($the_query->have_posts()): $the_query->the_post();?>

                                <div class="item">
                                    <a href="<?php the_permalink();?>">
                                        <figure>
                                            <img src="<?php echo get_field('img'); ?>" alt="portfolio" width="470" height="275">
                                        </figure>
                                        <div class="fab-inner-details">
                                            <h5><?php the_title();?></h5>
                        <h6><?php echo get_field('sub_title'); ?></h6>
                                        </div>
                                    </a>
                                    
                                </div>
                                
<?php endwhile;?>
<?php endif;?>
                            <?php wp_reset_postdata();?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- home-fabrics-sec end -->

            <!-- home-collections-sec start -->
            <div class="collections-sec">
                <div class="wrap">
                    <div class="main-title" >
                        <?php $collecties_heading = get_field('collecties_heading');?>
                <?php if (isset($collecties_heading) && !empty($collecties_heading)): ?>
                        <h2><?php echo $collecties_heading; ?></h2>
                        <?php endif;?>
                    </div>
                    <div class="collections-list">
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
                                    <?php echo get_field('collecties_des');?>
                                    <a href="<?php the_permalink();?>" class="button"><span>Bekijk collectie</span></a>
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
            <!-- trends-news-sec end -->
            <div class="trends-news-sec">
                <div class="wrap">
                    <div class="main-title" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                        <h2>Trends en nieuws</h2>
                    </div>
                      
                          <?php
                            $args = array('post_type' => 'news', 'posts_per_page' => 2, 'order' => 'ASC');
                            $the_query = new WP_Query($args);

                          if ($the_query->have_posts()):     
                           while ($the_query->have_posts()): $the_query->the_post();?>
                        <div class="trends-news-details">
                            <div class="trends-news-img" data-sal="slide-up" data-sal-delay="50"
                                data-sal-duration="800">
                                <a href="<?php the_permalink();?>">
                                    <figure>
                                        <img src="<?php echo get_field('news_img');  ?>" alt="news" width="353" height="235">
                                    </figure>
                                </a>
                            </div>
                            <div class="inner-details" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                                <h5><a href="<?php the_permalink();?>"><?php  echo get_field('news_title'); ?></a></h5>
                                <span class="date">Datum van publicatie: <?php echo get_field('news_date_of_publish');  ?></span>
                                <p> <?php $news_details = get_field('news_details');
                          $char_limit = 350; 
                            $content = $slider_desc;  echo substr(strip_tags($news_details), 0, $char_limit);?></p>
                                <a href="<?php echo the_permalink();?>" class="button"><span>Lees meer</span></a>
                            </div>
                        </div>
      
                            <?php
                            endwhile;    
                            endif;
                            ?>
                             <?php wp_reset_postdata();?>
             
                </div>
            </div>
            <!-- trends-news-sec end -->

            <!-- dealers-sec start -->
            <div class="dealers-sec" style="background-image: url('<?php echo get_field('dealers_bg_image'); ?>">
                <div class="wrap">
                    <?php $dealers_heading = get_field('dealers_heading');
                            $dealers_images = get_field('dealers_images'); ?>

                    <div class="main-title" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                        <h2><?php echo $dealers_heading; ?></h2>
                    </div>
                    <div class="dealers-slider owl-carousel owl-theme" data-sal="slide-up" data-sal-delay="50"
                        data-sal-duration="800">
                        
                        <?php 
                         foreach ($dealers_images as $key => $dealers_image) {
                             // code... ?>
                             <div class="item">
                            <img src="<?php echo $dealers_image['image']; ?>" alt="dealer" width="453" height="93">
                        </div>
                             <?php
                         }
                        ?>
                        

                    </div>
                </div>
            </div>
            <!-- dealers-sec end -->

            <!-- fig-out-sec start -->
            <div class="fig-out-sec home-fig-out">
                <div class="wrap">
                    <div class="fig-out-inner">
                        <div class="fig-out-details" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                      <?php $get_in_touch_heading = get_field('get_in_touch_heading');
                            $get_in_touch_description = get_field('get_in_touch_description');
                            $get_in_touch_image = get_field('get_in_touch_image');
                            $get_in_touch_button_text = get_field('get_in_touch_button_text');
                            $get_in_touch_button_url = get_field('get_in_touch_button_url');
                            ?>
                            <h5><?php echo $get_in_touch_heading; ?></h5>
                            <p><?php echo $get_in_touch_description; ?></p>
                            <a href="<?php echo $get_in_touch_button_url; ?>" class="button"><span><?php echo $get_in_touch_button_text; ?></span></a>
                        </div>
                        <div class="fig-out-img" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                            <img src="<?php echo $get_in_touch_image; ?>" alt="get-in-touch" width="420" height="312">
                        </div>
                    </div>
                </div>
            </div>
            <!-- fig-out-sec end -->

        </div>
        <!--/#main -->