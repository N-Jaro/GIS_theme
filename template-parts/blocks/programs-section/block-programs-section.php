<?php
// $section_header = get_field( 'programs' );
$section_description = get_field( 'application_block' );
$cooperate_engagements_block = get_field('cooperate_engagements_block');

?>
<div class="container-fluid cybergis-cert cybergis-cert-programs-section cybergis-cert-background-attr" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/programs-section-bg.png');">
    <div class="container">
        <div class="row py-5">
            <div class="row">
            <?php
            if( have_rows('programs') ):
                while( have_rows('programs') ) : the_row();
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $link = get_sub_field('link');
                ?>
                <div class="col-4 program-item d-flex align-items-stretch">
                    <div class="card card-1 shadow" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/program-bg-1.png');">
                        <div class="card-body">
                            <h3 class="card-title mb-4"><?php echo $title; ?></h3>
                            <p class="card-text mb-4"><?php echo $description; ?></p>
                            <a href="<?php echo $link['url']; ?>" class="btn btn-md btn-primary"><?php echo $link['title']; ?></a>
                        </div>
                    </div>
                </div>
                <?php // End loop.
                endwhile;
            endif;
            ?>
                <div class="col-4 program-item d-flex align-items-stretch">
                    <div class="card card-application shadow ">
                        <div class="card-body">
                            <h3 class="card-title mb-2"><?php echo $section_description['title']; ?></h3>
                            <p><small><?php echo $section_description['applicaiton_open_text']; ?></small></p>
                            <p class="card-text mb-4"><?php echo $section_description['description']; ?></p>
                            <?php $link = get_sub_field('link'); ?>
                            <a href="<?php echo $reason['link']; ?>" class="btn btn-md btn-primary">Request Information</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  py-5">
            <div class="card col-12 card-coop-engagement text-center">
                <div class="row g-0">
                    <div class="col-7 d-flex flex-column align-items-stretch p-4" style="background:white;height:450px;border-radius:4px 4px 4px 4px;">
                        <h3 class="card-title mb-4" style="color:var(--orange-color);"><?php echo $cooperate_engagements_block['title']; ?></h3>
                        <?php echo $cooperate_engagements_block['description']; ?>
                    </div>
                    <div class="col-5 d-flex align-items-stretch coop-engagement-right" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/coop-engagement.png');border-radius:0px 4px 4px 0px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>