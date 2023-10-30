<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partage de fichiers</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>

    <!-- Fichiers CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- Bibliothèques -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Scripts -->
    <script src="JavaScript/file-processing.js"></script>
</head>
<body>
    <h1>Partage de fichiers</h1>
    
    <!-- Affichage interactif du chemin -->
    <?php
        if (isset($_GET["dir"])) {
            $directory = $_GET["dir"];
        } else {
            $directory = "home/"; // Page d'accueil du site (sans paramètre ?dir=)
        }
        $directory_parts = explode("/", $directory); // Séparer en un tableau à partir du /
        $directory_parts = array_slice($directory_parts, 0, -1); // Enlever dernière élément de $directory_parts (un slash)

        echo "<h2>Chemin : ";
        $assembled_parts = "";
        foreach ($directory_parts as $part) {
            $assembled_parts .= $part . "/"; // Ajouter chaque partie du chemin pour le parmaètre ?dir=
            echo "/<a href='index.php?dir=$assembled_parts'>$part</a>";
        }
        echo "</h2>";
    ?>

    <!-- Affichage des fichiers -->
    <ul>
        <?php
        include "server-file-processing/format-bytes.php";
        $files = array_diff(scandir($directory), array('..', '.'));
        foreach ($files as $file) {
            $file_path = $directory . $file;
            if (is_dir($file_path)) { // Si l'élément est ub fichier
                echo "<p>📁 <a href='index.php?dir=$file_path/'>$file/</a></p></li>";
            } else {
                $file_size = filesize($file_path);
                $file_size_formatted = format_bytes($file_size); // Convertir les octets pour un meilleur affichage
                echo "<li><a href='home/$file' download>$file</a> ($file_size_formatted)</li>";
            }
        }
        ?>
    </ul>
    <br>

    <!-- Upload un fichier -->
    <form id="upload-form" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <br><br>
        <input type="submit" name="submit" value="Téléverser le fichier">
    </form>
    <br>
    <hr>

    <!-- Crée un dossier -->
    <h2>Créer un dossier :</h2>
    <form id="new-folder-form">
        <input type="text" name="folder_name" id="folder-name" placeholder="Nom du dossier">
        <input type="submit" name="submit" value="Créer le dossier">
    </form>

    <!-- Supprimer un fichier -->
    <h2>Supprimer un fichier :</h2>
    <form id="rm-file-form">
        <input type="text" name="file_name" id="file-name" placeholder="Nom du fichier">
        <input type="submit" name="submit" value="Supprimer le fichier">
    </form>

</body>
</html>