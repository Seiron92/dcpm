<?php 
get_header();
if (have_posts()) :
?><h1> <?php echo the_title(); ?> </h1>
<?php
echo '<section id="second">
<div data-scroll-speed="4" class="text">';
   while (have_posts()) :
     ?><h1><?php the_title();?></h1><?php
      the_post();
      the_content();
   endwhile;
endif;
echo '            </div>
</section>';?>

<section id="fifth">
       <div data-scroll-speed="12" class="text">
         <h2 data-aos="fade-left" data-aos-offset="10">Kontakt</h2>
         <div class="container demo animated">
           <div data-aos="fade-right">
          <?php echo do_shortcode( '[contact-form-7 id="95" title="Contact form 1"]')?>
</div>
         </div>
       </div>
     </section>
 
     <section id="inspo">
       <div data-scroll-speed="47" class="wrapper">
           <h2>Inspiration</h2>
           <img data-aos="fade-left" id="prev" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrowleft.svg" alt="Pil som pekar mot vänater">
        <div id="gallery"></div>
        <img data-aos="fade-right" id="next" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrowright.svg" alt="Pil som pekar mot höger">
    </div>
     </section>

<?php

get_footer(); 

?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/tjanster.js"></script>