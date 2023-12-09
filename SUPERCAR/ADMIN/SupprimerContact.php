<?php
session_start();
require_once 'admin_database.php'; // Inclure le fichier de connexion à la base de données
 
// Vérifiez si l'administrateur est connecté
if (!isset($_SESSION["admin_username"])) {
    header("Location: login.php");
    exit();
}
 
// Récupérez l'ID du client à supprimer depuis les paramètres GET
if (isset($_GET['id'])) {
    $id= $_GET['id'];
 
    // Maintenant, vous pouvez supprimer le contact avec l'ID donné de la base de données
    // Utilisez une requête DELETE SQL pour cela
    $sql = "DELETE FROM contact WHERE id = $id";
 
    if ($mysqli->query($sql)) {
        // La suppression a réussi
        header("Location: contact.php");
        exit();
    } else {
        // La suppression a échoué
        echo "La suppression du contact a échoué : " . $mysqli->error;
    }
} else {
    echo "ID de contact non spécifié.";
}
?>