<?php

$section_header = get_field( 'section_header' );
$section_description = get_field( 'section_description' );
?>
<div class="container-fluid cybergis-cert cybergis-cert-reasons-section cybergis-cert-background-attr" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/second-section-bg.png');">
    <div class="container">
        <div class="row py-5">
            <h3 class="col-12 text-center"><?php echo $section_header; ?></h3>
            <p class="col-12 text-center py-3"><?php echo $section_description; ?></p>
            <div class="reasons-wrap">
                <div class="row justify-content-center">
                    <?php 
                    // Check rows exists.
                    if( have_rows('reasons') ):
                        while( have_rows('reasons') ) : the_row();
                        $reason = get_sub_field('reason');
                        ?>
                            <div class="col-3 reasons-item">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="<?php echo $reason['icon']; ?>" alt="" class="reasons-item-icon mt-2 mb-1">
                                        <h6 class="card-title  text-center"><?php echo $reason['title']; ?></h6>
                                        <p class="card-text  text-center"><?php echo $reason['description']; ?></p>
                                        <?php $link = get_sub_field('link'); ?>
                                        <a href="<?php echo $reason['link']; ?>" class="btn btn-sm btn-primary"> <i class="fas fa-info-circle"></i> Learn more</a>
                                    </div>
                                </div>
                            </div>
                        <?php // End loop.
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>