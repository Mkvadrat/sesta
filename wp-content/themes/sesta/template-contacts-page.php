<?php
/*
Template name: Contacts page
*/

get_header(); 
?>
    
    <div class="content">
        <div class="block__contacts">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="table__title"><span><?php echo get_field('title_a_block_contacts_page'); ?></span></div>
                                </td>
                                <td>
                                    <?php echo get_field('wp_textarea_a_block_contacts_page'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table__title"><span><?php echo get_field('title_b_block_contacts_page'); ?></span></div>
                                </td>
                                <td>
                                    <?php echo get_field('text_b_block_contacts_page'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table__title"><span><?php echo get_field('title_c_block_contacts_page'); ?></span></div>
                                </td>
                                <td>
                                    <?php echo get_field('wp_textarea_c_block_contacts_page'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table__title"><span><?php echo get_field('title_d_block_contacts_page'); ?></span></div>
                                </td>
                                <td>
                                    <?php echo get_field('wp_textarea_d_block_contacts_page'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table__title"><span><?php echo get_field('title_e_block_contacts_page'); ?></span></div>
                                </td>
                                <td>
                                    <div id="sevastopol" style="width:100%; height:375px"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table__title"><span><?php echo get_field('title_f_block_contacts_page'); ?></span></div>
                                </td>
                                <td>
                                    <?php echo get_field('wp_textarea_e_block_contacts_page'); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        var sevastopolMap, sevastopolPlacemark, sevastopolcoords;
    
        ymaps.ready(init);
    
        function init() {
    
            sevastopolMap = new ymaps.Map('sevastopol', {
    
                center: [<?php echo get_field('coordinates_e_block_contacts_page'); ?>],
    
                zoom: 17
    
            });
    
            var SearchControl = new ymaps.control.SearchControl({noPlacemark: true});
    
            sevastopolMap.controls
    
            //.add('zoomControl')
    
                .add('typeSelector')
    
            sevastopolcoords = [<?php echo get_field('coordinates_e_block_contacts_page'); ?>];
    
            sevastopolPlacemark = new ymaps.Placemark([<?php echo get_field('coordinates_e_block_contacts_page'); ?>], {}, {
                preset: "twirl#redIcon",
                draggable: true
            });
    
            sevastopolMap.geoObjects.add(sevastopolPlacemark);
    
        }
    </script>
            
<?php get_footer(); ?>