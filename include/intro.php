<?php
/* INTRO 유입 카운팅 */
$dao->logging(PAGE_TYPE);
/**
 * [GL Guide]: intro 화면
 * 1. 게임 결과값에 필요한 input 데이터는 다음 값들을 필수로 한다.(gameActions.js 참고)
 *   - name="변수명"
 *   - data-ga="init"
 *   - data-error="메세지" --> value가 없을 경우 에러 메세지
 *   - 예시: <input type="text" name="player_name" data-ga="init" data-error="당신의 이름을 입력해주세요." placeholder="이름 입력" />
 */
?>
<!-- 이미지 -->
<div class="intro-bg-cover">
</div>
<div class="intro-forest-area">
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/bg1.png" alt="image" class="img-width" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/bg2.png" alt="image" class="glow">
  <img src="<?= CDN_PATH ?>/assets/bing/main/intro/intro-shine.png" alt="image" class="shine">
</div>
<div class="img-box">
  <img src="<?= CDN_PATH ?>/assets/bing/main/intro/title.png" alt="인트로 배경">
</div>
<div class="user-nickname">
</div>
<div class="intro-input-wrap">
  <? if (isset($_SESSION['u_aid'])) { ?>
    <div class="intro-input">
      <img src="<?= CDN_PATH ?>/assets/bing/main/intro/input_deco.png" alt="input-deco" class="left">
      <input autocomplete="false" id="userNickname" name="player_name" data-ga="init" type="text" value="<?= $_SESSION['u_aname'] ?>" onkeyup="validateUserNickname(this.value)" />
      <img src="<?= CDN_PATH ?>/assets/bing/main/intro/input_deco.png" alt="input-deco" class="right">
    </div>
  <?
  } else {
  ?>
    <div class="intro-input">
      <img src="<?= CDN_PATH ?>/assets/bing/main/intro/input_deco.png" alt="input-deco" class="left">
      <input autocomplete="false" onkeyup="validateUserNickname(this.value)" id="userNickname" name="player_name" data-ga="init" data-error="이름을 입력해주세요." type="text" placeholder="이름을 입력해주세요" />
      <img src="<?= CDN_PATH ?>/assets/bing/main/intro/input_deco.png" alt="input-deco" class="right">
    </div>
  <?
  }
  ?>
  <div class="intro-start-btn">
    <img src="<?= CDN_PATH ?>/assets/bing/main/intro/star_2.png" alt="star" class="star">
    <div class="start">
      시작하기
      <img src="<?= CDN_PATH ?>/assets/bing/main/intro/bgm_button.png" alt="bgm" class="bgm">
    </div>
    <img src="<?= CDN_PATH ?>/assets/bing/main/intro/star_2.png" alt="star" class="star">
  </div>
  <dl class="game-count">
    <dt class="count-label"><?= _t('game.participant', '참여자 수') ?></dt>
    <dd class="count-num"><?= $dao->content['aclicks'] ?></dd>
  </dl>
</div>
<div class="intro-bottom <?php if (isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe') {
                            echo 'banggooso';
                          } ?>">
  <div class="line"></div>
  <?php if (isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe') { ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/gl/snippets/share-sns.php"; ?>
  <? } else { ?>
    <div class="intro-share-box">
      <a class="link" href="javascript: shareLink();" data-toggle="sns-share" data-service="link" data-url="<?= $introUrl ?>">
        <img src="<?= CDN_PATH ?>/assets/bing/main/result/link.png" alt="link">
        <p>링크 복사</p>
      </a>
      <div class="share-api">
        <img src="<?= CDN_PATH ?>/assets/bing/main/result/share.png" alt="share">
        <p>공유하기</p>
      </div>
    </div>
  <? } ?>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/219/include/most-types.php" ?>
</div>
<div class="preload-div" style="display:none;">
  <img src="<?= CDN_PATH ?>/assets/bing/main/intro/1-상.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/intro/3-상.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/intro/2-상.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/intro/4-상.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/intro/5-하.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/intro/7-하.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/intro/6-하.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/intro/8-하.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/skip.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/vector.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/tapnotice.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/light.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/fairy.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/bg1.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/bg2.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/4.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/5.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword1.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/7.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/8.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/notice-sword.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/8,9-notice.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/notice-sword.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword1.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword2.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword3.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword4.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword5.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword6.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword1.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/10-sword5-effect.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/11-island-bg.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/30.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/yogurt.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/sword.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/shake.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/yogurt-shine.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/notice.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/fader.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/yogurt/13-0.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/yogurt/13-1.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/yogurt/13-2.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/yogurt/13-3.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/yogurt/13-4.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/yogurt/13-5.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/yogurt/13-6.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/yogurt/13-7.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/9.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/10.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/storm.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/11.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/boong.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/boong1.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/boong3.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/12.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/13.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/14.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/15.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/16.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/default-sea1.png" />
  <img src='<?= CDN_PATH ?>/assets/bing/main/bg/default-sea2.png' />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/jellyfish.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/jellyfish-L.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/18.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/19.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/20.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/21.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/22.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/23.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/24.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/25.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/26.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/text/27.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/25-28-dark.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/26-zoom2.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/27-zoom3.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/28-zoom4.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/darker.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/32-cloud-l.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/32-cloud-r.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/33-cloud-l.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/33-cloud-r.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/34-cloud-l.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/34-cloud-r.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/bg4.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/item/31-캔디바.png" />
  <img src="<?= CDN_PATH ?>/assets/bing/main/bg/bg11.png" />
</div>
<!-- 참여자 수 -->
<!-- 조회수 10000 이상일시 노출되도록 되어있음 gameActions.js-->
<script>
  function validateUserNickname(_userNickname) {
    if (_userNickname.length > 10) {
      alert('10글자 이내로 입력해주세요!');
      $('#userNickname').val(_userNickname.substr(0, 10));
      return;
    }
    sessionStorage.setItem('userNickname', _userNickname);
    return _userNickname;
  }

  const share = async (
    title,
    subTitle,
    url
  ) => {
    try {
      await navigator.share({
        title: title,
        text: subTitle,
        url: url
      });
    } catch (error) {
      console.error('Error sharing:', error);
    }
  };

  $(function() {
    document.querySelector('.intro-start-btn').addEventListener('click', () => {
      argueGameActions.initGame();
    });

    document.querySelector('.share-api').addEventListener('click', async () => {
      share('빙그레 비밀학기 - 나만의 토템 테스트', '나의 낭만을 되찾아 줄 토템은?', '<?= $introUrl ?>');
    });
  })
</script>