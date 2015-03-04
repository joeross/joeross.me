<?php

class SocialGenerator {

    static public function Twitter($uri, $size, $tw_color) {
        return "<a href=\"#\" onclick=\"window.open(
      'https://twitter.com/intent/tweet?original_referer='+encodeURIComponent(location.href)+'&tw_p=tweetbutton&url=' + encodeURIComponent(location.href) + '&text=' + encodeURIComponent(window.document.title),
      'twitter-share-dialog',
      'width=626,height=436');
    return false;\" style=\"text-decoration: none;\">
  <img src=\"" . $uri . "imgs/social/" . $size . "/twitter_" . $tw_color . ".png\" border=\"0\" />
</a>";
    }

    static public function Facebook($uri, $size, $fb_color) {
        return "<a href=\"#\" onclick=\"window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),
      'facebook-share-dialog',
      'width=626,height=436');
    return false;\" style=\"text-decoration: none;\">
  <img src=\"" . $uri . "imgs/social/" . $size . "/fb_" . $fb_color . ".png\" border=\"0\" />
</a>";
    }

    static public function GooglePlus($uri, $size, $gp_color) {
        return "<a href=\"#\" onclick=\"javascript:window.open('https://plus.google.com/share?url=' + encodeURIComponent(location.href),
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\" style=\"text-decoration: none;\"><img
  src=\"" . $uri . "imgs/social/" . $size . "/gp_" . $gp_color . ".png\" alt=\"Share on Google+\" /></a>";
    }

}
