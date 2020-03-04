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

}