jQuery(function($){
  var viewport = ResponsiveBootstrapToolkit;

  function reposition() {
    var modal = $(this),
        dialog = modal.find('.modal-dialog');
    modal.css('display', 'block');
    dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
  }

  $('.modal').on('show.bs.modal', reposition);
  $(window).on('resize', function() {
    $('.modal:visible').each(reposition);
  });

  var map_canvas = document.getElementById('map');
  if (map_canvas) {
    google.maps.event.addDomListener(window, 'load', function() {

      var map_options = {
          center: new google.maps.LatLng(map_canvas.dataset.lat, map_canvas.dataset.lng),
          zoom: 16,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          scrollwheel: true,
          mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.TOP_RIGHT
          },
          styles: [{"featureType":"all","elementType":"geometry.fill","stylers":[{"color":"#f0f0f0"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#000000"},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":"0.75"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ded7c6"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#dcdcdc"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#d0dfc8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#72c1e7"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]}]
      };
      var map = new google.maps.Map(map_canvas, map_options);
      var marker = new google.maps.Marker({
          position: new google.maps.LatLng(map_canvas.dataset.lat, map_canvas.dataset.lng),
          map: map,
          //icon: map_canvas.dataset.icon
      });
    });
  }

  $('#mainslider').sliderPro({
    width: '100%',
    height: 560,
    arrows: true,
    autoplay: true,
    breakpoints:{
      767:{
        height: 320,
        arrows: false,
        buttons: false,
      }
    }
  });
  var pcardArgs = {
    width: '100%',
    height: 224,
    arrows: false,
    buttons: false,
    thumbnailWidth: 70,
    fullScreen: true,
    allowScaleUp: false,
    autoplay:true,
    touchSwipe:false,
  };
  $('#pcard-slider').sliderPro(pcardArgs);

  $(document).on('MSFullscreenChange webkitfullscreenchange mozfullscreenchange fullscreenchange',function(e){
    var state =  document.fullScreen
              || document.mozFullScreen
              || document.webkitIsFullScreen
              || document.MSFullscreenChange;

    if(state === true){
      pcardArgs['arrows'] = true;
      pcardArgs['autoplay'] = false;
      $('#pcard-slider').sliderPro(pcardArgs);
    }else{
      pcardArgs['arrows'] = false;
      pcardArgs['autoplay'] = true;
      $('#pcard-slider').sliderPro(pcardArgs);
    }
  });


  function menudropdows(){
    if(viewport.is('>=sm')) {
      $('.navbar-styled ul.nav li.dropdown').hover(function(){
        $(this).addClass('open');
      }, function(){
        $(this).removeClass('open');
      });
      $('.navbar .nav.navbar-nav').addClass('nav-justified');
    }else{
      $('ul.nav li.dropdown').off('mouseenter mouseleave');
      $('.navbar .nav.navbar-nav').removeClass('nav-justified');
    }
  }

  menudropdows();
  $(window).resize(viewport.changed(menudropdows));

  function isVisible( row, container ){
    var elementTop = $(row).offset().top,
        elementHeight = $(row).height(),
        containerTop = container.scrollTop(),
        containerHeight = container.height();

    return ((((elementTop - containerTop) + elementHeight) > 0) && ((elementTop - containerTop) < containerHeight));
  }
  function vivibleblocks(){
    $('.blockAnimation, .hotline').each(function(){
      if(isVisible($(this), $(window))){
        $(this).addClass('active');
      };
    });
  }
  vivibleblocks();
  $(window).scroll(function(){
    vivibleblocks();
  });

  var homehader = $('.home header');
  var homeslider = $('.home #mainslider');

  function parallax(){
    if($(window).scrollTop() > 560){
      homehader.addClass('absscroll');
      $('section.content').addClass('while');
    }else{
      homehader.removeClass('absscroll');
      $('section.content').removeClass('while');
    }
  }

  var isset_home_slider = homeslider.length != 0;

  if(viewport.is('>=lg') && isset_home_slider) {
    parallax();
  }
  $(window).scroll(function(){
    if(viewport.is('>=lg') && isset_home_slider) {
      parallax();
    }
  });

  $('.eq-item').on('touchstart', function(){
    $(this).hover();
  });

  $(".dropdown-menu > li").on("click",'select',function(e){
    e.stopPropagation();
  });

  $('.navbar-filters select').on('change',function(){
    window.location = $(this).children(':selected').data('href');
  });

  $('#AjaxFilteredShow').on('click','.getcrane', function(e){
    e.preventDefault();

    var name = $(this).data('name');
    var url  = $(this).data('url');

    $('#techtitle').val(name);
    $('#techurl').val(url);

    $('#orderT').modal('show');

  });

  $('.jarallax').jarallax({
      speed: 0.2
  });

});
