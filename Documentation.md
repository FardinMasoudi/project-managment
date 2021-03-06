# Projet-Management Documentation

# authentication

#### [- Authentication](#client-auth)

## client

#### [- Projects](#client-projects)

#### [- Project-roles](#client-project-roles)

#### [- Sprints](#client-sprints)

#### [- Tasks](#client-tasks)

#### [- User](#client-user)

#### [- User-role](#client-user-role)

#### [- Invite-member](#client-invite-member)

## <a id="client-auth"> Authentication </a>

#### [- register](#client-register)

#### [- login](#client-login)

### <a id="client-register"> register </a>

### description:

`user can register`

#### method: POST

#### `/api/v1/client/register`

#### parameters:

`name`  
`email`  
`password`        
`password_confirmation`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

### <a id="client-login"> login </a>

### description:

`user can login`

#### method: POST

#### `/api/v1/client/login`

#### parameters:

`email`  
`password`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": {
        "access_token": "1|br9r60ir9Qha6nYAB2ouOUY8v2xwtWRXHuVnYtYj"
    }
}
```

## <a id="client-projects"> Projects </a>

#### [- index](#client-projects.index)

#### [- show](#client-projects.show)

#### [- store](#client-projects.store)

#### [- update](#client-projects.update)

### <a id="client-projects.index"> index </a>

### description:

`loggedin user can see list of projects`

#### method: GET

#### `/api/v1/client/projects`

#### parameters:

`empty`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": [
        {
            "id": 1,
            "title": "Dr.",
            "description": "Non qui ex commodi voluptatem blanditiis. Magni repellendus et iure vero.",
            "creator": "Mr. Arnold Thompson",
            "start_time": "2022-03-19 06:58:23",
            "end_time": "2022-03-26 06:58:23"
        },
        {
            "id": 2,
            "title": "Dr.",
            "description": "Et velit possimus et architecto aut rem ut. Non non nobis maiores eos voluptatibus repellendus qui.",
            "creator": "Mr. Arnold Thompson",
            "start_time": "2022-03-19 06:58:23",
            "end_time": "2022-03-26 06:58:23"
        }
    ]
}
```

### <a id="client-projects.show"> show </a>

### description:

`loggedin user can see details of project`

#### method: GET

#### `/api/v1/client/projects/{id}`

#### parameters:

`{id}`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": {
        "id": 1,
        "title": "Dr.",
        "description": "Non qui ex commodi voluptatem blanditiis. Magni repellendus et iure vero.",
        "creator": "Mr. Arnold Thompson",
        "start_time": "2022-03-19 06:58:23",
        "end_time": "2022-03-26 06:58:23"
    }
}
```

### <a id="client-projects.show"> show </a>

### description:

`loggedin user can see details of project`

#### method: GET

#### `/api/v1/client/projects/{id}`

#### parameters:

`{id}`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": {
        "id": 1,
        "title": "Dr.",
        "description": "Non qui ex commodi voluptatem blanditiis. Magni repellendus et iure vero.",
        "creator": "Mr. Arnold Thompson",
        "start_time": "2022-03-19 06:58:23",
        "end_time": "2022-03-26 06:58:23"
    }
}
```

### <a id="client-projects.store"> store </a>

### description:

`loggedin user can make new project`

#### method: POST

#### `/api/v1/client/projects`

#### parameters:

`title`,  
`description`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

### <a id="client-projects.update"> update </a>

### description:

`loggedin user can make new project`

#### method: PATC

#### `/api/v1/client/projects/{id}`

#### parameters:

`{id}`  
`title`,  
`description`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

## <a id="client-project-roles"> Project-Role </a>

#### [- index](#client-project-roles.index)

#### [- store](#client-project-roles.store)

#### [- update](#client-project-roles.update)

#### [- delete](#client-project-roles.delete)

### <a id="client-project-roles.index"> index </a>

### description:

`return list of project roles`

#### method: GET

#### `/api/v1/client/project-roles`

#### parameters:

`empty`

#### filters:

`empty`

#### access:

`view-role`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": [
        {
            "id": 1,
            "title": "Ms."
        },
        {
            "id": 2,
            "title": "Dr."
        }
    ]
}
```

### <a id="client-project-roles.store"> store </a>

### description:

`loggedin user can make new project role and attach permissions to role`

#### method: POST

#### `/api/v1/client/project-roles`

#### parameters:

`title`,  
`permissions.* => `  `array`

#### filters:

`empty`

#### access:

`create-role`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

### <a id="client-project-roles.update"> update </a>

### description:

`loggedin user can update role and attach permissions to role`

#### method: PATCH

#### `/api/v1/client/project-roles/{id}`

#### parameters:

`{id}`  
`title`,  
`permissions.* => `  `array`

#### filters:

`empty`

#### access:

`update-role`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

### <a id="client-project-roles.delete"> delete </a>

### description:

`user can delete project role`

#### method: DELETE

#### `/api/v1/client/project-roles/{id}`

#### parameters:

`{id}`

#### filters:

`empty`

#### access:

`remove-role`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

## <a id="client-sprints"> Sprints </a>

#### [- index](#client-sprints.index)

#### [- show](#client-sprints.show)

#### [- store](#client-sprints.store)

#### [- update](#client-sprints.update)

### <a id="client-sprints.index"> index </a>

### description:

`return list of sprints`

#### method: GET

#### `/api/v1/client/sprints`

#### parameters:

`empty`

#### filters:

`goal`  
`status`

#### access:

`view-sprint`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": [
        {
            "id": 1,
            "goal": "Prof.",
            "start_time": "2022-03-19 08:01:02",
            "end_time": "2022-03-26 08:01:02",
            "status": "active"
        },
        {
            "id": 2,
            "goal": "Mr.",
            "tart_time": "2022-03-19 08:01:02",
            "end_time": "2022-03-26 08:01:02",
            "status": "active"
        }
    ]
}
```

