from __future__ import print_function

import os

from fabric.api import cd, env, local, prefix, put, run, settings, sudo, task
from fabric.contrib.project import rsync_project

from fabric.colors import *

env.user = 'circlesusa'
env.hosts = ['claudius.rhombic.net']

# change cwd to location of the fab file
local_path = os.path.dirname(os.path.abspath(env.real_fabfile)) + os.sep
os.chdir(local_path)
print(green('Changing current working directory (CWD) to ' + local_path))


rsync_excludes = ['.git', '.gitignore', 'fabfile.py*', 'config.php', 'Dockerfile', '*.sql']


@task(alias='push')
def deploy():
    remote_path = '/home/circlesusa/sites/circlesusa.animevivo.com/public'
    print(green('Copying files'))
    rsync_project(
            local_dir=local_path,
            remote_dir=remote_path,
            exclude=rsync_excludes,
            extra_opts='--no-perms --no-owner --no-group --no-times',
            #delete=True
            )
