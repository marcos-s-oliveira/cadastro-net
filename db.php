<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 25/06/2019
 * Time: 16:40
 */

class db{
    protected $host;
    protected $user;
    protected $pass;
    protected $db;
    public $link = null;

    /**
     * db constructor.
     * @param $host
     * @param $user
     * @param $pass
     * @param $db
     * @param null $conn
     */
    public function __construct(){
        $this->host = "127.0.0.1";
        $this->user = "root";
        $this->pass = "";
        //$this->user = "sigm";
        //$this->pass = "DP3kb3mCEBK";
        $this->db = "prisma_provedor";

        if(!$this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->db)){
            ?>
            <script>
                alert('Um erro Grave Ocorreu. Cod: 0-D1B')
            </script>

            <?php
            die();
        }
        mysqli_set_charset($this->link, "utf8");
    }

}