### <a id="client-sprints.show"> show </a>

### description:

`return details of sprint`

#### method: GET

#### `/api/v1/client/sprints/{id}`

#### parameters:

`empty`

#### filters:

`empty`

#### access:

`show-sprint`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": {
        "id": 1,
        "goal": "Dr.",
        "start_time": "2022-03-19 08:07:08",
        "end_time": "2022-03-26 08:07:08",
        "status": "active"
    }
}
```

### <a id="client-sprints.store"> store </a>

### description:

`loggedin user can make new sprint`

#### method: POST

#### `/api/v1/client/sprints`

#### parameters:

`goal`

#### filters:

`empty`

#### access:

`create-sprint`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

### <a id="client-sprints.update"> update </a>

### description:

`loggedin user can update sprint`

#### method: PATCH

#### `/api/v1/client/sprints/{id}`

#### parameters:

`goal
`

#### filters:

`empty`

#### access:

`update-sprint`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

## <a id="client-tasks"> Tasks </a>

#### [- index](#client-tasks.index)

#### [- show](#client-tasks.show)

#### [- store](#client-tasks.store)

#### [- update](#client-tasks.update)

#### [- destroy](#client-tasks.delete)

### <a id="client-tasks.index"> index </a>

### description:

`return list of tasks`

#### method: GET

#### `/api/v1/client/tasks`

#### parameters:

`empty`

#### filters:

`onlyMyIssues`    
`status`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": [
        {
            "id": 1,
            "reporter": "Osvaldo Bergnaum",
            "assign_to": "Carlo Pagac",
            "title": "Miss",
            "description": "Vitae aut iste quas officiis dolores. Mollitia consequuntur voluptatem illum blanditiis. Sunt dolorem est officia consequatur est aut odio nobis. In magni corporis reiciendis qui.",
            "status": "todo",
            "deadline_time": "2022-03-26 08:31:26"
        },
        {
            "id": 2,
            "reporter": "Camden Torp",
            "assign_to": "Lupe Ullrich",
            "title": "Dr.",
            "description": "Fugiat consectetur quaerat vero quae. Rerum modi ea maiores maiores ea. Aliquam quo voluptatem sunt qui. Est ut libero explicabo sed labore odio quam. Hic fuga consequatur deserunt.",
            "status": "todo",
            "deadline_time": "2022-03-26 08:31:26"
        }
    ]
}
```

### <a id="client-tasks.show"> show </a>

### description:

`return details of task`

#### method: GET

#### `/api/v1/client/tasks/{id}`

#### parameters:

`empty`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": {
        "id": 1,
        "reporter": "Mrs. Liana Legros Jr.",
        "assign_to": "Percival Lind",
        "title": "Dr.",
        "description": "Minus consequatur placeat neque dolore delectus dolorem sed. Debitis dolorem sint maiores vero nisi sit. Modi ex doloribus sed ipsam. Quis quo ut deserunt rerum. Quos et ipsum ut aut animi totam.",
        "status": "todo",
        "deadline_time": "2022-03-26 08:34:28"
    }
}
```

### <a id="client-tasks.store"> store </a>

### description:

`loggedin user can make new task`

#### method: POST

#### `/api/v1/client/tasks`

#### parameters:

`title`  
`description`    
`deadline_time`    
`sprint_id`    
`type`    
`assign_to`       
`parent_id`

#### filters:

`empty`

#### access:

`create-task`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

### <a id="client-tasks.update"> update </a>

### description:

`loggedin user can update task`

#### method: PATCH

#### `/api/v1/client/tasks/{id}`

#### parameters:

`title`  
`description`    
`deadline_time`    
`sprint_id`    
`type`    
`assign_to`       
`parent_id`

#### filters:

`empty`

#### access:

`update-task`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

### <a id="client-tasks.delete"> delete </a>

### description:

`loggedin user can delete task`

#### method: DELETE

#### `/api/v1/client/tasks/{id}`

#### parameters:

`{id}`

#### filters:

`empty`

#### access:

`remove-task`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```

## <a id="client-invite-user"> Invite User </a>

#### [- __invoke](#client-invite-user.invoke)

### <a id="client-invite-user.invoke"> invite user </a>

### description:

`owner project can invite member to projects`

#### method: DELETE

#### `/api/v1/client/invite-member`

#### parameters:

`email`  
`password`

#### filters:

`empty`

#### access:

`invite-user`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": {
        "invited_member": "abc@gmail.com"
    }
}
```

## <a id="client-user"> User </a>

#### [- show](#client-user-show)

#### [- update](#client-user-update)

#### <a id="client-user-show"> show </a>

### description:

`loggedin user can see own profile`

#### method: GET

#### `/api/v1/client/user`

#### parameters:

`empty`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": {
        "id": 1,
        "name": "Clinton Batz",
        "email": "lmoen@example.net"
    }
}
```

#### <a id="client-user-show"> update </a>

### description:

`loggedin user can update own profile`

#### method: PATCH

#### `/api/v1/client/user`

#### parameters:

`name`  
`email`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": null
}
```


## <a id="client-user"> User-Role </a>

#### [- update](#client-user-attach-role)

#### <a id="client-user-role"> update </a>

### description:

`loggedin user can assigned roles to user`

#### method: PATCH

#### `users/{user}/attach-roles`

#### parameters:

`{user}`

#### filters:

`empty`

#### access:

`empty`

#### response:

```json
{
    "error": false,
    "code": 200,
    "data": {
        "id": 1,
        "name": "Clinton Batz",
        "email": "lmoen@example.net"
    }
}
```
