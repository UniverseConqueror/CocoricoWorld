<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    /**
     * @dataProvider provideUrls
     */
    public function testPagesAccess($url)
    {
        $client = static::createClient();
        $client->request('GET', $url);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testContactForm()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton('Envoyer')->form();

        $form['contact_form[name]']    = 'John Doe';
        $form['contact_form[email]']   = 'johndoe@email.com';
        $form['contact_form[content]'] = 'Hello there !';

        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect());
    }

    public function testUnauthorizedAccess()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin');

        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();

        $homeLink = $crawler->filter('a[title="Homepage"]')->link();
        $crawler = $client->click($homeLink);

        $shopLink = $crawler
            ->filter('a:contains("Boutique du producteur")')
            ->eq(0)
            ->link()
        ;
        $client->click($shopLink);

        $crawler = $client->request('GET', $client->getRequest()->getUri().'/profil');

        $this->assertTrue($client->getResponse()->isRedirect());
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