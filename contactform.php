<?php
    // sessionを使うための設定
    session_start();

    // クリックジャッキング対策
    header( 'X-FRAME-OPIONS: SAMEORGIN' ); // フレーム内のページと同一サイトならば、ページの読み込みが可能

    // フォーム入力でエラーが出たときにエラ〜メッセージを表示させるための準備で$_errormessageを定義する
    $errormessage = array();

    // ページ遷移制御の為変数$modeを定義する 後述するHTML<body>内でページ遷移制御で$modeを使う
    $mode = 'input';

    // $modeを使ってページ遷移を制御
    if( isset( $_POST['back'] ) && $_POST['back'] ) { // $_POST['back']が存在してかつ値が入っているか
        // 何もしない
    } else if( isset( $_POST['confirm'] ) && $_POST['confirm'] ) { // $_POST['comfirm']が存在してかつ値が入っているか
        // 確認ボタンを押した時
        // ---------- バリデーションチェック処理 下記以外のバリデーション方法はメモにまとめてある ----------
        // ----- fullnameのバリデーションチェック -----
        // fullnameが空の場合 HTMLのフォームタグでも簡単に設定出来る（メモにまとめてある）
        if( !$_POST['fullname'] ) {
            $errormessage[] = "名前を入力してください";
        // fullnameが100文字以上の時
        } else if( mb_strlen( $_POST['fullname'] ) > 100 ) { // mb_strlenはPHPの標準関数で文字列の長さを計算する関数
            $errormessage[] = "名前は100文字以内にしてください";
        }
        /*
        クロスサイトスクリプティング攻撃対策でfullnameをサニタイズして$_SESSIONに保存する
        SQLインジェクション対策も合わせて実施
        第2引数のENTQUOTESでシングルクォートも無害化の対象にする
        */
        $_SESSION['fullname'] = htmlspecialchars( $_POST['fullname'], ENT_QUOTES );

        // ----- emialのバリデーションチェック -----
        if( !$_POST['email'] ) {
            $errormessage[] = "Eメールを入力してください";
        } else if( mb_strlen( $_POST['email'] ) > 200 ) {
            $errormessage[] = "Eメールは200文字以内にしてください";
        // filter_var()関数でEメール形式かチェックする
        } else if( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
            $errormessage[] = "メールアドレスが不正です";
        }
        $_SESSION['email'] = htmlspecialchars( $_POST['email'], ENT_QUOTES );

        // ----- messageのバリデーションチェック -----
        if( !$_POST['message'] ) {
            $errormessage[] = "お問い合わせを入力してください";
        } else if( mb_strlen($_POST['message'] ) > 500 ) {
            $errormessage[] = "お問い合わせ内容は500文字以内にしてください";
        }
        $_SESSION['message'] = htmlspecialchars( $_POST['message'], ENT_QUOTES );

        // $errormessageに値が入っていたら入力画面に戻るように設定
        if( $errormessage ) {
            $mode = 'input';
        } else {
            // $errormessageが空だったら

            // ----- CSRF対策処理 -----
            // 半角で64文字のランダムな文字列を生成して暗号として$_SESSION['token']に保存する
            $token = bin2hex( random_bytes( 32 ) ); // 32ビットは全角文字で32文字、半角文字で64文字
            $_SESSION['token'] = $token;

            $mode = 'confirm';
        }

    } else if( isset( $_POST['send'] ) && $_POST['send'] ) { // $_POST['send']が存在してかつ値が入っているか
        // 送信ボタンを押した時 

        // ----- CSRF対策処理 -----
        if( !$_POST['token'] || !$_SESSION['token'] || $_SESSION['email'] ) {
            if( $_POST['token'] != $_SESSION['token'] ) {
                $errormessage[] = '不正な処理が行われました';
                $_SESSION       = array();
                $mode           = 'input';
            } else {
            // ----- メール送信処理 -----
            $message = "お問い合わせを受け付けました。 \r\n" // \r\nは改行を意味するコード
                    . "名前: " . $_SESSION['fullname'] . "\r\n" // .は文字列を結合させる
                    . "email: " . $_SESSION['email'] . "\r\n"
                    . "お問い合わせ内容:\r\n"

                    /*
                    preg_replace関数を使って改行コードをCRLFに揃える。 \r\n(CRLF)と\r(CR)と\n(LF)をまとめて記述する
                    preg_replace関数とは何かの文字列を抜き出して別の形に変換する時に使われる。
                    他の使い方は何かの文字列を囲んでいるタグを置換、除去したりidやクラスを付与する時に使われる。
                    */
                    . preg_replace( "/\r\n|\r|\n/", "\r\n", $_SESSION['message'] );
            // ---------- メール送信処理 ----------
            mb_language("ja"); // メール送信時の文字化け対策
            mb_internal_encoding("UTF-8"); // メール送信時の文字化け対策
            // フォーム入力者にメール送信
            mb_send_mail( $_SESSION['email'], 'お問い合わせありがとうございます', $message );
            // 管理者にメール送信
            mb_send_mail( '11172ky@gmail.com', 'お問い合わせありがとうございます', $message );
            $_SESSION = array();
            $mode = 'send';
            }
        }
    } else { // 初回表示 GETリクエストを受け取った時
        $_SESSION = array(); // 空の配列を代入することで初期化する。
        // さらに丁寧記述するなら下記のように書くといい notice（注意）対策になる
        $_SESSION['fullname'] = ""; // キーを作っておくことでnotice対策になる
        $_SESSION['email']    = "";
        $_SESSION['message']  = "";
    }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- 文字コードを設定する -->
        <meta charset="uft-8">
        <!-- viewportの設定 -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- リセットCSSを読み込む -->
        <link rel="stylesheet" href="css/reset.css">
        <!-- 自作のCSSを読み込む -->
        <link rel="stylesheet" href="css/style.css">
        <!-- BootStrapを読み込む -->
        <link href="css/BootStrap.css/bootstrap.min.css" rel="stylesheet">
        <title>お問合せフォーム</title>
    </head>
    <body>
        <?php if( $mode == 'input' ) { ?> <!-- $modeの値を判断して表示するページを変える -->
            <!---------- 入力画面表示 ---------->
            <?php
                // $errormessage配列に値が1つでも入ってたらエラーメッセージを表示させる
                if( $errormessage ) {
                    // BootStrap機能で赤いラベルでエラーメッセージが表示される
                    echo '<div class="text-center alert-danger " role="alert">';
                    /*
                    $errrormessageは配列なのでそのまま表示させることが出来ない
                    $errormessage配列内の複数の文字列をimplode関数で連結して表示させる
                    */
                    echo implode( '<br>', $errormessage );
                    echo '</div>';
                }
            ?>
            <div class="container-fluid">
                <a href="index.php">トップページへ戻る</a>
                <div class="inquiries">
                    <form action="./contactform.php" method="post"> <!-- action属性で次の画面に遷移する時に呼び出すファイルを指定する ./はカレントディレクトリの意味 -->
                        <label for="fullname">名前</label>
                        <!-- BootStrapの機能でclass="form-control"を使うとフォームのデザインをCSSと組み合わせて整えることが出来る -->
                        <input id="fullname" class="form-control" type="text" name="fullname" value="<?php echo $_SESSION['fullname'] ?>"><br>
                        <label for="email">Eメール</label>
                        <input id="email" class="form-control" type="text" name="email" value="<?php echo $_SESSION['email'] ?>"><br>
                        <label for="message">お問い合わせ内容</label>
                        <textarea id="message" class="form-control" cols="40" rows="8" name="message"><?php echo $_SESSION['message'] ?></textarea><br>
                        <div class="button">
                            <input class="btn btn-lg btn-primary" type="submit" name="confirm" value="確認" >
                        </div>
                    </form>
                </div>
            </div> <!-- end container -->
        <?php } else if( $mode == 'confirm' ) { ?>
            <!---------- 確認画面表示 ---------->
            <div class="container-fluid">
                <div class="inquiries-confirm">
                    <form action="./contactform.php" method="post">
                        <!-- CSRF対策で生成されたtokenを送信する -->
                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                        名前:<?php echo $_SESSION['fullname'] ?><br>
                        Eメール:<?php echo $_SESSION['email'] ?><br>
                        お問い合わせ内容:<br>
                        <?php echo nl2br( $_SESSION['message'] ) ?><br> <!-- n2lbrは改行コードを</br>に変換する関数 -->
                        <div class="button">
                            <input class="btn btn-lg btn-primary" type="submit" name="back" value="戻る" >
                            <input class="btn btn-lg btn-primary" type="submit" name="send" value="送信" >
                        </div>
                    </form>
                </div>
            </div> <!-- end container -->
        <?php } else { ?>
            <!---------- 完了画面表示 ---------->
            <div class="container-fluid">
                <div class="send-completely">
                    送信しました。お問い合わせありがとうございました。<br>
                </div>
            </div> <!-- end container -->
        <?php } ?>

        <!-- BootStrapを読み込む -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/BootStrap.js/bootstrap.min.js"></script>
        <!-- BootStrap読み込む ここまで -->
    </body>
</html>