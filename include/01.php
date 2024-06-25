<style>
</style>


<div class="step1 step">
  <div class="forest-bg">
    <img class="img-width" src="https://cdn.banggooso.com/assets/bing/main/bg/bg1.png" />
  </div>
  <div class="grass-area">
    <div class="pos-rel">
      <div class="grass grass-t1"><img src="https://cdn.banggooso.com/assets/bing/main/intro/1-상.png" class="grass-img-width " /></div>
      <div class="grass grass-t2"><img src="https://cdn.banggooso.com/assets/bing/main/intro/3-상.png" class="grass-img-width " /></div>
      <div class="grass grass-t3"><img src="https://cdn.banggooso.com/assets/bing/main/intro/2-상.png" class="grass-img-width " /></div>
      <div class="grass grass-t4"><img src="https://cdn.banggooso.com/assets/bing/main/intro/4-상.png" class="grass-img-width " /></div>
      <div class="grass grass-b1"><img src="https://cdn.banggooso.com/assets/bing/main/intro/5-하.png" class="grass-img-width " /></div>
      <div class="grass grass-b2"><img src="https://cdn.banggooso.com/assets/bing/main/intro/7-하.png" class="grass-img-width " /></div>
      <div class="grass grass-b3"><img src="https://cdn.banggooso.com/assets/bing/main/intro/6-하.png" class="grass-img-width " /></div>
      <div class="grass grass-b4"><img src="https://cdn.banggooso.com/assets/bing/main/intro/8-하.png" class="grass-img-width " /></div>
    </div>
  </div>
  <div class="step1-skip-area"><img src="https://cdn.banggooso.com/assets/bing/main/item/skip.png" class="img-width" /></div>
  <div class="step1-wood-area">
    <div class="first-wood-area">
      <div class="first-wood-txt">
        <span class="user-nickname"></span>, <br />
        비밀학기 실습에 온 걸 환영하오.<br />
        사람은 제각각의 토템을<br />
        지니고 태어나지만,<br />
        어느새 토템을<br />
        잃어버리곤 한다고 들었소.
      </div>
    </div>

  </div>
  <div class="step1-common-btn">
    <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector.png" /></div>
    <div class="intro-txt">토템이 뭔데?</div>
    <div><img class="vector-img" src="https://cdn.banggooso.com/assets/bing/main/item/vector.png" /></div>
  </div>
  <div class="tap-notice">
    <img src="https://cdn.banggooso.com/assets/bing/main/item/tapnotice.png" class="img-width" />
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    const savedNickname = sessionStorage.getItem('userNickname');
    $('.user-nickname').text(savedNickname);
    // $('.step1').click(function() {
    var classes = ['grass-move-t1', 'grass-move-t2', 'grass-move-t3', 'grass-move-t4', 'grass-move-b1', 'grass-move-b2', 'grass-move-b3', 'grass-move-b4'];
    $('.grass').each(function(index) {
      $(this).addClass(classes[index]);
    });
    setTimeout(() => {
      $('.forest-bg').addClass('expanded');

      $('.step1-wood-area').addClass('wood-up');
      setTimeout(() => {
        $('.grass-area').hide();
        setTimeout(() => {
          $('.first-wood-txt').css('animation', 'fadeIn 4s forwards');
          $('.step1-common-btn').addClass(`fadeIn-txt`);
          $('.step1-skip-area').addClass(`fadeIn-txt`);

        }, 800)
      }, 1500)



    }, 1000)
    // });
  });

  var clickCount = 1;

  $('.step1-common-btn').click(function() {

    $('.first-wood-txt').empty();
    if (clickCount == 1) {
      $('.first-wood-txt').append(` 종종 삶이 무료하다거나, <br />
        혹은 현실에 치여 산다고<br />
        느끼지 않았소?<br />
        토템은 그대만이 갖고 있는 낭만을<br />
        지켜주는 소중한 물건이오.<br />
        잃어버리면 안 되는 것이지.`);
      $('.first-wood-txt').css('animation', 'fadeIn 2s forwards');
      // $('.wood-txt-img img').attr('src', 'https://cdn.banggooso.com/assets/bing/main/text/2.png');
      $('.intro-txt').text('다시 찾을 수 있을까?');
    } else if (clickCount == 2) {
      $('.first-wood-txt').append(` 
        비밀학기는<br />
        그걸 다시 찾기 위해 만들어졌소.<br />
        자, 땅-바다-하늘을 거쳐<br />
        그대의 운명의 토템을 찾으시오!<br />
        그러면 첫 실습을<br/>무사히 마칠 수 있소.`);
      $('.first-wood-txt').css('animation', 'fadeIn 2s forwards');
      $('.step1 .tap-notice ').css('display', 'block');
      // $('.wood-txt-img img').attr('src', 'https://cdn.banggooso.com/assets/bing/main/text/3.png');
      $('.step1-common-btn').attr('style', 'display : none !important;');
      $('.step1-skip-area').attr('style', 'display : none !important;');
    }
    clickCount++;
  });
  $('.step1').click(function() {
    if (clickCount >= 3) {
      clickCount++;
      if (clickCount >= 5) {
        gameActions.nextStep();
      }
    }
  });

  $('.step1-skip-area').click(function() {
    gameActions.nextStep();
  })
</script>