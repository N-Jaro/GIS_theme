<?php
    //  $description = get_field('description');
    $title = get_field('title') ? get_field('title'):get_the_title();
?>

<div class="container-fluid cybergis-cert cybergis-cert-page-header-wrap cybergis-cert-background-attr p-3" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/page-header.png');">
    <div class="container h-100">
        <div class="row h-100">
            <h3 class="w-100 text-center"><?php echo $title; ?></h3>
            <div class="col-11 offset-1 text-center"><?php the_field('description') ?></div>
        </div>
    </div>
</div>