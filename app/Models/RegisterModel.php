<?php

namespace app\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    public function createUser($data)
    {
        $builder = $this->db->table('register');
        $res = $builder->insert($data);
        if($this->db->affectedRows() == 1){
            return true;
        }else{
            return false;
        }
    }
    public function verifyUniid($id){
        $builder = $this->db->table('register');
        $builder->select('activation_date,uniid,status');
        $builder->where('uniid',$id);
        $result = $builder->get();
//        echo count($result->getResultArray());
//        echo $result->resultID->num_rows;
        if($result->resultID->num_rows == 1)
        {
            return $result->getRow();
        }
        else
        {
            return false;
        }
    }
    public function updateStaus($uniid)
    {
        $builder = $this->db->table('register');
        $builder->where('uniid',$uniid);
        $builder->update(['status'=>'active']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}