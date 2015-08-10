<section class="sitemap-content gvc-clearfix">

  <article class="sitemap-pages sitemap-item col one_quarter">

    <h3 class="sitemap-title"><?php echo __("Pages", TEMP_NAME); ?></h3>

    <ul>
      <?php
        $args = array(
          'depth'        => 0,
          'show_date'    => '',
          'date_format'  => get_option('date_format'),
          'child_of'     => 0,
          'exclude'      => '',
          'include'      => '',
          'title_li'     => null,
          'echo'         => 1,
          'authors'      => '',
          'sort_column'  => 'menu_order, post_title',
          'link_before'  => '',
          'link_after'   => '',
          'walker'       => '',
          'post_type'    => 'page',
          'post_status'  => 'publish' 
        );
        wp_list_pages($args); 
      ?>
    </ul>

  </article>

  <article class="sitemap-blog sitemap-item col one_quarter">

    <h3 class="sitemap-title"><?php echo __("Blog", TEMP_NAME); ?></h3>

    <ul>
      <?php
        $args = array(
          'show_option_all'    => '',
          'orderby'            => 'name',
          'order'              => 'ASC',
          'style'              => 'list',
          'show_count'         => true,
          'hide_empty'         => 1,
          'use_desc_for_title' => 1,
          'child_of'           => 0,
          'feed'               => '',
          'feed_type'          => '',
          'feed_image'         => '',
          'exclude'            => '',
          'exclude_tree'       => '',
          'include'            => '',
          'hierarchical'       => 1,
          'title_li'           => null,
          'show_option_none'   => __('No categories', TEMP_NAME),
          'number'             => null,
          'echo'               => 1,
          'depth'              => 0,
          'current_category'   => 0,
          'pad_counts'         => 0,
          'taxonomy'           => 'category',
          'walker'             => null
        );
        wp_list_categories($args); 
      ?>
    </ul>

  </article>

  <article class="sitemap-portfolio sitemap-item col one_quarter">

    <h3 class="sitemap-title"><?php echo __("Portfolio", TEMP_NAME); ?></h3>

    <ul>
      <?php

        $args_list = array(
          'show_option_all'    => '',
          'orderby'            => 'name',
          'order'              => 'ASC',
          'style'              => 'list',
          'show_count'         => true,
          'hide_empty'         => 1,
          'use_desc_for_title' => 1,
          'child_of'           => 0,
          'feed'               => '',
          'feed_type'          => '',
          'feed_image'         => '',
          'exclude'            => '',
          'exclude_tree'       => '',
          'include'            => '',
          'hierarchical'       => 1,
          'title_li'           => null,
          'show_option_none'   => __('No categories', TEMP_NAME),
          'number'             => null,
          'echo'               => 1,
          'depth'              => 0,
          'current_category'   => 0,
          'pad_counts'         => 0,
          'taxonomy'           => 'portfolio-category',
          'walker'             => null
        );
        wp_list_categories($args_list);
      ?>
    </ul>
  </article>

  <article class="sitemap-faq sitemap-item col one_quarter last-yes">

    <h3 class="sitemap-title"><?php echo __("FAQ", TEMP_NAME); ?></h3>

    <ul>
      <?php

        $args_list = array(
          'show_option_all'    => '',
          'orderby'            => 'name',
          'order'              => 'ASC',
          'style'              => 'list',
          'show_count'         => true,
          'hide_empty'         => 1,
          'use_desc_for_title' => 1,
          'child_of'           => 0,
          'feed'               => '',
          'feed_type'          => '',
          'feed_image'         => '',
          'exclude'            => '',
          'exclude_tree'       => '',
          'include'            => '',
          'hierarchical'       => 1,
          'title_li'           => null,
          'show_option_none'   => __('No categories', TEMP_NAME),
          'number'             => null,
          'echo'               => 1,
          'depth'              => 0,
          'current_category'   => 0,
          'pad_counts'         => 0,
          'taxonomy'           => 'faq-category',
          'walker'             => null
        );
        wp_list_categories($args_list);

      ?>
   </ul>
   
  </article>

</section>
<?php while ( have_posts() ) : the_post(); ?>
  <!-- post start -->
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="page-content gvc-clearfix">
      <?php the_content(); ?>
    </section>

  </article>
  <!-- post end -->
<?php endwhile; ?>