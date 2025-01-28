<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once(__DIR__ . '/parts/head.php'); ?>
    <title>カテゴリ（スレッドの登録）</title>
</head>
<body>
    <header>
        <?php include_once(__DIR__ . '/parts/navi.php'); ?>
        <h1>カテゴリ（スレッドの登録）</h1>
    </header>
    <main>
    
    <form action="" method="post">
        カテゴリ名：<input type="text" name="category">
        <button type="submit">登録</button>
    </form>
    
    </main>
    <?php include_once(__DIR__ . '/parts/footer.php'); ?>
</body>
</html>