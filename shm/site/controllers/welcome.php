<?php

if (!defined('BASEPATH')){
    exit('No direct script access allowed');
}

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
        $data['banners'] = $this->db->order_by('sort_id', 'asc')->get_where('banners', array('audit' => 1, 'cid' => $this->banner_id))->result_array();
        foreach ($data['banners'] as $key => $banner) {
            $data['banners'][$key]['photo_url'] = $this->getPhotoByUploadId($banner['photo']);
        }

        // company introduction
        $data['company']['titles'] = $this->getTitlesByColumnId(4);
        $data['company']['intro'] = $this->getContentByColumnId(5);
        $data['company']['bg_image'] = $this->getPhotoByColumnId(6);

        // hot courses
        $data['courses']['titles'] = $this->getTitlesByColumnId(8);
        $data['courses']['intro'] = $this->getContentByColumnId(9);
        $data['courses']['display_image'] = $this->getPhotoByColumnId(10);

        // partners
        $data['partners']['titles'] = $this->getTitlesByColumnId(12);
        $data['partners']['intro'] = $this->getContentByColumnId(13);
        $data['partners']['bg_image'] = $this->getPhotoByColumnId(14);

        // news
        $data['news']['titles'] = $this->getTitlesByColumnId(16);
        $data['news']['bg_image'] = $this->getPhotoByColumnId(17);

        // achievement
        $data['achievement']['titles'] = $this->getTitlesByColumnId(19);
        $data['achievement']['intro'] = $this->getContentByColumnId(20);
        $data['achievement']['bg_image'] = $this->getPhotoByColumnId(21);

        $this->load->view('welcome', $data);
    }
}
