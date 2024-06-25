<?php
$qNum = 5;
$buttonsConfig = array();
$buttonsConfig['question1'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
?>
<style>
  .step12 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/bg2.png');
  }
</style>
<div class="step12 step">
  <div class="fader-bg"><img src="https://cdn.banggooso.com/assets/bing/main/bg/fader.png" class="img-width" /></div>
  <div class="story-question"><img src="https://cdn.banggooso.com/assets/bing/main/text/9.png" class="img-width" /></div>
  <div class="bubble-area">
    <div class="bubble b1"></div>
    <div class="bubble b2"></div>
    <div class="bubble b3"></div>
    <div class="bubble b4"></div>
    <div class="bubble b5"></div>
    <div class="bubble b6"></div>
    <div class="bubble b7"></div>
  </div>
  <div class="story-answer">
    <?php
    foreach ($buttonsConfig['answerArr'] as $answerIndex => $answer) {
    ?>
      <a class="common-btn" href="javascript:argueGameActions.selectArgueAnswer(<?= $qNum ?>, <?= $answerIndex ?>)">
        <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector.png" /></div>
        <div class="intro-txt"><?= str_replace('[]', '<br>', $buttonsConfig['answerArr'][$answerIndex]['answer']) ?></div>
        <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector.png" /></div>
      </a>
    <? } ?>
  </div>
</div>