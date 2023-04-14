     <?php
//Exit if Directly accessed
if (!defined('ABSPATH')) {
	exit;
}

/**
 * The Template Used For Displaying About page Content
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
                <div class="banner-details" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                	 <?php $title = get_field('banner_detail');?>
                        <?php if (isset($title) && !empty($title)): ?>
                    <div class="banner-info">



                        <h1 class="title"><?php echo $title; ?></h1>

                        <?php endif;?>
                          <?php $slider_desc = get_field('description');
                          $char_limit = 300; 
                            $content = $slider_desc; 
                           // echo substr(strip_tags($content), 0, $char_limit);?>
                        <?php if (isset($slider_desc) && !empty($slider_desc)): ?>
                        <div class="banner-desc">
                            <p><?php echo substr(strip_tags($content), 0, $char_limit); ?></p>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                 <?php $pattern = get_field('pattern');?>
                <?php if (isset($pattern) && !empty($pattern)): ?>
                <img class="pattern" src="<?php echo $pattern; ?>" alt="" width="442" height="155" data-sal="slide-up"
                    data-sal-delay="50" data-sal-duration="800">
                 <?php endif;?>
            </div>
            <!-- main-banner end -->

            <!-- about-details-sec start -->
            <div class="about-details-sec">
                <div class="wrap">
                    <div class="deatils-inner-row">
                    	<?php $about_img= get_field('about_img');  ?>
                    	<?php if (isset($about_img) && !empty($about_img)): ?>
                        <div class="about-img" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                            <figure><img src="<?php echo $about_img; ?>" alt="over-belliny"></figure>
                             <?php endif;?>

                        </div>
                        <?php $about_title= get_field('about_title'); ?>
                          <?php if (isset($about_title) && !empty($about_title)): ?>
                        <h3 class="title"><?php echo $about_title; ?></h3>
                          <?php endif;?>

                          <?php $about_description=get_field('about_description') ?>
                          <?php if (isset($about_description) && !empty($about_description)): ?>
                        <div class="desc-box">
                    	<?php echo $about_description;  ?>
                        </div>
                    <?php endif; ?>
                    </div>

                </div>
            </div>
            <!-- about-details-sec end -->

            <!-- about-timeline-sec start -->
            <?php $timeline_img= get_field('timeline_img'); ?>
             <?php if (isset($timeline_img) && !empty($timeline_img)): ?>
            <div class="about-timeline-sec" style="background-image: url(<?php echo $timeline_img; ?>);">
            <?php endif; ?>
                <div class="wrap">
                    <div class="timeline-add">
                    <div class="timeline-row scroller owl-carousel" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
<?php

// Check rows exists.
if( have_rows('timeline') ):

    // Loop through rows.
    while( have_rows('timeline') ) : the_row(); 
    	 $year = get_sub_field('year');
    	  $timeline_des = get_sub_field('timeline_des');?>
                        <div class="items">
                        <div class="desc-box">
                            <div class="inner-desc">
                                <h6><?php echo $year; ?></h6>
                                <p><?php echo $timeline_des; ?></p>
                            </div>
                     <span class="pattern-arrow"></span> 
              	          </div>
                            </div>
                        
                       <?php
                       endwhile;	
endif;
                       ?>
                        
                        
                    
                    </div>
                    </div>
                </div>
            </div>


            <!-- about-timeline-sec start -->

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
        <!--/#main -->