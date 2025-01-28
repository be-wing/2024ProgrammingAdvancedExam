<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once(__DIR__ . '/parts/head.php'); ?>
    <title>ブログ</title>
</head>
<body>
    <header>
        <?php include_once(__DIR__ . '/parts/navi.php'); ?>
        <h1>修正</h1>
    </header>
    <main>
    <form action="" method="post">
        タイトル：<br>
        <input type="text" name="title" id="" value="<?php echo $data['title'] ?>"><br>
        内容：<br>
        <textarea name="body" id="" cols="30" rows="10"><?php echo $data['body'] ?></textarea><br>
        <button type="submit">投稿</button>
    </form>
    </main>
    <?php include_once(__DIR__ . '/parts/footer.php'); ?>
</body>
</html>