<?php

use Laracasts\Transcriptions\Transcription;

require '../vendor/autoload.php';

$path = __DIR__.'/../tests/stubs/example.vtt';

$lines = Transcription::load($path)->lines();

foreach ($lines as $line) {
    var_dump($line->beginningTimestamp() . ' ' . $line->getBody());
}