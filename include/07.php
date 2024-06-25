<?php
$qNum = 4;
$buttonsConfig = array();
$buttonsConfig['question1'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
?>
<style>
  .step7 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/8,9-notice.png');
  }
</style>
<div class="step7 step">
  <div class="sword-notice"><img src="https://cdn.banggooso.com/assets/bing/main/item/notice-sword.png" class="img-width" /></div>
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
<div class="preload-div" style="display:none;">
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword1.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword2.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword3.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword4.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword5.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword6.png" />
</div>