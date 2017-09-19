<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

class PicturesController extends Controller
{
    // WHERE TO PUT IMAGES
    const IMAGE_FOLDER = "/pictures/";

    // WIDTH OF LARGE IMAGE
    const LARGE_IMAGE_WIDTH = 800;



    // WIDTH OF THUMB NAIL
    const THUMB_NAIL_IMAGE_WIDTH = 175;

    private $_fileName, $_fileType, $_fileTmpName, $_fileSize;

    private $_randHex, $_imageFolderLocationFullSize, $_imageFolderLocationThumbSize, $_imageLocation;

    public $imageLocation;






    public function createPictureFolder()
    {
        $path = public_path(self::IMAGE_FOLDER );

        // Create the folders YY/MM/DD/HH
        $date = explode( "|", date("y|m|d|H") );
        list($y, $m, $d, $h) = $date;

        if(!file_exists($path . $y))
        {
            mkdir($path . $y, 0777, true);
            chmod($path . $y, 0777);
        }

        if(!file_exists($path . $y . "/" . $m))
        {
            mkdir($path. $y . "/" . $m, 0777, true);
            chmod($path. $y . "/" . $m, 0777);
        }

        if(!file_exists($path . $y . "/" .  $m . "/" . $d))
        {
            mkdir($path . $y . "/" .  $m . "/" . $d, 0777, true);
            chmod($path . $y . "/" .  $m . "/" . $d, 0777);
        }

        if(!file_exists($path . $y . "/" .  $m . "/" . $d . "/" . $h))
        {
            mkdir($path . $y . "/" .  $m . "/" . $d . "/" . $h, 0777, true);
            chmod($path . $y . "/" .  $m . "/" . $d . "/" . $h, 0777);
        }

        return $y . "/" .  $m . "/" . $d . "/" . $h . "/";
    }




    public function moveToImageFolderRenameCopy($pictureLocation)
    {

        $path = public_path(self::IMAGE_FOLDER );

        $randHex = substr(md5(rand()), 0, 16);

        $pathToFileName = $path . $pictureLocation . $randHex;

        move_uploaded_file($_FILES["file"]["tmp_name"], $pathToFileName . '.jpg');

        copy($pathToFileName . '.jpg', $pathToFileName . '_t.jpg');


        return $pathToFileName;


//        move_uploaded_file($_FILES["file"]["tmp_name"], $path . $pictureLocation . $_FILES["file"]["name"]);

//        move_uploaded_file($_FILES["file"]["tmp_name"], self::IMAGE_FOLDER . $this->_imageLocation . $_FILES["file"]["name"]);
        /*

        $this->_randHex = substr(md5(rand()), 0, 8);

        $fullSize = $this->_randHex . ".jpg";

        $thumbSize = $this->_randHex . "_t.jpg";

        $this->_imageFolderLocationFullSize = $path . $pictureLocation . $fullSize;

        $this->_imageFolderLocationThumbSize = $path . $pictureLocation . $thumbSize;

        rename($path . $pictureLocation . $_FILES["file"]["name"] ,  $this->_imageFolderLocationFullSize) ;

        copy($this->_imageFolderLocationFullSize, $this->_imageFolderLocationThumbSize);
        */

    }





















/*
    public function moveToImageFolderRenameCopy($pictureLocation)
    {

        $path = public_path(self::IMAGE_FOLDER );

        move_uploaded_file($_FILES["file"]["tmp_name"], $path . $pictureLocation . $_FILES["file"]["name"]);

//        move_uploaded_file($_FILES["file"]["tmp_name"], $path . $pictureLocation . $_FILES["file"]["name"]);

//        move_uploaded_file($_FILES["file"]["tmp_name"], self::IMAGE_FOLDER . $this->_imageLocation . $_FILES["file"]["name"]);

        $this->_randHex = substr(md5(rand()), 0, 8);

        $fullSize = $this->_randHex . ".jpg";

        $thumbSize = $this->_randHex . "_t.jpg";

        $this->_imageFolderLocationFullSize = $path . $pictureLocation . $fullSize;

        $this->_imageFolderLocationThumbSize = $path . $pictureLocation . $thumbSize;

        rename($path . $pictureLocation . $_FILES["file"]["name"] ,  $this->_imageFolderLocationFullSize) ;

        copy($this->_imageFolderLocationFullSize, $this->_imageFolderLocationThumbSize);
    }

*/

