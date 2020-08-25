<?php 
/* 
Template Name: Startsida
*/
get_header();

// FIRST SECTION (PRESENTATION)
$first_section = new WP_Query(array(
    'category_name' => 'Startsidan',
    'post_status' => 'publish',
    'posts_per_page' => 1
));
// FIRST SECTION (CITIES)
$first_section_cities = new WP_Query(array(
  'category_name' => 'Cities',
  'post_status' => 'publish',
  'posts_per_page' => 1
));
?>
 <section id="second">
<?php if ($first_section->have_posts()) : ?>
    <?php while ($first_section->have_posts()) : $first_section->the_post(); ?>
    <div data-scroll-speed="4" class="text">
              <h1 data-aos="fade-up"><?php the_title(); ?> </h1>
              <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php if ($first_section_cities->have_posts()) : ?>
    <?php while ($first_section_cities->have_posts()) : $first_section_cities->the_post(); ?>
              <div data-aos="fade-right">
              <?php the_content();?>
</div>
         <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
         <?php if ($first_section->have_posts()) : ?>
    <?php while ($first_section->have_posts()) : $first_section->the_post(); ?>
         <div data-aos="fade-up"><?php the_content();?></div>
           
            <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
</div>
     </section>
     <?php
     // SECOND SECTION (IMAGES, TILE AND SHADOW)
$cicle2 = new WP_Query(array(
  'category_name' => 'Bilder',
  'post_status' => 'publish',
  'posts_per_page' => 1
));
$cicle1 = new WP_Query(array(
  'category_name' => 'Bilder',
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'offset' => 1
));
     ?>

    
       <section id="third">
       <img alt="ikon av en triangel" id="triangle" src="<?php echo get_stylesheet_directory_uri(); ?>/images/triangle.svg">
       <?php if ($cicle1->have_posts()) : ?>
    <?php while ($cicle1->have_posts()) : $cicle1->the_post(); ?>
    
      <div id="circles2"  data-scroll-speed="2"
         data-aos="fade-up">
         <?php the_content();?>
      </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php if ($cicle2->have_posts()) : ?>
    <?php while ($cicle2->have_posts()) : $cicle2->the_post(); ?>
      <div data-scroll-speed="3" id="circles" data-aos="fade-up">
 <?php the_content();?>
</div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>



<?php
// SECOND SECTION TEXT
$second_section = new WP_Query(array(
    'category_name' => 'Startsidan',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'offset' => 1
));
?>
<?php if ($second_section->have_posts()) : ?>
    <?php while ($second_section->have_posts()) : $second_section->the_post(); ?>
    <div data-scroll-speed="5" class="text2">
    <h2 data-aos="fade-right"><?php the_title(); ?> </h2>
         <div data-aos="fade-up"><?php the_content();?></div>
            <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
</div>
</section>

<?php
// THIRD SECTION TEXT
$third_section = new WP_Query(array(
    'category_name' => 'Startsidan',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'offset' => 2
));
?>

      
<?php if ($third_section->have_posts()) : ?>
    <?php while ($third_section->have_posts()) : $third_section->the_post(); ?>
     <section id="fourth">
       <video autoplay muted loop id="myVideo" preload="auto">
         <source src="<?php echo get_stylesheet_directory_uri(); ?>/images/animation.mp4" type="video/mp4" />
       </video>
       <div class="text3">
         <h2 data-scroll-speed="7">
         <?php the_title(); ?>
         </h2>
         <div data-scroll-speed="7">
         <?php the_content();?>
</div>
<?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
       </div>
     </section>
 
     <section id="fifth">
       <div data-scroll-speed="12" class="text">
         <h2 data-aos="fade-left" data-aos-offset="10">Kontakt</h2>
         <div class="container demo animated">
           <div data-aos="fade-right">
          <?php echo do_shortcode( '[contact-form-7 id="18" title="Contact form 1"]')?>
</div>
         </div>
       </div>
     </section>
 
     <section id="inspo">
       <div data-scroll-speed="47" class="wrapper">
           <h2 data-aos="fade-down">Inspiration</h2>
           <img data-aos="fade-left" id="prev" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrowleft.svg" alt="Pil som pekar mot vänater">
       <div id="gallery"></div>
    
        <img data-aos="fade-right" id="next" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrowright.svg" alt="Pil som pekar mot höger">
       </div>
     </section>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/index.js"></script>

<?php get_footer(); ?>




  