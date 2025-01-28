<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once(__DIR__ . '/parts/head.php'); ?>
    <title>ブログ</title>
</head>
<body>
    <header>
        <?php include_once(__DIR__ . '/parts/navi.php'); ?>
        <h1>ブログ</h1>
    </header>
    <main>

    <form action="" method="post">
        タイトル：<br>
        <input type="text" name="title" id=""><br>
        内容：<br>
        <textarea name="body" id="" cols="30" rows="10"></textarea><br>
        <button type="submit">投稿</button>
    </form>
    
    <?php foreach($data as $val){ ?>
            <div class="post">
                <h2 class="title"><?php echo $val['title']; ?></h2>
                <p class="body"><?php echo $val['body']; ?></p>
                <hr>
                <p class='postUser'>
                    登録者：<?php echo $val['userName']; ?>
                    <?php
                    if(
                        isset($_SESSION['userKey'])
                        &&
                        $val['userKey'] === $_SESSION['userKey']
                    ){
                    ?>
                    |
                    <a href="update.php?id=<?php echo $val['id'] ?>&key=<?php echo $_GET['key']?>">修正</a>
                    |
                    <a href="delete.php?id=<?php echo $val['id'] ?>&key=<?php echo $_GET['key']?>">削除</a>
                    <?php } ?>
                </p>
            </div>
        <?php } ?>
    </main>
    <?php include_once(__DIR__ . '/parts/footer.php'); ?>
</body>
</html>