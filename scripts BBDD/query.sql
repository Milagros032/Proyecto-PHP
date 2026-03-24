SELECT 
    c.id,
    c.nombre,
    c.fecha_nacimiento,
    co.precio
FROM clientes c
JOIN compras co ON c.id = co.cliente_id
JOIN productos p ON p.id = co.producto_id
WHERE p.nombre ILIKE 'fideo'
AND DATE_PART('year', AGE(c.fecha_nacimiento)) >= 18;