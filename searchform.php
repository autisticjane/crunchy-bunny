    <div id="search-form" class="search-form-wrapper">
        <form method="get" class="search__form" action="<?php bloginfo('url'); ?>/">
            <label class="search__form-label" for="s">Search and press enter</label>
            <input
                class="search__form-input"
                type="search"
                onblur="if (this.value == '') {this.value = 'Search my blog...';}"
                onfocus="if (this.value == 'Search my blog...') {this.value = '';}"
                value="Search my blog..."
                placeholder="Type + enter"
                name="s"
                id="s"
            >
            <button type="submit" class="btn search__form-submit">
				<svg fill="currentColor" height="25" viewBox="0 0 32 32" width="25" xmlns="http://www.w3.org/2000/svg">
					<title>Search form trigger</title>
					<path d="M31 27l-7-7.6c-1 1.7-2.6 3.2-4.3 4.3L27 31c1 1.3 3 1.3 4 0 1.3-1 1.3-3 0-4zm-7-15c0-6.6-5.4-12-12-12S0 5.4 0 12s5.4 12 12 12 12-5.4 12-12zm-12 9c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"/><path d="M5 12h2c0-2.8 2.2-5 5-5V5c-4 0-7 3-7 7z"/>
				</svg>
			</button>
        </form>
    </div>