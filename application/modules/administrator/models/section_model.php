<?php

class Section_model extends Cms_Base_model
{
    function __construct()
    {
        parent::__construct();
    }

    public function Section_get_all($limit_start = false, $limit_show = false, $whereClause = ' 1 = 1 ')
    {

        $selectClause = " select (select count(id) from sections where "
            . $whereClause . "
								) as count, id, Title, Link,Orders, Publish, CreatedDate from sections
									where " . $whereClause . " order by Orders asc, CreatedDate desc limit ?,? ";

        $result = $this->db->query($selectClause, array($limit_start, $limit_show));

        return $result;

    }

    public function Section_get_by_id($id = false)
    {

        $selectClause = " select * from sections where id = ? ";
        $result = $this->db->query($selectClause, array($id));
        return $result;
    }

    private function Check_input_fields()
    {
        $this->input->post('Title') ? $Title = $this->input->post('Title') : $Title = "";
        $this->input->post('Link') ? $Link = $this->input->post('Link') : $Link = "";
        $this->input->post('Publish') ? $Publish = $this->input->post('Publish') : $Publish = 1;
        $this->input->post('Orders') ? (is_numeric($this->input->post('Orders')) ? $Orders = $this->input->post('Orders') : $Orders = 999) : $Orders = 999;

        $data = array(
            'Title' => $Title,
            'Link' => $Link,
            'Orders' => $Orders,
            'Publish' => $Publish,
        );
        return $data;
    }

    public function Section_insert()
    {
        $receivedata = $this->Check_input_fields();
        $data = array(
            'Title' => $receivedata['Title'],
            'Orders' => $receivedata['Orders'],
            'Link' => $receivedata['Link'],
        );

        $this->db->insert('sections', $data);

        return $this->db->affected_rows() > 0;
    }

    public function Section_update($id = false)
    {
        if ($id !== false && is_numeric($id)) {
            $receivedata = $this->Check_input_fields();

            $data = array(
                'Title' => $receivedata['Title'],
                'Orders' => $receivedata['Orders'],
                'Link' => $receivedata['Link'],
                'Publish' => $receivedata['Publish'],
            );

            $this->db->update('sections', $data, array('id' => $id));

            return $this->db->affected_rows() > 0;
        }
        return false;
    }

    public function Section_update_orders()
    {
        $id = $this->input->post("id");
        $this->input->post("orders") ? (is_numeric($this->input->post("orders")) ? $orders = $this->input->post("orders") : $orders = 999) : $orders = 999;
        if ($id !== false && $orders !== false) {
            $data = array(
                'Orders' => $orders,
            );
            $this->db->update('sections', $data, array('id' => $id));

            if ($this->db->affected_rows() > 0)
                return true;
        }
        return false;
    }

    public function Section_update_publish()
    {
        $id = $this->input->post('id');
        $this->input->post('publish') ? $publish = 1 : $publish = 0;
        if ($id !== false && is_numeric($id)) {
            $data = array('Publish' => (int)$publish,
            );

            $this->db->update('sections', $data, array('id' => $id));

            if ($this->db->affected_rows() > 0)
                return true;
            return false;
        }

        return false;
    }

    public function Section_delete($id = false)
    {
        if ($id !== false) {
            $this->db->delete('sections', array('id' => $id));

            if ($this->db->affected_rows() > 0)
                return true;
            return false;
        }

        show_404();
    }
}

?>