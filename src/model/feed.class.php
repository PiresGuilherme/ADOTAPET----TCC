<?php

    use AdotaPEt\Model\DB;
    use adotaPet\Model\Start;

    use JetPHP\Model\DB as ModelDB;

        class feed{
            private function getDados() {
                $qr= DB::execute("SELECT * FROM pet WHERE id-=?",[start::session('id_pet')]);
                if ($qr->count() > 0){
                    return $qr->list(PDO::FETCH_OBJ);

                }else {
                    return false;
                }
            }
        }



    // class feedcontroller extends feed{
    //     public function __construct()
    //     {
    //      parent:: __construct();
    //     }


    //     // public static function dashboard() {
    //     //     return self::load('dash', ['dadosusuario' => self::$dadosusuario]);
 
    //     // }
    // }


    // class feed{
    //     protected static $dadosusuario;

    //     public function __construct(){
    //         self::$dadosusuario = $this->getdados();
    //     }

    //     private function getdados(){
    //     $qr = db::execute("SELECT * FROM animal where id=?", [Start::session("id_user")]);
    //         if ($qr->count()> 0) {
    //           return $qr->list(PDO::FETCH_OBJ);
    //         }  else {
    //             return false;
    //          }
    //     }   

    //     public function getPosts () {
    //         $qr = DB::execute ("SELECT * FROM posts");
    //             if ($qr->count()>0) {
    //                 $qr->generico()->fetchAll(PDO::FETCH_OBJ);
    //             } else {
    //                 return false;
    //             }
    //         }
        
    // }