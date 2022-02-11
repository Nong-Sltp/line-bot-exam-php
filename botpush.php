<?php



require "vendor/autoload.php";

$access_token = 'HQ5RZTAw7hHdRrZz1SHv+Mzunv6CuLMHx4qWUhsywMnV40fWmKrEKiYT06dADnbZfEsJWsbVPrrQcaq0nRuSDeFYJ/YDfoQf3WWjqOPcAx9WfYLNsaB4EDiAEO56m7gtXYjplonRheSGThqFihEBVAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '80077db55fbcc61b9fa5f403fb3f849d';

$pushID = 'Uef9c162a2eae531cba8c34c09dce04f0';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







