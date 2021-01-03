<?php 

namespace App\Auth;

class Hash
{
    /**
     * Hash specified string by specific algorithm using password_hash
     * function. All algorithms names have to be an constant 
     * 
     * @param string $password 
     * @param string $algorithm
     * @return string
     */ 
    public function hashPassword(string $password, string $algorithm)
    {
        return password_hash($password, $algorithm);
    }

    /**
     * Verify specified password with hash value using password_verify
     * function
     * 
     * @param string $password 
     * @param string $hash
     * @return bool 
     */ 
    public function verifyPassword(string $password, string $hash)
    {
        return password_verify($password, $hash);
    }
}
