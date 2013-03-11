<?php
/**
 * @author	Jan Marsch <jama@keks.com>
 * @date	2013-01-25 01:15
 */

class Twitter {

    private $user = "";
    private $referer = "";

    private $data = array();
    private $cacheAge = 0;
    private $cacheFile = "twitter.json";

    private $userInfoUrl = "http://twitter.com/users/show/{user}";
    private $followUrl = "https://twitter.com/intent/follow?original_referer={referer}&screen_name={user}";
    private $tweetUrl = "https://twitter.com/intent/tweet?original_referer={referer}&text={text}&url={referer}&via={user}";

    public function __construct($user, $referer) {
        $this->user = $user;
        $this->referer = $referer;
        $this->_readFromCache();
    }

    public function getUserInfo() {
        if (!$this->cacheAge || time() - $this->cacheAge > 24 * 60 * 60) {
            $tags = array("{user}" => $this->user);
            $xml = file_get_contents(strtr($this->userInfoUrl, $tags));
            $this->data = new SimpleXMLElement($xml);
            $this->_writeToCache();
        }
        return $this->data;
    }

    public function getTweetURL($text) {
        $url = $this->replaceTags($this->tweetUrl);
        return strtr($url, array("{text}"=>urlencode($text)));
    }

    public function getFollowURL() {
        return $this->replaceTags($this->followUrl);
    }

    private function replaceTags($url) {
        $tags = array(
            "{user}" => urlencode($this->user),
            "{referer}" => urlencode($this->referer)
        );
        return strtr($url, $tags);
    }

    private function _readFromCache() {
        if (is_file($this->cacheFile)) {
            $this->data = json_decode(file_get_contents($this->cacheFile));
            if ($this->data) {
                $this->cacheAge = filemtime($this->cacheFile);
            }
        }
    }

    private function _writeToCache() {
        file_put_contents($this->cacheFile, json_encode($this->data));
        $this->cacheAge = filemtime($this->cacheFile);
    }
}

?>