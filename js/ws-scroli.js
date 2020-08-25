
    if ($(window).width() > 1180) {
($ =>
    {   
        $.fn.WS_ScroLi = function(options)
        {            
            options = $.extend({}, $.fn.WS_ScroLi.options, options);

            createScroLiDOM();
            const app = $('#WS-ScroLi');
            const content = this;

            let elems = [];
            for (let i = 0; i < options.sections.length; i++) { elems.push( $(options.sections[i][0]) ); }
            style();
           placeApp();
            
            return this.each(function() {
                // style lines on loading page
                styleLineToLoad();
                document.addEventListener('scroll', ()=> {
                    fixeScroLi();
                    calcDist(); 
                    cleanLineAnimation();
                });
                
            });

            function fixeScroLi() {
                let top = options.position.y[1];
                if ( $(document).scrollTop() + top > content.offset().top + top ) {
                    app.css('top', `${top}%`).addClass('fixed').removeClass('absolute');
                } else {
                    app.css('top', `${content.offset().top + top}%`).removeClass('fixed').addClass('absolute');
                }
            }

            function calcDist() {
                let scroll = $(document).scrollTop() + window.innerHeight;
                for (let i = 0; i < elems.length; i++) {
                    let topElem = elems[i].offset().top;
                    let h_elem = elems[i].height();
                    let index = i+1;
                    // for items ( i=0, index=1 : .item-index)
                    if ( scroll > topElem ) {
                        // si dans la section
                        if ( scroll < topElem + h_elem ) {
                            app.find(`.item-${index}`).addClass(['current','reading']).removeClass('past');
                            app.find(`.item-${index}`).css( returnIcon( 'current' ) )
                                .find('.icon').css( 'color', options.icon.color );
                            lineAnimation( app.find(`.item-${index}`) );
                        }
                        else if ( scroll > topElem + h_elem ) {
                            app.find(`.item-${index}`).removeClass('current').addClass('past').css( returnIcon( 'past' ) )
                                .find('.icon').css( 'color', options.icon.colorPast );
                        }
                    } else if ( scroll < topElem ) {
                        app.find(`.item-${index}`).removeClass(['current', 'reading', 'past']).css( returnIcon( 'off' ) )
                            .find('.icon').css( 'color', options.icon.colorOff );
                    }
                    // for last (check icon) 
                    // quand dépasse avant-dernière section  =>  item-(length sections) + 1
                    if ( scroll > elems[elems.length-1].offset().top + elems[elems.length-1].height() ) {
                        app.find(`.item-${elems.length+1}`).addClass(['reading', 'current', 'past']).css( returnIcon( 'current' ) )
                            .find('.icon').css( 'color', options.icon.color );
                    }
                    else {
                        app.find(`.item-${elems.length+1}`).removeClass(['reading', 'current', 'past']).css( returnIcon( 'off' ) )
                            .find('.icon').css( 'color', options.icon.colorOff );
                    }
                }
            }

            function lineAnimation( item ) {
                let line = item.find('.line-animation');
                let val = 0;
                item.hasClass('reading') ? val = calcPercent(item) : val = 0
                line.css('background', `linear-gradient( ${options.line.color}, ${options.line.color} ${val}%, ${options.line.colorOff} 0%, ${options.line.colorOff} 100% )`);
            }
            function calcPercent(item) {
                let elem = elems[item.index()];
                let h_elem = elem.height();

                let scroll = ($(document).scrollTop() + window.innerHeight) - elem.offset().top;
                let percent = (scroll*100) / h_elem;
                
                if ( $(document).scrollTop() <= elem.offset().top + window.innerHeight ) {
                    return percent;
                } else {
                    return 100;
                }
            }

            function cleanLineAnimation() {
                // if after content all icons past
                let scroll = $(window).scrollTop() + window.innerHeight;
                let lastScroll = elems[elems.length-1].height() + elems[elems.length-1].offset().top;
         
                
                if ( scroll > lastScroll ) {
                    app.find('[class^="item-"]').removeClass('current').addClass('past').css( returnIcon('past') )
                        .find('.icon').css('color', options.icon.colorPast);
                }
                
                // for each scrolling
                for (let i = 0; i < elems.length; i++) {
                    let index = i+1;
                    let ref_i = null;
                    let item = app.find(`.item-${index}`);
                    let line = item.find('.line-animation');
                    if ( item.hasClass('reading') ) { ref_i = item.index(); }
                    if ( i < ref_i ) { line.css('background', returnLinear(100) ); }  // si dans section après
                    else if ( i > ref_i ) { line.css('background', returnLinear(0) ); } // si dans section avant
                }
                // for rest to fast scrolling
                for (let i = 0; i < elems.length; i++) {
                    let item = app.find(`.item-${i+1}`);
                    let line = item.find('.line-animation');
                    if ( !item.hasClass('reading') ) { 
                        line.css('background', returnLinear(0) );
                        if ( item.hasClass('past') ) { line.css('background', options.line.colorPast); } // if past
                    } 
                    if ( item.hasClass('reading') && !item.hasClass('current') ) { line.css('background', returnLinear(100) ); } // if past and not current
                }
            }

            ////////////////////////////////////////
            ////////////////    DOM    /////////////
            ////////////////////////////////////////
         
            function createScroLiDOM() {
                $('body').prepend('<div id="WS-ScroLi"></div>');
                $.each(options.sections, (i)=> {
                    $('#WS-ScroLi').append(`
               
                        <span class="item-${i+1}">
                        <div class="scroll-menu">
                        <div id="menu-center">
                        <ul>
                            <li class="move">${options.sections[i][1]}</li> 
                            <span class="line"></span>
                            <span class="line-animation"></span>
                            </ul>
                            </div>
                            </div>
                        </span>
                    
                    `);
                });
          
            }
            ////////////////////////////////////////
            /////////////   STYLIZER    ////////////
            ////////////////////////////////////////
            function returnLinear(val) {
                if ( val === 100 ) {
                    return options.line.colorPast;
                }
                return `linear-gradient( ${options.line.color}, ${options.line.color} ${val}%, ${options.line.colorOff} 0%, ${options.line.colorOff} 100% )`
            }
            
            function returnIcon(status) {
                let color = null;
                if ( status === 'current' ) {
                    color = options.icon.color;
                } else if ( status === 'off' ) {
                    color = options.icon.colorOff;
                } else if ( status === 'past' ) {
                    color = options.icon.colorPast;
                }
                return { 
                    'color'         : color,
                    'box-shadow'    : `0 0 0 ${options.icon.borderWidth}px ${color} inset`
                }
            }

            ////////////////////////////////////////
            /////////////  STYLE  INIT  ////////////
            ////////////////////////////////////////
            function style() {
                styleApp();
                styleIcon();
                styleLine();
            } 

            function styleLine() {
                let line = options.line;
                app.find('.line, .line-animation').css({
                    'height'        : `${line.height - (options.icon.borderWidth*2)}px`,
                    'width'         : `${line.width}px`,
                    'left'          : `${options.icon.size/2 - line.width/2}px`,
                    'background'    : `${line.colorOff}`,
                    'top'           : `${options.icon.size}px`
                });
            }

            function styleLineToLoad() {
                // get scrollTop value
                $(document).scroll(function() {
                    let scroll = $(window).scrollTop() + window.innerHeight;
                    // if content past => all lines past status
                    if ( scroll > content.offset().top + content.height() ) {
                        app.find('[class^="item-"]').addClass('past').find('.line-animation').css('background', options.line.colorPast);
                    } 
                    // if inside content => loop elems of content
                    else if ( scroll < content.offset().top + content.height() && scroll >= content.offset().top ) {
                        for (let i = 0; i < elems.length; i++) {
                            if ( scroll > elems[i].offset().top + elems[i].height() ) {
                                app.find(`[class^="item-${i+1}"]`).addClass('past').find('.line-animation').css('background', options.line.colorPast);   
                            }   
                        }
                    }
                });
            }

            function styleIcon() {
                app.find('[class^="item-"]').css({
                    'margin-bottom' : `${options.line.height - (options.icon.borderWidth*2)}px`,
                    'width'         : `${options.icon.size}px`,
                    'height'        : `${options.icon.size}px`,
               'float' : 'left'
                })
            }

            function placeApp() {
                let y = options.position.y;
                let x = options.position.x;
                app.css(y[0], `${y[1] + content.offset().top}px`).css(x[0], `${x[1]}px`);
            }
            function styleApp() {
                app.css('width', `1px`)
       
            }

        };
        ////////////////////////////////////////
        //////////////   OPTIONS   /////////////
        ////////////////////////////////////////
        $.fn.WS_ScroLi.options = {
            validEnd : {
                status      : false,
                icon        : 'hej'
            },
            // validEnd : true,
            // validEndIcon : 'far fa-check',
        
            icon : {
                size        : 26,
                borderWidth : 0,
                borderRadius: 0,
                color       : 'orange',
                colorPast   : 'green',
                colorOff    : 'grey',
    
            },
            line : {
                height      : 30,
                width       : 3,
                color       : 'grey',
                colorPast   : 'grey',
                colorOff    : 'white',
            },
          

        };
    })(jQuery);
    
    }
    
