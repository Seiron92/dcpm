<footer id="footer">
        <div class="overlay">
            <div data-aos="zoom-in-up" class="footerSection">
                <h3>Se mer</h3>
                <div class="textleft2">
                <?php wp_nav_menu(array('theme_location'=>'main-menu')); ?>
                </div>
            </div>
            <?php
// FOOTER (OM MIG)
$footer_section = new WP_Query(array(
    'category_name' => 'Footer',
    'post_status' => 'publish',
    'posts_per_page' => 1
));
            ?>
            <div data-aos="zoom-in-up" class="footerSection">
              <?php if ($footer_section->have_posts()) : ?>
                <?php while ($footer_section->have_posts()) : $footer_section->the_post(); ?>
                
                <h3><?php the_title(); ?></h3>
                <div class="textleft">
                <?php the_content();?>
                </div>
            </div>
            <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
            <div data-aos="zoom-in-up" class="footerSection licens">
                    <div class="textleft">
                            <h3>Kontakt</h3>
                            <ul>
                                <li>Daniel Classon Plattsättning & Mureri</li>
                                <li>Org. 810902-3336</li>
                                <li>Skolvägen 9c</li>
                                <li>37373 Jämjö</li>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone.svg" alt="Ikon av en telefon" />
                                    <a href="tel:+0705636374">0705-63 63 74</a>
                                </li>
                                <li>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mail.svg" alt="Ikon av en ett brev" />
                                    <a href="mailto:daniel@dcpm.se">daniel@dcpm.se</a>
                                </li>
                            </ul>
                        </div>
<!--
                <div class="startpageicons">
                    <a href="https://gvk.se" target="blank">
                        <div class="icongestaltung"></div>
                    </a>
                </div>-->
                <!--   <a href="https://www.bkr.se/"><img src="images/bkr.svg" alt="Bygg keramik rådets logotyp"></a>-->
           </div>
        </div>
    </footer>
    <div id="bottomFooter">
        <p>
            &copy; Daniel Classon Plattsättning &
            Mureri&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;A
        </p>
        <a href="https://www.webuals.com">Webuals </a>
        <p>production</p>
    </div>
    </div>
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.0/js/lightbox.min.js"></script>

     <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/ws-scroli.js"></script>

     
<script>
$(document).ready(function () {
  if(window.location.href.indexOf("tjanster") > -1) {
  $('#WS-SL--content').WS_ScroLi({
          validEnd : {
              status  : true,
          },
          sections : [
              ['#second', '<a class="active" href="#second"></a>'],
          ['#seventh', '<a href="#second">Plattsättning</a>'],
          ['#sixth', '<a href="#seventh">Priser</a>'],
          ['#inspo2', '<a href="#sixth">Murning</a>'],
          ['#footer', '<a href="#inspo2">Inspiration</a>'],
          ],
          position : {
              x : ['right', 0],
              y : ['top', 0]
          },
      })
  }else if(window.location.href.indexOf("kontakt") > -1) {
}else {
    $('#WS-SL--content').WS_ScroLi({
  validEnd : {
      status  : true,
  },
  sections : [
      [ '#second', '<a class="active" href="#second"></a>' ],
      [ '#fourth', '<a href="#third">Plattsättning</a>' ],
      [ '#fifth', '<a href="#fourth">Mureri</a>' ],
      [ '#inspo', '<a href="#fifth">Kontakt</a>' ],
      [ '#footer', '<a href="#inspo">Inspiration</a>' ],
    
  ],
  position : {
      x : ['right', 0],
      y : ['top', 0]
  },
});
}})
    </script>
    
</body>

</html>
