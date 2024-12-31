# geopagos

Ambiente Linux testeado.

Crear el contenedor parametrizando al momento de correr el compose el ID del host habilitado para correr docker. 
La idea es que los contenidos dentro del contenedor tengan un usuario y grupo para mayor seguridad.
HOST_ID="$(id -u)" docker compose up --build -d

Se usaron patrones, servicos y apis para emular el torneo.
El campeón se define si estadisticamente la diferencia entre las métricas es significativa, caso contrario se define por azar. 

Se deja instalado en el contenedor el xdebug para chequeos de rigor.
