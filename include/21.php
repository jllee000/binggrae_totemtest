<?php
$qNum = 7;
$buttonsConfig = array();
$buttonsConfig['question1'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
?>
<style>
  .step21 {
    padding: 0 1.875rem;
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/26-zoom2.png');
    animation: fadeIn 1s 1;
  }
</style>
<div class="step21 step">
  <div class="boong-dark-bg"><img src="https://cdn.banggooso.com/assets/bing/main/bg/25-28-dark.png" class="img-width" /></div>
  <div class="story-question"><img src="https://cdn.banggooso.com/assets/bing/main/text/20.png" class="img-width" /></div>
  <div class="jellyfish-area">
    <div class="jellyfish-1">
      <img src="https://cdn.banggooso.com/assets/bing/main/item/jellyfish.png" class="img-width jelly-default j-img" />
      <img src="https://cdn.banggooso.com/assets/bing/main/item/jellyfish-L.png" class="img-width jelly-light j-img" />
    </div>
    <div class="jellyfish-2">
      <img src="https://cdn.banggooso.com/assets/bing/main/item/jellyfish.png" class="img-width jelly-default j-img" />
      <img src="https://cdn.banggooso.com/assets/bing/main/item/jellyfish-L.png" class="img-width jelly-light j-img" />
    </div>
    <div class="jellyfish-3">
      <img src="https://cdn.banggooso.com/assets/bing/main/item/jellyfish.png" class="img-width jelly-default j-img" />
      <img src="https://cdn.banggooso.com/assets/bing/main/item/jellyfish-L.png" class="img-width jelly-light j-img" />
    </div>
  </div>
  <div class="boong-selecting"><img src="https://cdn.banggooso.com/assets/bing/main/item/boong.png" class="img-width" /></div>
  <div class="story-answer-ver2">
    <?php
    foreach ($buttonsConfig['answerArr'] as $answerIndex => $answer) {
    ?>
      <a class="common-btn-ver2" href="javascript:argueGameActions.selectArgueAnswer(<?= $qNum ?>, <?= $answerIndex ?>)">
        <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector.png" /></div>
        <div class="intro-txt"><?= str_replace('[]', '<br>', $buttonsConfig['answerArr'][$answerIndex]['answer']) ?></div>
        <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector.png" /></div>
      </a>
    <? } ?>

  </div>

</div>