<?php

session_start();
date_default_timezone_set('Asia/Taipei');

class DB{
    protected $table;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db24_3";
    protected $pdo;

function __construct($table){
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,'root','');
}



//all()

function all(...$arg){
    $sql="SELECT * FROM $this->table ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            $sql.=" WHERE " . join(" AND ",$tmp);
        }else{
            $sql.= $arg[0];
        }
    }

    if(isset($arg[1])){
        $sql.=$arg[1];
    }

    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}


//find()

function find($id){
    $sql="SELECT * FROM $this->table WHERE ";
    
        if(is_array($id)){
            foreach($id as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            $sql.= join(" AND ",$tmp);
        }else{
            $sql.= "`id`='$id'";
        }
    

   

    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}


//del()

function del($id){
    $sql="DELETE FROM $this->table WHERE ";
    
        if(is_array($id)){
            foreach($id as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            $sql.= join(" AND ",$tmp);
        }else{
            $sql.= "`id`='$id'";
        }
    

   

    return $this->pdo->exec($sql);
}

//save()

function save($array){
    if(isset($array['id'])){
        //更新
        foreach($array as $key => $val){
            $tmp[]="`$key`='$val'";  
        }
        $sql="UPDATE $this->table SET" . join(',',$tmp) . " WHERE `id` = '{$array['id']}'";
    }else{
        //新增
        $sql="INSERT INTO $this->table (`".join("`,`",array_keys($array))."`) 
                                VALUES ('".join("','",$array)."')"; 
    }

    return $this->pdo->exec($sql);
}


//math()

function math($math,$col,...$arg){
    $sql="SELECT $math($col) FROM $this->table ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            $sql.=" WHERE " . join(" AND ",$tmp);
        }else{
            $sql.= $arg[0];
        }
    }

    if(isset($arg[1])){
        $sql.=$arg[1];
    }

    return $this->pdo->query($sql)->fetchColumn();   
}

//q()
function q($sql){
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}




}

function to($url){
    header('location:'.$url);
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$Poster= new DB('poster');


?>