
@servers(['web' => 'localhost'])

@task('deploy')
    git add -A

    @if $commit
        git commit -m"{{$commit}}" 
    ＠endif

    git push origin master
@endtask

@task('pull')
    git pull
    git status
@endtask