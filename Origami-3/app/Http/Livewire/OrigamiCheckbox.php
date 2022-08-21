<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Livewire\WithPagination;

class OrigamiCheckbox extends Component
{   
    use WithPagination;   
    public $data;
    public $selectedOrigami = [];
    public $selectAll = false;
    public $sortBy='asc';
    public $column='name';
    public $search;

    public function editSelected(){
        if(count($this->selectedOrigami) <= 1){
            return redirect()->route('admin.origami.index')->with('alert', 'You Cannot Use Check Box To Edit Less Than One Origami!');
        }else{
            $array = array_map('intval', $this->selectedOrigami);
            $array = serialize($array);
            $length = substr($array, 0, 4);
            $array = substr($array, 4);
            $array = str_replace('{', '', $array);
            $array = str_replace('}', '', $array);
            return redirect()->route('admin.origami.editSelected', ['array' => $array, 'length' => $length]);
        }
    }

    public function updatedSelectAll($value){
        $id = false;
        if(auth()->user()->level != 1){
            $id = auth()->user()->id;
        }
        $ori = DB::table('origami')
                    ->select('origami.*', 'category.name AS category_name', 'users.name AS user_name')
                    ->join('category', 'category.id', '=', 'origami.category_id')
                    ->join('users', 'users.id', '=', 'category.user_id')
                    ->when($id, function($query, $id){
                        return $query->where('users.id', $id);
                    })
                    ->when($this->search, function($query, $search){
                        return $query->where($this->column, 'LIKE', '%'.$search.'%');
                    })
                    ->whereNull('origami.deleted_at')
                    ->pluck('id')
                    ->toArray();
        
        if($value){
            $this->selectedOrigami = $ori;
        }else{
            $this->selectedOrigami = [];
        }
    }

    public function render()
    {   
        $id = false;
        if(auth()->user()->level != 1){
            $id = auth()->user()->id;
        }
        $ori = DB::table('origami')
                    ->select('origami.*', 'category.name AS category_name', 'users.name AS user_name')
                    ->join('category', 'category.id', '=', 'origami.category_id')
                    ->join('users', 'users.id', '=', 'category.user_id')
                    ->when($id, function($query, $id){
                        return $query->where('users.id', $id);
                    })
                    ->when($this->search, function($query, $search){
                        return $query->where($this->column, 'LIKE', '%'.$search.'%');
                    })
                    ->whereNull('origami.deleted_at')
                    ->orderBy($this->column, $this->sortBy)
                    ->paginate(6);
 
        return view('livewire.origami-checkbox', ['ori' => $ori]);
    }
}
