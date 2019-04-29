<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// 合作伙伴
class Partner extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helpers('uisite_helper');
        $this->load->model('article_model');

        $this->seo_id = 63;
        $this->banner_id = 61;
    }

    public function index($type = 1)
    {
        // seo
        $data['header'] = header_seoinfo($this->seo_id, 0);
        $data['banner'] = tag_photo(tag_single($this->banner_id, "photo"));

        $data['active_type'] = tag_coltypes($type);

        $data['partner_type'] = $this->db->order_by('sort_id', 'asc')->get_where('coltypes', array('cid' => 63))->result_array();

        $data['partner_list'] = $this->db->order_by('sort_id', 'desc')->get_where('gallery', array('ctype' => $type, 'cid' => 63, 'audit' => 1))->result_array();

        $this->load->view('partner/index', $data);
    }
}
