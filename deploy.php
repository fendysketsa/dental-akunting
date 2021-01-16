<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'deantal akunting');

// Project repository
set('repository', 'git@github.com:fendysketsa/dental-akunting.git');

set('branch', 'master');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

//set('writable_mode', 'chown');

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);
set('http_user', 'admin');

// Hosts

host('45.13.132.68')
    ->user('admin')
    ->identityFile('/home/fcn/.ssh/id_dental_rsa')
    ->set('deploy_path', '/home/admin/web/akunting.medinadental.clinic/public_html');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');
