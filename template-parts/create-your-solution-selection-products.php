<?php
  $product_args = array(
    'post_type' => array('product-and-service'),
    'category_name' => 'teq-product',
    'taxonomy' => 'topic',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order'   => 'ASC',
    'tax_query' => array(
      array (
        'taxonomy' => 'topics',
        'field' => 'slug',
        'terms' => array('STEM Technologies'),
      )
    ),
  );

  $product_query = new WP_Query( $product_args );

    function getProductGrades() {
      foreach(get_the_terms($product_query->post->ID, 'grades') as $grades)
        echo $grades->name . " ";
    }
    function getProductCategories() {
      $categories = get_the_category();
        foreach( $categories as $category) {
          if($category->name !== 'CDW-G')
          if($category->name !== 'FAMIS Product')
          if($category->name !== 'Teq Product') {
            $name = $category->name;
            $category_link = get_category_link( $category->term_id );
            echo esc_attr( $name) . " ";
          }
        }
    }
    function getProductTags() {
      $posttags = get_the_tags();
        if ($posttags) { foreach($posttags as $tag) {
          echo $tag->slug . ' ';
        }
      }
    }

    if ($product_query -> have_posts()) : while ($product_query -> have_posts()) :
      $product_query -> the_post();
      $post_name = $post->post_name;
      $post_label = str_replace('-', '', $post_name);
      $post_id = get_the_ID();
      $custom_image = get_post_meta( get_the_ID(), 'custom_image_meta_content', true );
      $post_type = $post->post_type;

?>
<article data-type="<?php echo $post_type; ?>" class="column is-3-desktop stem-product-option all-products product-item <?php getProductGrades(); ?> <?php getProductCategories(); ?> <?php getProductTags(); ?>" id="<?php echo $post_id; ?>">
  <input type="checkbox" data-type="<?php echo $post_type; ?>" ng-model="stemProductOption" class="stem-product" name="stemProducts[]" id="<?php echo $post_name; ?>" value="<?php echo $post_id; ?>" />
  <div class="card">
    <div class="product-selected"></div>
    <?php
      $product_icon = get_post_meta(get_the_ID(),'custom_image_meta_content',true);
      if ( !empty( $product_icon) ) {
    ?>
      <img src="<?php echo get_template_directory_uri() . '/inc/ui/' . html_entity_decode($custom_image) . '.svg' ?>" />
    <?php
      } else {
        echo '<img src="' . get_template_directory_uri() . '/inc/ui/default-stem-product.svg" />';
      }
    ?>
    <div class="product-item-details">
      <h2 class="product-title"><?php the_title(); ?></h2>
      <p class="product-grade-band">
        <?php
          // CAPTURE ALL GRADE BAND TERMS AND STORE IN ARRAY
          $grade_list = array();
            foreach(get_the_terms($product_query->post->ID, 'grades') as $grades) {
              $grade_list[] = $grades->name;
            }
          // LOOP THROUGH GRADE BAND ARRAY
          // FIRST LOOP CHECK IF 'Grade K-2' ITEM IS IN ARRAY AND WILL ECHO; WITH A COMA IF SINGLE WITHOUT COMA IF NOT
          // SECOND LOOP CHECK IF 'GRADE K-2' ITEM IS IN ARRAY IF TRUE DON'T ECHO AND ADD COMA TO BEFORE ALL ITEMS IN ARRAY
          $num_of_items = count($grade_list);
          $num_count = 0;
          foreach ($grade_list as $grade) {
            if($grade == 'Grades K-2' && $num_of_items > 1) {
              echo $grade . ", ";
            } else if($grade == 'Grades K-2' && $num_of_items < 1) {
              echo $grade;
            } else if($grade == 'Grades K-2' && $num_of_items == 1) {
              echo $grade;
            }
          }
          foreach ($grade_list as $grade) {
            if($grade != 'Grades K-2') {
              $num_count = $num_count + 1;
              if ($num_count != 1) {
                echo ", ";
              }
              echo $grade;
            }
          }
        ?>
      </p>
      <p class="product-categories">
        <?php
          // CAPTURE ALL GRADE BAND TERMS AND STORE IN ARRAY
          $category_list = array();
          $categories = get_the_category();
            foreach( $categories as $category) {
              if($category->name !== 'CDW-G')
              if($category->name !== 'FAMIS Product')
              if($category->name !== 'Teq Product') {
                $name = $category->name;
                $category_link = get_category_link( $category->term_id );
                $category_list[] = esc_attr($name);
              }
            }
          // LOOP THROUGH GRADE BAND ARRAY AND ECHO RESULTS REMOVING THE LAST COMA FROM THE ARRAY PRINT
          $num_of_items = count($category_list);
          $num_count = 0;
          foreach ($category_list as $category_term) {
            echo $category_term;
            $num_count = $num_count + 1;
              if ($num_count < $num_of_items) {
                echo ", ";
              }
          }
        ?>
      </p>
    </div>
    <button type="button" id="<?php echo $post_name; ?>-details" class="details-btn">View Details</button>
  </div>
