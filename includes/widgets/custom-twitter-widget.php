<?php 

if (!class_exists('TwitterOAuth')) {
    require_once('twitteroauth/twitteroauth.php');
}


add_action('widgets_init', 'register_twitter_widget');
function register_twitter_widget(){
	register_widget('WP_Widget_Twitter');
}

class  WP_Widget_Twitter extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'twitter',
			__('* Twitter Tweets', TEMP_NAME),
			array( 'description' => __('Display tweets from twitter', TEMP_NAME))
		);
	}

	public function widget($args, $instance){

		extract($args);

		$title               = apply_filters('widget_title', $instance['title']);
		$consumer_key        = isset($instance['consumer_key']) ? esc_attr($instance['consumer_key']) : "";
		$consumer_secret     = isset($instance['consumer_secret']) ? esc_attr($instance['consumer_secret']) : "";
		$access_token        = isset($instance['access_token']) ? esc_attr($instance['access_token']) : "";
		$access_token_secret = isset($instance['access_token_secret']) ? esc_attr($instance['access_token_secret']) : "";
		$twitter_id          = isset($instance['twitter_id']) ? esc_attr($instance['twitter_id']) : "";
		$count               = (isset($instance['count']) && absint($instance['count'])) ? esc_attr($instance['count']) : "3";

		echo $before_widget;

		if($title) {echo $before_title.$title.$after_title;}

		if($twitter_id && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $count) {

			$transName = 'list_tweets_';
			$cacheTime = 10;
			delete_transient($transName);

			if(false === ($twitterData = get_transient($transName))) {
			     
				$twitterConnection = new TwitterOAuth(
					$consumer_key,
					$consumer_secret,
					$access_token,
					$access_token_secret
				);

				$twitterData = $twitterConnection->get(
					'statuses/user_timeline',
					array(
						'screen_name'     => $twitter_id,
						'count'           => $count,
						'exclude_replies' => false
					)
				);

				if($twitterConnection->http_code != 200){
					$twitterData = get_transient($transName);
				}

				set_transient($transName, $twitterData, 60 * $cacheTime);
			};

			$twitter = get_transient($transName);

			if($twitter && is_array($twitter)) { ?>

				<div class="twitter">
					<ul>
						<?php foreach($twitter as $tweet): ?>
							<li>
								<p>
									<?php
										$latestTweet = $tweet->text;
										$latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $latestTweet);
										$latestTweet = preg_replace('/@([a-z0-9_]+)/i', '<a class="tweet-author" href="http://twitter.com/$1" target="_blank">@$1</a>', $latestTweet);
										echo $latestTweet;
									?>
								</p>
									<?php
										$twitterTime = strtotime($tweet->created_at);
										$timeAgo = $this->ago($twitterTime);
									?>
								<a class="tweet-time" href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/statuses/<?php echo $tweet->id_str; ?>"><?php echo $timeAgo; ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

			<?php }
		}

		echo $after_widget;
	}

	public function ago($time) {

	   $periods = array(__("second", TEMP_NAME), __("minute", TEMP_NAME), __("hour", TEMP_NAME), __("day", TEMP_NAME), __("week", TEMP_NAME), __("month", TEMP_NAME), __("year", TEMP_NAME), __("decade", TEMP_NAME));
	   $lengths = array("60","60","24","7","4.35","12","10");

	   $now = time();

	       $difference    = $now - $time;
	       $tense         = "ago";

	   for($i = 0; $difference >= $lengths[$i] && $i < count($lengths)-1; $i++) {
	       $difference /= $lengths[$i];
	   }

	   $difference = round($difference);

	   if($difference != 1) {
	       $periods[$i].= "s";
	   }

	   return "$difference $periods[$i] ago ";
	}

	public function form($instance) {

		$defaults = array(
			'title'               => __('Recent Tweets', TEMP_NAME), 
			'twitter_id'          => '',
			'consumer_key'        => '',
			'consumer_secret'     => '',
			'access_token'        => '',
			'access_token_secret' => '',
			'count'               => 3
		);

		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p><a target="_blank" href="http://dev.twitter.com/apps"><?php echo __('Find or Create your Twitter App', TEMP_NAME); ?></a></p>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __( 'Title:', TEMP_NAME ); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('consumer_key'); ?>"><?php echo __( 'Consumer Key:', TEMP_NAME ); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('consumer_key'); ?>" name="<?php echo $this->get_field_name('consumer_key'); ?>" value="<?php echo $instance['consumer_key']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('consumer_secret'); ?>"><?php echo __( 'Consumer Secret:', TEMP_NAME ); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('consumer_secret'); ?>" name="<?php echo $this->get_field_name('consumer_secret'); ?>" value="<?php echo $instance['consumer_secret']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('access_token'); ?>"><?php echo __( 'Access Token:', TEMP_NAME ); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('access_token'); ?>" name="<?php echo $this->get_field_name('access_token'); ?>" value="<?php echo $instance['access_token']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('access_token_secret'); ?>"><?php echo __( 'Access Token Secret:', TEMP_NAME ); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('access_token_secret'); ?>" name="<?php echo $this->get_field_name('access_token_secret'); ?>" value="<?php echo $instance['access_token_secret']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php echo __( 'Twitter ID:', TEMP_NAME ); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" value="<?php echo $instance['twitter_id']; ?>" />
		</p>

			<label for="<?php echo $this->get_field_id('count'); ?>"><?php echo __( 'Number of Tweets:', TEMP_NAME ); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $instance['count']; ?>" />
		</p>

	<?php
	}

	function update($new_instance, $old_instance) {

		$instance = $old_instance;
		$instance['title']               = strip_tags($new_instance['title']);
		$instance['consumer_key']        = strip_tags($new_instance['consumer_key']);
		$instance['consumer_secret']     = strip_tags($new_instance['consumer_secret']);
		$instance['access_token']        = strip_tags($new_instance['access_token']);
		$instance['access_token_secret'] = strip_tags($new_instance['access_token_secret']);
		$instance['twitter_id']          = strip_tags($new_instance['twitter_id']);
		$instance['count']               = strip_tags($new_instance['count']);
		return $instance;
	}

}

?>