<?php
$userName = $dao->result['init_data']['player_name'];
?>
<style>
  .step31 {
    background-image: url('https://cdn.banggooso.com/assets/bing/main/bg/bg11.png');
    animation: fadeIn 1s 1;
  }
</style>
<div class="step31 step">
  <div class="wood-area">
    <div class="last-wood-txt">
      <span class="user-nickname"></span>, <br />
      끝까지 모험을 해내다니 대단하오!<br />
      내가 어떤 것에 행복을 느끼는지, <br />
      무엇에 몰입할 수 있는지,<br />
      어떤 꿈을 마음에 담고 있는지<br />
      진정으로 느낀 자만이<br />
      토템을 만날 수 있다고 들었소.
    </div>

  </div>

</div>

<script>
  $(document).ready(function() {
    const savedNickname = sessionStorage.getItem('userNickname');
    $('.user-nickname').text(savedNickname);
    $('.step31').click(function() {
      gameActions.nextStep();
    })
  });
</script>