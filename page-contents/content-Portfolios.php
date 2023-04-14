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
 <div class="portfolio-details-sec">
                <div class="wrap">
                    <div class="portfolio-info" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">

                <?php $portfolio_info_detail = get_field('portfolio_info_detail');?>
                <?php if (isset($portfolio_info_detail) && !empty($portfolio_info_detail)): ?>

                        <p>
                           <?php echo $portfolio_info_detail; ?>
                        </p>
                     <?php endif;?>
                    </div>
                </div>
            </div>
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