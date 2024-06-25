<style>
  .step9 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/11-island-bg.png');
  }
</style>
<div class="step9 step">
  <div class="story-question"><img src="https://cdn.banggooso.com/assets/bing/main/text/30.png" class="img-width" /></div>
  <div class="yogurt-area">
    <img src="https://cdn.banggooso.com/assets/bing/main/item/yogurt.png" class="img-width bigger" />
  </div>
  <div class="sword-area">
    <img src="https://cdn.banggooso.com/assets/bing/main/item/sword.png" class="img-width" />
  </div>
</div>
<script>
  $(document).ready(function() {
    const audio = new Audio(soundEffect[currentStep]);
    if (!document.querySelector('.sound').classList.contains('off')) {
      audio.play();
    }
    $('.step9').click(function() {
      audio.pause();
      gameActions.nextStep();
    })
  });
</script>