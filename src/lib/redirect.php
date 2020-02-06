<?php

if (!defined("BM")) {
    exit();
}

define("CF", "1");
include_once("config.php");

function track_pageview($page_link, $title, $target_url) {

    $data = array(
        "t" => "pageview", // hit_type
        "dh" => GA_HOSTNAME, // hostname
        "dp" => $page_link, // page
        "dt" => $title, // title
    );

    redirect($data, $target_url);

}

function redirect($data, $target_url) {

    // echo $target_url;
    // echo $data["dp"];
    // echo $data["dt"];

    // print_r($data);

    if ($data) {

        // https://developers.google.com/analytics/devguides/collection/protocol/v1/devguide

        $data = array_merge($data, array(
            "v" => "1", // version
            "tid" => GA_ID, // tracking_id
            "cid" => "555", // client_id
            "dr" => isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''
        ));

        $url = "https://www.google-analytics.com/collect";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        
        $mh = curl_multi_init();
        curl_multi_add_handle($mh, $ch);
        
        do {
            $status = curl_multi_exec($mh, $active);
            if ($active) {
                // Wait a short time for more activity
                curl_multi_select($mh);
            }
        } while ($active && $status == CURLM_OK);
        
        curl_multi_remove_handle($mh, $ch);
        curl_multi_close($mh);
        
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $target_url);
        
    }

}
?>