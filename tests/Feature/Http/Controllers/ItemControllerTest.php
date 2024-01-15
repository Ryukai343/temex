<?php

namespace Http\Controllers;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\ItemController;
use Tests\TestCase;
use File;

class ItemControllerTest extends TestCase
{

    public function testCreatePictureU0003()
    {
        $itemController = new ItemController();
        File::copy(public_path('/image/test_picture.jpg'), public_path('/image/test_picture1.jpg'));

        $picture = new UploadedFile(public_path('image/test_picture1.jpg'), 'test_picture1.jpg', 'image/jpeg', null, true);
        $pictureName = $itemController->createPicture($picture, 'test_picture');
        $test_picture = 'test_picture_' . time() . '.jpg';
        $filePath = public_path('item_Images/' . $pictureName);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        self::assertEquals($test_picture, $pictureName);
    }

    public function testCreatePictureNullU0004()
    {
        $itemController = new ItemController();
        $picture = null;
        $pictureName = $itemController->createPicture($picture, 'test');
        self::assertEquals('Bez obrázku', $pictureName);
    }
}
