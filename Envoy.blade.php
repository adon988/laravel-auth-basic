@servers(['web' => 'localhost'])
 
@task('deploy')
    git add -A
    git commit -m"{{$commit}}"
    git push origin master
    
@endtask

@task('pull')
    git pull
    git status
@endtask