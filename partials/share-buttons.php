<?php
	// Twitter
	$base = "https://twitter.com/intent/tweet";
	$url = urlencode(get_permalink($post->ID));
	$text = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
	$twitter_profile = get_the_author_meta( 'twitter_profile' );
	$tw_link = $base . "?url=" . $url . "&text=" . $text ;
	if ( $twitter_profile && $twitter_profile != '' ) {
		$username = parse_url($twitter_profile);
		$username = substr($username['path'], 1);
		$tw_link .= '&via=' . $username;
	}

	// Facebook
	$fbbase = "https://www.facebook.com/sharer/sharer.php";
	$summary = substr(get_the_excerpt(), 0, -40);
	$fb_link = $fbbase . "?s=100&p[url]=" . $url . "&p[title]=" . $text . "&p[summary]=" . $summary;

?>
<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
<a href="<?php echo $fb_link ?>" class="btn btn-primary btn-fb"><i class="icon-facebook"></i> Share on Facebook</a>
<a href="<?php echo $tw_link ?>"  target="_blank" class="btn btn-primary btn-tw"><i class="icon-twitter"></i> Share on Twitter</a>