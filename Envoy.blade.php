
@servers(['web' => 'localhost'])

@setup
    $now = date("Y-m-d H:i:s");
@endsetup

@story('deploy')
    add
    commit
    push
@endstory

@task('add', ['on' => 'web'])
    git add -A
    echo '加入變更檔案';
@endtask

@task('commit', ['on' => 'web'])
    @if($commit)
        git commit -m"{{$commit}} {{$now}}" 
        echo '傳入參數至';
    @else
        git commit -m"未傳入參數至commit {{$now}}"  
        echo '未傳入參數';
    @endif

    echo '執行commit';
@endtask

@task('push', ['on' => 'web'])
    git push origin master
    echo '推送執行完畢';
@endtask

@task('pull')
    git pull
    git status
@endtask

@finished
    echo '完成所有程序';
@endfinished