Nombre: Lester David López Bustillo

Email: lesterdavid.lopez@students.salle.url.edu

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
   

### Add a new endpoint

1. Create a controller that will receive the request inside [controller](apps/openflight/backend/src/Controller)
2. Create the route in [routes](apps/openflight/backend/config/routes)

## Enunciado Practico NRO 1

1. Deben clonar este proyecto y luego subirlo a un repositorio privado de cada grupo
2. El nombre del proyecto mpwar-openflight-g{nro}
3. Deben dar acceso al usuario lucianogarciaz
4. Para entregar el práctico debe ser un pull request contra la rama `master` con fecha máxima 28-04-2021x 

### Enunciado

Ya que tenemos el `/register-user`, ahora debemos poder loguearnos.
Por lo tanto se pide implementar el caso de uso `Login`
El mismo será una petición http `POST` al endpoint `/login` y el body será de la siguiente manera
```json
{
   "username": "lucianogarciaz",
   "password": "pwned_password"
}
```

#### Negocio nos pide
* Si el usuario no puede loguearse (por que su password es incorrecto, o no existe en la base de datos) deberá devolver 
"Incorrect credentials".

### Mínimos requisitos para aprobar
* Cumplir con la regla de dependencias

#### NOTA: Agregar todos los métodos, clases o interfaces que crea que haga falta.
