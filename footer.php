	</main><!-- body--content -->
		<footer class="site--footer">
			<p>&copy; 2014-<?php echo date("Y"); ?> <?php bloginfo('name'); ?>&trade;</p>
			<nav role="navigation" class="menu__footer">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
			</nav>
		</footer>
       <!--js-->
            <script>
				var acc = document.getElementsByClassName("accordion");
				var i;
				
				for (i = 0; i < acc.length; i++) {
				  acc[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var panel = this.nextElementSibling;
					if (panel.style.maxHeight){
					  panel.style.maxHeight = null;
					} else {
					  panel.style.maxHeight = panel.scrollHeight + "px";
					} 
				  });
				}
            </script>
			<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        <!--end js-->
		<?php wp_footer(); ?>
	</body>
</html>
