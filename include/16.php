<style>
  .step16 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/default-sea1.png');
    animation: fadeIn 1s 1;
  }
</style>
<div class="step16 step">
  <div class="bubble-area">
    <div class="bubble b1"></div>
    <div class="bubble b2"></div>
    <div class="bubble b3"></div>
    <div class="bubble b4"></div>
    <div class="bubble b5"></div>
    <div class="bubble b6"></div>
    <div class="bubble b7"></div>
  </div>
</div>


<script>
  $(document).ready(function() {
    const audio = new Audio(soundEffect[currentStep]);
    if (!document.querySelector('.sound').classList.contains('off')) {
      audio.play();
    }
    setTimeout(() => {
      audio.pause();
      gameActions.nextStep();
    }, 700)
  });
</script>