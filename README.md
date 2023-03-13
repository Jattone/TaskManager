## Test task (Task manager)
**How to install the project:**
- `open terminal in folder that you want to install the project and enter command below`
- `git clone git@github.com:Jattone/TaskManager.git` - that`s command download Task manager to your device

**How to start the project:**
- `open terminal and enter the commands below one by one in Task Manager folder. Please wait for each one to complete.`
- `make setup` - this command create docker containers and generate key
- `make start` - raise the container, run the composer install and run the migrations/seeders

_Into the project folder you can find "Task Manager postman collection", import it to your Postman to be able to create, show, update and delete users and tasks after you run project._

## **Description of endpoints**

### **Health check**
___
**Request**

- `GET /health`


- `curl --location --request GET 'localhost/api/health'`

**Response**

- `{
  "healthy": true
  }`

### **Users endpoints**
### **Create user**
___
**Request**

- `POST /users`


- `curl --location --request POST 'localhost/api/users' \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "name": "John Doe",
  "email": "john.doe@email.com",
  "password": "123456"
  }'`
- 
  **Response**

- `{
  "message": "User created.",
  "user": {
  "id": 13,
  "name": "John Doe",
  "email": "john.doe1@email.com",
  "date of creation": "13.03.2023 12:37:53",
  "role": 1
  }
}`

### **Show user**
___
**Request**

- `GET /users/{id}`


- `curl --location --request GET 'localhost/api/users/1' \
  --header 'Accept: application/json'`

**Response**

- `{
  "message": "User found.",
  "user": {
  "id": 1,
  "name": "Stacey Jaskolski",
  "email": "oda10@example.org",
  "date of creation": "13.03.2023 12:26:01",
  "role": 3
  }
}`
### **Update user**
___
**Request**

- `PUT /users{id}`


- `curl --location --request PUT 'localhost/api/users/1' \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "name": "John Doe",
  "email": "john.do@email.com",
  "password": "123456",
  "role": 3
  }'`

**Response**

- `{
  "message": "User updated.",
  "user": {
  "id": 1,
  "name": "John Doe",
  "email": "john.do@email.com",
  "date of creation": "13.03.2023 12:26:01",
  "role": 3
  }
  }`

### **Delete user**
___
**Request**

- `DELETE /users{id}`

- `curl --location --request DELETE 'localhost/api/users/1' \
  --header 'Accept: application/json'`

**Response**

- `{
  "message": "User deleted."
  }`


### **Create user with same e-mail**
___
**Request**

- `POST /users`


- `curl --location --request POST 'localhost/api/users' \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "name": "John Doe",
  "email": "john.doe1@email.com",
  "password": "123456"
  }'`

**Response**

- `{
  "message": "The email has already been taken.",
  "errors": {
  "email": [
  "The email has already been taken."
  ]
  }
  }`
### **Creating user with inappropriate data**
___
**Request**

- `POST /users`


- `curl --location --request POST 'localhost/api/users' \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "name": 1,
  "email": "john.doe11",
  "password": ""
  }'`

**Response**

- `{
  "message": "The name field must be a string. (and 3 more errors)",
  "errors": {
  "name": [
  "The name field must be a string.",
  "The name field must be at least 3 characters."
  ],
  "email": [
  "The email field must be a valid email address."
  ],
  "password": [
  "The password field is required."
  ]
  }
  }`


### **Deleting non-existing user**
___
**Request**

- `DELETE /users/{id}`


- `curl --location --request DELETE 'localhost/api/users/1' \
  --header 'Accept: application/json'`

**Response**

- `{
  "message": "Resource not found."
  }`

### **Show unexisting user**
___
**Request**

- `GET /users/{id}`


- `curl --location --request GET 'localhost/api/users/1' \
  --header 'Accept: application/json'`

**Response**

- `{
  "message": "Resource not found."
  }`
### **Tasks endpoints**

### **Create task**
___
**Request**

- `POST /tasks`


- `curl --location --request POST 'localhost/api/tasks' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "name": "Test task",
  "description": "The essence of the project is to create a simple CRUD RESTful API for task management.",
  "status": 2,
  "assignee": 1
  }'`

**Response**

- `{
  "message": "Task created.",
  "task": {
  "id": 21,
  "assignee": 1,
  "name": "Test task",
  "description": "The essence of the project is to create a simple CRUD RESTful API for task management.",
  "status": 2,
  "date of creation": "13.03.2023 12:56:19",
  "date of last modification": "13.03.2023 12:56:19"
  }
  }`

### **Show task**
___
**Request**

- `GET /tasks/{id}`


- `curl --location --request GET 'localhost/api/tasks/1'`

**Response**

- `{
  "message": "Task found.",
  "task": {
  "id": 1,
  "assignee": 10,
  "name": "rem ut nulla sunt",
  "description": "Est quo ad id eveniet. Quia quia cum laborum et et voluptates quis sequi. Sed distinctio quia et suscipit. Ex non aut sunt consequatur ab.",
  "status": 2,
  "date of creation": "13.03.2023 12:56:19",
  "date of last modification": "13.03.2023 12:56:19"
  }
  }`
### **Update task**
___
**Request**

- `PUT /tasks/{id}`


- `curl --location --request PUT 'localhost/api/tasks/1' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "name": "Test task",
  "description": "The essence of the project is to create a simple CRUD RESTful API for task management.",
  "status": 3,
  "assignee": 1
  }'`

