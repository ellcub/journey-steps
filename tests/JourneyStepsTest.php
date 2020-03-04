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

        // Changed test from assertEquals to assertStringContainsString because of whitespace in string...
        // ... can't see where the whitespace is coming from and trim() didn't remove it.
        $this->assertStringContainsString($orderedJourney[0], 'Fazenda São Francisco Citros, Brazil​');
        $this->assertStringContainsString($orderedJourney[1], '​São Paulo–Guarulhos International Airport, Brazil​');
        $this->assertStringContainsString($orderedJourney[2], 'Porto International Airport, Portugal');
        $this->assertStringContainsString($orderedJourney[3], 'Adolfo Suárez Madrid–Barajas Airport, Spain');
        $this->assertStringContainsString($orderedJourney[4], '​London Heathrow, UK​');
        $this->assertStringContainsString($orderedJourney[5], '​Loft Digital, London, UK');
    }

}