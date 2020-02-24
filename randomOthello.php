<?php

// Main function
function getRandomSentencesFromOthello(int $numSentencesRequested, string $speaker) : array {
    $xml = getXml();
    $speakers = getSpeakers($xml);

    if (!in_array($speaker, $speakers)) {
        exit("Sorry, $speaker does not have any lines in Othello.\n");
    }

    // initialize empty array to hold a list of all lines
    $lines = [];
    foreach (range(1, $numSentencesRequested) as $i) {
        $lines[] = simpleGetLine($xml, $speaker);
    }    
    return $lines;
}

function getXml() {
    if (file_exists('ps_othello.xml')) {
        return simplexml_load_file('ps_othello.xml');
    } else {
        exit('Failed to open ps_othello.xml.');
    }
}

function getSpeakers($xml) : array {
    // initialize empty array to hold a list of all speakers
    $speakers = [];
    
    // loop all all personae, get the name for each one
    foreach ($xml->personae->persona as $persona) {
        $speakers[] = $persona->persname;
    }

    return $speakers;
}

function simpleGetLine($xml, $speaker) {
    $speech = $xml->act[0]->scene[0]->speech[0];
    $line = $xml->act[0]->scene[0]->speech[0]->line[0];
    $lineSpeaker = $speech->speaker[0]['long'];

    $lines = getLinesForSpeaker($xml, $speaker);

    $randomLine = random_int(0, count($lines));
    return $lines[$randomLine];
}

function getLinesForSpeaker($xml, $speaker) {
    // initialize empty array to hold a list of all lines
    $lines = [];

    // the acts, scenes, and speeches aren't nested under parent keys, they're just flat,
    // so we need to keep trying to get them one-by-one until we have them all
    // i.e. until we get no result for `$act = act->scene[$i]`
    for ($i = 0; $act = $xml->act[$i]; $i++) {
        for ($j = 0; $scene = $act->scene[$j]; $j++) {
            for ($k = 0; $speech = $scene->speech[$k]; $k++) {
                if ($speech->speaker[0]['long'] == $speaker) {
                    for ($l = 0; $line = $speech->line[$l]; $l++) {
                        $lines[] = $line;
                    }
                }
            }
        }
    }

    return $lines;
}