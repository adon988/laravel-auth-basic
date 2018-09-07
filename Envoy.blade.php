@servers(['web' => 'localhost'])

@task('deploy')
    git config --global user.email "adon988@gmail.com"
    git config --global user.name "adon988"
    git add -A
    git commit -m"updating by cicd"
    git push origin master
@endtask