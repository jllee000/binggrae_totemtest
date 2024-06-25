<style>
  .step13 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/bg2.png');
  }
</style>
<div class="step13 step">
  <div class="story-question"><img src="https://cdn.banggooso.com/assets/bing/main/text/10.png" class="img-width" /></div>
  <div>
    <div class="storm-img"><img src="https://cdn.banggooso.com/assets/bing/main/item/storm.png" class="img-width" /></div>
  </div>
</div>


<script>
  $(document).ready(function() {
    const audio = new Audio(soundEffect[currentStep]);
    if (!document.querySelector('.sound').classList.contains('off')) {
      audio.play();
    }
    $('.step13').click(function() {
      audio.pause();
      gameActions.nextStep();
    })
  })
</script>