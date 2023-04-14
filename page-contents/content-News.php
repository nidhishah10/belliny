       <?php
    //Exit if Directly accessed
    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * The Template Used For Displaying news page Content
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

                <!-- news-overview-sec start -->
                <div class="news-overview-sec">
                    <div class="wrap">
             <!--            /*<ul class="news-filter-list">
                              <?php
                                // if( have_rows('category') ):
                                // while( have_rows('category') ) : the_row(); 
                                // $name = get_sub_field('category_name');
                                ?>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input class="checkbox" type="checkbox" id="<?php  //echo $name;  ?>" name="available">
                                        <em class="input-helper"></em>
                                        <span><?php //echo $name;  ?></span>
                                    </label>
                                </div>
                            </li>
                          
                             <?php
                                // endwhile;    
                                // endif;
                                ?>
                           
                        </ul>
                          -->
                          <ul class="news-filter-list">
                 <?php
                        $terms = get_terms('news_category');
                        foreach ($terms as  $term) { ?>
                             <div class="checkbox ">
                                    <label id="filter">

                                        <!-- <input  data-filter="<?php  //echo $term->slug; ?>" data-term-number="<?= $term->term_id; ?>" value='<?php // echo $term->slug; ?>'  class="checkbox" type="checkbox" id="<?php  //echo $name;  ?>" name="available">
     -->

                                        <input  type="checkbox"  value='<?php  echo $term->slug; ?>' name="available">

                                        <em class="input-helper"></em>

                                        <li > <?php echo $term->name; ?></li>
                                    </label>
                                </div>
                         
                    <?php  }

                      ?>
                  </ul>
               <div class="trends-news-slider" >
                                   
                              <?php
                               $paged = get_query_var('paged');
                                $args = array('post_type' => 'news', 'posts_per_page' => 4, 'order' => 'ASC','paged' => $paged);
                                $the_query = new WP_Query($args);

                              if ($the_query->have_posts()):     
                               while ($the_query->have_posts()): $the_query->the_post();?>
                            <div class="trends-news-details" >
                                <div class="trends-news-img" data-sal="slide-up" data-sal-delay="50"
                                    data-sal-duration="800">
                                    <a href="<?php echo the_permalink();?>">
                                        <figure>
                                            <img src="<?php echo get_field('news_img');  ?>" alt="news" width="353" height="235">
                                        </figure>
                                    </a>
                                </div>
                                <div class="inner-details" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                                    <h5><a href="<?php echo the_permalink();?>"><?php  echo get_field('news_title'); ?></a></h5>
                                    
                                    <span class="date">Datum van publicatie: <?php echo get_field('news_date_of_publish');  ?></span>
                                    <p> <?php $news_details = get_field('news_details');
                              $char_limit = 350; 
                               /* $content = $slider_desc; */ echo substr(strip_tags($news_details), 0, $char_limit);?></p>
                                    <a href="<?php echo the_permalink();?>" class="button"><span>Lees meer</span></a>
                                </div>
                            </div>
          
                                <?php
                                endwhile;    ?>

           <div id='Pagination' class='latest-fabric-pagination pagination-news ' >
<?php
                                       $total_pages = $the_query->max_num_pages;
                                 if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
             'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
        'next_text' => is_rtl() ? '&larr;' : '&rarr;',
          'type'      => 'list',
        ));
    }   ?>
  </div>
                                <?php
                                endif;
                                ?>
                                <?php wp_reset_postdata(); 
                               
                                ?>
                        
                        </div>

                    </div>
                </div>
                <!-- news-overview-sec end -->
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
                </div>            <!-- fig-out-sec end -->
    </div>
    <?php
