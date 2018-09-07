<?php $commit = isset($commit) ? $commit : null; ?>
<?php $now = isset($now) ? $now : null; ?>

<?php $__container->servers(['web' => 'localhost']); ?>
<?php
    $now = new DateTime();
?>
<?php $__container->startTask('deploy'); ?>

    echo '準備 deploy';
    git add -A
    echo '加入變更檔案';

    <?php if($commit): ?>
        git commit -m"<?php echo $commit; ?> <?php echo $now; ?>" 
        echo '傳入參數至';
    <?php else: ?>
        git commit -m"未傳入參數至commit <?php echo $now; ?>"  
        echo '未傳入參數';
    <?php endif; ?>

    echo '執行commit';

    git push origin master
    echo '推送執行完畢';
<?php $__container->endTask(); ?>

<?php $__container->startTask('pull'); ?>
    git pull
    git status
<?php $__container->endTask(); ?>