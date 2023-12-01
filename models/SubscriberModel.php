<?php

class SubscriberModel
{
    // 
    static public function storage($table, $data)
    {

        $stmt = Connection::connect()->prepare("INSERT INTO $table(name, email) VALUES(:name, :email)");
        $stmt->bindParam(":name", $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data['email'], PDO::PARAM_STR);
        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt = null;
    }
}
