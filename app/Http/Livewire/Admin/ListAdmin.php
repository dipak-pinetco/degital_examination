<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class ListAdmin extends Component
{
    public function render()
    {
        // if ($request->ajax()) {
        //     $data = User::select('*');
        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {

        //             $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        // DB::enableQueryLog();

        // dd(DB::getQueryLog());


        $users = User::with(['roles'])->whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->when(!auth()->user()->hasRole('super-admin'), function ($query) {
            $query->whereHas('school', function ($query) {
                $query->where('id', auth()->user()->school_id);
            });
        })->paginate(User::PAGINATION_COUNT)->withPath('/admin')->withQueryString();
        return view('livewire.admin.list-admin',['users'=>$users]);
    }
}
