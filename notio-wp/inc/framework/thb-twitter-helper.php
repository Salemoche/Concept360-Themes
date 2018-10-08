<?php
class ThbTwitterHelper {
  public function thb_getTweetText($tweet) {
    $protocol = is_ssl() ? 'https' : 'http';
    
    if(!empty($tweet['text'])) {

      $tweet_text = $tweet['text'];
			
      // link links
      $tweet_text = preg_replace('/(https?)\:\/\/([a-z0-9\/\.\&\#\?\-\+\~\_\,]+)/i', '<a target="_blank" href="'.('$1://$2').'">$1://$2</a>', $tweet_text);
      
      // mention links
      $tweet_text = preg_replace('/\@([a-aA-Z0-9\.\_\-]+)/i', '<a target="_blank" href="'.esc_url($protocol.'://twitter.com/$1').'">@$1</a>', $tweet_text);

      // hashtags links
      $tweet_text = preg_replace('/\#([a-aA-Z0-9\.\_\-]+)/i', '<a target="_blank" href="'.esc_url($protocol.'://twitter.com/search?q\=$1').'">#$1</a>', $tweet_text);

      return $tweet_text;
    } else {
    	return '';
    }
  }
  public function thb_getTweetTime($tweet) {
    if(!empty($tweet['created_at'])) {
        return human_time_diff(strtotime($tweet['created_at']), current_time('timestamp') ).' '.esc_html__('ago', 'notio');
    } else {
    	return '';
    }
  }
  public function thb_getTweetURL($tweet) {
    if(!empty($tweet['id_str']) && $tweet['user']['screen_name']) {
      return 'https://twitter.com/'.$tweet['user']['screen_name'].'/statuses/'.$tweet['id_str'];
    } else {
    	return '#';
    }
  }
  public function thb_getTweetUserScreenName($tweet) {
    if(!empty($tweet['id_str']) && $tweet['user']['screen_name']) {
        return $tweet['user']['screen_name'];
    } else {
    	return '#';
    }
  }
  public function thb_getTweetUserName($tweet) {
    if(!empty($tweet['id_str']) && $tweet['user']['name']) {
        return $tweet['user']['name'];
    } else {
    	return '#';
    }
  }
}