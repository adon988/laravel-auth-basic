
@servers(['web' => 'localhost'])
@setup
    $now = date("Y-m-d H:i:s");
@endsetup
@task('deploy')

    echo '準備 deploy';
    git add -A
    echo '加入變更檔案';

    @if($commit)
        git commit -m"{{$commit}} {{$now}}" 
        echo '傳入參數至';
    @else
        git commit -m"未傳入參數至commit {{$now}}"  
        echo '未傳入參數';
    @endif

    echo '執行commit';

    git push origin master
    echo '推送執行完畢';
@endtask

@task('pull')
    git pull
    git status
@endtask