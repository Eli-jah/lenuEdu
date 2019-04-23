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

        $this->seo_id = 71;
        $this->banner_id = 72;
    }

    public function index()
    {
        $this->us();
    }

    // 公司简介
    public function company()
    {
        $data = array();

        // seo
        $data['header'] = header_seoinfo($this->seo_id, 0);

        // local name
        $data['local_name'] = '关于我们';

        // introduction
        $data['introduction'] = $this->db->get_where('page', array('cid' => 72))->row_array();
        $data['introduction']['titles'] = explode('|', $data['introduction']['intro']);
        $data['introduction']['photos'] = $this->multiImg($data['introduction']['photo']);

        // environment
        $data['environment']['classroom'] = $this->db->get_where('page', array('cid' => 72))->row_array();
        $data['environment']['classroom']['photos'] = $this->multiImg($data['environment']['classroom']['photo']);
        $data['environment']['dormitory'] = $this->db->get_where('page', array('cid' => 72))->row_array();
        $data['environment']['dormitory']['photos'] = $this->multiImg($data['environment']['dormitory']['photo']);

        // footer
        $data['footer']['navigation'] = tag_single(29, 'content');
        $data['footer']['icp'] = tag_single(30, 'content');
        $data['footer']['mp'] = $this->db->get_where('page', array('cid' => 31))->row_array();
        $data['footer']['mp']['photo'] = tag_photo($data['footer']['mp']['photo'], 'url');
        $data['footer']['iso'] = tag_photo(tag_single(32, 'photo'));

        $this->load->view('about/us', $data);
    }

    // 企业文化
    public function culture()
    {
        $data = array();

        // seo
        $data['header'] = header_seoinfo($this->seo_id, 0);

        // local name
        $data['local_name'] = '关于我们';

        // events
        $data['events'] = $this->db->order_by('sort_id', 'asc')->where_in('cid', array(22, 23, 24, 25, 26, 27))->get('page')->result_array();

        // honours
        $data['honours'] = $this->db->order_by('sort_id', 'asc')->where_in('cid', array(22, 23, 24, 25, 26, 27))->get('page')->result_array();

        // contact us
        $data['contact_us'] = $this->db->get_where('page', array('cid' => 73))->row_array();
        $data['contact_us']['photo'] = tag_photo($data['contact_us']['photo'], 'url');

        // environment
        $data['environment']['classroom'] = $this->db->get_where('page', array('cid' => 72))->row_array();
        $data['environment']['classroom']['photos'] = $this->multiImg($data['environment']['classroom']['photo']);
        $data['environment']['dormitory'] = $this->db->get_where('page', array('cid' => 72))->row_array();
        $data['environment']['dormitory']['photos'] = $this->multiImg($data['environment']['dormitory']['photo']);

        // footer
        $data['footer']['navigation'] = tag_single(29, 'content');
        $data['footer']['icp'] = tag_single(30, 'content');
        $data['footer']['mp'] = $this->db->get_where('page', array('cid' => 31))->row_array();
        $data['footer']['mp']['photo'] = tag_photo($data['footer']['mp']['photo'], 'url');
        $data['footer']['iso'] = tag_photo(tag_single(32, 'photo'));

        $this->load->view('about/us', $data);
    }
}
