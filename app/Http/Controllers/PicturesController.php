<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

use App\Picture;

class PicturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // WHERE TO PUT IMAGES
    const IMAGE_FOLDER = "/pictures/";

    // WIDTH OF LARGE IMAGE
    const LARGE_IMAGE_WIDTH = 800;

    // WIDTH OF THUMB NAIL
    const THUMB_NAIL_IMAGE_WIDTH = 250;

    private $_fileName, $_fileType, $_fileTmpName, $_fileSize;

    private $_randHex, $_imageFolderLocationFullSize, $_imageFolderLocationThumbSize, $_imageLocation;

    public $imageLocation;


    private static function createPicturesFolder()
    {
        if(!file_exists( public_path('pictures') )) {
            mkdir('pictures', 0777, true);
            chmod('pictures', 0777);
        }

        return public_path(self::IMAGE_FOLDER );
    }


    private static function createYearFolder($pathYY)
    {
        if(!file_exists($pathYY)) {
            mkdir($pathYY, 0777, true);
            chmod($pathYY, 0777);
        }
    }


    public function createPictureFolder()
    {
        $path = static::createPicturesFolder();

        // Create the folders YY/MM/DD/HH
        $date = explode( "|", date("y|m|d|H") );
        list($y, $m, $d, $h) = $date;

        static::createYearFolder($path . $y);

        if(!file_exists($path . $y . "/" . $m)) {
            mkdir($path. $y . "/" . $m, 0777, true);
            chmod($path. $y . "/" . $m, 0777);
        }

        if(!file_exists($path . $y . "/" .  $m . "/" . $d)) {
            mkdir($path . $y . "/" .  $m . "/" . $d, 0777, true);
            chmod($path . $y . "/" .  $m . "/" . $d, 0777);
        }

        if(!file_exists($path . $y . "/" .  $m . "/" . $d . "/" . $h)) {
            mkdir($path . $y . "/" .  $m . "/" . $d . "/" . $h, 0777, true);
            chmod($path . $y . "/" .  $m . "/" . $d . "/" . $h, 0777);
        }

        return $y . "/" .  $m . "/" . $d . "/" . $h . "/";
    }


    public function moveToImageFolderRenameCopy($pictureLocation)
    {
        $path = public_path(self::IMAGE_FOLDER );
        $randHex = substr(md5(rand()), 0, 16);
        $this->_imageLocation = $pictureLocation . $randHex;
        $pathToFileName = $path . $this->_imageLocation;
        move_uploaded_file($_FILES["file"]["tmp_name"], $pathToFileName . '.jpg');
        copy($pathToFileName . '.jpg', $pathToFileName . '_t.jpg');

        return $pathToFileName;
    }


    public function resizeFullSize($pathToFileName)
    {
        //Resize the full size image only if original is more than 800 width
        $imageOriginal = imagecreatefromjpeg($pathToFileName.'.jpg');
        $imageOriginalWidth = imagesx($imageOriginal);

        if($imageOriginalWidth > self::LARGE_IMAGE_WIDTH) {
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


    public function create(Name $name)
    {
        // $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);
        // $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('pictures.create', compact('name'));
    }


    public function store(Name $name)
    {
        $this->validate(request(), [
            'file'=>'required|mimes:jpeg|max:500'
        ]);

        $picture = new Picture();
        $picture->avatar = (request('avatar') == 1) ? 1 : 0;

        if ($picture->avatar == 1) {
            Picture::where('name_id', $name->id)->update(['avatar' => 0]);
        }

        $picture->caption = request('caption');
        $pictureLocation = $this->createPictureFolder();
        $pathToFileName = $this->moveToImageFolderRenameCopy($pictureLocation);
        $this->resizeFullSize($pathToFileName);
        $this->resizeThumbNail($pathToFileName);
        $picture->path_to_file = $this->_imageLocation;

        // $name->pictures()->save($picture);

        $name->addPicture($picture);

        if (!$picture->avatar) {
            return redirect('/portfolio/'.$name->id);
        }

        return redirect('/profile/'.$name->id);
    }


    public function index(Name $name)
    {
        return view('pictures.index', compact('name'));
    }


    public function show(Picture $picture)
    {
        if ( !$pictureUpOne = $picture->where('name_id', $picture->name_id)->where('id', '>', $picture->id)->limit(1)->get()->first() ) {
             $pictureUpOne = $picture->where('name_id', $picture->name_id)->limit(1)->get()->first(); // lowest id
        }

        if ( !$pictureDownOne = $picture->where('name_id', $picture->name_id)->where('id', '<', $picture->id)->orderBy('id', 'desc')->limit(1)->first() ) {
             $pictureDownOne = $picture->where('name_id', $picture->name_id)->limit(1)->orderByDesc('id')->get()->first(); // highest id
        }

        $name = Name::where('id', $picture->name_id)->first();

        return view('pictures.show', compact('picture', 'name', 'pictureUpOne', 'pictureDownOne'));
    }


    public function edit(Picture $picture)
    {
        $name = Name::find($picture->name_id);
        $avatar = (new Picture())->where('avatar', 1)->where('name_id', $picture->name_id)->first();
        // $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);

        return view('pictures.edit', compact('picture', 'name', 'avatar'));
    }


    public function update(Picture $picture)
    {
        $avatar = (request('avatar') == 1) ? 1 : 0;
        $hasAvatarChanged = ($picture::find($picture->id)->avatar == $avatar) ? false : true;

        if ( ($avatar == 1) AND ($hasAvatarChanged) ) {
        Picture::where('name_id', $picture->name_id)->update(['avatar' => 0]);
        }

        $picture->update(['avatar'=>$avatar, 'caption'=>request('caption')]);

        if (!$hasAvatarChanged) {
            return redirect('/picture/'.$picture->id);
        }

        return redirect('/profile/'.$picture->name_id);
    }


    public function destroy(Picture $picture)
    {
        $picture->delete();

        return redirect('/portfolio/'.$picture->name_id);
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