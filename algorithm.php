<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
    Up to you which header to send, some prefer 404 even if 
    the files does exist for security
  */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: /'));
}

class Algo
{
    public $idx;
    public $resultData;

    public function __construct($_idx, $_resultData)
    {
        $this->idx = $_idx;
        $this->resultData = $_resultData;
        // resultData 세팅
        $this->setResultScore();
    }

    function setResultScore()
    {
        global $dao;

        foreach ($this->resultData['answer'] as $key => $value) {

            $answerKeyArr = array_keys($value[0]); // answer 키 추출

            $dao->saveArgueCountData($this->idx, $this->resultData['guest']['gnum'], $key, $answerKeyArr[0]);
        }

        $scoreCount = array_count_values(array_flatten($this->resultData['answer']));
        $resultScore = "";
        $sumString = "";

        foreach ($scoreCount as $key => $value) {
            $sumString .= str_repeat($key, $value);
        }

        $newCount = array("I" => 0, "E" => 0, "T" => 0, "F" => 0, "N" => 0, "S" => 0, "P" => 0, "J" => 0);

        foreach (count_chars($sumString, 1) as $key => $value) {
            $newCount[chr($key)] = $value;
        }

        if ($newCount['E'] > $newCount['I']) {
            $resultScore .= 'E';
        } else {
            $resultScore .= 'I';
        }
        if ($newCount['N'] > $newCount['S']) {
            $resultScore .= 'N';
        } else {
            $resultScore .= 'S';
        }
        if ($newCount['F'] > $newCount['T']) {
            $resultScore .= 'F';
        } else {
            $resultScore .= 'T';
        }
        if ($newCount['J'] > $newCount['P']) {
            $resultScore .= 'J';
        } else {
            $resultScore .= 'P';
        }

        $this->resultData['score'] = $resultScore;
    }
}
