<style>
  .step10 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/11-island-bg.png');
  }
</style>
<div class="step10 step">
  <div class="item" draggable="true"> </div>
  <div class="yogurt2-area">
    <div class="sword-shake-area shake1" draggable="true"><img class="img-width" src="https://cdn.banggooso.com/assets/bing/main/item/shake.png" /></div>
    <div class="sword-shake-area shake2" draggable="true"><img class="img-width" src="https://cdn.banggooso.com/assets/bing/main/item/shake.png" /></div>
    <div class="sword-shake-area shake3" draggable="true"><img class="img-width" src="https://cdn.banggooso.com/assets/bing/main/item/shake.png" /></div>
    <img class="img-width yogurt-shining" src="https://cdn.banggooso.com/assets/bing/main/item/yogurt-shine.png" class="img-width" />
    <img class="img-width bigger" src="https://cdn.banggooso.com/assets/bing/main/item/yogurt.png" class="img-width" />
  </div>

  <div class="bottom-notice">
    <img class="img-width" src="https://cdn.banggooso.com/assets/bing/main/item/notice.png" />
  </div>
</div>

<script>
  $(document).ready(function() {
    var dragCnt = 0;
    const item = document.querySelector(".item");

    const audio1 = new Audio(soundEffect[currentStep]);
    const audio2 = new Audio(soundEffect[currentStep]);
    const audio3 = new Audio(soundEffect[currentStep]);

    document.querySelectorAll('.item').forEach(element => {
      element.addEventListener('touchstart', (event) => {
        dragCnt++;
        if (dragCnt == 1) {
          if (!document.querySelector('.sound').classList.contains('off')) {
            audio1.play();
          }
          $('.shake2').css('display', 'block');
        } else if (dragCnt == 2) {
          if (!document.querySelector('.sound').classList.contains('off')) {
            audio2.play();
          }
          $('.shake1').css('display', 'block');
        } else if (dragCnt == 3) {
          if (!document.querySelector('.sound').classList.contains('off')) {
            audio3.play();
          }
          $('.shake3').css('display', 'block');
          setTimeout(() => {
            $('.step10').on('click tap', () => {
              audio1.pause();
              audio2.pause();
              audio3.pause();
              gameActions.nextStep();
            })
          }, 700)
        }

      });
    });
    item.addEventListener("dragstart", (e) => {
      dragCnt++;
      if (dragCnt == 1) {
        if (!document.querySelector('.sound').classList.contains('off')) {
          audio1.play();
        }
        $('.shake2').css('display', 'block');
      } else if (dragCnt == 2) {
        if (!document.querySelector('.sound').classList.contains('off')) {
          audio2.play();
        }
        $('.shake1').css('display', 'block');
      } else if (dragCnt == 3) {
        if (!document.querySelector('.sound').classList.contains('off')) {
          audio3.play();
        }
        $('.shake3').css('display', 'block');
        setTimeout(() => {
          audio1.pause();
          audio2.pause();
          audio3.pause();
          gameActions.nextStep();
        }, 700)
      }
    });
  });
</script>