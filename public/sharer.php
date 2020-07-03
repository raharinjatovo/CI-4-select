<?php

/**
 * Class sharer.
 */
class sharer
{
    const FACEBOOK_URL = 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Facebook_logo_36x36.svg/1200px-Facebook_logo_36x36.svg.png';
    const TWITTER_URL = 'https://upload.wikimedia.org/wikipedia/fr/thumb/c/c8/Twitter_Bird.svg/1200px-Twitter_Bird.svg.png';
    const WHATSAPP_URL = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/1200px-WhatsApp.svg.png';
    const LINKEDIN_URL = 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Linkedin_icon.svg/1200px-Linkedin_icon.svg.png';
    const MESSENGER_URL = 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Facebook_Messenger_4_Logo.svg/768px-Facebook_Messenger_4_Logo.svg.png';
    const FLIPBOARD_URL = 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Flipboard_logo.svg/1200px-Flipboard_logo.svg.png';
    const EMAIL_URL = 'https://www.pngitem.com/pimgs/m/12-127052_message-clipart-mail-symbol-transparent-background-red-email.png';

    /**
     * @param string $url
     *
     * @return string of the facebook url to share
     */
    public function facebook(string $url)
    {

        return "<a href=\"https://www.facebook.com/sharer/sharer.php?u=".$url."\">
                    <img border=\"0\" alt=\"facebook\" src=\"".self::FACEBOOK_URL."\" width=\"50\" height=\"50\">
                </a>";
    }

    /**
     * @param string      $url
     * @param string|null $text
     * @param string|null $via
     * @param string|null $related
     * @param string|null $lang
     *
     * @return string of the twitter url to share
     */
    public function twitter(string $url, string $text = '', string $via = '', string $related = '', string $lang = '')
    {
        return "<a href=\"https://twitter.com/intent/tweet?url=".$url."&text=".$text."&via=".$via."&related=".$related."&lang=".$lang."\">
                    <img border=\"0\" alt=\"twitter\" src=\"".self::TWITTER_URL."\" width=\"50\" height=\"50\">
                </a>";
    }

    /**
     * @param        $url
     * @param string $text
     *
     * @return string of the whatsapp url to share
     */
    public function whatsapp($url, $text = '')
    {
        return "<a href=\"https://web.whatsapp.com/send?text= ".$text."-".$url."\">
                    <img border=\"0\" alt=\"whatsapp\" src=\"".self::WHATSAPP_URL."\" width=\"50\" height=\"50\">
                </a>";
    }

    /**
     * @param string      $url
     * @param string|null $title
     * @param string|null $lang
     *
     * @return string of the linkedin url to share
     */
    public function linkedin(string $url, ?string $title = '', ?string $lang = '')
    {
        return "<a href=\"https://www.linkedin.com/shareArticle?url=".$url."&title=".$title."&lang=".$lang."\">
                  <img border=\"0\" alt=\"linkedin\" src=\"".self::LINKEDIN_URL."\" width=\"50\" height=\"50\">
                </a>";
    }

    /**
     * @param string $url
     *
     * @return string of the messenger url to share
     */
    public function messenger(string $url)
    {
        return "<a href=\"https://www.facebook.com/dialog/send?app_id=121241974571942&link=".$url."&redirect_uri=".$url."\">
                  <img border=\"0\" alt=\"messenger\" src=\"".self::MESSENGER_URL."\" width=\"50\" height=\"50\">
                </a>";
    }

    /**
     * @param string      $url
     * @param string|null $title
     *
     * @return string of the flipboard url to share
     */
    public function flipboard(string $url, ?string $title = '')
    {
        return "<a href=\"https://share.flipboard.com/bookmarklet/popout?title=".$title."&url=".$url."\">
                      <img border=\"0\" alt=\"flipboard\" src=\"".self::FLIPBOARD_URL."\" width=\"50\" height=\"50\">
                </a>";
    }

    /**
     * @param string      $url
     * @param string|null $subject
     *
     * @return string of the mail url
     */
    public function mail(string $url, ?string $subject = '')
    {
        return "<a href=\"mailto:?subject=".$subject."&body=".$url."\">
                      <img border=\"0\" alt=\"mail(to, subject, message)\" src=\"".self::EMAIL_URL."\" width=\"50\" height=\"50\">
                </a>";
    }

    /**
     * @param string $url
     *
     * @return string
     */
    public function copy(string $url)
    {
        return "<button  data-text=\"".$url."\" id=\"button\" class=\"btn btn-secondary copyboard\">Copy</button></div>";
    }
}
