<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    /**
     * Test if the differents routes of the MainController are accessible for
     * an anonymous user
     *
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

    /**
     * Check that the paths to the administration interface and the editing of a
     * producer profile are redirected to the login page as an anonymous user
     */
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

    /**
     * Method that returns all MainController urls.
     *
     * @return array
     */
    public function provideUrls()
    {
        return [
            ['/'],
            ['/a-propos'],
            ['/faq'],
            ['/cgv'],
            ['/mentions-legales'],
            ['/contact'],
        ];
    }


}