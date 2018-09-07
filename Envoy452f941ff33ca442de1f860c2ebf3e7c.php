<?php $commit = isset($commit) ? $commit : null; ?>
<?php $now = isset($now) ? $now : null; ?>

<?php $__container->servers(['web' => 'localhost']); ?>

<?php
$now = new DateTime();
?>

<?php $__container->startTask('deploy'); ?>
    git add -A

    <?php if ($commit): ?>
        git commit -m"<?php echo $commit; ?> <?php echo $now; ?>" 
    ＠endif

    git push origin master
<?php $__container->endTask(); ?>

<?php $__container->startTask('pull'); ?>
    git pull
    git status
<?php $__container->endTask(); ?>