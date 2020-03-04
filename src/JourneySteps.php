<?php

declare(strict_types=1);

namespace App;


class JourneySteps
{
    /**
     * @var array Store the journey steps
     */
    protected $journeySteps;

    /**
     * Read the journey steps from a json file into an array
     *
     * @param string $filename
     * @return array
     */
    public function readJourneySteps(string $filename): array
    {
        $json = file_get_contents($filename);
        $this->journeySteps = json_decode($json, true);
        return $this->journeySteps;
    }

    /**
     * Re-order the journey steps stored in $journeySteps and output an array of each point in the journey in order
     *
     * @return array
     */
    public function orderJourneySteps(): array
    {
        $journeyLength = count($this->journeySteps);

        // Determine final destination
        $froms = array_column($this->journeySteps, 'from');
        $tos = array_column($this->journeySteps, 'to');
        $finalDestination = array_diff($tos, $froms);

        // Initialise $orderedSteps array with final step
        $orderedSteps[] = $this->journeySteps[key($finalDestination)];

        // Iteratively add previous locations to beginning of $orderedSteps array
        while (count($orderedSteps) < $journeyLength) {
            $previousDestination = $orderedSteps[0]['from'];
            $previousStep = array_search($previousDestination, $tos);
            array_unshift($orderedSteps, $this->journeySteps[$previousStep]);
        }

        // Get ordered list of steps
        $orderedPoints = array_column($orderedSteps, 'from');
        $orderedPoints[] = end($finalDestination);

        return $orderedPoints;
    }
}