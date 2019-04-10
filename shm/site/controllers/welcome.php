<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helpers('uisite_helper');

        $this->seo_id = 1;
        $this->banner_id = 2;
    }

    // 首页
    public function index()
    {
        $data = array();

        // seo
        $data['header'] = header_seoinfo(0, 0);

        // local name
        $data['local_name'] = '首页';

        // banners
        $data['banners'] = $this->db->order_by('sort_id', 'desc')->get_where('banners', array('audit' => 1, 'cid' => $this->banner_id))->result_array();
        foreach ($data['banners'] as $key => $banner) {
            list($data['banners'][$key]['title'], $data['banners'][$key]['sub_title']) = explode('|', $banner['title']);
            $data['banners'][$key]['photo'] = tag_photo($banner['photo'], 'url');
        }

        // company introduction
        $data['company']['title'] = $this->db->get_where('page', array('cid' => 5))->row_array();
        $data['company']['banners'] = $this->db->order_by('sort_id', 'asc')->where_in('cid', array(6, 7, 8, 9))->get('page')->result_array();
        foreach ($data['company']['banners'] as $key => $banner) {
            $data['company']['banners'][$key]['photo'] = tag_photo($banner['photo'], 'url');
        }

        // hot courses
        $data['courses']['title'] = $this->db->get_where('page', array('cid' => 11))->row_array();
        $data['courses']['content'] = tag_single(12, 'content');
        $data['courses']['etl'] = $this->db->get_where('page', array('cid' => 13))->row_array();
        $data['courses']['etl']['photo'] = tag_photo($data['courses']['etl']['photo'], 'url');

        // partners
        $data['partners']['title'] = $this->db->get_where('page', array('cid' => 15))->row_array();
        $data['partners']['banners'] = $this->db->order_by('sort_id', 'asc')->where_in('cid', array(16, 17, 18, 19))->get('page')->result_array();
        foreach ($data['partners']['banners'] as $key => $banner) {
            $data['partners']['banners'][$key]['photo'] = tag_photo($banner['photo'], 'url');
        }

        // news
        $data['news']['title'] = $this->db->get_where('page', array('cid' => 21))->row_array();
        $data['news']['banners'] = $this->db->order_by('sort_id', 'asc')->where_in('cid', array(22, 23, 24, 25, 26, 27))->get('page')->result_array();
        foreach ($data['news']['banners'] as $key => $banner) {
            $data['news']['banners'][$key]['photo'] = tag_photo($banner['photo'], 'url');
        }

        // achievements
        $data['achievements']['title'] = $this->db->get_where('page', array('cid' => 21))->row_array();
        $data['achievements']['banners'] = $this->db->order_by('sort_id', 'asc')->where_in('cid', array(22, 23, 24, 25, 26, 27))->get('page')->result_array();
        foreach ($data['achievements']['banners'] as $key => $banner) {
            $data['achievements']['banners'][$key]['photo'] = tag_photo($banner['photo'], 'url');
        }

        // footer
        $data['footer']['navigation'] = tag_single(29, 'content');
        $data['footer']['icp'] = tag_single(30, 'content');
        $data['footer']['mp'] = $this->db->get_where('page', array('cid' => 31))->row_array();
        $data['footer']['mp']['photo'] = tag_photo($data['footer']['mp']['photo'], 'url');
        $data['footer']['iso'] = tag_photo(tag_single(32, 'photo'));

        $this->load->view('welcome', $data);
    }
}
