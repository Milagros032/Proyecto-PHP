<?php

class QueryModel
{
    private $pdo;
    public function __construct(PDO $pdo) 
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