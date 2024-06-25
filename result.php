<?php
define('GAME_IDX', 219); // <------------ [GL Guide]: 변경 필
define('PAGE_TYPE', 'result');

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/modules/dao.php';

$csrf = rand();
$_SESSION['csrf'] = $csrf;

$resultCode = isset($_REQUEST['code']) ? Fn_Requestx($_REQUEST['code']) : '';
$resultScore = isset($_REQUEST['score']) ? Fn_Requestx($_REQUEST['score']) : '';

if (DEPLOY_ENV == 'development' || DEPLOY_ENV == 'staging') {
  $homeUrl = 'https://dev-external.metavv.com/home';
  $introUrl = 'https://dev-external.metavv.com/totem';
} else {
  $homeUrl = 'https://www.secretofbing.co.kr/home';
  $introUrl = 'https://www.secretofbing.co.kr/totem';
};


if ($resultCode == '' && $resultScore == '') {
  Alert('잘못된 접근입니다!', '/gl/' . GAME_IDX . '/');
  exit();
} else {
  $dao = new DAO(GAME_IDX);
  require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/modules/accessControl.php';
  if ($resultScore == '') {
    /* 결과 데이터 불러오기 */
    $dao->loadResultData(GAME_IDX, $resultCode);
    if (empty($dao->result)) {
      Alert('잘못된 접근입니다!', '/gl/' . GAME_IDX . '/');
      exit();
    }
    /* resultScore 할당 */
    $resultScore = $dao->result['score'];
  }
}
/* 결과 score 데이터 불러오기 */
$dao->loadScoreData();
$currentResultData = $dao->questionResult[$resultScore];

/* 결과 상세 타이틀 */
$resultTitleConfig = array();
$resultTitleConfig['allowDownImg'] = true;
$resultTitleConfig['descTitle'] = "<p>" . str_replace('[]', '</p><p>', $currentResultData['descTitle']) . "</p>";

/* 결과 제목 가져오기 */
$resultTitle = str_replace('[]', ' ', $currentResultData['title']);

/* 공유이미지 */
$shareConfig = [];
$shareConfig['title'] = "나의 토템은 " . $resultTitle; // <------------ [GL Guide]: 변경 필
$shareConfig['desc'] = $dao->content['atitle'];
$shareConfig['imageSquare'] = $dao->questionResult[$resultScore]['shareSquareImg'];
$shareConfig['imagePc'] = $dao->questionResult[$resultScore]['sharePcImg']; //kakao pc
$shareConfig['imageM'] = $dao->questionResult[$resultScore]['shareMImg']; // kakao m, facebook
$shareConfig['listTitle'] = '테스트 공유하기';

// GUEST 별 답변 비율 list 조회
$guestSelectedCntList = $dao->getArgueGuestCount('', array('g_num' => 'asc'));
$questionSelectedCntList = $dao->getQuestionCount();

define('PAGE_OG_TITLE', $shareConfig['title']);
define('PAGE_OG_DESC', $shareConfig['desc']);
define('PAGE_OG_IMAGE', $shareConfig['imageM']);
/* Javascript 상수로 사용 */
$jsVar = [];
$jsVar['JS_PAGE_TYPE'] = "'" . PAGE_TYPE . "'";
$jsVar['JS_CSRF'] = "'{$_SESSION['csrf']}'";
$jsVar['JS_GAME_IDX'] = "'" . GAME_IDX . "'";
$jsVar['JS_GAME_TITLE'] = "'{$dao->content['atitle']}'";
$jsVar['JS_SHARE_TITLE'] = "'{$shareConfig['title']}'";
$jsVar['JS_SHARE_DESC'] = "'{$shareConfig['desc']}'";
$jsVar['JS_SHARE_IMG_SQUARE'] = "'{$shareConfig['imageSquare']}'";
$jsVar['JS_SHARE_IMG_PC'] = "'{$shareConfig['imagePc']}'";
$jsVar['JS_SHARE_IMG_M'] = "'{$shareConfig['imageM']}'";

$listTypeConfig['listItem'] = true; // 커스텀 유형별 순위 유무
// 유형별 퍼센트 가져오기
$mostContents = $dao->getMostContents(false);

// echo json_encode($test, true);
$resultStats = array();

