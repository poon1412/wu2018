<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
        $male = array('ครับ', 'ผม', 'กระผม','ตุ๊ด');
        $female = array('ค่ะ', 'ฉัน', 'ดิฉัน','ทอม');

        for($i=0;$i<3;$i++){
            if(strpos($text,$male[$i])!== false)
            {
                return 'Male';
            }else if(strpos($text,$female[$i])!== false)
            {
                return 'Female';
            }
        }
        return 'Unknown';
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {
        $good = array('จ้า','555','LOL','จ๊ะ','นะจ๊ะ','อิอิ','เย้ๆ');
        $rude = array('แม่ง', 'fuck', 'เหี้ย','สัส','ควย','hell','ass','piss','bitch','วะ','อารมณ์เสีย','เศร้า');
        for($i=0;$i<sizeof($rude);$i++)
        {
            if(strpos($text,$rude[$i])!== false)
            {
                return 'Negative';
            }
        }
        for($i=0;$i<sizeof($good);$i++)
        {
            if(strpos($text,$good[$i])!== false)
            {
                return 'Positive'; 
            }
        }
        return 'Neutral';
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
        $r=0;
        $rude = array('แม่ง', 'fuck', 'เหี้ย','สัส','ควย','hell','ass','piss','bitch');
        $str = array();
        for($i=0;$i<sizeof($rude);$i++)
        {
            if(strpos($text,$rude[$i])!== false)
            {
                $r=1;
                array_push($str,$rude[$i]);    
            }
        }
        if($r==1)
        {
            return $str;
        }else{
            return ['Not so Rudes'];
        }

        
    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        if(preg_replace('/[^ก-๛]/u','',$text)){
            if(preg_replace('/[^a-z]/u','',$text)){
                return ['TH', 'EN'];
            }else{
                return ['TH'];
            }
        }if(preg_replace('/[^a-z]/u','',$text)){
            if(preg_replace('/[^ก-๛]/u','',$text)){
                return ['TH', 'EN'];
            }else{
                return ['EN'];
            }
        }
    }
}
