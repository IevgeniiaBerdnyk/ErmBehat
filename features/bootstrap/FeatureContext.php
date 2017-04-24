<?php
namespace Erm\Behat\Bootstrap;

use Erm\Behat\Bootstrap\Page\LoginPage;
use PHPUnit\Framework\Assert;
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends PageObjectContext
{

    /**
     * @var LoginPage
     */
    private $loginPage;

    /**
     * @Given /^I am on login page$/
     */
    public function iAmOnLoginPage()
    {
        $this->loginPage = $this->getPage('LoginPage')->open();
    }

    /**
     * @When /^I input (.*) into email editbox$/
     * @param $email
     */
    public function iInputIntoEmailEditbox($email)
    {
        $this->loginPage->inputEmail($email);
    }

    /**
     * @Given /^I input (.*) into password editbox$/
     * @param $password
     */
    public function iInputIntoPasswordEditbox($password)
    {
        $this->loginPage->inputPassword($password);
    }

    /**
     * @Given /^Click Login button$/
     */
    public function clickLoginButton()
    {
        $this->loginPage->clickLoginButton();
        // Wait while the page is loaded
        sleep(3);

    }

    /**
     * @When /^I click Login with Facebook button$/
     */
    public function iClickLoginWithFacebookButton()
    {
        $this->loginPage->clickFacebookLoginButton();
    }

    /**
     * @Then /^I should be logged in$/
     */
    public function iShouldBeLoggedIn()
    {
        Assert::assertNotNull($this->loginPage->isLoggedIn());
    }

    /**
     * @Then /^I should be not logged in$/
     */
    public function iShouldBeNotLoggedIn()
    {
        Assert::assertNull($this->loginPage->isLoggedIn());
    }

    /**
     * @Then /^Facebook login page is opened$/
     */
    public function facebookLoginPageIsOpened()
    {
        Assert::assertContains('https://www.facebook.com/login.php', $this->loginPage->getCurrentUrl());
    }

    /** @AfterScenario */
    public function afterScenario()
    {
        $this->loginPage->stopSession();
    }

}
