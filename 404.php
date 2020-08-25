<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */


get_header();?>
<section id="page-404">
<div data-scroll-speed="4" class="text">
<h1 data-aos="fade-left">404</h1>
<h2 data-aos="fade-right">...Oops! Sidan finns inte</h2><br>
<a href="<?php echo home_url(); ?>" data-aos="fade-up">Ta mig tillbaka till startsidan</a>
</div>
</section>
<script>
        (function ($) {
           $(window).on("load", function () {
                AOS.init({
                  disable: function() {
    var maxWidth = 1280;
    return window.innerWidth < maxWidth;
 } 
                });
                window.addEventListener("load", AOS.refresh);
            });
        })(jQuery);
    </script>