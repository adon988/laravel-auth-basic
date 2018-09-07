@servers(['web' => 'localhost'])

@setup
$now = new DateTime();

$commit = isset($myparam) ? $myparam : "commit at time".$now;
@endsetup

@task('deploy')
    git add -A
    git commit -m"{{$commit}}"
    git push origin master
@endtask

@task('pull')
    git pull
    git status
@endtask