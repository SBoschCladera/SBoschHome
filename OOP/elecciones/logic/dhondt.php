<?php
//https://www.brainum.es/code/php/sistema-d-hondt-de-reparto-de-escanos-en-php

function sortPartiesCmp($a, $b)
{
    if ($a['votes'] == $b['votes']) return 0;
    else return ($a['votes'] > $b['votes']) ? -1 : 1;
}
class Dhondt
{
    public $seats = 0, $min = 0, $blankVotes = 0;
    private $votes = 0, $parties = array();

    public function addParty($district, $party, $votes)
    {
        $this->parties[] = array('district' => $district, 'party' => $party, 'votes' => $votes, 'seats' => 0, 'ok' => true);
        $this->votes += $votes;
    }
    public function addParties($parties)
    {
        if (is_array($parties))
            foreach ($parties as $party) {
                if (isset($party['party']) && isset($party['votes'])) {
                    $party['seats'] = 0;
                    $party['ok'] = true;
                    $this->parties[] = $party;
                    $this->votes += $party['votes'];
                }
            }
    }
    public function process()
    {
        $this->totalVotes = ($this->blankVotes + $this->votes);
        $minVotes = $this->totalVotes * $this->min / 100;

        foreach ($this->parties as $p) {
            if ($p['votes'] <= $minVotes) $p['ok'] = false;
        }
        for ($i = 0; $i < $this->seats; $i++) {
            foreach ($this->parties as $id => $p) {
                if ($p['ok'] && $p['votes'] / (1 + $p['seats']) > @$max[1])
                    $max = array($id, $p['votes'] / (1 + $p['seats']));
            }
            $this->parties[$max[0]]['seats']++;
            $max = array();
        }
        usort($this->parties, "sortPartiesCmp");
    }
    public function getParties()
    {
        return $this->parties;
    }
    public function getVotes()
    {
        return $this->totalVotes;
    }
}