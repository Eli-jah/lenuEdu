<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// 课程分类
class Course extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helpers('uisite_helper');
        $this->load->model('article_model');

        $this->seo_id = 71;
        $this->banner_id = 72;
    }

    // 课程简介
    public function intro($type = 'etl')
    {
        $data = array();

        // seo
        $data['header'] = header_seoinfo($this->seo_id, 0);

        // local name
        $data['local_name'] = '课程分类';

        // introduction
        $data['introduction'] = $this->db->get_where('page', array('cid' => 72))->row_array();
        $data['introduction']['titles'] = explode('|', $data['introduction']['intro']);
        $data['introduction']['photos'] = $this->multiImg($data['introduction']['photo']);

        // footer
        $data['footer']['navigation'] = tag_single(29, 'content');
        $data['footer']['icp'] = tag_single(30, 'content');
        $data['footer']['mp'] = $this->db->get_where('page', array('cid' => 31))->row_array();
        $data['footer']['mp']['photo'] = tag_photo($data['footer']['mp']['photo'], 'url');
        $data['footer']['iso'] = tag_photo(tag_single(32, 'photo'));

        $this->load->view('course/index', $data);
    }
}
