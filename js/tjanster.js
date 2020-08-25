/* FLOATING "BLOCKS"/ TEXT */
  $.fn.moveIt = function(){
    var $window = $(window);
    var instances = [];
    $(this).each(function(){
      instances.push(new moveItItem($(this)));
    }); 
    window.onscroll = function(){
      var scrollTop = $window.scrollTop();
      instances.forEach(function(inst){
        inst.update(scrollTop);
      });
    }
  } 
  var moveItItem = function(el){
    this.el = $(el);
    this.speed = parseInt(this.el.attr('data-scroll-speed'));
  }; 
  moveItItem.prototype.update = function(scrollTop){
    var pos = scrollTop / this.speed;
    this.el.css('transform', 'translateY(' + -pos + 'px)');
  };
  $(function(){
    $('[data-scroll-speed]').moveIt();
  });
/* MENU */
var menu = document.getElementsByClassName('fmenu');
$(".menu-wrapper").on('click', function(event){
  $('.fmenu').toggleClass("open");
    $(this).toggleClass("change");
});