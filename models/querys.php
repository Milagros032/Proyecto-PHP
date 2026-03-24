<?php

class QueryModel
{
    private $pdo;// cambia la variable  pdo a un estado privado, es decir que solo se puede usar dentro de la clase, solamente se puede ver o acceder desde afuera a estas variables usando setter(setear), getter(obtener), y teniendola privada yo controlo como quiero que se vea desde afuera

    public function __construct(PDO $pdo) //en el parametro le pasa primero el tipo de dato que va a usar y despues el nombre de la variable
    {
        $this->pdo = $pdo;
    }

    public function fideos18()
    {
        $fideosQuery = "SELECT
        c.id,
        c.nombre,
        c.fecha_nacimiento,
        co.precio
        FROM clientes c
        JOIN compras co ON c.id = co.cliente_id
        JOIN productos p ON p.id = co.producto_id
        Where p.nombre ILIKE 'fideo'
        AND DATE_PART('year', AGE(c.fecha_nacimiento)) >= 18;";

    $stmt = $this->pdo->query($fideosQuery);

    return $stmt->fetchALL(PDO::FETCH_ASSOC);
   }
}