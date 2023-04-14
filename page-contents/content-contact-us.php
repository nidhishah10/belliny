 <?php
//Exit if Directly accessed
if (!defined('ABSPATH')) {
	exit;
}

/**
 * The Template Used For Displaying Fabrics page Content
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
                        <?php $title = get_field('title');?>
                         <?php if (isset($title) && !empty($title)): ?>
                        <h1 class="title"><?php echo $title; ?></h1>
                    <?php endif;?>
                        <div class="banner-desc">
                            <?php $banner_detail = get_field('banner_detail')?>
                            <?php if (isset($banner_detail) && !empty($banner_detail)): ?>
                            <p><?php echo $banner_detail; ?></p>
                        <?php endif;?>
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

            <!-- contact-detail-sec start -->
            <div class="contact-detail-sec">
                <div class="wrap">
                    <h6 class="contact-form-title" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                        Heeft u vragen over de collectie of wilt u met Claire overleggen over de mogelijkheden om dealer
                        te worden. Vult u dan het onderstaande formulier in.
                    </h6>
                    <div class="contact-detail-row cols cols2" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                        <div class="col">
                            <div class="contact-detail-form">
                               <?php echo do_shortcode('[contact-form-7 id="437" title="contact-us"]'); ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="contact-address">
                                <div class="add-info">
                                    <h6>Office</h6>
                                    <address>Promers Kazerne<br> Adriaan Dortsmanplein 3<br>1411RC Naarden<br>Unit 40/43</address>
                                </div>
                                <div class="add-info">
                                    <h6>Showroom</h6>
                                    <address>ETC Design Center<br>Stand 209<br>Randweg 20<br>4104 AC Culemborg</address>
                                </div>
                                <div class="add-map">
                                	<?php $map = get_field('map');?>
                                		 <?php if (isset($map) && !empty($map)): ?>

                                    <?php echo $map; ?>
                                <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact-detail-sec end -->

            <!-- contact-sample-sec start -->
              <?php $sample_bg_img = get_field('sample_bg_img');?>
                <?php if (isset($sample_bg_img) && !empty($sample_bg_img)): ?>
            <div class="contact-sample-sec" style="background-image: url(<?php echo $sample_bg_img; ?>);">
            <?php endif;?>
                <div class="wrap">
                    <div class="sample-info" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                    	   <?php $sample_title = get_field('sample_title');?>
                <?php if (isset($sample_title) && !empty($sample_title)): ?>
                        <h2 class="title"><?php echo $sample_title; ?></h2>
                    <?php endif;?>
                        <div class="desc">
                        	  <?php $sample_detail = get_field('sample_detail');?>
                <?php if (isset($sample_detail) && !empty($sample_detail)): ?>
                            <p>
                                <?php echo $sample_detail; ?>
                            </p>
                        <?php endif;?>
                        </div>
                        <a href="#" class="button poptrigger" data-rel="request-sample"><span>Vraag sample aan</span></a>
                  <!--   <a href="http://64.4.160.99/beliny/fabrics/" class="button"><span>Vraag sample aan</span></a> -->
                    </div>
                </div>
                <?php $pattern = get_field('pattern');?>
                <?php if (isset($pattern) && !empty($pattern)): ?>
                <img class="pattern sal-animate" src="<?php echo $pattern; ?>" alt="pattern" width="442" height="155"
                    data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                <?php endif;?>
            </div>
            <!-- contact-sample-sec end -->

              <!--  <div class="fig-out-sec home-fig-out">
                <div class="wrap">
                    <div class="fig-out-inner">
                        <div class="fig-out-details" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                      <?php $get_in_touch_heading //= get_field('get_in_touch_heading');
//$get_in_touch_description = get_field('get_in_touch_description');
//$get_in_touch_image = get_field('get_in_touch_image');
//$get_in_touch_button_text = get_field('get_in_touch_button_text');
//$get_in_touch_button_url = get_field('get_in_touch_button_url');
?>
                            <h5><?php //echo $get_in_touch_heading; ?></h5>
                            <p><?php //echo $get_in_touch_description; ?></p>
                            <a href="<?php //echo $get_in_touch_button_url; ?>" class="button"><span><?php //echo $get_in_touch_button_text; ?></span></a>
                        </div>
                        <div class="fig-out-img" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                            <img src="<?php //echo $get_in_touch_image; ?>" alt="get-in-touch" width="420" height="312">
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
        <!--/#main -->

        <!--/#footer -->
        <!-- /.request-sample-popup -->
        <div class="popouterbox" id="request-sample">
            <div class="popup-block">
                <div class="pop-contentbox">
                    <div class="popup-content">
                        <h6>Vraag hier je sample aan!</h6>
                        <a href="#" class="close-dialogbox icon-close"></a>

                        <?php echo do_shortcode('[contact-form-7 id="5998" title="Contact page- Sample form"]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.request-sample-popup -->
    </div>
    <!--/#wrapper-->
