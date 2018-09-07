
@servers(['web' => 'localhost'])

@setup
    $now = date("Y-m-d H:i:s");
@endsetup

@story('deploy', ['on' => 'web', 'confirm' => true])
    add
    commit
    push
@endstory

@task('add', ['on' => 'web', 'confirm' => true])
    git add -A
    echo '加入變更檔案';
@endtask

@task('commit', ['on' => 'web', 'confirm' => true])
    @if($commit)
        git commit -m"{{$commit}} {{$now}}" 
        echo '傳入參數至';
    @else
        git commit -m"未傳入參數至commit {{$now}}"  
        echo '未傳入參數';
    @endif

    echo '執行commit';
@endtask

@task('push', ['on' => 'web', 'confirm' => true])
    git push origin master
    echo '推送執行完畢';
@endtask

@task('pull')
    git pull
    git status
@endtask