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
<div id="main">
            <!-- main-banner start -->
            <div class="main-banner inner-banner">
                   <?php $banner_img = get_field('banner_img');?>
                <?php if (isset($banner_img) && !empty($banner_img)): ?>
                <picture class="lozad" data-iesrc="<?php echo $banner_img; ?>" data-alt="hero-img" data-sal="slide-up"
                    data-sal-delay="50" data-sal-duration="800">
                    <source srcset="<?php echo get_field('mobile_img'); ?>" media="(max-width:567px)">
                    <img src="<?php echo $banner_img; ?>" alt="hero-img">
                </picture>
                <?php endif;?>
                <div class="banner-details" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                    <div class="banner-info">
                        <?php   $title=get_field('title');  ?>
                         <?php if (isset($title) && !empty($title)): ?>
                        <h1 class="title"><?php echo $title; ?></h1>
                    <?php endif; ?>
                        <div class="banner-desc">
                            <?php $banner_detail=get_field('banner_detail')  ?>
                            <?php if (isset($banner_detail) && !empty($banner_detail)): ?>
                            <p><?php echo $banner_detail; ?></p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                 <?php $pattern = get_field('pattern');?>
                <?php if (isset($pattern) && !empty($pattern)): ?>
                <img class="pattern" src="<?php echo $pattern; ?>" alt="pattern" width="442" height="155" data-sal="slide-up"
                    data-sal-delay="50" data-sal-duration="800">
                 <?php endif;?>
            </div>
            <!-- main-banner end -->

            <!-- project-details-sec start -->
            <div class="project-details-sec">
                <div class="wrap">
                    <div class="project-desc-row">
                        <div class="project-info" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                              <?php $project_info = get_field('project_info');?>
                <?php if (isset($project_info) && !empty($project_info)): ?>
                            <p>
                              <?php  echo $project_info; ?>
                            </p>
                             <?php endif;?>
                        </div>
                        <div class="project-img-row cols cols2" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                            <div class="col">
                                <div class="project-fig-block">
                                    <?php


                        if( have_rows('big_img') ):

                            
                            while( have_rows('big_img') ) : the_row(); 
                                 $img = get_sub_field('img');
                               ?>

                                    <figure><img src="<?php echo $img; ?>" alt="Project"></figure>


                                     <?php
                       endwhile;    
                        endif;
                       ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="project-fig-block small-imgs">
                                            <?php


                        if( have_rows('small_img') ):

                            
                            while( have_rows('small_img') ) : the_row(); 
                                 $img = get_sub_field('img');
                               ?>
                                    <figure><img src="<?php echo $img;  ?>" alt="Project-Detail-Image"></figure>
                                                    <?php
                       endwhile;    
                        endif;
                       ?>
                         
                                   
                                </div>
                            </div>
                        </div>
                        <div class="project-info" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                                       <?php $project_slide_info = get_field('project_slide_info');?>
                <?php if (isset($project_slide_info) && !empty($project_slide_info)): ?>
                            <p>
                              <?php  echo $project_slide_info; ?>
                            </p>
                             <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- project-details-sec end -->

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