<?php
define('GAME_IDX', 219); // <------------ [GL Guide]: 변경 필
define('PAGE_TYPE', 'list-type');

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/modules/dao.php';

if (DEPLOY_ENV == 'development' || DEPLOY_ENV == 'staging') {
  $homeUrl = 'https://dev-external.metavv.com/home';
  $introUrl = 'https://dev-external.metavv.com/totem';
} else {
  $homeUrl = 'https://www.secretofbing.co.kr/home';
  $introUrl = 'https://www.secretofbing.co.kr/totem';
};

$csrf = rand();
$_SESSION['csrf'] = $csrf;

$dao = new DAO(GAME_IDX);

$gameBlockMsg = null;
if (empty($dao->content)) {
  /* 콘텐츠 정보 없을 때, */
  // $gameBlockMsg = '존재하지 않는 테스트입니다.';
  $gameBlockMsg = '잘못된 접근입니다.';
} else {
  /* 게임 차단 안 함! */
}

/* 페이지 액세스 컨트롤 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/modules/accessControl.php';

if ($gameBlockMsg != null) {
  echo "<script>";
  if ($gameBlockMsg != '') {
    echo "alert('{$gameBlockMsg}');";
  }
  echo "location.href = '/'";
  echo "</script>";
  exit;
}

/* Javascript 상수로 사용 */
$jsVar = array();
$jsVar['JS_PAGE_TYPE'] = "'" . PAGE_TYPE . "'";
$jsVar['JS_GAME_IDX'] = "'" . GAME_IDX . "'";
$jsVar['JS_CSRF'] = "'{$_SESSION['csrf']}'";
$jsVar['JS_GAME_TITLE'] = "'{$dao->content['atitle']}'";
$jsVar['JS_SHARE_TITLE'] = "'{$dao->content['atitle']}'";
$jsVar['JS_SHARE_DESC'] = "'{$dao->content['acontent']}'";
$jsVar['JS_SHARE_IMG_PC'] = "'{$dao->content['afile_regName']}'";
$jsVar['JS_SHARE_IMG_M'] = "'{$dao->content['afile_regName_m']}'";
$jsVar['JS_SHARE_IMG_SQUARE'] = "'{$dao->content['afile_regName3']}'";

$listTypeConfig['listItem'] = true;
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/header.php'; ?>
<?php
$listTypeTitle = isset($listTypeConfig['title']) ? $listTypeConfig['title'] : _t('common.result_rank_now', '실시간 유형 순위');
$isListSorted = isset($listTypeConfig['sort']) ? $listTypeConfig['sort'] : true;
$sortingOrder = isset($gameStageInfo) ? $gameStageInfo['grade'] : array();
?>

<?php
if (isset($listTypeConfig['scoreItems'])) {
  $scoreItems = $listTypeConfig['scoreItems'];
} else {
  $dao->loadScoreData();
  $scoreItems = $dao->questionResult;
}

$mostContents = $dao->getMostContents(false);
foreach ($mostContents as $mc) {
  $scoreItems[$mc['aresult']]['count'] = $mc['Count'];
  $scoreItems[$mc['aresult']]['percent'] = $mc['Percentage'];
}

function sortingScoreUsingPercent($x, $y)
{
  if (isset($x['count']) && isset($y['count'])) {
    if ($x['count'] > $y['count']) {
      return -1;
    } else if ($x['count'] < $y['count']) {
      return 1;
    } else {
      return 0;
    }
  } else if (isset($x['count'])) {
    return -1;
  } else if (isset($y['count'])) {
    return 1;
  } else {
    return 0;
  }
}

function sortingScoreUsingGrade($x, $y)
{
  global $sortingOrder;
  return array_search($x, $sortingOrder) < array_search($y, $sortingOrder) ? -1 : 1;
}

if ($isListSorted) {
  uasort($scoreItems, 'sortingScoreUsingPercent');
} else if ($sortingOrder) {
  uksort($scoreItems, 'sortingScoreUsingGrade');
}
?>

<header class="app-header result-test-header">
  <?php if (isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe') { ?>
    <a class="app-header-btn back" href="javascript:func_goBack(JS_PAGE_TYPE, document.referrer, JS_GAME_TITLE);" title="뒤로가기"><i class="app-header-icon fas fa-chevron-left"></i></a>
    <a href="/" class="app-logo">방구석연구소</a>
  <? } else { ?>
    <a class="app-header-btn back bing" href="javascript:func_goBack(JS_PAGE_TYPE, document.referrer, JS_GAME_TITLE);" title="뒤로가기"><i class="app-header-icon fas fa-chevron-left"></i></a>
    <div class="app-logo bing-logo real-logo">빙그레 비밀학기</div>
    <a href="<?= $homeUrl ?>" target="_top" class="home"></a>
  <? } ?>
</header>

<main class="app-main">
  <div class="test-lists-wrap rank-page" style="<?= isset($rankListStyle) ? $rankListStyle : '' ?>">
    <div class="rank_title_wrap text-center">
      <div class="title">나만의 토템 테스트</div>
      <div class="line"></div>
      <div class="rank-title">
        <img src="<?= CDN_PATH ?>/assets/bing/main/result/rank-star.png" alt="rank-star">
        전체 유형 순위
        <img src="<?= CDN_PATH ?>/assets/bing/main/result/rank-star.png" alt="rank-star">
      </div>
    </div>
    <ul class="test-lists">
      <?php
      $rankNum = 1;
      foreach ($scoreItems as $scr => $sdt) :
        if (isset($listTypeConfig['listItem']) && $listTypeConfig['listItem'] == true) {
          include $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/list-item.php";
        } else {
          include $_SERVER['DOCUMENT_ROOT'] . "/gl/snippets/list-item.php";
        }
      endforeach;
      ?>
    </ul>
  </div>
</main>

<small>
  <?php
  // 개발 디버깅 용 영역
  // echo "<pre>" . print_r($_SESSION['game'], 1) . "</pre>";
  ?>
</small>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/footer.php'; ?>