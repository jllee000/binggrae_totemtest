<style>
  .step11 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/yogurt/13-0.png');
    background-position-x: center;
  }

  .yogurt-action {
    position: absolute;
    width: 100%;
    height: 100vh;
    top: 0;
    display: none;
  }
</style>
<div class="step11 step">
  <div class="yogurt-action yogurt-action-1"><img src="https://cdn.banggooso.com/assets/bing/main/yogurt/13-0.png" class="img-width" /></div>
  <div class="yogurt-action yogurt-action-2"><img src="https://cdn.banggooso.com/assets/bing/main/yogurt/13-1.png" class="img-width" /></div>
  <div class="yogurt-action yogurt-action-3"><img src="https://cdn.banggooso.com/assets/bing/main/yogurt/13-2.png" class="img-width" /></div>
  <div class="yogurt-action yogurt-action-4"><img src="https://cdn.banggooso.com/assets/bing/main/yogurt/13-3.png" class="img-width" /></div>
  <div class="yogurt-action yogurt-action-5"><img src="https://cdn.banggooso.com/assets/bing/main/yogurt/13-4.png" class="img-width" /></div>
  <div class="yogurt-action yogurt-action-6"><img src="https://cdn.banggooso.com/assets/bing/main/yogurt/13-5.png" class="img-width" /></div>
  <div class="yogurt-action yogurt-action-7"><img src="https://cdn.banggooso.com/assets/bing/main/yogurt/13-6.png" class="img-width" /></div>
  <div class="yogurt-action yogurt-action-8"><img src="https://cdn.banggooso.com/assets/bing/main/yogurt/13-7.png" class="img-width" /></div>
  <div class="sea-area">
    <div class="waves" :style="waveStyles">
      <div class="wave wave--back" :style="{ color: activeReminder.waveBackColor }">
        <div class="water">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 32" preserveAspectRatio="none">
            <path d="M350,17.32V32H0V17.32C116.56,65.94,175-39.51,350,17.32Z" />
          </svg>
        </div>
        <div class="water">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 32" preserveAspectRatio="none">
            <path d="M350,17.32V32H0V17.32C116.56,65.94,175-39.51,350,17.32Z" />
          </svg>
        </div>
      </div>
      <div class="wave wave--front" :style="{ color: activeReminder.waveFrontColor }">
        <div class="water">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 32" preserveAspectRatio="none">
            <path d="M350,17.32V32H0V17.32C116.56,65.94,175-39.51,350,17.32Z" />
          </svg>
        </div>
        <div class="water">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 32" preserveAspectRatio="none">
            <title>wave2</title>
            <path d="M350,17.32V32H0V17.32C116.56,65.94,175-39.51,350,17.32Z" />
          </svg>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {
    let currentAction = 1;
    let isAscending = true; // true: 1부터 8까지, false: 8부터 1까지
    const totalActions = 8;
    const actionInterval = 100; // 0.1초
    const audio1 = new Audio(soundEffect[currentStep][0]);
    const audio2 = new Audio(soundEffect[currentStep][1]);

    if (!document.querySelector('.sound').classList.contains('off')) {
      audio1.play();
      audio2.play();
    }

    // 1초마다 increaseHeight 함수 호출

    const showAction = setInterval(() => {
      if (currentAction > totalActions) {
        currentAction = 5;
      }
      const currentActionElement = document.querySelector('.yogurt-action-' + currentAction);
      if (currentActionElement) {
        currentActionElement.style.display = 'block';
        setTimeout(() => {
          currentActionElement.style.display = 'none';
        }, actionInterval);
      }
      currentAction++;
    }, actionInterval);

    const seaArea = $('.sea-area');
    let currentHeight = 0; // 시작 높이 (10vh)
    let intervalId; // interval의 ID 저장 변수

    // 1초마다 높이를 20vh씩 증가시키는 함수
    function increaseHeight() {
      currentHeight += 2; // 20vh씩 증가
      seaArea.css('height', currentHeight + 'vh');

      // 만약 높이가 100vh를 넘으면 interval 종료
      if (currentHeight >= 120) {
        clearInterval(intervalId);

        setTimeout(() => {
          $('.step11').append(`  <div class="fader-bg-1"><img src="https://cdn.banggooso.com/assets/bing/main/bg/fader.png" class="img-width" /></div>`);
          audio1.pause();
          audio2.pause();
          clearInterval(showAction);
          gameActions.nextStep();
        }, 50)
      }
    }
    setTimeout(() => {
      intervalId = setInterval(increaseHeight, 50);
    }, 300)
  });
</script>