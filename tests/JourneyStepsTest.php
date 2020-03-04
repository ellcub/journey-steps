<?php

declare(strict_types=1);

use App\JourneySteps;
use PHPUnit\Framework\TestCase;


final class JourneyStepsTest extends TestCase
{
    public function testReadsJsonInput(): void
    {
        $js = new JourneySteps();
        $journeyStepsArray = $js->readJourneySteps('./data/journeysteps.json');

        $this->assertCount(5, $journeyStepsArray);
        $this->assertEquals($journeyStepsArray[0]['from'], 'Adolfo Suárez Madrid–Barajas Airport, Spain');
    }

    public function testJourneyInCorrectOrder(): void
    {
        $js = new JourneySteps();
        $js->readJourneySteps('./data/journeysteps.json');
        $orderedJourney = $js->orderJourneySteps();

        $this->assertEquals($orderedJourney[0], 'Fazenda São Francisco Citros, Brazil​');
        $this->assertEquals($orderedJourney[1], '​São Paulo–Guarulhos International Airport, Brazil​');
        $this->assertEquals($orderedJourney[2], 'Porto International Airport, Portugal');
        $this->assertEquals($orderedJourney[3], 'Adolfo Suárez Madrid–Barajas Airport, Spain');
        $this->assertEquals($orderedJourney[4], '​London Heathrow, UK​');
        $this->assertEquals($orderedJourney[5], '​Loft Digital, London, UK');
    }

}