</article>
<?php
  endwhile;
    endif;
      wp_reset_postdata();
// END OF PRODUCT QUERY THE POST DATA

  $pathway_args = array(
    'post_type' => 'Pathways',
    'orderby'=> 'title',
    'order' => 'ASC',
    'posts_per_page' => -1,
  );

  $pathway_query = new WP_Query( $pathway_args );

    function getPathwaysGrades() {
      foreach(get_the_terms($pathway_query->post->ID, 'grades') as $grades)
          echo $grades->name . " ";
    }
    function getPathwaysCategories() {
      foreach(get_the_terms($pathway_query->post->ID, 'category') as $category)
        echo $category->name . " ";
    }
    function getPathwaysTags() {
      $posttags = get_the_tags();
        if ($posttags) { foreach($posttags as $tag) {
          echo $tag->slug . ' ';
        }
      }
    }

    if ($pathway_query -> have_posts()) : while ($pathway_query -> have_posts()) :
      $pathway_query -> the_post();
      $post_name = $post->post_name;
      $post_label = str_replace('-', '', $post_name);
      $post_id = get_the_ID();
      $post_type = $post->post_type;

?>
<article data-type="<?php echo $post_type; ?>" class="ng-hide column is-3-desktop pathway-product-option all-products product-item <?php getPathwaysGrades(); ?><?php getPathwaysCategories(); ?><?php getPathwaysTags(); ?>" id="<?php echo $post_id; ?>">
  <input type="checkbox" data-type="<?php echo $post_type; ?>" ng-show="pblProductChoices" class="pathway-product" name="iblockPathways[]" id="<?php echo $post_name; ?>" value="<?php echo $post_id; ?>" />
  <div class="card">
    <div class="product-selected"></div>
    <?php
      $iblock_icon = get_post_meta(get_the_ID(),'iblock_focus_stats_html',true);
      if ( !empty( $iblock_icon) ) {
        echo '<img src="' . get_template_directory_uri() . '/inc/ui/' . html_entity_decode($iblock_icon) . '.svg" />';
      } else {
        echo '<img src="' . get_template_directory_uri() . '/inc/ui/default-iblock-pathway.svg" />';
      }
    ?>
    <div class="product-item-details">
      <h2 class="product-title"><?php the_title(); ?></h2>
      <p class="product-grade-band">
        <?php
          // CAPTURE ALL GRADE BAND TERMS AND STORE IN ARRAY
          $grade_list = array();
            foreach(get_the_terms($product_query->post->ID, 'grades') as $grades) {
              $grade_list[] = $grades->name;
            }
          // LOOP THROUGH GRADE BAND ARRAY
          // FIRST LOOP CHECK IF 'Grade K-2' ITEM IS IN ARRAY AND WILL ECHO; WITH A COMA IF SINGLE WITHOUT COMA IF NOT
          // SECOND LOOP CHECK IF 'GRADE K-2' ITEM IS IN ARRAY IF TRUE DON'T ECHO AND ADD COMA TO BEFORE ALL ITEMS IN ARRAY
          $num_of_items = count($grade_list);
          $num_count = 0;
          foreach ($grade_list as $grade) {
            if($grade == 'Grades K-2' && $num_of_items > 1) {
              echo $grade . ", ";
            } else if($grade == 'Grades K-2' && $num_of_items < 1) {
              echo $grade;
            } else if($grade == 'Grades K-2' && $num_of_items == 1) {
              echo $grade;
            }
          }
          foreach ($grade_list as $grade) {
            if($grade != 'Grades K-2') {
              $num_count = $num_count + 1;
              if ($num_count != 1) {
                echo ", ";
              }
              echo $grade;
            }
          }
        ?>
      </p>
      <p class="product-categories">
        <?php
          // CAPTURE ALL GRADE BAND TERMS AND STORE IN ARRAY
          $category_list = array();
          $categories = get_the_category();
            foreach( $categories as $category) {
              if($category->name !== 'CDW-G')
              if($category->name !== 'FAMIS Product')
              if($category->name !== 'Teq Product') {
                $name = $category->name;
                $category_link = get_category_link( $category->term_id );
                $category_list[] = esc_attr($name);
              }
            }
          // LOOP THROUGH GRADE BAND ARRAY AND ECHO RESULTS REMOVING THE LAST COMA FROM THE ARRAY PRINT
          $num_of_items = count($category_list);
          $num_count = 0;
          foreach ($category_list as $category_term) {
            echo $category_term;
            $num_count = $num_count + 1;
              if ($num_count < $num_of_items) {
                echo ", ";
              }
          }
        ?>
      </p>
    </div>
    <button type="button" id="<?php echo $post_name; ?>-details" class="details-btn">View Details</button>
  </div>
