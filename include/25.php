<?php
$qNum = 9;
$buttonsConfig = array();
$buttonsConfig['question1'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
?>
<style>
  .step25 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/bg4.png');
    animation: fadeIn 1s 1;
  }
</style>
<div class="step25 step">
  <div class="story-question"><img src="https://cdn.banggooso.com/assets/bing/main/text/23.png" class="img-width" /></div>
  <div class="cloud-area">
    <div class=" cloud cloud-1"><img src="https://cdn.banggooso.com/assets/bing/main/item/32-cloud-l.png" class="img-width" /></div>
    <div class=" cloud cloud-2"><img src="https://cdn.banggooso.com/assets/bing/main/item/32-cloud-r.png" class="img-width" /></div>
    <div class=" cloud cloud-3"><img src="https://cdn.banggooso.com/assets/bing/main/item/33-cloud-l.png" class="img-width" /></div>
    <div class=" cloud cloud-4"><img src="https://cdn.banggooso.com/assets/bing/main/item/33-cloud-r.png" class="img-width" /></div>
    <div class=" cloud cloud-5"><img src="https://cdn.banggooso.com/assets/bing/main/item/34-cloud-l.png" class="img-width" /></div>
    <div class=" cloud cloud-6"><img src="https://cdn.banggooso.com/assets/bing/main/item/34-cloud-r.png" class="img-width" /></div>
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