$(document).ready(function () {

    /* CHANGE LOGO IF WINDOW WIDTH LESS THAN 1180px */
    if ($(window).width() > 1180) {
  /*$("#logo").html('<img alt="Daniel Classon plattsättning och mureri logotyp" src="https://dcpm.se/wp-content/uploads/2019/06/logo.svg" />')*/
    }
    })
    
    $(document).ready(function () {
      $(document).on("scroll", onScroll);
      
      //smoothscroll
      $('a[href^="#"]').on('click', function (e) {
          e.preventDefault();
          $(document).off("scroll");
          
          $('a').each(function () {
              $(this).removeClass('active');
          })
          $(this).addClass('active');
        
          var target = this.hash,
              menu = target;
          $target = $(target);
          $('html, body').stop().animate({
              'scrollTop': $target.offset().top+2
          }, 500, 'swing', function () {
              window.location.hash = target;
              $(document).on("scroll", onScroll);
          });
      });
    });
    
    function onScroll(event){
      var scrollPos = $(document).scrollTop();
      $('#menu-center a').each(function () {
          var currLink = $(this);
          var refElement = $(currLink.attr("href"));
          if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
              $('#menu-center ul li a').removeClass("active");
              currLink.addClass("active");
         
          }
          else{
              currLink.removeClass("active");
          }
      });
    
    }
    
    $(window).on("load", function () {

  var gallery = document.getElementById('gallery');
  var next = document.getElementById('next');
  var prev = document.getElementById('prev');
  var outer = document.getElementById('holders3');
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var news = JSON.parse(this.responseText);
      var photos = news.photos.photo;
      var x = 1;

      for (var i = 0; i < 5; i++) {
        gallery.innerHTML += ' <div id="image' + x++ + '"><a data-lightbox="image-1" data-title="' + photos[i].title + ' Flickr profile credit: ' + photos[i].owner + '" href="https://farm' + photos[i].farm + '.staticflickr.com/' + photos[i].server + '/' + photos[i].id + '_' + photos[i].secret + '.jpg"><img data-opt-src src="https://farm' + photos[i].farm + '.staticflickr.com/' + photos[i].server + '/' + photos[i].id + '_' + photos[i].secret + '.jpg" alt="Inspirationsbild på kakel"/></a> </div>'
      }
      var a = 0 + 5;
      var d = 5 + 5;
      /* NEXT */
      next.onclick = function () {
        gallery.innerHTML = '';
        x = 1;
        a++;
        d++;
        for (var i = a; i < d; i++) {
          a + 5;
          gallery.innerHTML += ' <div id="image' + x++ + '"><a data-lightbox="image-1" data-title="' + photos[i].title + ' Flickr profile credit: ' + photos[i].owner + '" href="https://farm' + photos[i].farm + '.staticflickr.com/' + photos[i].server + '/' + photos[i].id + '_' + photos[i].secret + '.jpg"><img data-opt-src src="https://farm' + photos[i].farm + '.staticflickr.com/' + photos[i].server + '/' + photos[i].id + '_' + photos[i].secret + '.jpg" alt="Inspirationsbild på kakel"/></a> </div>'
        }
      }
      /* PREVIOUS */
      prev.onclick = function () {
        a--;
        d--;
        gallery.innerHTML = '';
        x = 1;
        for (var i = a; i < d; i++) {
          a - 5;
          gallery.innerHTML += ' <div id="image' + x++ + '"><a data-lightbox="image-1" data-title="' + photos[i].title + ' Flickr profile credit: ' + photos[i].owner + '" href="https://farm' + photos[i].farm + '.staticflickr.com/' + photos[i].server + '/' + photos[i].id + '_' + photos[i].secret + '.jpg"><img data-opt-src src="https://farm' + photos[i].farm + '.staticflickr.com/' + photos[i].server + '/' + photos[i].id + '_' + photos[i].secret + '.jpg" alt="Inspirationsbild på kakel"/></a> </div>'
        }
      }
    }
  };
  xhttp.open("GET", "https://www.flickr.com/services/rest/?method=flickr.favorites.getList&api_key=190a37f26dac7d4c0731058cdc3f9c9d&user_id=181626111%40N04&format=json&nojsoncallback=1", true);
  xhttp.send();

});
/* HIDE SCROLL INDICATOR IF USERS SCROLL, REVEAL IF USER IS ON DOCUMENT TOP */
$(window).scrollTop()
$(window).scroll(function () {
    $('.scroll-down').hide();
    if ($(window).scrollTop() === 0) {
        $('.scroll-down').show();
    }
});