**Response**

- `{
  "message": "Task updated.",
  "task": {
  "id": 1,
  "assignee": 1,
  "name": "Test task",
  "description": "The essence of the project is to create a simple CRUD RESTful API for task management.",
  "status": 3,
  "date of creation": "13.03.2023 12:56:19",
  "date of last modification": "13.03.2023 13:00:29"
  }
  }`
### **Delete task**
___
**Request**

- `DELETE /tasks/{id}`


- `curl --location --request DELETE 'localhost/api/tasks/1'`

**Response**

- `{
  "message": "Task deleted."
  }`

### **Health task**
___

### **Show non-existing task**
___
**Request**

- `GET /users/{id}`


- `curl --location --request GET 'localhost/api/tasks/1540'`

**Response**

- `{
  "message": "Resource not found."
  }`
### **Search for a task by status**
___
**Request**

- `GET /tasks/status`


- `curl --location --request GET 'localhost/api/tasks/status' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "status": 1
  }'`

**Response**

- `{
  "message": "Search for a task by status successful.",
  "tasks": [
  {
  "id": 9,
  "assignee": 1,
  "name": "illum et adipisci error",
  "description": "Magnam natus aut consequatur rerum laudantium quis. At commodi quia provident animi sit ea. Voluptatem et eius qui dignissimos inventore reiciendis nam sunt. Qui nostrum sed saepe mollitia in nemo soluta.",
  "status": 1,
  "created_at": "2023-03-13 13:36:55",
  "updated_at": "2023-03-13 13:36:55"
  },
  {
  "id": 15,
  "assignee": 5,
  "name": "perferendis nihil repellendus repellat",
  "description": "Explicabo saepe molestias qui. Molestiae maxime nihil reprehenderit sint et accusamus beatae. Accusamus voluptatem nobis provident quibusdam dolores enim cum. Recusandae iste iusto autem aliquid.",
  "status": 1,
  "created_at": "2023-03-13 13:36:56",
  "updated_at": "2023-03-13 13:36:56"
  }
  ]
  }`

### **Search for a task by assignee**
___
**Request**

- `GET /tasks/assignee`


- `curl --location --request GET 'localhost/api/tasks/assignee' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "assignee": 1
  }'`

**Response**

- `{
  "message": "Search for a task by assignee successful.",
  "tasks": [
  {
  "id": 7,
  "assignee": 1,
  "name": "sed totam vero sit",
  "description": "Libero dicta voluptatibus animi aut. Omnis numquam corporis ut commodi est. Perferendis et nesciunt aut et earum sit tempora. Est ipsa voluptatem aut.",
  "status": 4,
  "created_at": "2023-03-13 13:36:55",
  "updated_at": "2023-03-13 13:36:55"
  },
  {
  "id": 9,
  "assignee": 1,
  "name": "illum et adipisci error",
  "description": "Magnam natus aut consequatur rerum laudantium quis. At commodi quia provident animi sit ea. Voluptatem et eius qui dignissimos inventore reiciendis nam sunt. Qui nostrum sed saepe mollitia in nemo soluta.",
  "status": 1,
  "created_at": "2023-03-13 13:36:55",
  "updated_at": "2023-03-13 13:36:55"
  },
  {
  "id": 16,
  "assignee": 1,
  "name": "dolorem debitis laborum ea",
  "description": "Omnis ducimus non velit ipsam ut voluptatem voluptatibus. Est aut minus facere quae quaerat rem. Corporis quam autem commodi nostrum sequi voluptatem. Error provident et sunt doloribus qui voluptates.",
  "status": 3,
  "created_at": "2023-03-13 13:36:56",
  "updated_at": "2023-03-13 13:36:56"
  }
  ]
  }`

### **Update non-existing task**
___
**Request**

- `PUT /tasks/{id}`


- `curl --location --request PUT 'localhost/api/tasks/45454' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "name": "Test task",
  "description": "The essence of the project is to create a simple CRUD RESTful API for task management.",
  "status": 3,
  "assignee": 1
  }'`

**Response**

- `{
  "message": "Resource not found."
  }`

### **Create task with incorrect data**
___
**Request**

- `POST /tasks`


- `curl --location --request POST 'localhost/api/tasks' \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "name": "",
  "description": "Th",
  "status": 29,
  "assignee": 21
  }'`

**Response**

- `{
  "message": "The name field is required. (and 3 more errors)",
  "errors": {
  "name": [
  "The name field is required."
  ],
  "description": [
  "The description field must be at least 3 characters."
  ],
  "status": [
  "The selected status is invalid."
  ],
  "assignee": [
  "The selected assignee is invalid."
  ]
  }
  }`

### **Search for a task by status, if status is incorrect**
___
**Request**

- `GET /tasks/status`


- `curl --location --request GET 'localhost/api/tasks/status' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "status": 14545
  }'`

**Response**

- `{
  "message": "Sorry, but task status entered incorrectly."
  }`
### **Search for a task by assignee, if assignee is incorrect**
___
**Request**

- `GET /tasks/assignee`


- `curl --location --request GET 'localhost/api/tasks/assignee' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "assignee": 155
  }'`

**Response**

- `{
  "message": "Sorry, but task assignee entered incorrectly or such user does not exist"
  }`







