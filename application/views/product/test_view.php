<?

$colors = (object) array(
  (object) array('color' => 'black'),
  (object) array('color' => 'white'),
  (object) array('color' => 'gray'),
  (object) array('color' => 'red')
);

foreach ($colors as $color) {
  createimage('1', 'tshirt', 'male', $color->color, 'front');
  createimage('1', 'tshirt', 'female', $color->color, 'front');
  createimage('1', 'tshirt', false, $color->color, 'full');
}


function createimage($id, $cloth, $gender, $color, $type)
{
  if (!$gender == false){
    $png = imagecreatefrompng('assets/img/item/'.$id.'/'.$id.$type.'.png');
    $jpeg = imagecreatefromjpeg('assets/img/cloth/'.$cloth.'_'.$gender.'_'.$color.'_'.$type.'.jpg');
    echo $jpeg;

    list($width, $height) = getimagesize('assets/img/cloth/'.$cloth.'_'.$gender.'_'.$color.'_'.$type.'.jpg');
    list($newwidth, $newheight) = getimagesize('assets/img/item/'.$id.'/'.$id.$type.'.png');

    $out = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($out, $jpeg, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    imagecopyresampled($out, $png, 0, 0, 0, 0, $newwidth, $newheight, $newwidth, $newheight);

    imagejpeg($out, $id.'_'.$cloth.'_'.$type.'_'.$gender.'_'.$color.'.jpg', 100);
  } else {

    $png = imagecreatefrompng('assets/img/item/'.$id.'/'.$id.$type.'.png');
    $jpeg = imagecreatefromjpeg('assets/img/cloth/'.$cloth.'_'.$color.'_'.$type.'.jpg');
    echo $jpeg;

    list($width, $height) = getimagesize('assets/img/cloth/'.$cloth.'_'.$color.'_'.$type.'.jpg');
    list($newwidth, $newheight) = getimagesize('assets/img/item/'.$id.'/'.$id.$type.'.png');

    $out = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($out, $jpeg, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    imagecopyresampled($out, $png, 0, 0, 0, 0, $newwidth, $newheight, $newwidth, $newheight);

    imagejpeg($out, $id.'_'.$cloth.'_'.$type.'_'.$color.'.jpg', 100);
  }


}
?>
