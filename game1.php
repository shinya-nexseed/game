<?php

    session_start();

    if (!isset($_SESSION['number']) || isset($_POST['reset'])) {
        $_SESSION['number'] = rand(0, 100);
        $_SESSION['count'] = 1;
        // echo '初回 or リセット';
    }
    // var_dump($_SESSION);

    $msg1 = '0 ~ 100の数字を当ててください。';
    $msg2 = '1回目のチャレンジです。';

    if ($_POST && $_POST['number'] !== '') {

        $number = intval($_POST['number']);

        if ($_SESSION['number'] < $number) {
            $_SESSION['count']++;
            $msg1 = 'もっと小さい数です';
            $msg2 = sprintf('次は%d回目の挑戦です。', $_SESSION['count']);
        } elseif ($_SESSION['number'] > $number) {
            $_SESSION['count']++;
            $msg1 = 'もっと大きい数です';
            $msg2 = sprintf('次は%d回目の挑戦です。', $_SESSION['count']);
        } elseif ($_SESSION['number'] === $number) {
            $msg1 = '正解です';
            $msg2 = sprintf('%d回で正解しました。', $_SESSION['count']);
        }
    }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<p><?php echo $msg1; ?></p>

<p><?php echo $msg2; ?></p>

<form action="" method="post">
<input type="text" name="number" maxlength="4">
<input type="submit" value="check">
<input type="submit" name="reset" value="reset">
</form>
</body>
</html>
