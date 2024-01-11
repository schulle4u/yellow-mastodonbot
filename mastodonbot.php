<?php
// Mastodonbot extension, https://github.com/schulle4u/yellow-mastodonbot

class YellowMastodonbot {
    const VERSION = "0.8.1";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("mastodonbotApiKey", "");
        $this->yellow->system->setDefault("mastodonbotInstance", "mastodon.social");
        $this->yellow->system->setDefault("mastodonbotVisibility", "public");
    }

    // Handle content file changes
    public function onEditContentFile($page, $action, $email) {
        if ($action=="create" && !preg_match("/exclude/i", $page->get("mastodon"))) {
            $title = $page->get("title");
            $url = $this->yellow->lookup->normaliseUrl(
                $this->yellow->system->get("coreServerScheme"),
                $this->yellow->system->get("coreServerAddress"),
                $this->yellow->system->get("coreServerBase"),
                $page->location
            );
            $language = $page->get("language");
            $apiKey = $this->yellow->system->get("mastodonbotApiKey");
            $instance = "https://".$this->yellow->system->get("mastodonbotInstance");
            $visibility = $this->yellow->system->get("mastodonbotVisibility");
            $statusTemplate = $title." ".$url;
            
            $statusData = array(
                "status" => $statusTemplate,
                "visibility" => $visibility,
                "language" => $language,
            );
            $mastodon = new MastodonAPI($apiKey, $instance);
            $mastodon->postStatus($statusData);
        }
    }    
}

class MastodonAPI
{
    private $token;
    private $instance_url;

    public function __construct($token, $instance_url)
    {
        $this->token = $token;
        $this->instance_url = $instance_url;
    }

    public function postStatus($status)
    {
        return $this->callAPI('/api/v1/statuses', 'POST', $status);
    }

    public function uploadMedia($media)
    {
        return $this->callAPI('/api/v1/media', 'POST', $media);
    }

    public function callAPI($endpoint, $method, $data)
    {
        $headers = [
            'Authorization: Bearer '.$this->token,
            'Content-Type: multipart/form-data',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->instance_url.$endpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $reply = curl_exec($ch);

        if (!$reply) {
            return json_encode(['ok'=>false, 'curl_error_code' => curl_errno($ch), 'curl_error' => curl_error($ch)]);
        }
        curl_close($ch);

        return json_decode($reply, true);
    }
}