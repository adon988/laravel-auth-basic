<?php $myparam = isset($myparam) ? $myparam : null; ?>
<?php $commit = isset($commit) ? $commit : null; ?>
<?php $now = isset($now) ? $now : null; ?>

<?php
$now = new DateTime();
$commit = isset($myparam) ? $myparam : "commit at time".$now;
?>

<?php $__container->servers(['web' => 'localhost']); ?>

<?php $__container->startTask('deploy'); ?>
    git add -A
    git commit -m"<?php echo $commit; ?>"
    git push origin master
<?php $__container->endTask(); ?>

<?php $__container->startTask('pull'); ?>
    git pull
    git status
<?php $__container->endTask(); ?>