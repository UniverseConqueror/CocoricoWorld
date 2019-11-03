<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    /**
     * @dataProvider provideUrls
     * @param $url
     */
    public function testPagesAccess($url)
    {
        $client = static::createClient();
        $client->request('GET', $url);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function provideUrls()
    {
        return [
            ['/'],
            ['/company'],
            ['/faq'],
            ['/cgv'],
            ['/legalsmentions'],
            ['/contact'],
        ];
    }
}