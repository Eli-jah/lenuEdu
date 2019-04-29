<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// 关于我们
class About extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helpers('uisite_helper');
        $this->load->model('article_model');

        $this->banner_id = 36;
    }


    // 公司简介
    public function index()
    {
        $data['header'] = header_seoinfo(41, 0);
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));


        $data['office'] = $this->db->get_where('page', array('cid' => 50))->row_array();
        $data['office'] = $this->multiImg($data['office']['photo']);


        $data['accommodation'] = $this->db->get_where('page', array('cid' => 53))->row_array();
        $data['accommodation'] = $this->multiImg($data['accommodation']['photo']);

        $this->load->view('about/index', $data);

    }

    // 企业文化
    public function culture()
    {

        $data['header'] = header_seoinfo(46, 0);
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));

        $data['culture'] = $this->db->order_by('sort_id', 'desc')->get_where('infos', array('cid' => 46, 'audit' => 1))->result_array();

        $data['honor'] = $this->db->order_by('sort_id', 'desc')->get_where('honor', array('cid' => 47, 'audit' => 1))->result_array();


        $data['office'] = $this->db->get_where('page', array('cid' => 50))->row_array();
        $data['office'] = $this->multiImg($data['office']['photo']);


        $data['accommodation'] = $this->db->get_where('page', array('cid' => 53))->row_array();
        $data['accommodation'] = $this->multiImg($data['accommodation']['photo']);

        $this->load->view('about/culture', $data);

    }
}
