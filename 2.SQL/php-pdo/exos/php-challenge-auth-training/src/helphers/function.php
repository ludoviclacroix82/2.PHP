<?php

function selectDifficulty()
{
    $selectDifficulty = ['très facile', 'facile', 'moyen', 'difficile', 'très difficile'];

    return $selectDifficulty;
}

function modaleAction($session)
{

    switch ($session) {
        case 'add':
            $text = 'La randonnée a été ajoutée avec succès.';
            break;
        case 'update':
            $text = 'La randonnée a été modifiée avec succès.';
            break;
        case 'delete':
            $text = 'La randonnée a été supprimée avec succès.';
            break;
        default:
            $text = 'Une erreur s\'est produite veuillez réessayer';
            break;
    }

    return $text;
}
