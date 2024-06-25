<style>
  .step14 {
    padding: 0 1.875rem;
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/bg2.png');
  }
</style>
<div class="step14 step">
  <div class="story-question"><img src="https://cdn.banggooso.com/assets/bing/main/text/11.png" class="img-width" /></div>
  <div class="boong-img"><img src="https://cdn.banggooso.com/assets/bing/main/item/boong1.png" class="img-width" /></div>

  <div class="story-answer">
    <div class="common-btn">
      <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector.png" /></div>
      <div class="boong-txt">붕어빵?</div>
      <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector.png" /></div>
    </div>

  </div>

</div>


<script>
  $(document).ready(function() {
    var boongImages = [2, 3]; // 이미지 인덱스
    var index = 0; // 이미지 배열 인덱스

    // 1초마다 이미지를 변경하는 함수
    function changeBoongImage() {
      if (index >= 2) {
        index = 0;
      }
      $('.boong-img img').attr('src', `https://cdn.banggooso.com/assets/bing/main/item/boong${boongImages[index]}.png`);
      index++;
    }

    var clickBoongCount = 1;

    $('.step14').click(function() {

      $('.step14 .common-btn').addClass('common-btn-show ');
      if (clickBoongCount == 1) {
        $('.story-question img').attr('src', 'https://cdn.banggooso.com/assets/bing/main/text/12.png');
        $('.step14 .common-btn').attr('style', 'animation: fadeIn 2s 1;');
        $('.boong-txt').text('붕어빵?');
      } else if (clickBoongCount == 2) {
        $('.story-question img').attr('src', 'https://cdn.banggooso.com/assets/bing/main/text/13.png');
        $('.step14 .common-btn').attr('style', 'animation: fadeIn 2s 1;');
        $('.boong-txt').text('붕어빵 아이스크림..?');
      } else if (clickBoongCount == 3) {
        $('.story-question img').attr('src', 'https://cdn.banggooso.com/assets/bing/main/text/14.png');
        $('.step14 .common-btn').attr('style', 'animation: fadeIn 2s 1;');
        $('.boong-txt').text('...붕어.....?');
      } else {
        gameActions.nextStep();
      }
      clickBoongCount++;
    });
    setInterval(changeBoongImage, 800);
  });
</script>