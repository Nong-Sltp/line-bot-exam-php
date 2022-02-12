<?php
$name = 'Salinthip';


require "vendor/autoload.php";

$access_token = 'jwIRRQa9sAGkPPlxsosPf9EKdAjl32aR4bgkG5QiB2suzDu0pRW9riQfhYZd0LiqfmFFbeNAM58oHqR9vrB/CXGskgeBnaotn4xrskmLkack7VQPhQ3NlJoMiAZWV2EoK9TCKLrRZ/J8OJmVPX2bCAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '6f56434c3e11e16eb8d49dc251dc5bbc';

$pushID = 'Uef9c162a2eae531cba8c34c09dce04f0';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world '.$name);
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







