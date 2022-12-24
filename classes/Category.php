<?php
require_once '../lib/Database.php';
require_once '../helpers/Format.php';

class Category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert( $cat )
    {
        $cat = $this->fm->validation( $cat );
        $cat = mysqli_real_escape_string( $this->db->link, $cat );

        if( empty( $cat ) ) {
            $msg = "Category field must not be empty!";
            return $msg;
        }else{
            $query = "INSERT INTO 
            shop_category(name)
            VALUES('$cat')
            ";
            $cat_insert = $this->db->insert( $query );

            if( $cat_insert ) {
                $msg = "<span style='color:green;font-size:17px'>Category inserted successfully</span>";
                echo '<script> window.location = "catlist.php";</script>';
                return $msg;
            }else{
                $msg = "<span style='color:green;font-size:17px'>Category cannot inserted.</span>";
                return $msg;
            }
        }
    }

    public function select( $table = 'shop_category', $orderby = 'id', $oder = 'DESC'){
        $query = "SELECT * FROM $table ORDER BY $orderby $oder";
        $result = $this->db->select( $query );
        
        return $result;
    }

    public function get_cat_by_id( $id ){
        $query = "SELECT * FROM shop_category WHERE id = '$id'";
        $result = $this->db->select( $query );
        
        return $result;
    }

    public function update( $cat, $id ){
        $cat = $this->fm->validation( $cat );

        $cat = mysqli_real_escape_string( $this->db->link, $cat );
        $id = mysqli_real_escape_string( $this->db->link, $id );



        if( empty( $cat ) ) {
            $msg = "Category field must not be empty!";
            return $msg;
        }else{
            $query = "UPDATE shop_category
            SET name = '$cat'
            WHERE id = $id
            ";

            $updated_row = $this->db->update( $query );

            if( $updated_row ) {
                $msg = "<span style='color:green;font-size:17px'>Category updated successfully</span>";
                // echo '<script> window.location = "catlist.php";</script>';
                return $msg;
            }else{
                $msg = "<span style='color:green;font-size:17px'>Category cannot updated.</span>";
                return $msg;
            }

        }
    }

    public function delete( $id )
    {
        $query = "DELETE FROM shop_category WHERE id = '$id'";
        $delete = $this->db->delete( $query );

        if( $delete ){
            $msg = "<span style='color:green;font-size:17px'>Category deleted successfully</span>";
            // echo '<script> window.location = "catlist.php";</script>';
            return $msg;
        }else{
            $msg = "<span style='color:green;font-size:17px'>Category cannot deleted.</span>";
            return $msg;
        }
    }
}
