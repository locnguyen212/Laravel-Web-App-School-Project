<?php

function dequy($parent = "", $checked = 0, $parent_id = 0, $str = ""){
    
    foreach($parent as $child){
        if($child->parent_id == $parent_id){
            if($checked == $child->id){
                echo '<option selected value="' . $child->id . '">' . $str . $child->name . '</option>';
            }else{
                echo '<option value="' . $child->id . '">' . $str . $child->name . '</option>';
            }

            dequy($parent, $checked, $child->id, $str."-----|");

        }

    }

    // $parent = DB::table('category')->where('parent_id', $parent_id)->get();
    // foreach ($parent as $child){
    //     if($checked == $child->id){
    //         echo '<option selected value="' . $child->id . '">' . $str . $child->name . '</option>';
    //     }     
    //     else{
    //         echo '<option value="' . $child->id . '">' . $str . $child->name . '</option>';
    //     }
    //     dequy($checked, $child->id, $str."-----|");
    // }

}


?>