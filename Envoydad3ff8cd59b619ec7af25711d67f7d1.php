<?php $commit = isset($commit) ? $commit : null; ?>
<?php $__container->servers(['web' => 'localhost']); ?>
 
<?php $__container->startTask('deploy'); ?>
    git add -A
    ＠if($commit)
    git commit -m<?php echo $commit; ?>

    <?php else: ?>
    git commit -m"update at <?php echo date('Y-m-d H:i:s'); ?>"
    <?php endif; ?>
    git push origin master
<?php $__container->endTask(); ?>

<?php $__container->startTask('pull'); ?>
    git pull
    git status
<?php $__container->endTask(); ?>