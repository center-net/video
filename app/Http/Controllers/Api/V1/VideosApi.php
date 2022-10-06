<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Video;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\VideosRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class VideosApi extends Controller{
	protected $selectColumns = [
		"id",
		"title",
		"videourl",
		"image",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.40]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return [];
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Video = Video::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Video]);
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(VideosRequest $request)
    {
    	$data = $request->except("_token");
    	
                $data["videourl"] = "";
                $data["image"] = "";
        $Video = Video::create($data); 
               if(request()->hasFile("videourl")){
              $Video->videourl = it()->upload("videourl","videos/".$Video->id);
              $Video->save();
              }
               if(request()->hasFile("image")){
              $Video->image = it()->upload("image","videos/".$Video->id);
              $Video->save();
              }

		  $Video = Video::with($this->arrWith())->find($Video->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Video
        ]);
    }


            /**
             * Display the specified resource.
             * Baboon Api Script By [it v 1.6.40]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $Video = Video::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Video) || empty($Video)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Video
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.40]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new VideosRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(VideosRequest $request,$id)
            {
            	$Video = Video::find($id);
            	if(is_null($Video) || empty($Video)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile("videourl")){
              it()->delete($Video->videourl);
              $data["videourl"] = it()->upload("videourl","videos/".$Video->id);
               }
               if(request()->hasFile("image")){
              it()->delete($Video->image);
              $data["image"] = it()->upload("image","videos/".$Video->id);
               }
              Video::where("id",$id)->update($data);

              $Video = Video::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Video
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $videos = Video::find($id);
            	if(is_null($videos) || empty($videos)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($videos->videourl)){
               it()->delete($videos->videourl);
              }
              if(!empty($videos->image)){
               it()->delete($videos->image);
              }
               it()->delete("video",$id);

               $videos->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $videos = Video::find($id);
	            	if(is_null($videos) || empty($videos)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($videos->videourl)){
                    	it()->delete($videos->videourl);
                    	}
                    	if(!empty($videos->image)){
                    	it()->delete($videos->image);
                    	}
                    	it()->delete("video",$id);
                    	$videos->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $videos = Video::find($data);
	            	if(is_null($videos) || empty($videos)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($videos->videourl)){
                    	it()->delete($videos->videourl);
                    	}
                    	if(!empty($videos->image)){
                    	it()->delete($videos->image);
                    	}
                    	it()->delete("video",$data);

                    $videos->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}