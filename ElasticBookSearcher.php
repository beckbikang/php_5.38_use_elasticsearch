<?php
/**
 *
* Copyright(c) 201x,
* All rights reserved.
*
* 功 能：
* @author bikang@book.sina.com
* date:2017年2月15日
* 版 本：1.0
 */
class ElasticBookSearcher{

    /**
     * 获取elasticsearch的搜索结果
     * post
     * @param unknown $url
     * @param unknown $json_data
     */
    public function esPost($url,$data) {
        $defaults = array(
                CURLOPT_POST => 1,
                CURLOPT_HEADER => 0,
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_TIMEOUT => 5,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_POSTFIELDS => json_encode($data),
        );

        $ch = curl_init();
        curl_setopt_array($ch, $defaults);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    //delete
    public function esDelete($url,$time_out=5,$connect_out=5){
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        //head
        curl_setopt ( $ch, CURLOPT_HEADER, false );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_TIMEOUT, $time_out );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $connect_out);
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'DELETE' );
        $ret = curl_exec ($ch);
        return $ret;
    }

}
