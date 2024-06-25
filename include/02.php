<?php
$qNum = 1;
$buttonsConfig = array();
$buttonsConfig['question1'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
?>
<style>
  .step2 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/bg1.png');
  }
</style>
<div class="step2 step">
  <div class="story-question"><img src="https://cdn.banggooso.com/assets/bing/main/text/4.png" class="img-width" /></div>
  <div class="fairy-area">
    <img src="https://cdn.banggooso.com/assets/bing/main/item/light.png" class="fairy-light" />
    <img src="https://cdn.banggooso.com/assets/bing/main/item/fairy.png" class="fairy-img " />
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