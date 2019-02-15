		</div>
		<footer class="site--footer">
			<p>&copy; 2014-<?php echo date("Y"); ?> <?php bloginfo('name'); ?>&trade;</p>
			<nav role="navigation" class="menu__footer">
				<?php wp_nav_menu(
					array $args = array(
						'menu'              => "Main navigation", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
						'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
						'container_class'   => "menu-header", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
						'fallback_cb'       => "", // (callable|bool) If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
						'theme_location'    => "main-navigation", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
						'items_wrap'        => "", // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
						'item_spacing'      => "", // (string) Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
					)
				);
				?>
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
	</body>
</html>
