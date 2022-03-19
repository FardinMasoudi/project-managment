# Projet-Management Documentation

# authentication

#### [- Authentication](#client-auth)

## client

#### [- Projects](#client-projects)

#### [- Project-roles](#client-project-roles)

#### [- Sprints](#client-sprints)

#### [- Tasks](#client-currencies)

#### [- User](#panel-currencies)

#### [- User-role](#panel-currencies)

#### [- Invite-member](#panel-currencies)

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


