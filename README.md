<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Table of Contents

- **[Introduction](#Introduction)**
- **[Features](#Features)**
- **[Techniques](#techniques)**
- **[Build Process](#build-process)**

### <a id="Introduction"> Introduction </a>

The project is similar to Terllo or Jira.

In it, each person can create a project, invite his teammates, create sprint and manage the tasks related to his
project.

### <a id="Features"> Features </a>

A few of the things you can do with project-managment

- Register And Login
- Project Management
- Sprint Management
- Task Management
- Invite Members To Project
- Define Role And Permission (ACL)

### <a id="techniques"> Techniques </a>

A few of the techniques you can do see in project-management

- Using sanctum authentication
- Written wrapper for return respones as ApiController
- Using never write custom actions technique
- Using invokable method in controllers that have only one method
- Using validation request
- Using resources for wrapping data
- Using email, event and queue
- Using repository model
- Using service container
- Using artisan command for check dead_line time of tasks and schedule
- Using middleware for check access(HasPermission)
- Written tdd tests and using model factory
- Using relations for example belongsToMany , $belongsTo
- Using dependency injection
- Using query scopes in Sprint model
- Using filters on sprint and task controller (SprintFilter.php,TaskFilter.php)
- Using Observer pattern for make permission (ProjectRoleObserver.php)
- Dockerize project with docker-compose

### <a id="build-process"> Build </a>

- git clone https://github.com/FardinMasoudi/project-managment.git
- install docker and docker compose 
- exec to container and write commands:
  - composer install
  - php artisan migrate
  - php artisan db:seed
  - copy `* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`  and paste to /etc/cron.tab to run schecdule command
  - php artisan test

