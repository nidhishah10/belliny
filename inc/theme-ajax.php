<?php

add_action('wp_ajax_get_news', 'belliny_get_news_callback');
add_action('wp_ajax_nopriv_get_news', 'belliny_get_news_callback');

function belliny_get_news_callback()
{
    $cat_id = $_POST['available'];
    $page = $_POST['page'];
    if (isset($_POST['available'])) {
        $ajaxposts = new WP_Query(array(
            'post_type' => 'news',
            'posts_per_page' => 4,
            'order' => 'ASC',
            'paged' => $page,
            'tax_query' => array(
                array(
                    'taxonomy' => 'news_category',
                    'field' => 'slug',
                    'terms' => $cat_id
                )
            )
        )); ?>
  


    <div class="trends-news-slider" >
<?php if ($ajaxposts->have_posts()):
    while ($ajaxposts->have_posts()):
        $ajaxposts->the_post();
        // ob_start();
        ?>

                      <div class="trends-news-details" >
                         <?php echo get_field('news-title'); ?>
                            <div class="trends-news-img">
                                <a href="<?php echo the_permalink(); ?>">
                                    <figure>
                                        <img src="<?php echo get_field(
                                            'news_img'
                                        ); ?>" alt="news" width="353" height="235">
                                    </figure>
                                </a>
                            </div>
                            <div class="inner-details" >
                                <h5><a href="<?php echo the_permalink(); ?>"><?php echo get_field(
    'news_title'
); ?></a></h5>
                                
                                <span class="date">Datum van publicatie: <?php echo get_field(
                                    'news_date_of_publish'
                                ); ?></span>
                                <p> <?php
                                $news_details = get_field('news_details');
                                $char_limit = 350;
                                /* $content = $slider_desc; */ echo substr(
                                    strip_tags($news_details),
                                    0,
                                    $char_limit
                                );
                                ?></p>
                                <a href="<?php echo the_permalink(); ?>" class="button"><span>Lees meer</span></a>
                            </div>
                        </div>
 
      <?php
    endwhile;
    ?></div><?php
        wp_reset_postdata();
                $total_pages = $ajaxposts->max_num_pages;
                                 if ($total_pages > 1){

        $pagination= paginate_links(array(
            //'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $page,
            'total' => $total_pages,
           'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
        'next_text' => is_rtl() ? '&larr;' : '&rarr;',
            'type'      => 'list',
           
        ));
    }echo "<div id='Pagination' class='latest-fabric-pagination pagination-news' >" .str_replace(admin_url('admin-ajax.php'), home_url('nieuws') , $pagination)."</div>"; 
endif; ?>
        

             <?php
         
             die();
             ?>

               <?php
    } else {
         ?>
          <div class="trends-news-slider" >
                               
                          <?php
                          $args = array(
                              'post_type' => 'news',
                               'paged' => $page,
                              'posts_per_page' => 4,
                              'order' => 'ASC'
                          );
                          $the_query = new WP_Query($args);

                          if ($the_query->have_posts()):
                              while ($the_query->have_posts()):
                                  $the_query->the_post(); ?>
                        <div class="trends-news-details" >
                            <div class="trends-news-img" >
                                <a href="<?php echo the_permalink(); ?>">
                                    <figure>
                                        <img src="<?php echo get_field('news_img'); ?>" alt="news" width="353" height="235">
                                    </figure>
                                </a>
                            </div>
                            <div class="inner-details" >
                                <h5><a href="<?php echo the_permalink(); ?>"><?php echo get_field(
    'news_title'
); ?></a></h5>
                                
                                <span class="date">Datum van publicatie: <?php echo get_field(
                                    'news_date_of_publish'
                                ); ?></span>
                                <p> <?php
                                $news_details = get_field('news_details');
                                $char_limit = 350;
                                /* $content = $slider_desc; */ echo substr(
                                    strip_tags($news_details),
                                    0,
                                    $char_limit
                                );
                                ?></p>
                                <a href="<?php echo the_permalink(); ?>" class="button"><span>Lees meer</span></a>
                            </div>
                        </div>
      
                            <?php
                              endwhile; ?></div><?php
                                                     $total_pages = $the_query->max_num_pages;
                                 if ($total_pages > 1){

        $pagination= paginate_links(array(
            //'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $page,
            'total' => $total_pages,
           'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
        'next_text' => is_rtl() ? '&larr;' : '&rarr;',
            'type'      => 'list',
          
        ));
    }echo "<div id='Pagination' class='latest-fabric-pagination pagination-news' >" .str_replace(admin_url('admin-ajax.php'), home_url('nieuws') , $pagination)."</div>"; 
                          endif;
                          ?>
                            <?php
                            wp_reset_postdata();
               
                            die();
                            ?>
                    
                



    <?php
    }
}

add_action('wp_ajax_get_stoffen_gebruik','belliny_get_stoffen_gebruik_callback');
add_action('wp_ajax_nopriv_get_stoffen_gebruik','belliny_get_stoffen_gebruik_callback');

