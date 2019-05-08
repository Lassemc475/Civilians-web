<?php
/**
 * Created by PhpStorm.
 * user: Mikkelsen
 * Date: 29-01-2018
 * Time: 09:01
 */

class vrp
{

    protected $db;

    public function __construct()
    {
        global $vrpdbconn;
        $this->db = $vrpdbconn->open();
    }

    /**
     * Gets the user by id
     * @param integer $id user's id
     *
     * @return array user Info
     */
    public function getUser($id)
    {
        $params['id'] = $id;
        $stmt = $this->db->prepare("SELECT * FROM vrp_users WHERE id = :id");
        $stmt->execute($params);

        $data = $stmt->fetch();
        if($data) {
            return $data;
        }else{
            return false;
        }
    }

    public function createRefund($userid,$lost,$how,$when,$where)
    {
        $params = [
          "userid" => $userid,
          "lost" => $lost,
          "how" => $how,
          "when" => $when,
          "where" => $where,
        ];
        $stmt = $this->db->prepare(
            "INSERT INTO `refunds`(`userid`, `lost`, `how`, `when`, `where`) VALUES (:userid,:lost,:how,:when,:where);");
        $stmt->execute($params);
        return $this->db->lastInsertId();
    }

    public function getLocalIP() {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
        return $ip;
    }
}