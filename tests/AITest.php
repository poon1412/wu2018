<?php

use PHPUnit\Framework\TestCase;

final class AITest extends TestCase
{
    public function testGender_Male(): void
    {
        $result = AI::getGender('สวัสดีครับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Male1(): void
    {
        $result = AI::getGender('ผมคิดว่า');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Male2(): void
    {
        $result = AI::getGender('ขอรับกระผม');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Female(): void
    {
        $result = AI::getGender('พี่ค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Female1(): void
    {
        $result = AI::getGender('พี่ค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Female2(): void
    {
        $result = AI::getGender('ฉันคิดว่า');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }

    public function testGender_Female3(): void
    {
        $result = AI::getGender('ดิฉันเข้าใจ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }

    public function testGetSentiment(): void
    {
        $result = AI::getSentiment('สวัสดีจ้า');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result, $result);
    }

    public function testGetSentiment1(): void
    {
        $result = AI::getSentiment('555');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result, $result);
    }
    public function testGetSentiment2(): void
    {
        $result = AI::getSentiment('แม่ง');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result, $result);
    }
    public function testGetSentiment3(): void
    {
        $result = AI::getSentiment('อีเหี้ย');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result, $result);
    }
    public function testGetSentiment4(): void
    {
        $result = AI::getSentiment('สัสหมา');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result, $result);
    }
    public function testGetSentiment5(): void
    {
        $result = AI::getSentiment('อะไรหว่า');
        $expected_result = 'Neutral';
        $this->assertEquals($expected_result, $result);
    }
    
    public function testGetRudeWords(): void
    {
        $result = AI::getRudeWords('fuckoff');
        $expected_result = ['fuck'];
        $this->assertEquals($expected_result, $result);
    }

    public function testGetRudeWords1(): void
    {
        $result = AI::getRudeWords('สัสหมาแม่ง');
        $expected_result = ['แม่ง','สัส'];
        $this->assertEquals($expected_result, $result);
    }
    
    public function testGetRudeWords2(): void
    {
        $result = AI::getRudeWords('ครับผม');
        $expected_result = ['Not so Rudes'];
        $this->assertEquals($expected_result, $result);
    }

    public function testGetRudeWords3():void
    {
        $result = AI::getRudeWords('asspissbitch');
        $expected_result = ['ass','piss','bitch'];
        $this->assertEquals($expected_result, $result);
    }

    public function testGetLanguages(): void
    {
        $result = AI::getLanguages('ครับผมasb');
        $expected_result = ['TH','EN'];
        $this->assertEquals($expected_result, $result);
    }

    public function testGetLanguages1(): void
    {
        $result = AI::getLanguages('jipjasb');
        $expected_result = ['EN'];
        $this->assertEquals($expected_result, $result);
    }
       
    public function testGetLanguages2(): void
    {
        $result = AI::getLanguages('สัสตอเอ่ยเหี้ย');
        $expected_result = ['TH'];
        $this->assertEquals($expected_result, $result);
    }
}