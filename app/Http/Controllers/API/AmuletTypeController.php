<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Amulet\AmuletType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AmuletTypeController extends Controller
{
    public function AmuletTypeView() {
        $amulettypes = AmuletType::latest()->get();
        return view('backend.amulet.amulet_type.amulettype_view', compact('amulettypes'));
    }

    public function AmuletTypeStore(Request $request){
        $request->validate([
            'amulettype_name' => 'required',
        ],[
            'amulettype_name.required' => 'กรุณากรอกชื่อประเภทของพระเครื่อง',
        ]);

        AmuletType::insert([
            'amulettype_name' => $request->amulettype_name,
            'amulettype_slug' => strtolower(str_replace(' ', '-', $request->amulettype_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'คุณทำการเพิ่มประเภทของพระเครื่อง สำเร็จแล้ว',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AmuletTypeEdit($id){
        $amulettype = AmuletType::findOrFail($id);
        return view('backend.amulet.amulet_type.amulettype_edit', compact('amulettype'));
    }

    public function AmuletTypeUpdate(Request $request, $id){

            AmuletType::findOrFail($id)->update([
                'amulettype_name' => $request->amulettype_name,
                'amulettype_slug' => strtolower(str_replace(' ', '-', $request->amulettype_name)),
            ]);

        $notification = array(
            'message' => 'คุณทำการแก้ไขประเภทของพระเครื่อง สำเร็จแล้ว',
            'alert-type' => 'info'
        );

        return redirect()->route('all.amulettype')->with($notification);
    }

    public function AmuletTypeDelete($id) {

        AmuletType::findOrfail($id)->delete();

        $notification = array(
            'message' => 'คุณทำการลบประเภทของพระเครื่อง สำเร็จแล้ว',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

}
