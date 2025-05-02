<?php
// eventos.php

header('Content-Type: application/json');

// Aquí podrías usar una base de datos real. Este es un ejemplo estático:
$eventos = [
    [
        'title' => 'Reunión con equipo',
        'start' => '2025-05-01',
        'end' => '2025-05-01'
    ],
    [
        'title' => 'Entrega de proyecto',
        'start' => '2025-05-05',
        'end' => '2025-05-06'
    ]
];

echo json_encode($eventos);
