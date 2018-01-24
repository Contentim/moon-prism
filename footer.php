  <footer>
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <div class="c">© <?php echo bloginfo('sitename')?>, <?php echo date("Y") == '2016'?'2016':'2016-'.date("Y");?></div>
        </div>
        <div class="col-xs-6">
          <div class="by">
            Заказ спецтехники по телефону - <?php the_field('contact_phone_header', 7); ?>
          </div>
        </div>
      </div>
    </div>
  </footer>

  

  <?php echo do_shortcode('[contact-form-7 id="26" title="Обратный звонок"]');?>

  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
    var yaParams = {ip_adress: "<? echo $_SERVER['REMOTE_ADDR'];?>"}    //объявляем параметр ip_adress и записываем в него IP посетителя 
  </script>

  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
  <script src="/content/themes/moon-prism/js/ya_map_mkad.js" type="text/javascript"></script>

  <script src="/content/themes/moon-prism/js/jquery.quicksearch.js" type="text/javascript"></script>

  <script>
    $('nput.quick_search').quicksearch('#list_quick_search li');
    
  </script>

  <?php wp_footer(); ?>
  
  <!-- BEGIN JIVOSITE CODE {literal} -->
<!-- <script type='text/javascript'>
(function(){ var widget_id = 'ncqjBO7Xzn';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script> -->
<!-- {/literal} END JIVOSITE CODE -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">(function (d, w, c) {
          (w[c] = w[c] || []).push(function() {
              try {
                  w.yaCounter37085125 = new Ya.Metrika({
                      id:37085125,
                      clickmap:true,
                      trackLinks:true,
                      accurateTrackBounce:true,
                      webvisor:true
                  });
                  w.yaCounter44012149 = new Ya.Metrika({
                      id:44012149,
                      params: window.yaParams,
                      clickmap:true,
                      trackLinks:true,
                      accurateTrackBounce:true,
                      webvisor:true
                  });
              } catch(e) { }
          });

          var n = d.getElementsByTagName("script")[0],
              s = d.createElement("script"),
              f = function () { n.parentNode.insertBefore(s, n); };
          s.type = "text/javascript";
          s.async = true;
          s.src = "https://mc.yandex.ru/metrika/watch.js";

          if (w.opera == "[object Opera]") {
              d.addEventListener("DOMContentLoaded", f, false);
          } else { f(); }
      })(document, window, "yandex_metrika_callbacks");</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44012149" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<script>(function (w, d, c) {
      (w[c] = w[c] || []).push(function() {
          var options = {
              project: 4498862
          };
          try {
              w.top100Counter = new top100(options);
          } catch(e) { }
      });
      var n = d.getElementsByTagName("script")[0],
      s = d.createElement("script"),
      f = function () { n.parentNode.insertBefore(s, n); };
      s.type = "text/javascript";
      s.async = true;
      s.src =
      (d.location.protocol == "https:" ? "https:" : "http:") +
      "//st.top100.ru/top100/top100.js";

      if (w.opera == "[object Opera]") {
      d.addEventListener("DOMContentLoaded", f, false);
  } else { f(); }
  })(window, document, "_top100q");</script>

  <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-100639253-1', 'auto');
    ga('send', 'pageview');</script>

    <script type="text/javascript">var _tmr = window._tmr || (window._tmr = []);
  _tmr.push({id: "2915153", type: "pageView", start: (new Date()).getTime()});
  (function (d, w, id) {
    if (d.getElementById(id)) return;
    var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
    ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
    var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
    if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
  })(document, window, "topmailru-code");</script>

  <script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code=b080515ca3ac80e77f970c8496add70f" charset="UTF-8"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>

  

</body>
</html>
