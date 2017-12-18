<!-- Footer -->
<footer class="footer">
  <div class="row full-width" data-equalizer>
	  <div class="small-12 medium-4 large-4 columns" data-equalizer-watch >
		  <h4>STMIK WIDYA UTAMA</h4>
			<p>Jl. Soewatio No. 9A Purwokerto Selatan
		  <br>Banyumas Jawa Tengah 53145
		  <br>
		  <br><i class="fa fa-map-marker"></i><a href="http://swu.ac.id/map">View on Map</a>
		  <br><i class="fa fa-phone"></i>Hotline : (0281) 632399
		  <br><i class="fa fa-fax"></i>Fax : (0281) 632399
		  <br><i class="fa fa-envelope"></i>Email : info.kampus@swu.ac.id</p>
	  </div>
	  <div class="small-12 medium-4 large-4 columns" data-equalizer-watch>
	  
		  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Footer Tengah') ) : else : ?>
		  <h4>PROGRAM STUDI</h4>
		  <ul class="footer-links">
			  <li><i class="fa fa-angle-right"></i><a href="#">S1 Teknik Informatika</a></li>
			  <li><i class="fa fa-angle-right"></i><a href="#">S1 Sistem Informasi</a></li>
			  <li><i class="fa fa-angle-right"></i><a href="#">D3 Teknik Informatika</a></li>
			  <li><i class="fa fa-angle-right"></i><a href="#">D3 Komputerisasi Akuntansi</a></li>
		  </ul>
		  <?php endif; ?>  
		 
	  </div>
	  <div class="small-12 medium-4 large-4 columns" data-equalizer-watch>
		  
		  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Footer Kanan') ) : else : ?>
		  <h4>FOLLOW US</h4>
		  <ul class="footer-links">
			  <li><i class="fa fa-fesbuk"></i><a href="http://facebook.com/stmik.wu" target="_blank">Facebook</a></li>
			  <li><i class="fa fa-rss"></i><a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a></li>
		  </ul>
		  <?php endif; ?>
	  </div>
</div>
</footer>
<footer class="footer footer-bottom">
<div class="row full-width">
<div class="small-12 medium-12 large-12 columns">
© 1998 - 2014 Widya Utama School of Computer and Informatics Management.
</div>
</div>
</footer>
    
<script>
	$(document).foundation();
</script>
</body>
</html>