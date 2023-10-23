<?php
if (isset($_FILES["file"])) {
    $uploadsDirectory = "../home/";
    $uploadedFile = $uploadsDirectory . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadedFile)) {
        echo "Le fichier a été téléversé avec succès.";
    } else {
        echo "Une erreur s'est produite lors du téléversement du fichier.";
    }
} else {
    echo "Veuillez sélectionner un fichier à téléverser.";
}
?>
