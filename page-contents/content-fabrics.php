can  <?php
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

      <!-- fabric-main-sec start -->
      <div class="fabric-main-sec">
        <div class="wrap">
          <div class="fabric-row">
            <div class="fabric-sidebar">
              <!-- search-block start -->
              <div class="fab-option search-blk search-type" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
            <input type="text" name="s" placeholder="Naam" id="searchbyname" class="input_search" >
                <a href="javascript:void(0)"  class="search-btn"><i class="icon-search"></i></a>
              </div>
              <!-- search-block end -->
              <!-- search-block start -->
              <div class="fab-option search-blk search-color" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                <input type="search" name="s1" id="searchbycolor" class="input_search" placeholder="Kleur">
                <a href="javascript:void(0)"  class="search-btn search-btn1"><i class="icon-search"></i></a>
              </div>
              <!-- search-block end -->
          



<?php

// $parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
// $parent_cat = get_terms('collecties',$parent_cat_arg);//category name

// foreach ($parent_cat as $catVal) {

//     echo '<h2>'.$catVal->name.'</h2>'; //Parent Category

//     $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
//     $child_cat = get_terms( 'collecties', $child_arg );

//     echo '<ul>';
//         foreach( $child_cat as $child_term ) {
//             echo '<li>'.$child_term->name . '</li>'; //Child Category
//         }
//     echo '</ul>';

// }

$parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
$parent_cat = get_terms('collecties',$parent_cat_arg);//category name

foreach ($parent_cat as $catVal) {
?> 

              <div class="fab-option selection-blk gebruik-main" >
                <h6><?php echo $catVal->name ?></h6>
                <div class="form-block">
                  <div class="form-group gebruik-main">
                           <div class="checkbox">
                                  <label id="filter">
                     
                <input  type="checkbox"  value='<?php  echo $catVal->slug; ?>' name="available">
                            <em class="input-helper"></em>
                                    <span><?php echo  $catVal->name ; ?></span>
                                  </label>
                            </div>
                 <?php
                  	
                            $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
                   $child_cat = get_terms( 'collecties', $child_arg );
                                               $terms = get_terms('collecties');
                                                 foreach ($child_cat as  $term) {     ?>
                
                    			 <div class="checkbox">
                               		<label id="filter">
                     
                <input  type="checkbox"  value='<?php  echo $term->slug; ?>' name="available">
				                    <em class="input-helper"></em>
                                    <span><?php echo $term->name; ?></span>
                                	</label>
                            </div>
                 <?php
					}
                           
                 ?>
                
                
                  </div>
                </div>
              </div>
<?php }?>

              

              <!-- selection-block end -->
            </div>
            <div class="fabric-main">
              <div class="fabric-slider">
                <div class="fabric-items">

                	    <?php
                       $paged = get_query_var('paged');
                            $args = array('post_type' => 'stoffen', 'posts_per_page' => 16, 'order' => 'DESC','paged' => $paged);
                            $the_query = new WP_Query($args);

                          if ($the_query->have_posts()):     
                           while ($the_query->have_posts()): $the_query->the_post();?>
                  <div class="fabric-item-sec" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
                    <a href="<?php echo the_permalink();?>">
                      <figure>
                      	<?php $img = get_field('img');?>
                <?php if (isset($img) && !empty($img)): ?>
                        <img src="<?php  echo $img;?>" alt="abalo-tp" width="180" height="180">
                    <?php endif; ?>
                      </figure>
               
                      <h6><?php the_title(); ?></h6>
                  
                    </a>
                  </div>
                  
             <?php
                            endwhile;    
                            endif;
                            ?>
                            <?php wp_reset_postdata(); 
                           
                            ?>
          
                 
                
                </div><div id='Pagination' class='latest-fabric-pagination pagination ' >
<?php
                                       $total_pages = $the_query->max_num_pages;
                                 if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
             'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
        'next_text' => is_rtl() ? '&larr;' : '&rarr;',
          'type'      => 'list',
        ));
    }   ?>
  </div>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fabric-main-sec end -->

    <!-- popular-fabric-sec start -->
    <div class="popular-fabric-sec">
      <div class="wrap">
        <div class="title" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800">
          <h6>Populairste stoffen</h6>
        </div>
        <div class="popular-sec-res">
          <div class="popular-fabric-slider">
             <?php
                            $args = array('post_type' => 'stoffen',
                                'posts_per_page' => 4,
                               // 'meta_key' => 'wpb_post_views_count',
                                'orderby' => 'wpb_post_views_count',
                                'order' => 'ASC');
                            $the_query = new WP_Query($args);
                            // echo "<pre>";
                            // print_r($the_query)
                          if ($the_query->have_posts()):     
                           while ($the_query->have_posts()): $the_query->the_post();?>
            <div class="fabric-item-sec item" data-sal="slide-up" data-sal-delay="50" data-sal-duration="800"> 
              <a href="<?php echo the_permalink();?>">
                <figure>
                                          <?php $img = get_field('img');?>
                <?php if (isset($img) && !empty($img)): ?>
                  <img src="<?php  echo $img;?>" alt="abalo-tp" width="170" height="170">
                <?php  endif; ?>
                </figure>
               
                      <h6><?php echo get_the_title(); ?></h6>
                     
              </a>
            </div>
           
                           <?php
                            endwhile;    
                            endif;
                            ?>
                            <?php wp_reset_postdata(); 
                           
                            ?>
       
          </div>
        </div>
      </div>
    </div>
    <!-- popular-fabric-sec end -->
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