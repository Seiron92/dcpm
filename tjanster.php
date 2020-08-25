<?php
/* 
Template Name: Tjänster
*/
get_header();
?>
<section id="second">
    <div data-scroll-speed="4" class="text6">
        <?php
        if (have_posts()) :
            ?><h1 data-aos="fade-down"> <?php echo the_title(); ?> </h1>
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif; ?>
        <?php
        // FIRST SECTION (TEXT)
        $first_section_text = new WP_Query(array(
            'category_name' => 'Tjänster',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'offset' => 0
        ));
        $first_section_list = new WP_Query(array(
            'category_name' => 'Tjänster',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'offset' => 1
        ));
        $first_section_img = new WP_Query(array(
            'category_name' => 'Tjänster',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'offset' => 2
        )); ?>
        <?php if ($first_section_text->have_posts()) : ?>
            <?php while ($first_section_text->have_posts()) : $first_section_text->the_post(); ?>
                <h2 data-aos="fade-right">
                    <?php the_title(); ?>
                </h2>
                <div data-aos="fade-up">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php if ($first_section_list->have_posts()) : ?>
            <?php while ($first_section_list->have_posts()) : $first_section_list->the_post(); ?>
                <h3 data-aos="fade-right"><?php the_title(); ?></h3>
                <div data-aos="fade-up">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php if ($first_section_img->have_posts()) : ?>
        <?php while ($first_section_img->have_posts()) : $first_section_img->the_post(); ?>
            <div data-aos="fade-right" data-scroll-speed="3" id="tiler1"><?php the_content(); ?></div>
            <div data-scroll-speed="1" id="tiler2"><?php the_post_thumbnail(); ?></div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</section>
<!--PRICE SECTION -->
<?php
/* DIAGRAM SHADOW */
$seventh_section_diagram = new WP_Query(array(
    'category_name' => 'Tjänster',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'offset' => 5

));
/* DIAGRAM  */
$seventh_section_lp = new WP_Query(array(
    'category_name' => 'Tjänster',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'offset' => 6

));
// SEVENTH SECTION (TEXT)
$seventh_section_hp = new WP_Query(array(
    'category_name' => 'Tjänster',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'offset' => 7

));
// SEVENTH SECTION (MIDDLE PARANTHESES)
$seventh_section_middle_parantheses = new WP_Query(array(
    'category_name' => 'Tjänster',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'offset' => 8
));
// SEVENTH MIDDLE (TEXT)
$seventh_section_text = new WP_Query(array(
    'category_name' => 'Tjänster',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'offset' => 9
));
?>
<section id="seventh">
    <?php if ($seventh_section_diagram->have_posts()) : ?>
        <?php while ($seventh_section_diagram->have_posts()) : $seventh_section_diagram->the_post(); ?>
            <h2 data-aos="fade-down"><?php the_title(); ?></h2>
            <div data-scroll-speed="37" class="sec-left threes">
                <div data-aos="fade-left" id="month"><?php the_content(); ?></div>
                <div data-scroll-speed="5" id="month2"><?php the_post_thumbnail(); ?></div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
    <!--MIDDLE SECTION -->
    <div data-scroll-speed="37" class="sec-center threes">
        <?php if ($seventh_section_lp->have_posts()) : ?>
            <?php while ($seventh_section_lp->have_posts()) : $seventh_section_lp->the_post(); ?>
                <div data-aos="fade-down" class="dot"><?php the_post_thumbnail(); ?></div>
                <div data-aos="fade-down"><?php the_content(); ?></div><br>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php if ($seventh_section_hp->have_posts()) : ?>
            <?php while ($seventh_section_hp->have_posts()) : $seventh_section_hp->the_post(); ?>
                <div class="dot" data-aos="fade-up"><?php the_post_thumbnail(); ?></div>
                <div class="inline" data-aos="fade-up"><?php the_content(); ?></div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php if ($seventh_section_middle_parantheses->have_posts()) : ?>
            <?php while ($seventh_section_middle_parantheses->have_posts()) : $seventh_section_middle_parantheses->the_post(); ?>
                <div data-aos="fade-up"> <?php the_content(); ?></div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
    <!--PRICE TEXT -->
    <div data-scroll-speed="37" class="threes last-in-threes">
        <?php if ($seventh_section_text->have_posts()) : ?>
            <?php while ($seventh_section_text->have_posts()) : $seventh_section_text->the_post(); ?>
                <div data-aos="fade-right">
                    <?php the_content(); ?> <?php the_post_thumbnail(); ?>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
<?php
$second_section_img = new WP_Query(array(
    'category_name' => 'Tjänster',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'offset' => 3
));
$second_section_text = new WP_Query(array(
    'category_name' => 'Tjänster',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'offset' => 4
));
?>
<!--MASONRY -->
<section id="sixth">
    <img id="triangle2" alt="Ikon av en triangel" src="<?php echo get_stylesheet_directory_uri(); ?>/images/triangle2.svg">
    <?php if ($second_section_img->have_posts()) : ?>
        <?php while ($second_section_img->have_posts()) : $second_section_img->the_post(); ?>
            <div data-aos="fade-right" data-scroll-speed="7" id="mason1"><?php the_content(); ?></div>
            <div data-scroll-speed="3" id="mason2"><?php the_post_thumbnail(); ?></div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <div data-scroll-speed="15" class="text7">
        <?php if ($second_section_text->have_posts()) : ?>
            <?php while ($second_section_text->have_posts()) : $second_section_text->the_post(); ?>
                <h2 data-aos="fade-right"><?php the_title(); ?></h2>
                <div data-aos="fade-up">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
<!--INSPIRATION SECTION -->
<section id="inspo2">
    <div data-scroll-speed="37" class="wrapper">
        <h2 data-aos="fade-down">Inspiration</h2>
        <img data-aos="fade-left" id="prev" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrowleft.svg" alt="Pil som pekar mot vänater">
        <div id="gallery"></div>
        <img data-aos="fade-right" id="next" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrowright.svg" alt="Pil som pekar mot höger">
    </div>
</section>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/tjanster.js"></script>

<?php get_footer(); ?>
