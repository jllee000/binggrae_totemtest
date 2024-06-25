<style>
  .step30 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/bg4.png');
    animation: fadeIn 2s 1;
  }
</style>
<div class="step30 step">
  <div class="shooting-area">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>

</div>

<script>
  $(document).ready(function() {
    const audio = new Audio(soundEffect[currentStep]);
    if (!document.querySelector('.sound').classList.contains('off')) {
      audio.play();
    }
    $('.step30').click(function() {
      audio.pause();
      gameActions.nextStep();
    })
  });
</script>