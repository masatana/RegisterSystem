<?php
session_start();
echo <<<EOD
<html>
    <body>
        <div align="center">
            <p>会員管理システム</p>
            <a href="./list.php">会員一覧</a><br />
            <a href="./input.php">会員登録</a>
        </div>
    </body>
</html>
EOD;
session_destroy();
?>
