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

            <!-- dealer-detail-sec start -->
              <div class="dealer-detail-sec">
                <div class="wrap">
                    <h6 class="title-text" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                      <?php $dealer_detail = get_field('dealer_detail');?>
                <?php if (isset($dealer_detail) && !empty($dealer_detail)): ?>
                     <?php  echo $dealer_detail; ?>
                    <?php endif; ?>
                    </h6>

                    <div class="dealers-listed-row">

                        <?php
                        if( have_rows('dealer_info_block') ):

                        while( have_rows('dealer_info_block') ) : the_row(); 
                            $img = get_sub_field('img');
                            $title = get_sub_field('title');
                            $spec_title = get_sub_field('spec_title');
                            $dealer_link = get_sub_field('dealer_link'); 
                        ?>
                        <a href="<?php echo $dealer_link; ?>" target="_blank">
                        <div class="dealer-info-block" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">

                            <figure><img src="<?php echo $img; ?>" alt="Dealer-image"></figure>
                            <div class="listing-desc">
                                <h6 class="title"><?php echo $title; ?></h6>
                                <ul>
                                    <span class="spec-title"><?php $spec_title; ?></span>
                                    <?php
                                     if( have_rows('brand_name') ):

                                     while( have_rows('brand_name') ) : the_row(); 
                                        $name = get_sub_field('name');
                               
                               ?>
                                   <li>
                                       <?php  echo $name; ?>
                                   </li> 
                                   
                                    <?php
                                    endwhile;    
                                        endif;
                                                 ?>
                                </ul>
                            </div>
                        </div>
                        </a>
                        <?php  endwhile;  endif; ?>
                        
                    </div>
                  
                    <!-- dealers-listed-row -->
                    <div class="dealer-quote-block" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                                <?php $dealer_quote_title = get_field('dealer_quote_title');?>
                <?php if (isset($dealer_quote_title) && !empty($dealer_quote_title)): ?>
                      <h6><?php echo $dealer_quote_title; ?></h6>
                    <?php endif; ?>
                                             <?php $dealer_quote_des = get_field('dealer_quote_des');?>
                <?php if (isset($dealer_quote_des) && !empty($dealer_quote_des)): ?>
                       <p><?php echo $dealer_quote_des; ?></p>
                    <?php endif; ?>
                      
                    </div>
                </div>
            </div>
            <!-- dealer-detail-sec end -->

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

        </div>