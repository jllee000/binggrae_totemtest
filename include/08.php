<style>
  .step8 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/10-sword1.png');
    background-position-x: center;
  }
</style>
<div class="step8 step">
  <div class="light-cover"><img src="https://cdn.banggooso.com/assets/bing/main/bg/10-sword5-effect.png" /></div>
</div>
<script>
  $(document).ready(function() {
    var currentIndex = 1;
    var maxIndex = 6;

    const audio = new Audio(soundEffect[currentStep]);

    if (!document.querySelector('.sound').classList.contains('off')) {
      audio.play();
    }

    function changeBackground() {
      if (currentIndex == 5) {
        // setTimeout(() => {
        $('.light-cover').addClass('light-show');
        // }, 1000)
      }
      if (currentIndex == 6) {

        $('.step8').attr('style', 'animation: fadeIn 5s 1;')

      }
      var bgImage = `url('https://cdn.banggooso.com/assets/bing/main/bg/10-sword${currentIndex}.png')`;
      $('.step8').css('background-image', bgImage);
      currentIndex++; // 인덱스 증가 및 순환
      if (currentIndex > maxIndex) {
        $('.step8').removeClass('light-show');
        clearInterval(changeBg);
        $('.step8').click(function() {
          audio.pause();
          gameActions.nextStep();
        })
      }
    }
    // 1초마다 배경 이미지 변경
    let changeBg = setInterval(changeBackground, 300);
  });
</script>