function belliny_get_stoffen_gebruik_callback()
{
$cat_id = $_POST['collection'];
$cat_id1 = $_POST['name'];
$cat_id2 = $_POST['color'];
$page=$_POST['page'];

    if( $_POST['collection'] ){

               $ajaxposts = new WP_Query(array(
            'post_type' => 'stoffen',
            's'=>$cat_id1,
            'posts_per_page' => 16,
            'order' => 'DESC',
            'paged' => $page,
            'tax_query' => array(
               'relation' => 'or',
                array(
                    'taxonomy' => 'collecties',
                    'field' => 'slug',
                    'terms' => $cat_id
                ),
                array(
                    'taxonomy' => 'Kleur',
                    'field' => 'slug',
                    'terms' => $cat_id2
                ),
               
            )
        )); ?>
   
      
   
  
              <div class="fabric-slider">  <div class="fabric-items">
                <?php if ($ajaxposts->have_posts()):
    while ($ajaxposts->have_posts()):
        $ajaxposts->the_post();
        // ob_start();
        ?>
                       <div class="fabric-item-sec" >
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
 
                     ?>
                            <?php  ?><?php endwhile;
                             ?></div></div><?php


                              $total_pages = $ajaxposts->max_num_pages;
                                 if ($total_pages > 1){

        $pagination= paginate_links(array(
            //'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $page,
            'total' => $total_pages,
           'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
        'next_text' => is_rtl() ? '&larr;' : '&rarr;',
            'type'      => 'list',
         
        ));
    }echo "<div id='Pagination' class='latest-fabric-pagination pagination' >" .str_replace(admin_url('admin-ajax.php'), home_url('fabrics') , $pagination)."</div>"; 



                             endif; wp_reset_postdata(); die(); ?><?php
    } 

elseif($_POST['color']){     

   $ajaxposts = new WP_Query(array(
            'post_type' => 'stoffen',
            's'=>$cat_id1,
            'paged' => $page,
            'posts_per_page' => 16,
            'order' => 'DESC',
            'tax_query' => array(
                'relation' => 'or',
                array(
                    'taxonomy' => 'Kleur',
                    'field' => 'slug',
                    'terms' => $cat_id2
                ),

                array(
                    'taxonomy' => 'collecties',
                    'field' => 'slug',
                    'terms' => $cat_id
                ),
               
            )
        )); ?>

              <div class="fabric-slider">  <div class="fabric-items">
                <?php if ($ajaxposts->have_posts()):
    while ($ajaxposts->have_posts()):
        $ajaxposts->the_post();
        // ob_start();
        ?>
                       <div class="fabric-item-sec" >
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
 
                     ?>
                            <?php  ?><?php endwhile; ?></div></div><?php


  $total_pages = $ajaxposts->max_num_pages;
                                 if ($total_pages > 1){

        $pagination= paginate_links(array(
            //'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $page,
            'total' => $total_pages,
           'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
        'next_text' => is_rtl() ? '&larr;' : '&rarr;',
            'type'      => 'list',
         
        ));
    }echo "<div id='Pagination' class='latest-fabric-pagination pagination' >" .str_replace(admin_url('admin-ajax.php'), home_url('fabrics') , $pagination)."</div>"; 



                             endif; wp_reset_postdata(); die(); ?>




  <?php
}
elseif($_POST['name']){     

   $ajaxposts = new WP_Query(array(
            'post_type' => 'stoffen',
            's'=>$cat_id1,
            'paged' => $page,
            'posts_per_page' => 16,
            'order' => 'DESC',
               
            
        )); ?>

              <div class="fabric-slider">  <div class="fabric-items">
                <?php if ($ajaxposts->have_posts()):
    while ($ajaxposts->have_posts()):
        $ajaxposts->the_post();
        // ob_start();
        ?>
                       <div class="fabric-item-sec" >
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
 
                     ?>
                            <?php  ?><?php endwhile; ?></div></div><?php



                              $total_pages = $ajaxposts->max_num_pages;
                                 if ($total_pages > 1){

        $pagination= paginate_links(array(
            //'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $page,
            'total' => $total_pages,
           'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
        'next_text' => is_rtl() ? '&larr;' : '&rarr;',
            'type'      => 'list',
            
        ));
    }echo "<div id='Pagination' class='latest-fabric-pagination pagination' >" .str_replace(admin_url('admin-ajax.php'), home_url('fabrics') , $pagination)."</div>"; 


                             endif; wp_reset_postdata(); die(); ?>




  <?php
}


    else {
         ?>     <div class="fabric-slider">  <div class="fabric-items">

                      <?php
                      $args = array(
                          'post_type' => 'stoffen',
                          'paged' => $page,
                          'posts_per_page' => 16,
                          'order' => 'DESC'
                      );
                      $the_query = new WP_Query($args);

                      if ($the_query->have_posts()):
                          while ($the_query->have_posts()):
                              $the_query->the_post(); ?>
                  <div class="fabric-item-sec">
                    <a href="<?php echo the_permalink(); ?>">
                      <figure>
                        <?php $img = get_field('img'); ?>
                <?php if (isset($img) && !empty($img)): ?>
                        <img src="<?php echo $img; ?>" alt="abalo-tp" width="180" height="180">
                    <?php endif; ?>
                      </figure>
                          <h6><?php the_title(); ?></h6>
                    </a>
                  </div>
                  
             <?php
                          endwhile; ?></div></div><?php



                              $total_pages = $the_query->max_num_pages;
                                 if ($total_pages > 1){
                                  $current_page = $page;

        $pagination= paginate_links(array(
            //'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
           'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
        'next_text' => is_rtl() ? '&larr;' : '&rarr;',
            'type'      => 'list',
          
        ));
    }echo "<div id='Pagination' class='latest-fabric-pagination pagination' >" .str_replace(admin_url('admin-ajax.php'), home_url('fabrics') , $pagination)."</div>"; 
                      endif;
                      ?>
                            <?php wp_reset_postdata(); ?>
          
                 
                
               <?php die();
    }
}






