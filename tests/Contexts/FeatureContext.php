<?php
namespace Tests\Contexts;

use Behat\Behat\Context\Context;
use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{
    use CreatesApplication;

    private $sum = 0;
    private $multi = 0;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }
    /**
     * @Given I am developer
     */
    public function iAmDeveloper()
    {
        
    }
    /**
     * @Then I get great results
     */
    public function iGetGreatResults()
    {
        
    }

    /**
     * @Given I add :arg1 with :arg2
     */
    public function iAddWith($arg1, $arg2)
    {
        $this->sum = $arg1 + $arg2;
    }
    /**
     * @When I use behat
     */
    public function iUseBehat()
    {
    }

    /**
     * @Then I get result as :arg1
     */
    public function iGetResultAs($arg1)
    {
        // echo $this->sum;
        if($this->sum == $arg1) {
            return true;
        } else {
            throw new Exception('Nope');
        }
    }

    /**
     * @Given I multiply :arg1 with :arg2
     */
    public function iMultiplyWith($arg1, $arg2)
    {
        $this->multi = $arg1 * $arg2;
    }
    /**
     * @Then I get result now as :arg1
     */
    public function iGetResultNowAs($arg1)
    {
        if($this->multi != $arg1) {
            throw new Exception('Result not matching');
        }
    }
}