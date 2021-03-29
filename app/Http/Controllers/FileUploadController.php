<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
 
class FileUploadController extends Controller
{
     public function index()
    {
        //
        $files = file::latest()->paginate(5);
  
        return view('files.index',compact('files'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        //
        return view('files/upload');
    }

    public function store(Request $request)
    {
        if($file = $request->file('file')){
            $size = $file->getSize();
            
            if($size <= 2097152){

                $data = new file();
                $fname = $file->getClientOriginalName();
                $fextension = $file->getClientOriginalExtension();
                $path = $file->store('file', ['disk' => 'public']);
                
                $data->FileName = $fname;
                $data->FileType = $fextension;
                $data->path = $path;
                $data->save();

                return redirect()->route('files.index')
                        ->with('success','File Uploaded successfully.');
            }
            else{
                return redirect()->route('files.index')
                        ->with('error','File size exceeded');
            }
        }
    }

    public function update(Request $request, File $file){
        $request->validate([
            'fname' => 'required',
        ]);

        $file->FileName = $request->fname . "." . $file->FileType;
        $file->updated_at = $file->updated_at->getTimestamp();
        $file->save();


        if($file->save()){
            return redirect()->route('files.index')->with('success', 'File has been uploaded!');
       }
       else{
            return redirect()->route('files.edit')->with('error','Error in uploading file');
       }


    }

    public function destroy(File $file){
        
        Storage::disk('public')->delete($file->path);
        $file->delete();
  
        return redirect()->route('files.index')
                        ->with('success','File deleted successfully.');
    }

    public function show(File $file){
        return view('files.view')->with([
            'file' => $file,
        ]);
    }

    public function edit(File $file)
    {
        
        return view('files.edit', compact('file'));
    }

}