</article>
<?php
  endwhile;
    endif;
      wp_reset_postdata();
// END OF PATHWAYS QUERY POST DATA

  $pd_args = array(
    'post_type' => 'product-and-service',
    'category_name' => 'teq-product',
    'taxonomy' => 'topic',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order'   => 'ASC',
    'tax_query' => array(
      array (
        'taxonomy' => 'topics',
        'field' => 'slug',
        'terms' => 'Professional Development'
      )
    ),
  );

  $pd_query = new WP_Query( $pd_args );

    function getPdGrades() {
      foreach(get_the_terms($pd_query->post->ID, 'grades') as $grades)
        echo $grades->name . " ";
    }
    function getPdCategories() {
      $categories = get_the_category();
        foreach( $categories as $category) {
          if($category->name !== 'CDW-G')
          if($category->name !== 'FAMIS Product')
          if($category->name !== 'Teq Product') {
            $name = $category->name;
            $category_link = get_category_link( $category->term_id );
            echo esc_attr( $name) . " ";
          }
        }
    }
    function getPdTags() {
      $posttags = get_the_tags();
        if ($posttags) { foreach($posttags as $tag) {
          echo $tag->slug . ' ';
        }
      }
    }

    if ($pd_query -> have_posts()) : while ($pd_query -> have_posts()) :
      $pd_query -> the_post();
      $post_name = $post->post_name;
      $post_label = str_replace('-', '', $post_name);
      $post_id = get_the_ID();
      $custom_image = get_post_meta( get_the_ID(), 'custom_image_meta_content', true );
      $post_type = $post->post_type;

?>
<article data-type="<?php echo $post_type; ?>" class="ng-hide column is-3-desktop pd-product-option all-products product-item <?php getPdGrades(); ?><?php getPdCategories(); ?><?php getPdTags(); ?>" id="<?php echo $post_id; ?>">
  <input type="checkbox" data-type="<?php echo $post_type; ?>" class="pd-product" name="professionalDevelopment[]" id="<?php echo $post_name; ?>" value="<?php echo $post_id; ?>" />
  <div class="card">
    <div class="product-selected"></div>
    <?php
      $pd_icon = get_post_meta(get_the_ID(),'custom_image_meta_content',true);
      if ( !empty( $pd_icon) ) {
    ?>
      <img class="pd" src="<?php echo get_template_directory_uri() . '/inc/ui/' . html_entity_decode($custom_image) . '.svg' ?>" />
    <?php
      } else {
        echo '<img src="' . get_template_directory_uri() . '/inc/ui/default-stem-product.svg" />';
      }
    ?>
    <div class="product-item-details">
      <h2 class="product-title"><?php the_title(); ?></h2>
      <p class="product-categories">
        <?php
          if ( $post_name == 'onsite-professional-development' ) {
            echo 'In-person Professional Development';
          } else if ( $post_name == 'otis-for-educators' ) {
            echo 'Online Professional Development';
          } else if ( $post_name == 'virtual-professional-development' ) {
            echo 'Live Virtual Sessions';
          }
        ?>
      </p>
    </div>
    <button type="button" id="<?php echo $post_name; ?>-details" class="details-btn">View Details</button>
  </div>
</article>
<?php
  endwhile;
    endif;
      wp_reset_postdata();
// END OF PROFESSIONAL DEVELOPMENT QUERY POST DATA
?>
