<?php
/**
 * @author	Jan Marsch <jama@keks.com>
 * https://github.com/mynetx/codebird-php
 * @date	2013-01-25 01:15
 */

class Twitter {

    private $data = array();
    private $cacheAge = 0;

//    private $referer = "";
//    private $userInfoUrl = "http://twitter.com/users/show/{user}";
//    private $followUrl = "https://twitter.com/intent/follow?original_referer={referer}&screen_name={user}";
//    private $tweetUrl = "https://twitter.com/intent/tweet?original_referer={referer}&text={text}&url={referer}&via={user}";

    public function __construct() {
        require_once("codebird.php");
        Codebird::setConsumerKey(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET);
        $this->cb = Codebird::getInstance();
        $this->cb->setToken(TWITTER_TOKEN, TWITTER_TOKEN_SECRET);
        $this->_readCache();
    }

    public function getUserInfo() {
        $res = $this->_retrieve("user");
        if ($res === NULL) {
            $res = (array) $this->cb->users_show(array(
                "screen_name" => TWITTER_SCREEN_NAME
            ));
var_dump($res);
            $this->_store("user", $res);
            $this->_writeCache();
        }

        return $res;
    }

//    public function getTweetURL($text) {
//        $url = $this->replaceTags($this->tweetUrl);
//        return strtr($url, array("{text}"=>urlencode($text)));
//    }
//
//    public function getFollowURL() {
//        return $this->replaceTags($this->followUrl);
//    }
//
//    private function replaceTags($url) {
//        $tags = array(
//            "{user}" => urlencode($this->user),
//            "{referer}" => urlencode($this->referer)
//        );
//        return strtr($url, $tags);
//    }

    private function _readCache() {
        if (!is_file(TWITTER_CACHE_FILE)) {
            $this->data = array();
            return;
        }
        $res = json_decode(file_get_contents(TWITTER_CACHE_FILE), TRUE);
        if (!$res) {
            $this->data = array();
            return;
        }
        $this->data = $res;
        $this->cacheAge = filemtime(TWITTER_CACHE_FILE);
    }

    private function _retrieve($key) {
        if (!$this->cacheAge || time() - $this->cacheAge > 24 * 60 * 60) {
            return;
        }

        if (!isset($this->data[$key])) {
            return NULL;
        }

        return $this->data[$key];
    }

    private function _store($key, $value) {
        $this->data[$key] = $value;
        file_put_contents(TWITTER_CACHE_FILE, json_encode($this->data));
        $this->cacheAge = filemtime(TWITTER_CACHE_FILE);
    }
}

?>