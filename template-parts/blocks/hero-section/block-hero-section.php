<?php

$background_image = get_field( 'background_image' );
$header_text = get_field( 'header_text' );
$description = get_field( 'description' );
$call_to_action_button = get_field('call_to_action_button');

?>

<div class="container-fluid cybergis-cert cybergis-cert-hero-wrap cybergis-cert-background-attr" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/hero_bg.png');">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-5 d-flex flex-column justify-content-end h-75">
                <h3><?php echo $header_text; ?></h3>
                <p><?php echo $description; ?></p>
                <a class="btn btn-primary align-self-start" href="#" role="button">Learn More</a>
            </div>
            <div class="col-7 hero-right">
                <img src="<?php echo $background_image; ?>" alt="">
            </div>

        </div>
    </div>
</div>
