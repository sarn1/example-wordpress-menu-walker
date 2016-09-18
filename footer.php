<?php wp_footer(); ?>

<footer>
    <?php dynamic_sidebar('Footer'); ?>
    <p class="copyright">&copy;<?php echo date("Y"); ?> <?php  echo get_bloginfo();  ?>. All rights reserved. <a rel="nofollow" href="http://www.webvolutionchicago.com" target="_blank">Designed by Webvolution</a></p>
</footer>

<script type="text/javascript"><?php
	$client = 'UA-55792209-1';
	$webv = 'UA-32663257-22';
?>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', '<?=$client?>', 'auto');ga('send', 'pageview');var _gaq = _gaq || [];_gaq.push(['_setAccount', '<?=$webv?>']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script></body></html>