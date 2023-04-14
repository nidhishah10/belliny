     <?php
//Exit if Directly accessed
if (!defined('ABSPATH')) {
	exit;
}

/**
 * The Template Used For Displaying Collection page Content
 *
 * @package WordPress
 * @subpackage Belliny
 * @since Belliny 1.0
 */
?>
 <div id="main">
            <!-- main-banner start -->
            <div class="main-banner inner-banner">
              <?php $banner_img = get_field('banner_img');?>
                <?php if (isset($banner_img) && !empty($banner_img)): ?>
                <picture class="lozad" data-iesrc="<?php echo $banner_img; ?>" data-alt="">
                    <source srcset="<?php echo get_field('mobile_img'); ?>" media="(max-width:567px)">
                    <img src="<?php echo $banner_img; ?>" alt="over-belliny-bg-img">
                </picture>
                  <?php endif;?>


                <div class="banner-details">
                    <div class="banner-info">
                        <?php $banner_title=get_field('banner_title'); ?>
                        <?php if (isset($banner_title) && !empty($banner_title)):  ?>
                        <h1 class="title" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800"><?php echo $banner_title; ?></h1>
                        <?php endif; ?>
                        <div class="banner-desc" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                            <?php $banner_detail=get_field('banner_detail'); ?>
                            <?php if (isset($banner_detail) && !empty($banner_detail)):  ?>
                            <p> <?php  echo $banner_detail; ?></p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>

                  <?php $pattern = get_field('pattern');?>
                <?php if (isset($pattern) && !empty($pattern)): ?>
                <img class="pattern" src="<?php echo $pattern; ?>" alt="" width="442" height="155" data-sal="slide-up"
                    data-sal-delay="50" data-sal-duration="800">
                 <?php endif;?>
            </div>
            <!-- main-banner end -->

            <!-- main-collection-sec start -->
       <!--   <div class="main-collection-sec">
        <div class="wrap">
          <div class="collection-details" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
             <?php $collection_detail_title //= get_field('collection_detail_title');?>
                <?php //if (isset($collection_detail_title) && !empty($collection_detail_title)): ?>
            <h3><?php // echo $collection_detail_title; ?></h3>
              <?php //endif;?>


                <?php $collection_detail_des //= get_field('collection_detail_des');?>
                <?php //if (isset($collection_detail_des) && !empty($collection_detail_des)): ?>
            <p> <?php // echo $collection_detail_des ;   ?> </p>
               <?php //endif;?>
          </div>
        </div>
      </div> -->
      <!-- main-collection-sec end -->

      <!-- all-collection-sec start -->
      <div class="all-collection-sec">
                    <?php
 $args = array(  
        'post_type' => 'Collecties',
        'post_status' => 'publish',
       
        'order' => 'ASC', 
    );
  $loop = new WP_Query( $args ); 
     while ( $loop->have_posts() ) : $loop->the_post();
       
            ?>
        <div class="all-collection-block" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">

          <a href="<?php echo get_permalink(); ?>">
            <figure>
              <img src="<?php echo get_field('banner_img'); ?>" alt="portfolio" width="470" height="275">
            </figure>
            <div class="fab-inner-details">
              <h5><?php echo get_the_title();  ?></h5>
            </div>
          </a>
      
        </div>
   
     <?php
           endwhile;

    wp_reset_postdata(); 

          ?>
      
      
      </div>
      <!-- all-collection-sec end -->

            <!-- fig-out-sec start -->
     <div class="fig-out-sec">
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