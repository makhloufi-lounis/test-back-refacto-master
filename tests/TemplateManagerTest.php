<?php

require_once __DIR__ . '/../src/Entity/Destination.php';
require_once __DIR__ . '/../src/Entity/Quote.php';
require_once __DIR__ . '/../src/Entity/Site.php';
require_once __DIR__ . '/../src/Entity/Template.php';
require_once __DIR__ . '/../src/Entity/User.php';
require_once __DIR__ . '/../src/Helper/SingletonTrait.php';
require_once __DIR__ . '/../src/Context/ApplicationContext.php';
require_once __DIR__ . '/../src/Repository/Repository.php';
require_once __DIR__ . '/../src/Repository/DestinationRepository.php';
require_once __DIR__ . '/../src/Repository/QuoteRepository.php';
require_once __DIR__ . '/../src/Repository/SiteRepository.php';
require_once __DIR__ . '/../src/TemplateManager.php';

class TemplateManagerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Quote
     */
    private $quote;
    /**
     * @var Destination
     */
    private $expectedDestination;

    /**
     * @var User
     */
    private $expectedUser;

    /**
     * @var TemplateManager
     */
    private $templateManager;

    /**
     * Init the mocks
     */
    public function setUp()
    {
        $faker = \Faker\Factory::create();
        $destinationId = $faker->randomNumber();
        $this->quote = new Quote($faker->randomNumber(), $faker->randomNumber(), $destinationId, $faker->date());
        $this->expectedDestination = DestinationRepository::getInstance()->getById($destinationId);
        $this->expectedUser = ApplicationContext::getInstance()->getCurrentUser();
        $this->templateManager = new TemplateManager();
    }

    /**
     * Closes the mocks
     */
    public function tearDown()
    {
        unset($this->quote);
        unset($this->expectedDestination);
        unset($this->expectedUser);
        unset($this->templateManager);
    }

    /**
     * @test
     */
    public function test()
    {
        $template = new Template(
            1,
            'Votre livraison à [quote:destination_name]',
            "
Bonjour [user:first_name],

Merci de nous avoir contacté pour votre livraison à [quote:destination_name].

Bien cordialement,

L'équipe Convelio.com
");


        $message = $this->templateManager->getTemplateComputed(
            $template,
            [
                'quote' => $this->quote
            ]
        );

        $this->assertEquals('Votre livraison à ' . $this->expectedDestination->getCountryName(), $message->getSubject());
        $this->assertEquals("
Bonjour " . $this->expectedUser->getFirstName() . ",

Merci de nous avoir contacté pour votre livraison à " . $this->expectedDestination->getCountryName() . ".

Bien cordialement,

L'équipe Convelio.com
", $message->getContent());
    }
}
