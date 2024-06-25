<style>
  .step20 {
    padding: 0 1.875rem;
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/25-zoom1.png');
    animation: fadeIn 1s 1;
  }
</style>
<div class="step20 step">
  <div class="boong-dark-bg"><img src="https://cdn.banggooso.com/assets/bing/main/bg/25-28-dark.png" class="img-width" /></div>
  <div class="story-question"><img src="https://cdn.banggooso.com/assets/bing/main/text/19.png" class="img-width" /></div>
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

</div>

<script>
  $(document).ready(function() {
    $('.step20').click(function() {
      gameActions.nextStep();
    })
  });
</script>