foreach ($mostContents as $i => $mc) {
  $mcResult = $mc['aresult'];
  $precent = str_replace('%', '', $mc['Percentage']);
  $resultStats[$mcResult] = $precent;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/gl/layout/header.php';

$userName = $dao->result['init_data']['player_name'];

if (isset($_GET['score'])) {
  $mbti = strtoupper($_GET['score']);
} else {
  $mbti = strtoupper($dao->result['score']);
}

$json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/gl/219/include/data/category.json');
$category = json_decode($json, true);

if (!isset($userName)) {
  $userName = "나";
}

/* popup 설정 */
$popupConfig = array();
$popupConfig['most-type-link'] = 'ranking';
$popupConfig['list'] = array(
  0 => 'most-type'
);

$popupConfig['app-open-message'] = str_replace("[]", "<br />", _t('common.pop_app_down_relation_btn', '방구석연구소 앱에서[]환상의 케미를[]확인할 수 있어!'));
$popupConfig['app-open-path'] = $_SERVER['REQUEST_URI'];
?>
<?php if (isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe') { ?>
  <header class="app-header result">
    <a class="app-header-btn back" href="#" onclick="func_goBack(JS_PAGE_TYPE, '/gl/' + JS_GAME_IDX + '/', JS_GAME_TITLE)" title="뒤로가기"></a>
    <a href="/" class="app-logo header-logo real-logo">방구석연구소</a>
    <a href="javascript:void(0);" class="app-logo header-logo dummy-logo" style="display:none;">방구석연구소</a>
  </header>
<? } else { ?>
  <header class="app-header bing-header">
    <a class="app-header-btn back bing" href="<?= $introUrl ?>" target="_top" title="뒤로가기"></a>
    <div class="app-logo bing-logo real-logo">빙그레 비밀학기</div>
    <a href="javascript:void(0);" class="app-logo intro-logo dummy-logo" style="display:none;">빙그레 비밀학기</a>
    <a href="<?= $homeUrl ?>" target="_top" class="home"></a>
  </header>
<? } ?>
<div class="header-area"></div>
<main class="app-main result">
  <article class="game-result">
    <div class="user">
      <span><?= $userName ?></span>의 토템은...
    </div>
    <div class="capture-wrapper">
      <div class="capture-wrap" id="capture">
        <img src="<?= CDN_PATH ?>/assets/bing/main/result/<?= $mbti ?>.png" alt="result">
      </div>
    </div>
    <p class="thumb-img-text">▲&nbsp;이미지 꾹 눌러서 저장하기&nbsp;▲</p>
    <p class="share">저장한 이미지에 공감되는 문구 체크&친구 태그 후<br>SNS에 공유하면 토템의 효능이 올라갑니다.</p>
    <img src="<?= CDN_PATH ?>/assets/bing/main/result/stars.png" alt="stars" class="stars">
    <div class="result-summary">
      <div class="title">
        <img src="<?= CDN_PATH ?>/assets/bing/main/result/quotes.png" class="front" alt="quotes">
        토템을 지니고 있으면<br><span>낭만을 잃지 않을 것이오.</span>
        <img src="<?= CDN_PATH ?>/assets/bing/main/result/quotes.png" class="back" alt="quotes">
      </div>
      <div class="content">
        <div class="price-container">
          <img src="<?= CDN_PATH ?>/assets/bing/main/result/<?= $mbti ?>_price.png" alt="image">
        </div>
        <p><?= $category[$mbti]['summary'] ?></p>
      </div>
    </div>
    <div class="event">
      <div class="event_1">
        <div class="text">EVENT 1</div>
        <div class="title">
          <img src="<?= CDN_PATH ?>/assets/bing/main/result/left.png" alt="star">
          토템 키링 굿즈 이벤트
          <img src="<?= CDN_PATH ?>/assets/bing/main/result/right.png" alt="star">
        </div>
        <div class="sub-title">지금 이 순간,<br>토템을 진짜로 가질 수 있는 기회가 왔소!</div>
        <p>당첨자는 추후 오프라인 이벤트에서<br>빅리워드를 얻을 기회가 주어집니다.<span class="first_period">(1차 당첨자 한정)</span></p>
        <div class="event1_price">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="<?= CDN_PATH ?>/assets/bing/main/result/rolling_1.png">
              </div>
              <div class="swiper-slide">
                <img src="<?= CDN_PATH ?>/assets/bing/main/result/rolling_2.png">
              </div>
              <div class="swiper-slide">
                <img src="<?= CDN_PATH ?>/assets/bing/main/result/rolling_3.png">
              </div>
              <div class="swiper-slide">
                <img src="<?= CDN_PATH ?>/assets/bing/main/result/rolling_4.png">
              </div>
              <div class="swiper-slide">
                <img src="<?= CDN_PATH ?>/assets/bing/main/result/rolling_5.png">
              </div>
              <div class="swiper-slide">
                <img src="<?= CDN_PATH ?>/assets/bing/main/result/rolling_6.png">
              </div>
              <div class="swiper-slide">
                <img src="<?= CDN_PATH ?>/assets/bing/main/result/rolling_7.png">
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <p><span>토템 굿즈 세트 (800명)</span><br>커스텀 모루인형 + 토템(미니어처) + 접착제</p>
        </div>
        <div class="lg_button" onclick="gameActions.moveToBannerLink('https://forms.gle/S9tGPdMChViopT9BA','랜딩 링크_토템 키링 굿즈 신청하기 버튼');">토템 키링 굿즈 신청하기</div>
        <p class="period">
          <span>신청 기간 : </span>2024. 06. 26(수) - 2024. 07. 17(수)<br>
          <span>당첨자 발표 : </span>1차 2024. 07. 05 (금) | 2차 2024. 07. 19 (금)<br>
          당첨자 발표는 빙그레 인스타그램(@binggraekorea)<br>계정에서 공개됩니다.
        </p>
      </div>
      <div class="line"></div>
      <div class="event_2">
        <div class="text">EVENT 2</div>
        <div class="title">
          <img src="<?= CDN_PATH ?>/assets/bing/main/result/left.png" alt="star">
          SNS 공유 이벤트
          <img src="<?= CDN_PATH ?>/assets/bing/main/result/right.png" alt="star">
        </div>
        <div class="sub-title">낭만을 얻은 자,<br>소중한 사람과 그 낭만을 함께 즐기시오!</div>
        <div class="event2_price">
          <div class="first">
            <img src="<?= CDN_PATH ?>/assets/bing/main/result/event_price_1.png" alt="price">
            <div>
              <p>
                <img src="<?= CDN_PATH ?>/assets/bing/main/result/star.png" alt="star">
                50만원 상당 호캉스 패키지
                <img src="<?= CDN_PATH ?>/assets/bing/main/result/star.png" alt="star">
              </p>
              <span>1명</span>
            </div>
          </div>
          <div class="rest">
            <div class="second">
              <img src="<?= CDN_PATH ?>/assets/bing/main/result/event_price_2.png" alt="price">
              <p>
                스냅사진 2인 촬영권
              </p>
              <span>3명</span>
            </div>
            <div class="third">
              <img src="<?= CDN_PATH ?>/assets/bing/main/result/event_price_3.png" alt="price">
              <p>
                바나나맛우유 기프티콘
              </p>
              <span>200명</span>
            </div>
          </div>
        </div>
      </div>
      <div class="steps">
        <div class="top">
          <div class="event-step1">STEP 1</div>
          <p><span>나만의 토템 테스트 결과</span> 이미지 저장하기</p>
          <img src="<?= CDN_PATH ?>/assets/bing/main/result/arrow_down.png" alt="arrow_down">
          <div class="event-step2">STEP 2</div>
          <p>이미지를 인스타그램 스토리/피드 or 트위터에<br>공유하면 참여 완료!</p>
        </div>
        <div class="steps-line"></div>
        <div class="bottom">
          <p><span>해시태그</span>와 <span>빙그레 계정</span> 태그 필수!</p>
          <p>
            <img src="<?= CDN_PATH ?>/assets/bing/main/result/instagram.png" alt="instagram">
            <img src="<?= CDN_PATH ?>/assets/bing/main/result/twitter.png" alt="twitter">
            <span>binggraekorea</span>
          </p>
          <div class="tags">
            <div class="tag1">#빙그레비밀학기</div>
            <div class="tag2">#나만의토템테스트</div>
          </div>
          <a class="md_button" data-toggle="sns-share" data-service="link" data-url="@binggraekorea #빙그레비밀학기 #나만의토템테스트">해시태그 복사하기</a>
          <p>
            - 이벤트 기간 : 2024.06.26 (수) - 2024.07.19 (금)<br>
            - 당첨자 발표 : 2024.07.30 (화)<br>
            *당첨자 발표는 빙그레 인스타그램(@binggraekorea)<br>계정에서 공개됩니다.<br>
            *비공개 계정은 확인이 어렵습니다.<br>
            *5만원 이상 경품의 제세공과금(경품 단가의 22%)은<br>
            당첨자 본인 부담이며, 미납 시 당첨이 취소될 수 있습니다.
          </p>
        </div>
      </div>
    </div>
    <?php if (isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] == 'iframe') { ?>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/gl/snippets/share-sns.php"; ?>
    <? } else { ?>
      <div class="share-sns result">
        <a class="link" href="javascript: shareLink();" data-toggle="sns-share" data-service="link" data-url="<?= $introUrl ?>?result_<?= $_SERVER['QUERY_STRING'] ?>">
          <img src="<?= CDN_PATH ?>/assets/bing/main/result/link.png" alt="link">
          <p>링크 복사</p>
        </a>
        <div class="share-api">
          <img src="<?= CDN_PATH ?>/assets/bing/main/result/share.png" alt="share">
          <p>공유하기</p>
        </div>
      </div>
    <? } ?>
    <div class="match-totem">
      <p class="match-totem-title">
        <img class="star" src="<?= CDN_PATH ?>/assets/bing/main/result/star.png" alt="star">
        잘 맞는 궁합
        <img class="star" src="<?= CDN_PATH ?>/assets/bing/main/result/star.png" alt="star">
      </p>
      <div class="totem-container">
        <a class="totem_1" target="_top" href="<?= isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe' ? './result?score=' . $category[$mbti]['match_totem'][0] : $introUrl . '?result_score=' . $category[$mbti]['match_totem'][0] ?>">
          <div class="text">
            <p class="rank">1위</p>
            <div class="vertical-line"></div>
            <p class="totem"><?= $category[$category[$mbti]['match_totem'][0]]['title'] ?></p>
          </div>
          <div class="image">
            <img src="<?= CDN_PATH ?>/assets/bing/main/result/<?= $category[$mbti]['match_totem'][0] ?>_result.png" alt="image">
          </div>
        </a>
        <a class="totem_2" target="_top" href="<?= isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe' ? './result?score=' . $category[$mbti]['match_totem'][1] : $introUrl . '?result_score=' . $category[$mbti]['match_totem'][1] ?>">
          <div class="text">
            <p class="rank">2위</p>
            <div class="vertical-line"></div>
            <p class="totem"><?= $category[$category[$mbti]['match_totem'][1]]['title'] ?></p>
          </div>
          <div class="image">
            <img src="<?= CDN_PATH ?>/assets/bing/main/result/<?= $category[$mbti]['match_totem'][1] ?>_result.png" alt="image">
          </div>
        </a>
      </div>
    </div>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/219/include/most-types.php" ?>
    <?php if (isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe') { ?>
      <a href="/gl/219" class="lg_button restart">다시하기<img src="<?= CDN_PATH ?>/assets/bing/main/result/restart.png" alt="restart"></a>
    <? } else { ?>
      <a href="<?= $introUrl ?>" target="_top" class="lg_button restart">다시하기<img src="<?= CDN_PATH ?>/assets/bing/main/result/restart.png" alt="restart"></a>
    <? } ?>
    <?php if (isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] != 'iframe') { ?>
      <!-- 콘탠츠 더보기 -->
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/gl/" . GAME_IDX . "/include/contents-more.php"; ?>
      <!-- 추천 컨텐츠 -->
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/gl/219/include/recommend-content.php'; ?>
    <? } else { ?>
      <div class="margin-bottom"></div>
    <? } ?>
  </article>
</main>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/gl/layout/footer.php"; ?>

<script>
  $(function() {
    myAvatarGameActions.avatarCapture(false, 4);

    document.querySelector('.share-api').addEventListener('click', async () => {
      share('빙그레 비밀학기 - 나만의 토템 테스트', '나의 낭만을 되찾아 줄 토템은?', '<?= $introUrl ?>?result_<?= $_SERVER['QUERY_STRING'] ?>');
    });
  });

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

  var swiper = new Swiper(".mySwiper", {
    allowTouchMove: false,
    clickable: false,
    spaceBetween: 30,
    effect: "fade",
    autoplay: {
      delay: 2000,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination"
    },
  });
</script>