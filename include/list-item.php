<li class="test-list-item rank_list">
  <a class="item-wrap" target="_top" href="<?= isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe' ? './result?score=' . $sdt['result']  : $introUrl . '?result_score=' . $sdt['result'] ?>">
    <div class="content">
      <div class="num"><?= $rankNum++ ?></div>
      <div class="item-info">
        <div class="percen"><?= $sdt['percent'] ?><?= $userLocale == 'ko-KR' ? "가 이 유형입니다." : str_replace('[]', '<br>', " of people are[]the same type as you") ?></div>
        <p>나의 토템은...</p>
        <h4 class="item-title">
          <p><?= _t('game.result' . $scr . 'text', $scoreItems[$scr]['title']) ?></p>
        </h4>
      </div>
    </div>
    <figure class="thumb">
      <img src="<?= $scoreItems[$scr]['mainImg'] ?>">
    </figure>
  </a>
</li>