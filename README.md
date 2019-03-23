# Crunchy Bunny

Theme history for [Crunchy Family](https://crunchyfamily.com), as created by @gotjane on Github. Functions credited appropriately where possible (via "sauce"); most everything without a source listed is derived from the WordPress.org Codex and Developer section. Should you opt for using any piece of this, please credit appropriately but do _not_ copy parts of the theme in full, because plagiarism is gross ~~and illegal~~.

If you've suggestions to make this theme better, or even fixes for existing bugs, please let me know.~ I'm no pro by any means and am interested in learning (I just...don't speak the jargon).

## v1.0 - Crunchy Bunny &bull; 22 March, 2019

>[View release post on blog](https://janepedia.com/crunchy-bunny)

Rebrand of _Crunchy Family_, featuring orange, blue and hexagons. Specks of yellow and pink are sprinkled throughout, to add more color to the overall palette.

### Known bugs
Imperfections lie within, but perfection was not the goal prior to release, since it leads to stalling and procrastination.

+ ``h1`` too big when shrunken window size; quick fix = word break & hyphenation
+ featured image not always proportional if pulling first image in case of no thumbnail selected
+ ``header`` navigation is weird the shorter the window gets
+ ~~~wordpress screws up images with inline CSS~~~ fixed by adding ``add_filter( 'img_caption_shortcode_width', '__return_false' );`` to functions.php
