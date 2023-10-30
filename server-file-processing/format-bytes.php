<?php
function format_bytes($bytes) {
    $units = array('octets', 'Ko', 'Mo', 'Go');
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); // Calcul de l'indice de l'unité en base 1024
    $pow = min($pow, count($units) - 1);  // Limite indice de l'unité pour pas dépasser le tableau d'unités
    $bytes /= (1 << (10 * $pow)); // Diviser octets par puissance 1024 pour obtenir taille formatée
    $formatted_size = round($bytes, 2);

    return $formatted_size . " " . $units[$pow];
}
?>