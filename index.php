<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#"> <!-- OGPを設定することでSNSでページや記事の内容をわかりやすくユーザーに伝える事が出来る -->
    <head>
        <!-- 文字コードを設定する -->
        <meta charset="uft-8">
        <!-- viewportの設定 -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!---------- OGPの設定 ---------->
        <meta property="og:title" content="kurayoshi's portfolio">
        <meta property="og:description" content="kurayoshi's portfolio ポジティブ思考のおっさんの自己紹介、どの様なサービスを提供出来るのか、実際にこんな事が出来ますというものを載せています。お仕事のご相談、ご依頼も受け付けております。">
        <!---------- OGPの設定 ここまで ---------->

        <!-- リセットCSSを読み込む -->
        <link rel="stylesheet" href="css/reset.css">
        <!-- 自作のCSSを読み込む -->
        <link rel="stylesheet" href="css/style.css">
        <!-- BootStrapを読み込む -->
        <link href="css/BootStrap.css/bootstrap.min.css" rel="stylesheet">
        <!-- アイコン表示のためFont Awesomeを読み込む -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <!-- jQueryを読み込む -->
        <script src="js/jquery-3.6.0.min.js"></script>
        <title>kurayoshi's portfolio</title>
    </head>

    <body>
        <div class="container">
            <!---------- メニュー表示 ---------->
                <!-- メニューボタン -->
                <button id="btn-menu">
                    <!-- MENUの上の白線3本 -->
                    <span></span>
                    <span></span>
                    <span></span>
                    <!-- ここまで -->
                </button>

                <!-- メニュー -->
                <nav id="sp-menu">
                    <div id="sp-menu-position">
                        <ul class="sp-menu-list">
                            <li class="col"><a href="#top">top</a></li>
                            <li class="col"><a href="#about">about</a></li>
                            <li class="col"><a href="#service">service</a></li>
                            <li class="col"><a href="#works">works</a></li>
                            <li class="col"><a href="#contact">contact</a></li>
                        </ul>
                    </div> <!-- end sp-menu-position -->
                </nav> <!-- end sp-menu -->
            <!---------- /メニュー表示 ---------->

            <!---------- タイトル表示 ---------->
            <div id="title" class="text-center title">
                <h1>kurayoshi's portfolio</h1>
            </div>
            <!---------- /タイトル表示 ---------->

            <!---------- about表示 ---------->
            <div id="about" class="about">
                <div class="text-center heading">
                    <h2>ABOUT</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 about-contents">
                        <img class="mx-auto d-block character-icon" src="images/icon-haikeinashi.PNG" alt="キャラアイコン" title="kurayoshiアイコン" width="200" height="200">
                        <div class="text-center personal-info">
                            <p>倉地良彦 （くらちよしひこ）</p>
                            <p>愛知県在住</p>
                            <p>フリーランスWEBエンジニア</p>
                        </div>

                        <div class="profile-title">
                            <h4>こんな人ですよ</h4>
                        </div>
                        <div class="profile-contents">
                            <p>高卒で某自動車部品製造工場で金型修理を25年やってきました。<br>
                                体力の衰えを考えると将来が不安になり、プログラミングを通して時代に取り残されない思考を養いつつ生涯現役で頑張っていこうと思っています。</p>
                            <h6>好きな事</h6>
                            <p>カラオケ<br>（20年くらい前のパンク系が好きです）</p>
                        </div>
                    </div> <!-- end about-contents -->

                    <div class="col-lg-6 skill">
                        <div class="skill-title">
                            <h3>スキル <span>（随時更新中）</span></h3>
                        </div>
                        <div class="skill-contents">
                            <p>・HP、LPのコーディング</p>
                            <p>・WordPressを使ったWEBサイト構築</p>
                            <p>・レスポンシブデザイン対応</p>
                        </div>

                        <div class="skill-title">
                            <h3>対応可能言語</h3>
                        </div>
                        <div class="supported-language">
                            <ul>
                                <li class="text-center icon sup-lang">
                                    <img src="https://img.icons8.com/ios-filled/50/000000/html-5--v1.png"/>
                                    <p>HTML</p>
                                </li>
                                <li class="text-center icon sup-lang">
                                    <img src="https://img.icons8.com/ios-filled/50/000000/css3.png"/>
                                    <p>CSS</p>
                                </li>
                                <li class="text-center icon sup-lang">
                                    <img src="https://img.icons8.com/ios-filled/50/000000/javascript-logo.png"/>
                                    <p>JavaScript</p>
                                </li>
                                <li class="text-center icon sup-lang">
                                    <img src="https://img.icons8.com/ios-filled/50/000000/jquery.png"/>
                                    <p>jQuery</p>
                                </li>
                                <li class="text-center icon sup-lang">
                                    <img src="https://img.icons8.com/ios-filled/50/000000/php-logo.png"/>
                                    <p>PHP</p>
                                </li>
                                <li class="text-center icon sup-lang">
                                    <img src="https://img.icons8.com/ios-filled/50/000000/wordpress--v1.png"/>
                                    <p>WordPress</p>
                                </li>
                            </ul>
                        </div>

                        <div class="skill-title">
                            <h3>仕事をする上で意識している事</h3>
                        </div>
                        <div class="be-conscious">
                            <p>・レスポンスは早く（24時間以内）する。（すぐにレスポンス出来ない時はメッセージで折り返し出来る日時を連絡する。）</p>
                            <p>・クライアント様とのヒアリングは気軽に相談できる雰囲気を大事にしています。</p>
                            <p>・報連相をしっかりする。（2日に一度進捗状況を報告する）</p>
                            <p>・クライアント様のご要望をヒアリングシートを使って共有して認識のズレが無いようにします。</p>
                            <div class="hearingsheet">
                                <p class="text-center">ヒアリングシートの主な項目</p>
                                <div class="hearingsheet-item">
                                    <p>
                                        *クライアント様の基本情報<br>
                                        *どんなサイトを何のために作るのか？<br>
                                        *予算と希望納期<br>
                                        など
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end skill -->
                </div> <!-- end row -->
            </div> <!-- end about -->
            <!---------- /abour表示 ---------->

            <!---------- service表示 ---------->
            <div id="service" class="service">
                <div class="text-center heading">
                    <h2>SERVICE</h2>
                </div>
                <div class="service-container">
                    <ul>
                        <li class="ser-content">
                            <h3>Webサイト（HP,LP）制作</h3>
                            <p>クライアント様が作りたいサイトを綿密なヒアリングを通して形にします。<br><span>詳細は下記リンクでご確認ください。</span></p>
                            <div class="d-flex justify-content-evenly service-link">
                                <a href="https://coconala.com/services/1988888?ref=top_histories&ref_kind=home&ref_no=2">HP制作</a>
                                <a href="https://coconala.com/services/1995057?ref=top_histories&ref_kind=home&ref_no=2">LP制作</a>
                            </div>
                        </li>
                        <li class="ser-content">
                            <h3>レスポンシブデザイン対応</h3>
                            <p>PC、タブレット、スマホ全ての端末で見やすいデザインを心がけてHP、LP作成します。</p>
                        </li>
                    </ul>
                </div>
            </div> <!-- end service -->
            <!---------- /service表示 ---------->

            <!---------- works表示 ---------->

            <div id="works" class="works">
                <div class="text-center heading">
                    <h2>WORKS</h2>
                </div>

                <div class="works-container">
                    <!-- 画像はポップアップで表示(jQueryのlightboxを使用 headタグ内で読み込み) -->
                    <div id="works-image" class="justify-content-around text-center row">
                        <div class="col-lg-4 image-trim">
                            <a href="images/オリジナルアプリ関係/ルート検索画面大.png"><img class="work-img" src="images/オリジナルアプリ関係/ルート検索画面小.png" width="330"></a>
                            <h5>ルート検索画面</h5>
                        </div>
                        <div class="col-lg-4 image-trim">
                            <a href="images/オリジナルアプリ関係/レビュー投稿画面大.png"><img class="work-img" src="images/オリジナルアプリ関係/レビュー投稿画面小.png" width="330"></a>
                            <h5>レビュー投稿画面</h5>
                        </div>
                        <div class="col-lg-4 image-trim">
                            <a href="images/オリジナルアプリ関係/API・プラグイン画面大.png"><img class="work-img" src="images/オリジナルアプリ関係/API・プラグイン画面小.png" width="330"></a>
                            <h5>API・プラグイン実装画面</h5>
                        </div>
                    </div> <!-- end row -->

                    <div class="text-center create-secretstory">
                        <h3>制作秘話</h3>
                    </div>
                    <div class="col-lg-12 text-left story-content">
                        <p>開発当初はprogateのHTML＆CSSとプログラミングスクールでwordPressとPHPの教材をやった程度の知識からスタートしました。</p>
                        <p>基本もままならない状態からスタートして、環境構築から一通りの機能実装まで４ヶ月程掛かりました。</p>
                        <p>Dockerで環境構築する際に<span>Mac bookが動かなくなり</span>、OSを再インストールした時は冷や汗かきました。</p>
                    </div>
                    <div class="text-left story-important">
                        <p>頑張ってきた結果制作当初に比べて,自分で考えて解決する力が上がりました。</p>
                    </div>
                </div>
            </div> <!-- end works -->
            <!---------- /works表示 ---------->

            <div id="contact" class="contact">
                <a href="contactform.php">お問合せページへ</a>
            </div>
        </div> <!-- end container -->

        <!-- BootStrapを読み込む -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/BootStrap.js/bootstrap.min.js"></script>
        <!-- BootStrap読み込む ここまで -->

        <script src="js/selfintroduction.js" async></script>
    </body>

</html>