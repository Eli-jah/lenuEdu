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

        $this->seo_id = 71;
        $this->banner_id = 72;
    }

    public function index()
    {
        $this->company();
    }

    // 院校合作
    public function academy()
    {
        $data = array();

        // seo
        $data['header'] = header_seoinfo($this->seo_id, 0);

        // local name
        $data['local_name'] = '合作伙伴';

        // academies
        $data['academies'] = $this->db->order_by('sort_id', 'asc')->where_in('cid', array(22, 23, 24, 25, 26, 27))->get('page')->result_array();

        // footer
        $data['footer']['navigation'] = tag_single(29, 'content');
        $data['footer']['icp'] = tag_single(30, 'content');
        $data['footer']['mp'] = $this->db->get_where('page', array('cid' => 31))->row_array();
        $data['footer']['mp']['photo'] = tag_photo($data['footer']['mp']['photo'], 'url');
        $data['footer']['iso'] = tag_photo(tag_single(32, 'photo'));

        $this->load->view('about/us', $data);
    }

    // 企业合作
    public function company()
    {
        $data = array();

        // seo
        $data['header'] = header_seoinfo($this->seo_id, 0);

        // local name
        $data['local_name'] = '合作伙伴';

        // companies
        $data['companies'] = $this->db->order_by('sort_id', 'asc')->where_in('cid', array(22, 23, 24, 25, 26, 27))->get('page')->result_array();

        // footer
        $data['footer']['navigation'] = tag_single(29, 'content');
        $data['footer']['icp'] = tag_single(30, 'content');
        $data['footer']['mp'] = $this->db->get_where('page', array('cid' => 31))->row_array();
        $data['footer']['mp']['photo'] = tag_photo($data['footer']['mp']['photo'], 'url');
        $data['footer']['iso'] = tag_photo(tag_single(32, 'photo'));

        $this->load->view('about/us', $data);
    }
}
