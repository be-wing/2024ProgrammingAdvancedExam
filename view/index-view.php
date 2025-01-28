<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once(__DIR__ . '/parts/head.php'); ?>
    <title>TOP</title>
</head>
<body>
    <header>
        <?php include_once(__DIR__ . '/parts/navi.php'); ?>
        <h1>TOP</h1>
    </header>
    <main>
        <h2>カテゴリー一覧</h2>
        <ul>
        <?php foreach($data as $val){?>
            <li>
                <a href="blog.php?key=<?php echo $val['category_key'] ?>"><?php echo $val['title'] ?></a>
            </li>
        <?php } ?>
        </ul>
    </main>
    <?php include_once(__DIR__ . '/parts/footer.php'); ?>
</body>
</html>