<?php 
/* 
Template Name: Kontakt
*/
get_header();
?>
    <section id="fifth-contact">
  
        <div data-scroll-speed="9" class="text">
            <h1 data-aos="fade-left" data-aos-offset="10">Kontakt</h1>
          <div class="container demo animated">
            <div data-aos="fade-right" >
            <?php echo do_shortcode( '[contact-form-7 id="18" title="Contact form 1"]')?>
</div>
          </div>
        </div>
<br>
        <div class="container demo animated">
            <div data-aos="fade-right" >
                <?php
        // FIRST SECTION (TEXT)
        $phone_no = new WP_Query(array(
            'category_name' => 'Kontakt',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'offset' => 0
        ));
                ?>
                   <?php if ($phone_no->have_posts()) : ?>
            <?php while ($phone_no->have_posts()) : $phone_no->the_post(); ?>
            <?php the_post_thumbnail(); ?> <?php the_content(); ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
</div>
          </div>
        </div>
        
      </section>

   
    <section id="inspo3">
        <div data-scroll-speed="35" class="wrapper">
            <h2 data-aos="fade-down">Inspiration</h2>
            <img data-aos="fade-left" id="prev" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrowleft.svg" alt="Pil som pekar mot vänater">
           <div id="gallery"></div>
            <img data-aos="fade-right" id="next" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrowright.svg" alt="Pil som pekar mot höger">
        </div>
    </section>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/tjanster.js"></script>

<?php get_footer(); ?>