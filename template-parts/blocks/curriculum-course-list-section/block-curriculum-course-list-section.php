<?php
$courses = get_field('courses');
?>

<div class="container-fluid cybergis-cert cybergis-cert-course-list-section cybergis-cert-background-attr" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/course-list-bg.png');">
    <div class="container">
        <div class="row pt-5 pb-3">
            <h3 class="w-100 text-center"><?php the_field('title'); ?></h3>
            <div class="col-6 offset-3">
                <?php the_field('description') ?>
            </div>
        </div>
        <div class="row pb-5">
            <div class="card col-12 card-course-list border-0">
                <div class="row g-0 shadow-sm">
                    <div class="col-5 d-flex flex-column align-items-stretch px-3 py-2" style="background:white;min-height:450px;border-radius:4px 4px 4px 4px;">
                        <div class="nav flex-colum" id="courses-tab" role="tablist" aria-orientation="vertical">

                            <?php 
                                $nav_counter = 0;
                                foreach( $courses as $course ) {
                            ?>
                            <a href="#" class="<?php echo ($nav_counter==0) ? 'active' :''; ?> py-1" id="tab<?php echo $nav_counter; ?>-tab" data-bs-toggle="tab" data-bs-target="#tab<?php echo $nav_counter; ?>" role="tab" aria-controls="tab<?php echo $nav_counter; ?>" aria-selected="<?php echo ($nav_counter==0) ? 'true' : 'false'; ?>">
                                <strong><?php echo $course['course_name']; ?></strong> <br>
                                <small><?php echo $course['course_code']; ?> (<?php echo $course['credit_hours']; ?> Credit Hours)</small>
                            </a>
                            <?php
                                $nav_counter++;
                                } 
                            ?>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-stretch" style="background:var(--orange-color);border-radius:0px 4px 4px 0px;">
                    <div class="tab-content" id="v-pills-tabContent">
                        <?php 
                            $contain_counter = 0;
                            foreach( $courses as $course ) {
                        ?>
                            <div class="p-5 tab-pane fade <?php echo ($contain_counter==0) ? 'active show' :''; ?>" id="tab<?php echo $contain_counter; ?>" role="tabpanel" aria-labelledby="tab<?php echo $contain_counter; ?>">
                                <h3 class="pb-2"><?php echo $course['course_code']." | ".$course['course_name']; ?></h3>
                                <?php echo $course['course_description']; ?>
                            </div>
                        <?php 
                            $contain_counter++;
                            } 
                        ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>