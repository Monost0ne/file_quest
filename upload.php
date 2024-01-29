<?php
if ($_SERVER['REQUEST_METHOD']==='POST')
{
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['profile']['name']);
    $extension = strtolower(pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION));
    $typeOfFile = ['jpg', 'png', 'gif', 'webp'];
    $maxFileSize = 2000000;

    if( (!in_array($extension, $typeOfFile)))
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Png !';
    if( file_exists($_FILES['profile']['tmp_name']) && filesize($_FILES['profile']['tmp_name']) > $maxFileSize)
    {
        $errors[] = 'Votre fichier doit faire moins de 2M !';
    }

    if (!empty($errors)){
        print_r($errors);
    }
    else{
        move_uploaded_file($_FILES['profile']['tmp_name'], $uploadFile)

?>
<img src="<?php echo $uploadFile  ?>" alt="MyFile"/>

<?php }}?>