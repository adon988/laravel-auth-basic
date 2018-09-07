
@servers(['web' => 'localhost'])
@setup
    $now = date("Y-m-d H:i:s");
@endsetup
@story('deploy')
    add
    commit
    push
    echo '完成deploy';
@endstory

@task('add')
    git add -A
    echo '加入變更檔案';
@endtask

@task('commit')
    @if($commit)
        git commit -m"{{$commit}} {{$now}}" 
        echo '傳入參數至';
    @else
        git commit -m"未傳入參數至commit {{$now}}"  
        echo '未傳入參數';
    @endif

    echo '執行commit';
@endtask

@task('push')
    git push origin master
    echo '推送執行完畢';
@endtask

@task('pull')
    git pull
    git status
@endtask