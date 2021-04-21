## 🚀 Environment Setup

### 🐳 Needed tools

1. [Install Docker](https://www.docker.com/get-started)
2. Clone this project: `git@github.com:lucianogarciaz/mpwar.git`
3. Move to the project folder: `cd mpwar`

### 🔥 Application execution

1. Run docker compose: `docker-compose up -d`
2. Install all the dependencies and bring up the project with Docker executing: `make build`
3. `make start-service`
4. Then you'll have:
   1. [health-check](apps/openflight/backend/src/Controller/Healthcheck): http://localhost:8030/health-check
   2. PUT [register-user](apps/openflight/backend/src/Controller/Users): http://localhost:8030/register-user/e617f839-c8ee-4580-a0d3-6dceab0f3293 + body
   

## Add a new endpoint

1. Create a controller that will receive the request inside [controller](apps/openflight/backend/src/Controller)
2. Create the route in [routes](apps/openflight/backend/config/routes)