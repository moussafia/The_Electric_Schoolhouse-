<?php 
namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAddReques;

trait UploadImageTrait{
    public function uploadImage(Request $request){
        $image = $request->file('imagePlat');
        $file_name=date('YmdHi').$image->getClientOriginalName();
        return $image->move('mohammed',$file_name);
    }
}