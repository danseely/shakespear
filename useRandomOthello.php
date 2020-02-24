<?php

require_once 'randomOthello.php';

// input from CLI
$numSentencesRequested = $argv[1];
$speaker = $argv[2];

if (!$numSentencesRequested || !$speaker) {
    exit("Usage: `php randomOrthello.php <number of lines> <speaker>`\n");
}

foreach (getRandomSentencesFromOthello($numSentencesRequested, $speaker) as $line) {
    echo "$line\n";
}
