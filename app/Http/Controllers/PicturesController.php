<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

class PicturesController extends Controller
{
    // WHERE TO PUT IMAGES
    const IMAGE_FOLDER = "/pictures/";

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

        $this->imageLocation = $y . "/" .  $m . "/" . $d . "/" . $h . "/";
    }



/*
    public function moveToImageFolderRenameCopy()
    {

        move_uploaded_file($this->_fileTmpName, self::IMAGE_FOLDER . $this->_imageLocation . $this->_fileName);

//        move_uploaded_file($_FILES["file"]["tmp_name"], self::IMAGE_FOLDER . $this->_imageLocation . $_FILES["file"]["name"]);

        $this->_randHex = substr(md5(rand()), 0, 8);

        $fullSize = $this->_randHex . ".jpg";

        $thumbSize = $this->_randHex . "_t.jpg";

        $this->_imageFolderLocationFullSize = self::IMAGE_FOLDER . $this->_imageLocation . $fullSize;

        $this->_imageFolderLocationThumbSize = self::IMAGE_FOLDER . $this->_imageLocation . $thumbSize;

        rename(self::IMAGE_FOLDER . $this->_imageLocation . $this->_fileName ,  $this->_imageFolderLocationFullSize) ;

        copy($this->_imageFolderLocationFullSize, $this->_imageFolderLocationThumbSize);
    }

*/







    public function create(Name $name)
    {
        $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);

        return view('pictures.create', compact('name', 'dob'));
    }


    public function store(Request $request)
    {

        $this->createPictureFolder();


         return $_FILES;

        // return $request->all();
    }
}
