<?php

namespace App\Http\Controllers;

use App\Models\UserJob;
use Illuminate\Http\Request;


class fileUploadController extends Controller
{
    public function fileUpload(Request $req)
    {
//        $req->validate([
//            'file_path' => 'required|mimes:csv,txt,xlx,xls,pdf,docx|max:2048'
//        ]);
//        $fileModel = new UserJob();
//        if($req->file()) {
//            $fileName = time().'_'.$req->file_path->getClientOriginalName();
//            $filePath = $req->file('file_path')->storeAs('uploads', $fileName, 'public');
//            $fileModel->name = time().'_'.$req->file_path->getClientOriginalName();
//            $fileModel->file_path = '/storage/' . $filePath;
//            $fileModel->save();

//            return back()
//                ->with('success','File has been uploaded.')
//                ->with('file', $fileName);

//        $req->validate([
//            'file_path' => 'required|mimes:pdf,doc,docx|max:2048',
//        ]);
//
//        $file_path = $req->file('file_path')->store('cv_files');
        if ($req->hasFile('file_path')) {
            $file_path = $req->file('file_path');
            $path = $file_path->storeAs('cvs' . DIRECTORY_SEPARATOR . 'uploads', date('YmdHis') . '.' . $file_path->getClientOriginalExtension());
            UserJob::query()->create([
                'user_id' => auth()->user()->id,
                'job_id' => $req->input('job_id'),
                'file_path' => $path,
            ]);

            return response()->download(storage_path('app' . DIRECTORY_SEPARATOR . $path));
        }

        return response()->json([
            "error" => [""],
            "message" => "error file not found"
        ]);

    }


}
