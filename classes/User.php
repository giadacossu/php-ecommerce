<?php

class UserManager extends DBManager
{
    public function __construct()
    {
        parent::__construct(); //chiamiamo il costruttore padre dentro il costruttore 
        $this->tableNames = 'user';
        $this->columns = ['id', 'name', 'password', 'user_type_id'];
    }
    ///public methods
    public function login($email, $password)
    {
        $pssw= md5($password);
        $result =  $this->db->query("SELECT * FROM [user] WHERE email='$email' AND password = '$pssw'");

        var_dump($result[0]);
        if (count($result) > 0) {
            $user = (object) $result[0];

            $this->_setUser($user);
            return true;
    }else{
        return false;
    }
}
    

///private methods  

private function _setUser($user){
    $userToStore = (object)[
        'id' => $user->id,
        'email' => $user->email,
        'is_admin' => $user->user_type_id == 1
    ];

    $_SESSION['user'] = $userToStore;
    
}

}
