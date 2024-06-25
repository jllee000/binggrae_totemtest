<?php
$qNum = 11;
$buttonsConfig = array();
$buttonsConfig['question1'] = $dao->question[$qNum]['question'];
$buttonsConfig['answerArr'] = $dao->question[$qNum]['answerArr'];
?>
<style>
  .step28 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/bg4.png');
    animation: fadeIn 2s 1;
  }
</style>
<div class="step28 step">
  <div class="story-question"><img src="https://cdn.banggooso.com/assets/bing/main/text/26.png" class="img-width" /></div>
  <div class="cloud-area">
    <div class=" cloud cloud-1"><img src="https://cdn.banggooso.com/assets/bing/main/item/32-cloud-l.png" class="img-width" /></div>
    <div class=" cloud cloud-2"><img src="https://cdn.banggooso.com/assets/bing/main/item/32-cloud-r.png" class="img-width" /></div>
    <div class=" cloud cloud-3"><img src="https://cdn.banggooso.com/assets/bing/main/item/33-cloud-l.png" class="img-width" /></div>
    <div class=" cloud cloud-4"><img src="https://cdn.banggooso.com/assets/bing/main/item/33-cloud-r.png" class="img-width" /></div>
    <div class=" cloud cloud-5"><img src="https://cdn.banggooso.com/assets/bing/main/item/34-cloud-l.png" class="img-width" /></div>
    <div class=" cloud cloud-6"><img src="https://cdn.banggooso.com/assets/bing/main/item/34-cloud-r.png" class="img-width" /></div>
  </div>
  <div class="story-answer-ver3">
    <?php
    foreach ($buttonsConfig['answerArr'] as $answerIndex => $answer) {
    ?>
      <a class="common-btn-ver2" href="javascript:void(0)" onclick="handleButtonClick(<?= $qNum ?>, <?= $answerIndex ?>)">
        <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector.png" /></div>
        <div class="intro-txt"><?= str_replace('[]', '<br>', $buttonsConfig['answerArr'][$answerIndex]['answer']) ?></div>
        <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector.png" /></div>
      </a>
    <? } ?>

  </div>
  <div class="bar-area">
    <img class="img-width" src="https://cdn.banggooso.com/assets/bing/main/item/31-캔디바.png" />
  </div>
</div>

<script>
  function handleButtonClick(questionNum, answerIndex) {
    if (answerIndex == 0) {
      $('.bar-area').css('animation', 'barMoveLeft 2s forwards');
    } else {
      $('.bar-area').css('animation', 'barMoveRight 2s forwards');
    }

    setTimeout(() => {
      argueGameActions.selectArgueAnswer(questionNum, answerIndex);
    }, 1000);
  }
</script>