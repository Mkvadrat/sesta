<?php
/*
Theme Name: Sesta
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

get_header(); 
?>
    
    <?php $category = get_queried_object(); ?>
    <div class="content">
        <div class="block__2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="title__block"><p><?php echo get_term_meta(get_queried_object()->term_id, 'title_content_block_a_rubric_page', true); ?></p></div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="grid__1">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="button__block">
                                        <?php
                                            $all_categories = get_categories('hide_empty=0&exclude=1');
                                            $category_link_array = array();
                                            foreach( $all_categories as $single_cat ){
                                                if($category->term_id == $single_cat->term_id){
                                                    echo '<a class="active" href="' . get_category_link($single_cat->term_id) . '">' . $single_cat->name . '</a>';
                                                }else{
                                                    echo '<a href="' . get_category_link($single_cat->term_id) . '">' . $single_cat->name . '</a>';
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3"></div>
                    <div class="col-xs-12 col-sm-9">
					<div class="grid__1">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="links__block">
                                        <a href="<?php echo get_field('pricelist_content_block_a_main_page', 13); ?>" class="download__price"><img src="/wp-content/themes/sesta/image/downloadPrice.svg"/><?php echo get_field('title_pricelist_content_block_a_main_page', 13); ?></a>
                                        <?php echo get_field('sub_pricelist_content_block_a_main_page', 13); ?>
                                    </div>
                                </div>
                            </div>
                        </div>						
					</div>
					
                    <?php
                        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'id',
                                    'terms' => array( get_queried_object()->term_id )
                                )
                            ),
                            'post_type' => 'post',
                            'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
                            'paged'          => $current_page,
                            'post_status' => 'publish',
                            'orderby'     => 'date',
                            'order'       => 'DESC'
                        );
            
                        $posts = get_posts( $args );
                        
                        if($posts){
                    ?>
                    <div class="col-xs-12">
                        <div class="products__carousel category__grid">
                            
                            <?php foreach($posts as $post){ ?>
                                <?php
                                    $image_url = get_field('image_single_page', $post->ID);
                                ?>
                                <div class="item">
                                    <a href="<?php echo get_permalink($post->ID); ?>" class="products__inner">
                                        <div class="products__img"
                                             style="background-image: url('<?php echo $image_url ? $image_url : esc_url( get_template_directory_uri() ) . '/image/no_image.jpg'; ?>')"></div>
                                        <div class="products__title"><?php echo $post->post_title; ?></div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php
                    $defaults = array(
                        'type' => 'array',
                        'prev_next'    => True,
                        'prev_text'    => __(''),
                        'next_text'    => __(''),
                    );

                    $pagination = paginate_links($defaults);
                    
                if($pagination){
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="pagination">
                            <?php foreach ($pagination as $pag){ ?>
                                <li class="page-item"><?php echo $pag; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <hr class="hr__full"/>

        <div class="block__content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                        <?php echo get_term_meta(get_queried_object()->term_id, 'wp_textarea_content_block_a_rubric_page', true); ?>
                    </div>
                </div>
            </div>
        </div>
        
         <?php
            $albums = get_term_meta(get_queried_object()->term_id, 'albums_block_rubric_page', true);
            
            $all_data = array();
            
            if($albums){
                foreach($albums as $album){
                    global $nggdb;
                    
                    $data_albums = $nggdb->find_album($album['ngg_id']);
                   
                    $all_data[$album['ngg_id']]['title'] = $data_albums->name;
                    
                    if($data_albums->previewpic){
                        $all_data[$album['ngg_id']]['thumbnail'] = nextgen_esc_url(nggdb::find_image($data_albums->previewpic)->cached_singlepic_file(728, 728, 'crop'));
                    }else{
                        $all_data[$album['ngg_id']]['thumbnail'] = esc_url( get_template_directory_uri() ) . '/image/bg-prod.jpg';
                    }
                    
                    $all_data[$album['ngg_id']]['url'] = get_permalink($data_albums->pageid); 
                }
            }
        ?>
        
        <?php if($all_data){ ?>
        <hr class="hr__full"/>

        <div class="content">
            <div class="block__4">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                            <div class="title__block">
                                <p>Фотогалерея</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <div class="grid__3 grid__gallery">
                                <div class="row">
                                    <?php foreach($all_data as $data){ ?>
                                        <div class="col-xs-12 col-sm-6 col-lg-4">
                                            <div class="item">
                                                <div class="gallery__inner">
                                                    <a href="<?php echo $data['url']; ?>" class="gallery__img" style="background-image: url('<?php echo $data['thumbnail']; ?>')"></a>
                                                    <div class="gallery__title"><?php echo $data['title']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    
<?php get_footer(); ?>