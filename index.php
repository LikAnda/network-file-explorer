<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partage de fichiers</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>

    <!-- Bibliothèques -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Scripts -->
    <script src="file-processing.js"></script>
</head>
<body>
    <h1>Partage de fichiers</h1>
    <?php
        $slash = "/";
        $directory_display = $slash . "home/";
        echo "<h2>Chemin : $directory_display</h2>";
    ?>

    <!-- Affichage des fichiers -->
    <ul>
        <?php
        $directory = "home/";
        $files = array_diff(scandir($directory), array('..', '.'));
        foreach ($files as $file) {
            $file_path = $directory . $file;
            if (is_dir($file_path)) {
                echo "<li><a href='index.php?dir=$file'>$file/</a></li>";
            } else {
                echo "<li><a href='home/$file' download>$file</a></li>";
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