    public function resizeFullSize($pathToFileName)
    {
        //Resize the full size image only if original is more than 800 width
        $imageOriginal = imagecreatefromjpeg($pathToFileName.'.jpg');
        $imageOriginalWidth = imagesx($imageOriginal);
        if($imageOriginalWidth > self::LARGE_IMAGE_WIDTH)
        {
            $imageOriginalHeight = imagesy($imageOriginal);

            // Make the width 800px and find the new height
            $displayHeight = intval(self::LARGE_IMAGE_WIDTH * $imageOriginalHeight / $imageOriginalWidth);

            $displayImage = imagecreatetruecolor(self::LARGE_IMAGE_WIDTH, $displayHeight);

            imagecopyresampled($displayImage, $imageOriginal, 0, 0, 0, 0, self::LARGE_IMAGE_WIDTH, $displayHeight,
                $imageOriginalWidth, $imageOriginalHeight);

            imagejpeg($displayImage, $pathToFileName.'.jpg');
        }
    }


    public function resizeThumbNail($pathToFileName)
    {
        $imageOriginal = imagecreatefromjpeg($pathToFileName.'_t.jpg');

        $imageOriginalWidth = imagesx($imageOriginal);

        $imageOriginalHeight = imagesy($imageOriginal);

        // Make the width and find the new height
        $displayHeight = intval(self::THUMB_NAIL_IMAGE_WIDTH * $imageOriginalHeight / $imageOriginalWidth);

        $displayImage = imagecreatetruecolor(self::THUMB_NAIL_IMAGE_WIDTH, $displayHeight);

        imagecopyresampled($displayImage, $imageOriginal, 0, 0, 0, 0, self::THUMB_NAIL_IMAGE_WIDTH, $displayHeight,
            $imageOriginalWidth, $imageOriginalHeight);

        imagejpeg($displayImage, $pathToFileName.'_t.jpg');
    }



/*
    public function resizeThumbNail()
    {
        $imageOriginal = imagecreatefromjpeg($this->_imageFolderLocationThumbSize);
        $imageOriginalWidth = imagesx($imageOriginal);

        $imageOriginalHeight = imagesy($imageOriginal);

        // Make the width and find the new height
        $displayHeight = intval(self::THUMB_NAIL_IMAGE_WIDTH * $imageOriginalHeight / $imageOriginalWidth);

        $displayImage = imagecreatetruecolor(self::THUMB_NAIL_IMAGE_WIDTH, $displayHeight);

        imagecopyresampled($displayImage, $imageOriginal, 0, 0, 0, 0, self::THUMB_NAIL_IMAGE_WIDTH, $displayHeight,
            $imageOriginalWidth, $imageOriginalHeight);

        imagejpeg($displayImage, $this->_imageFolderLocationThumbSize );
    }

*/



    public function create(Name $name)
    {
        $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);

        return view('pictures.create', compact('name', 'dob'));
    }


    public function store(Request $request)
    {

        $pictureLocation = $this->createPictureFolder();


        $pathToFileName = $this->moveToImageFolderRenameCopy($pictureLocation);


        $this->resizeFullSize($pathToFileName);

        $this->resizeThumbNail($pathToFileName);



        return $pathToFileName;

        // return $request->all();
    }
}
/*
"file": {
    "name": "tumblr_m5zqyis36J1r50ghwo1_500.jpg",
    "type": "image/jpeg",
    "tmp_name": "/tmp/phpseVQZp",
    "error": 0,
    "size": 88907
  }
*/