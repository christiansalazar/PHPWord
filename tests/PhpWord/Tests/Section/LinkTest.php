<?php
namespace PhpOffice\PhpWord\Tests\Section;

use PhpOffice\PhpWord\Section\Link;
use PhpOffice\PhpWord\Style\Font;

class LinkTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructDefault()
    {
        $oLink = new Link('http://www.google.com');

        $this->assertInstanceOf('PhpOffice\\PhpWord\\Section\\Link', $oLink);
        $this->assertEquals($oLink->getLinkSrc(), 'http://www.google.com');
        $this->assertEquals($oLink->getLinkName(), null);
        $this->assertEquals($oLink->getFontStyle(), null);
        $this->assertEquals($oLink->getParagraphStyle(), null);
    }

    public function testConstructWithParamsArray()
    {
        $oLink = new Link(
            'http://www.google.com',
            'Search Engine',
            array('color' => '0000FF', 'underline' => Font::UNDERLINE_SINGLE),
            array('marginLeft' => 600, 'marginRight' => 600, 'marginTop' => 600, 'marginBottom' => 600)
        );

        $this->assertInstanceOf('PhpOffice\\PhpWord\\Section\\Link', $oLink);
        $this->assertEquals($oLink->getLinkSrc(), 'http://www.google.com');
        $this->assertEquals($oLink->getLinkName(), 'Search Engine');
        $this->assertInstanceOf('PhpOffice\\PhpWord\\Style\\Font', $oLink->getFontStyle());
        $this->assertInstanceOf('PhpOffice\\PhpWord\\Style\\Paragraph', $oLink->getParagraphStyle());
    }

    public function testConstructWithParamsString()
    {
        $oLink = new Link('http://www.google.com', null, 'fontStyle', 'paragraphStyle');

        $this->assertEquals($oLink->getFontStyle(), 'fontStyle');
        $this->assertEquals($oLink->getParagraphStyle(), 'paragraphStyle');
    }

    public function testRelationId()
    {
        $oLink = new Link('http://www.google.com');

        $iVal = rand(1, 1000);
        $oLink->setRelationId($iVal);
        $this->assertEquals($oLink->getRelationId(), $iVal);
    }
}
