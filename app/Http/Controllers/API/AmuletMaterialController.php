<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Amulet\AmuletMaterial;

class AmuletMaterialController extends Controller
{
    public function AmuletMaterialView() {
        $amuletmaterials = AmuletMaterial::latest()->get();
        return view('backend.amulet.amulet_material.amuletmaterial_view', compact('amuletmaterials'));
    }

    public function AmuletMaterialStore(Request $request){
        $request->validate([
            'amuletmaterial_name' => 'required',
        ],[
            'amuletmaterial_name.required' => 'กรุณากรอกชื่อประเภทของพระเครื่อง',
        ]);

        AmuletMaterial::insert([
            'amuletmaterial_name' => $request->amuletmaterial_name,
            'amuletmaterial_slug' => strtolower(str_replace(' ', '-', $request->amuletmaterial_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'คุณทำการเพิ่มเนื้อ/วัสดุของพระเครื่อง สำเร็จแล้ว',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AmuletMaterialEdit($id){
        $amuletmaterial = AmuletMaterial::findOrFail($id);
        return view('backend.amulet.amulet_material.amuletmaterial_edit', compact('amuletmaterial'));
    }

    public function AmuletMaterialUpdate(Request $request, $id){

            AmuletMaterial::findOrFail($id)->update([
                'amuletmaterial_name' => $request->amuletmaterial_name,
                'amuletmaterial_slug' => strtolower(str_replace(' ', '-', $request->amuletmaterial_name)),
            ]);

        $notification = array(
            'message' => 'คุณทำการแก้ไขเนื้อ/วัสดุของพระเครื่อง สำเร็จแล้ว',
            'alert-type' => 'info'
        );

        return redirect()->route('all.amuletmaterial')->with($notification);
    }

    public function AmuletMaterialDelete($id) {

        AmuletMaterial::findOrfail($id)->delete();

        $notification = array(
            'message' => 'คุณทำการลบเนื้อ/วัสดุของพระเครื่อง สำเร็จแล้ว',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
