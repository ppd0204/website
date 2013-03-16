<?php

// https://github.com/mynetx/codebird-php

require_once("codebird.php");
Codebird::setConsumerKey(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET);

$cb = Codebird::getInstance();
$cb->setToken(TWITTER_TOKEN, TWITTER_TOKEN_SECRET);

$res = $cb->users_show(array(
    "screen_name" => TWITTER_SCREEN_NAME,
));

var_dump($res);

//$reply = (array) $cb->statuses_homeTimeline();
//var_dump($reply);

/*
// Tweeting

$reply = $cb->statuses_update('status=Whohoo, I just tweeted!');

$params = array(
    'screen_name' => 'mynetx'
);

$reply = $cb->users_show($params);

When uploading files to Twitter, the array syntax is obligatory:

$params = array(
    'status' => 'Look at this crazy cat! #lolcats',
    'media[]' => '/home/mynetx/lolcats.jpg'
);
$reply = $cb->statuses_updateWithMedia($params);
*/
?>