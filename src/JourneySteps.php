<?php

declare(strict_types=1);

namespace App;


class JourneySteps
{
    public function readJourneySteps(string $filename): array
    {
        $json = file_get_contents($filename);
        return json_decode($json, true);
    }
}