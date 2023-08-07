<?php
namespace App\Repositories\Chap;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\Models\Chap;

class ChapRepository extends BaseRepository implements ChapInterface{
    protected $model;

    function __construct(Chap $model)
    {
        parent::__construct($model);
    }

    function store(Request $request){
        $Chap = new Chap();
        $Chap->name = $request->name;
        $Chap->book_id = $request->book_id;
        if($request->hasFile('audio')){
            $file = $request->audio;
            $filename= $file->getClientOriginalName();
            $file->move('audios/', $filename);
            $Chap->audio= $filename;
        }
        else {
            $Chap->audio='no-audio.mp3';
        }
        $Chap->save();
    }
    function update(Request $request,$id){
        $Chap = $this->model->find($id);
        $Chap->name = $request->name;
        $Chap->book_id = $request->book_id;
        if($request->hasFile('audio')){
            if($Chap->audio !='no-audio.mp3'){
                unlink('audios/'.$Chap->audio);
            }
            $file = $request->audio;
            $filename= $file->getClientOriginalName();
            $file->move('audios/', $filename);
            $Chap->audio= $filename;
        }
        $Chap->save();
    }
    function delete($id){
        $Chap = $this->model->find($id);
        unlink('audios/'.$Chap->audio);
        $Chap->delete();
    }

}
