<?php
$mostTypeTitle = isset($mostTypeConfig['title']) ? $mostTypeConfig['title'] : _t('common.game_most_type', '가장 많은 유형');
$rankingButtonTitle = isset($mostTypeConfig['rankingButtonTitle']) ? _t('game.result_check_rank', $mostTypeConfig['rankingButtonTitle']) : _t('common.result_check_rank', '내 유형 순위 보러 가기');

if (DEPLOY_ENV == 'development' || DEPLOY_ENV == 'staging') {
  $introUrl = 'https://dev-external.metavv.com/totem';
} else {
  $introUrl = 'https://www.secretofbing.co.kr/totem';
};
?>

<div class="result-box most">
  <h3 class="result-box-title">
    <span><?= $mostTypeTitle ?></span>
  </h3>
  <h4 class="result-box-title2"><small>*<?= _t('common.game_most_type_desc', '참여 통계는 1시간마다 갱신됩니다.') ?></small></h4>

  <div class="img-halt-box">
    <ul class="list">
      <?php
      /* 결과 score 데이터 불러오기 */
      $score = $dao->loadScoreData();

      $labelClass = ['first', 'second'];

      $mostContents = $dao->getMostContents(2);
      foreach ($mostContents as $ii => $mc) :
        $mcScore = $mc['aresult'];

        foreach ($dao->questionResult as $qrst) {
          if ($qrst['result'] == $mcScore) {
            $mcTitle = explode("[]", _t("game.result{$mcScore}Title", $dao->questionResult[$mcScore]['title']));
          }
        }
      ?>
        <li>
          <a target="_top" href="<?= isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe' ? './result?score=' . $mcScore : $introUrl . '?result_score=' . $mcScore ?>">
            <span class="label-top <?= $labelClass[$ii] ?>"><?= _t("common.common_rank", "%s위", ($ii + 1)) ?></span>
            <span class="label-bottom">
              <?php
              foreach ($mcTitle as $mcTitleText) :
              ?>
                <span><?= $mcTitleText ?></span>
              <?php endforeach; ?>
              <em>(<?= $mc['Percentage'] ?>)</em>
            </span>
            <div>
              <img src="<?= _t("game.result{$mcScore}ImageMain", $dao->questionResult[$mcScore]['mainImg']) ?>" alt="<?= implode(' ', $mcTitle) ?>" class="img-responsive">
            </div>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php
  if (PAGE_TYPE == 'result') : ?>
    <div class="game-btn-wrapper btn_myranking">
      <?php if (isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe') { ?>
        <a class="game-btn" href="javascript:gameActions.moveToTypeRank()" oncontextmenu="return false"><?= $rankingButtonTitle ?></a>
      <? } else { ?>
        <a class="game-btn" onclick="popup_moveToTypeRank(219, event.target);" oncontextmenu="return false"><?= $rankingButtonTitle ?></a>
      <? } ?>
    </div>
  <?php endif; ?>
</div>