<?php
$headers = apache_request_headers();
$headers_lower = [];
foreach ($headers as $key => $value) {
    $headers_lower[strtolower($key)] = $value;
}
unset($headers);

if (array_key_exists('cf-connecting-ip', $headers_lower)) {
    $visitor_ip = $headers_lower['cf-connecting-ip']; 
} elseif (array_key_exists('x-forwarded-for', $headers_lower)) {
    $visitor_ip = explode(',', $headers_lower['x-forwarded-for'])[0];
} else {
    $visitor_ip = explode(',', $_SERVER['REMOTE_ADDR'])[0];
}

header('Your-IP: ' . $visitor_ip);
echo $visitor_ip;
return;