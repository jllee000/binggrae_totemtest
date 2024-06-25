<style>
  .step32 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/bg11.png');
    animation: fadeIn 1s 1;
  }
</style>
<div class="step32 step">
  <div class="wood-area">
    <div class="last-wood-txt">
      자, 이제 그대의 토템을 <br />
      확인해 보시오.<br />
      그리고 앞으로는 절대<br />
      잃어버리지 않도록 하시오!
    </div>

  </div>
  <div class="finish-btn">
    <div class="story-answer">
      <div class="common-btn">
        <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector2.png" /></div>
        <div class="boong-txt">나만의 토템 확인하기</div>
        <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector2.png" /></div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.step32 .finish-btn').click(function() {
      gameActions.nextStep();
    })
  });
</script>