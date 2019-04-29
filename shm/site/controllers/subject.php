<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subject extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helpers('uisite_helper');
        $this->load->model('article_model');
        $this->banner_id = 57;
    }

    public function index()
    {

        $id = $this->db->order_by('sort_id', 'desc')->get_where('product', array('cid' => 59, 'audit' => 1))->result_array();

        $this->info($id[0]['id']);
    }

    public function info($id = '')
    {
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));

        /*seo*/
        $data['header'] = header_seoinfo(59, 0);
        $data['seo'] = $this->db->get_where('product', array('id' => $id))->row_array();//获取seo


        $data['subject'] = $this->db->order_by('sort_id', 'desc')->get_where('product', array('cid' => 59, 'audit' => 1))->result_array();


        $data['info'] = $this->db->get_where('product', array('cid' => 59, 'audit' => 1, 'id' => $id))->row_array();
        $data['info_photo'] = $this->duo_img($data['info']['photo']);


        $this->load->view('subject/info', $data);
    }


    function duo_img($photo)
    {
        if (empty($photo))
        {
            $img = '';
        } else
        {
            $img = array();
            if (strstr($photo, ','))
            {
                $img_id = explode(",", $photo);
                foreach ($img_id as $k => $v)
                {
                    $img_one = tag_photo($v);
                    $img[] = $img_one;
                }
            } else
            {
                $img_one = tag_photo($photo);
                $img['0'] = $img_one;
            }
        }
        return $img;
    }

}
