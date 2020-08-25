$(window).on("load", function () {

var gallery = document.getElementById('gallery');
var next = document.getElementById('next');
var prev = document.getElementById('prev');
var outer = document.getElementById('holders3');
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        var news = JSON.parse(this.responseText);
var photos = news.photos.photo;


Array.prototype.randomElement = function () {
  return this[Math.floor(Math.random() * this.length)]
}
var x = 1;

        for(var i = 0; i <5; i++){
        gallery.innerHTML += ' <div id="image'+x+++'"><a data-lightbox="image-1" data-title="'+photos[i].title+' Flickr profile credit: '+photos[i].owner+'" href="https://farm'+photos[i].farm+'.staticflickr.com/'+photos[i].server+'/'+photos[i].id+'_'+photos[i].secret+'.jpg"><img data-opt-src src="https://farm'+photos[i].farm+'.staticflickr.com/'+photos[i].server+'/'+photos[i].id+'_'+photos[i].secret+'.jpg" alt="Inspirationsbild på kakel"/></a> </div>'
  }
  var a = 0+5;
  var d = 5+5;
  /* NEXT */
  next.onclick = function(){
  gallery.innerHTML = '';
    x = 1;
a++;
d++;
  for(var i = a; i <d; i++){
a+5;
   gallery.innerHTML += ' <div id="image'+x+++'"><a data-lightbox="image-1" data-title="'+photos[i].title+' Flickr profile credit: '+photos[i].owner+'" href="https://farm'+photos[i].farm+'.staticflickr.com/'+photos[i].server+'/'+photos[i].id+'_'+photos[i].secret+'.jpg"><img data-opt-src src="https://farm'+photos[i].farm+'.staticflickr.com/'+photos[i].server+'/'+photos[i].id+'_'+photos[i].secret+'.jpg" alt="Inspirationsbild på kakel"/></a> </div>'
  }
  }
/* PREVIOUS */
 prev.onclick = function(){
  a--;
  d--;
  gallery.innerHTML = '';
  x = 1;
  for(var i = a; i <d; i++){
    a-5;
   gallery.innerHTML += ' <div id="image'+x+++'"><a data-lightbox="image-1" data-title="'+photos[i].title+' Flickr profile credit: '+photos[i].owner+'" href="https://farm'+photos[i].farm+'.staticflickr.com/'+photos[i].server+'/'+photos[i].id+'_'+photos[i].secret+'.jpg"><img data-opt-src src="https://farm'+photos[i].farm+'.staticflickr.com/'+photos[i].server+'/'+photos[i].id+'_'+photos[i].secret+'.jpg" alt="Inspirationsbild på kakel"/></a> </div>'
}
  }

  
  }
};
xhttp.open("GET" , "https://www.flickr.com/services/rest/?method=flickr.favorites.getList&api_key=190a37f26dac7d4c0731058cdc3f9c9d&user_id=181626111%40N04&format=json&nojsoncallback=1", true);
xhttp.send();

});