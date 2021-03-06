<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY Controller
 */
class MY_Controller extends CI_Controller
{
    protected $seo_id;
    protected $banner_id;

    public function __construct()
    {
        parent::__construct();

        // 默认加载同名数据模型
        // 在前端作用不大，主要还是自己手动加载model
        if (file_exists(APPPATH . 'models/' . $this->router->class . '_model.php') or file_exists(ROOT . 'models/' . $this->router->class . '_model.php')) {
            $this->load->model($this->router->class . '_model', 'model');
        }
        $this->load->model('columns_model', 'mcol');
        $this->load->model('configs_model', 'mcfg');
    }

    // 对默认控制器无方法时的模板查询 for index
    public function _remap($method, $params = array())
    {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        } else {
            return call_user_func_array(array($this, "router"), $params);
        }
    }

    // 默认处理入口
    protected function router()
    {
        $this->load->library('pagination');

        $vdata = array();
        $vdata['CI'] =& $this;
        $vdata['orders'] = array();
        $vdata['where'] = array();
        // $vdata['site'] = $this->mcfg->get_cate('site');
        // $vdata['cols'] = $this->mcol->get_cols(0);

        // 标题后缀
        $this->config->set_item('title_suffix', get_config_site('site', 'title_suffix'));

        // 获取所有参数
        $uri = array_values($this->uri->segment_array());
        $uri_count = $this->uri->total_segments();

        // 检测栏目存在与否
        // 存在则检测栏目设定的模板
        // 不存在则单纯加载存在模板否则404

        // 数字之后皆为参数，所以数字不可以作为栏目名称
        // 参数容器
        $reg = array();
        // 数字的位置
        $num_index = 0;
        foreach ($uri as $i => $v) {
            if (is_numeric($v)) {
                $num_index = $i;
                break;
            }
        }
        // 缝隙参数和真实地址
        if ($num_index > 0) {
            $reg = array_slice($uri, $num_index, $uri_count);
            $uri = array_slice($uri, 0, $num_index);
        }

        if ($uri_count) {
            // 假定文件
            $view_file = implode('/', $uri) . EXT;
        } else {
            // 针对首页
            $view_file = "welcome.php";
            $uri[0] = '';
        }

        $vdata['uri'] = $uri;
        $vdata['reg'] = $reg;
        $vdata['url_base'] = implode('/', $uri);

        $breadcrumb = array();

        // 对最后个参数进行 栏目_动作 分析
        if (strpos(end($uri), '_')) {
            $tmp = explode('_', end($uri));
            // 为ajax和json去除缓存
            if (end($tmp) == "ajax" or end($tmp) == "json") {
                $this->cache = false;
                // array_pop($uri);
                // array_push($uri,$tmp[0]);
            }
            unset($tmp);
        }

        // info 页面开关
        $info = false;

        foreach ($uri as $i => $u) {
            if ($i == 0) {
                $pid = 0;
            } else {
                if (isset($c)) {
                    $pid = $c['id'];
                } else {
                    break;
                }
            }
            $c = $this->mcol->get_col_identify($u, $pid);
            if (!$c) {
                $info = true;
                // $breadcrumb = false;
                break;
            }
            array_push($breadcrumb, $c);
        }

        $vdata['header'] = array(
            'title' => get_config_site('site', 'title_seo'),
            // 'title_seo'=> get_config_site('site','title_seo'),
            'tags' => get_config_site('site', 'tags'),
            'intro' => get_config_site('site', 'intro'),
            'copyright' => get_config_site('site', 'copyright'),
            'email' => get_config_site('site', 'email'),
            'icp' => get_config_site('site', 'icp'),
        );

        // 关于面包削,存在是即栏目存在，自动读取栏目的seo标题
        if ($breadcrumb) {
            dump($breadcrumb, '[route][breadcrumb]路由模式');
            $vdata['breadcrumb'] = $breadcrumb;
            $last = end($breadcrumb);

            $last = $this->mcol->get_one(array('id' => $last['id']));

            $vdata['header']['title'] = $last['title_seo'] ? $last['title_seo'] : $last['title'];
            if ($last['tags']) {
                $vdata['header']['tags'] = $last['tags'];
            }
            if ($last['intro']) {
                $vdata['header']['intro'] = $last['intro'];
            }
            dump($vdata['header'], '[route][header]SEO信息:');
            // 设定模板存在时
            if ($info) {
                if (!file_exists(VIEWS . $view_file) and $last['temp_show'] != '' and file_exists(VIEWS . $last['temp_show'])) {
                    $view_file = $last['temp_show'];
                    dump($view_file, '[route][temp_show]模版');
                }
            } else {
                if ($last['temp_index'] != '' and file_exists(VIEWS . $last['temp_index'])) {
                    $view_file = $last['temp_index'];
                    dump($view_file, '[route][temp_index]模版');
                }
            }

            // 输出 $c; $where
            $vdata['c'] = $last['id'];
            dump($vdata['c'], '[route][c]寻找的CID:');
            // $vdata['where'] = array_merge($vdata['where'],array('cid' => $last['id'],'audit'=>1));
        } else {
            dump($view_file, '[route]模版模式模版');
        }

        // 路由获取
        dump($vdata['uri'], '[route][uri]默认路由:');
        dump($vdata['reg'], '[route][reg]参数：');
        dump($vdata['url_base'], '[route][url_base]基本路径:');

        if (file_exists(VIEWS . $view_file)) {
            // CI, reg , header, base_url
            $this->load->view($view_file, $vdata);
        } else {
            dump($view_file, '[route][view_file]没有找到模版', 'error');
            show_404();
        }

    }

    // 验证码
    public function captcha_verify($str = '')
    {
        $this->load->library('captcha');
        if ($this->captchas_verify = $this->captcha->verify($str)) {
            return true;
        } else {
            $this->form_validation->set_message('captcha_verify', '验证码 输入错误.');
            return false;
        }
    }

    // 验证码
    public function hashf_verify($str = '')
    {
        if (!$this->session->flashdata('f_hashf')) {
            $this->form_validation->set_message('hashf_verify', '表单已经失效');
            return false;
        }

        if ($str == $this->session->flashdata('f_hashf')) {
            return true;
        } else {
            $this->form_validation->set_message('hashf_verify', '表单已经失效');
            return false;
        }
    }

    protected function multiImg($photo)
    {
        if (empty($photo)) {
            $img = '';
        } else {
            $img = array();
            if (strstr($photo, ',')) {
                $img_id = explode(",", $photo);
                foreach ($img_id as $k => $v) {
                    $img_one = tag_photo($v);
                    $img[$k] = $img_one;
                }
            } else {
                $img_one = tag_photo($photo);
                $img['0'] = $img_one;
            }
        }
        return $img;
    }

    public function download($id = '')
    {
        $p_url = $this->db->get_where('upload', array('id' => $id))->row_array();
        if (count($p_url) < 1) {
            exit();
        } else {
            $url = $p_url['url'];
            $dir = UPLOAD_PATH . $url; //获取
            $PATH = dirname(dirname(dirname(dirname($dir)))) . '/';
            if ($PATH != UPLOAD_PATH) {
                echo 'forbidden';
                exit();
            }
            $file = fopen($dir, "r"); // 打开文件
            Header("Content-type: application/octet-stream");
            Header("Accept-Ranges: bytes");
            Header("Accept-Length: " . filesize($dir));
            Header("Content-Disposition: attachment; filename=" . $p_url['origin_name']);
            ob_clean();
            flush();
            echo fread($file, filesize($dir));
            fclose($file);
            exit;
        }
    }

    // get column types by column id
    protected function getTypesByColumnId($cid = false)
    {
        $types = array();
        if (!$cid) {
            return $types;
        }
        $types = $this->db->get_where('coltypes', array('cid' => $cid), 1)->order_by('sort_id', 'asc')->row_array();
        return $types;
    }

    // get articles by column id (and column type id if possible)
    protected function getArticlesByColumnId($cid = false, $type_id = false)
    {
        $where = array();
        if (!$cid && !$type_id) {
            return $where;
        }
        if ($cid) {
            $where['cid'] = $cid;
        }
        if ($type_id) {
            $where['type_id'] = $type_id;
        }
        $articles = $this->db->get_where('article', $where)->order_by('sort_id', 'asc')->row_array();
        return $articles;
    }

    // get one article photo by column id
    protected function getPhotoByArticleId($id = false)
    {
        $photo_url = '';
        if (!$id) {
            return $photo_url;
        }
        $article = $this->db->get_where('article', array('id' => $id), 1)->row();
        if (!empty($article) && $article->photo) {
            $photo = $article->photo;
            $comma_position = strpos($photo, ',');
            if ($comma_position === false) {
                $photo_id = $photo;
            } else {
                $photo_id = substr($photo, 0, $comma_position + 1);
            }
            $photo_url = $this->getPhotoByUploadId($photo_id);
        }
        return $photo_url;
    }

    // get article photos by article id
    protected function getPhotosByArticleId($id = false)
    {
        $photos = array();
        if (!$id) {
            return $photos;
        }
        $article = $this->db->get_where('article', array('id' => $id), 1)->row();
        if (!empty($article)) {
            $photo = $article->photo;
            $photos = $this->getPhotosByUploadIds($photo);
        }
        return $photos;
    }

    // get column chinese title by column id
    protected function getTitleByColumnId($cid = false)
    {
        $title = '';
        if (!$cid) {
            return $title;
        }
        $page = $this->db->get_where('page', array('cid' => $cid), 1)->row();
        if (!empty($page)) {
            $title = $page->title;
        }
        return $title;
    }

    // get column bilingual titles by column id
    protected function getTitlesByColumnId($cid = false)
    {
        $titles = array();
        if (!$cid) {
            return $titles;
        }
        $page = $this->db->get_where('page', array('cid' => $cid), 1)->row();
        if (!empty($page)) {
            $titles['title'] = $page->title;
            $titles['title_en'] = $page->title_en;
        }
        return $titles;
    }

    // get column pure text by column id
    protected function getTextByColumnId($cid = false)
    {
        $text = '';
        if (!$cid) {
            return $text;
        }
        $page = $this->db->get_where('page', array('cid' => $cid), 1)->row();
        if (!empty($page)) {
            $text = $page->text;
        }
        return $text;
    }

    // get column html content by column id
    protected function getContentByColumnId($cid = false)
    {
        $content = '';
        if (!$cid) {
            return $content;
        }
        $page = $this->db->get_where('page', array('cid' => $cid), 1)->row();
        if (!empty($page)) {
            $content = $page->content;
        }
        return $content;
    }

    // get column thumb by column id
    protected function getThumbByColumnId($cid = false)
    {
        $thumb = '';
        if (!$cid) {
            return $thumb;
        }
        $page = $this->db->get_where('page', array('cid' => $cid), 1)->row();
        if (!empty($page)) {
            $thumb = $page->thumb;
        }
        return $thumb;
    }

    // get one column photo by column id
    protected function getPhotoByColumnId($cid = false)
    {
        $photo_url = '';
        if (!$cid) {
            return $photo_url;
        }
        $page = $this->db->get_where('page', array('cid' => $cid), 1)->row();
        if (!empty($page) && $page->photo) {
            $photo = $page->photo;
            $comma_position = strpos($photo, ',');
            if ($comma_position === false) {
                $photo_id = $photo;
            } else {
                $photo_id = substr($photo, 0, $comma_position + 1);
            }
            $photo_url = $this->getPhotoByUploadId($photo_id);
        }
        return $photo_url;
    }

    // get multiple column photos by column id
    protected function getPhotosByColumnId($cid = false)
    {
        $photos = array();
        if (!$cid) {
            return $photos;
        }
        $page = $this->db->get_where('page', array('cid' => $cid), 1)->row();
        if (!empty($page) && $page->photo) {
            $photo = $page->photo;
            $photos = $this->getPhotosByUploadIds($photo);
        }
        return $photos;
    }

    // get photo by upload id
    protected function getPhotoByUploadId($id = false)
    {
        $photo_url = '';
        if (!$id) {
            return $photo_url;
        }
        $upload = $this->db->get_where('upload', array('id' => $id), 1)->row();
        if (!empty($upload)) {
            $photo_url = UPLOAD_URL . $upload->url;
        }
        return $photo_url;
    }

    // get photos by upload ids
    protected function getPhotosByUploadIds($ids = false)
    {
        $photos = array();
        if (!$ids) {
            return $photos;
        }
        $photo_ids = explode($ids, ',');
        $photos = $this->db->get('upload')->where_in('id', $photo_ids)->row_array();
        foreach ($photos as $key => $photo) {
            $photos[$key]['photo_url'] = UPLOAD_URL . $photo['url'];
        }
        return $photos;
    }
}
