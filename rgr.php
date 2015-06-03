<?php

$args = (count($argv) > 1) ? $argv[1] : null; // l=live, c=completed, u=upcoming, nothing=live
if (empty($args)) $args = "l";

// Call URL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://www.rolandgarros.com/en_FR/xml/gen/sumScores/sumScores_jsonp.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$json_str = curl_exec($ch);
curl_close($ch);

// Remove unwanted chars
$json_str = substr($json_str, 13, -3);

$json = json_decode($json_str);

$match_states = array();
if (strpos($args, 'l') !== FALSE) $match_states["LIVE"] = $json->sumScores;
if (strpos($args, 'c') !== FALSE) $match_states["COMPLETED"] = $json->sumScoresC;
if (strpos($args, 'u') !== FALSE) $match_states["UPCOMING"] = $json->sumScoresU;

foreach ($match_states as $state => $match_state) {

        echo "\n$state:\n";

        foreach ($match_state->match as $match) {
                $round = "";
                switch ($match->round) {
                        case "Q": $round = "Quarterfinals"; break;
                        case "S": $round = "Semifinals"; break;
                        case "F": $round = "Finals"; break;
                        default: $round = "Round ".$match->round;
                }

                $court = "";
                switch ($match->crt) {
                        case "A": $court = "Philippe-Chatrier"; break;
                        case "B": $court = "Suzanne-Lenglen"; break;
                        default: $court = "Court ".(ord($match->crt) - 66); break;
                }

                $type = "";
                switch ($match->eventType) {
                        case "MS": $type = "Men's Singles"; break;
                        case "WS": $type = "Women's Singles"; break;
                        case "MD": $type = "Men's Doubles"; break;
                        case "WD": $type = "Women's Doubles"; break;
                        case "XD": $type = "Mixed Doubles"; break;
                        case "OD": $type = "Men's legends Perrier over 45"; break;
                        case "BS": $type = "Boys'Singles"; break;
                        case "BD": $type = "Boys'Doubles"; break;
                        case "GS": $type = "Girls'Singles"; break;
                        case "GD": $type = "Girls'Doubles"; break;
                }
                echo $court." - ".$type." - ".$round." - Day ".$match->day.PHP_EOL;
                
                foreach ($match->team as $p) { // each players
                        echo $p->playerNameA." (".$p->playerNationA.") ";
                        if (!empty($p->playerNameB)) echo "/ ".$p->playerNameB." (".$p->playerNationB.") ";
                        echo $p->set1." ";
                        echo $p->set2." ";
                        echo $p->set3." ";
                        echo $p->set4." ";
                        echo $p->set5." ";
                        if ($match->winner == $p->id) echo " Wins";
                        echo PHP_EOL;
                }

                echo PHP_EOL;
        }
}
