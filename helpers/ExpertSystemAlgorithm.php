<?php

namespace helpers;

class ExpertSystemAlgorithm
{
  private $options;
  private $diseases;
  private $symptoms;
  private $knowledgeBases;

  public function __construct($options, $diseases, $symptoms, $knowledgeBases)
  {
    $this->options = $options;
    $this->diseases = $diseases;
    $this->symptoms = $symptoms;
    $this->knowledgeBases = $knowledgeBases;
  }

  public function forwardChaining()
  {
    $dataLength = count($this->knowledgeBases);
    $isSolving = false;
    while (!$isSolving) {
      $isNotFound = [];
      for ($i = 0; $i < $dataLength; $i++) {
        if (!empty($this->knowledgeBases[$i])) {
          $isFound = [];
          foreach (explode(",", $this->knowledgeBases[$i]['symptoms']) as $symptomId) {
            if (in_array($symptomId, $this->options)) {
              $isFound[] = true;
            }
          }
          if (count($isFound) == count(explode(",", $this->knowledgeBases[$i]['symptoms']))) {
            if (array_key_exists('diseaseId', json_decode($this->knowledgeBases[$i]['solvingId'], true))) {
              foreach ($this->diseases as $disease) {
                if ($disease['id'] == json_decode($this->knowledgeBases[$i]['solvingId'], true)['diseaseId']) {
                  return (array) $disease;
                }
              }
            } elseif (array_key_exists('symptomId', json_decode($this->knowledgeBases[$i]['solvingId'], true))) {
              foreach ($this->symptoms as $symptom) {
                if ($symptom['id'] == json_decode($this->knowledgeBases[$i]['solvingId'], true)['symptomId']) {
                  $this->options[] = (int) $symptom['id'];
                }
              }
              $isNotFound = [];
              unset($this->knowledgeBases[$i]);
            }
          } else {
            $isNotFound[] = true;
          }
        }

        if (count($this->knowledgeBases) <= count($isNotFound)) {
          return false;
        }
      }
    }
  }

  public function backwardChaining()
  {
    # code...
  }

  public function certaintyFactor()
  {
    # code...
  }

  public function teoremaBayes()
  {
    # code...
  }
}
