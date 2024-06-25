<style>
  .step23 {
    padding: 0 1.875rem;
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/28-zoom4.png');
    animation: fadeIn 1s 1;
  }
</style>
<div class="step23 step">
  <div class="boong-dark-bg"><img src="https://cdn.banggooso.com/assets/bing/main/bg/25-28-dark.png" class="img-width" /></div>
  <div class="boong-selecting"><img src="https://cdn.banggooso.com/assets/bing/main/item/boong.png" class="img-width" /></div>
</div>

<script>
  $(document).ready(function() {
    setTimeout(() => {
      $('.step23').append(`  <div class="boong-dark-bg boong-dark-bg-1"><img src="https://cdn.banggooso.com/assets/bing/main/bg/darker.png" class="img-width" /></div>`);
      gameActions.nextStep();
    }, 1000)

  });
</script>