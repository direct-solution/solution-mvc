<?php

namespace SolutionMvc\Portal\Controller;

use SolutionMvc\Library\Helper,
    SolutionMvc\Core\Controller,
    SolutionMvc\Core\Security,
    SolutionMvc\Portal\Model\Upload;

class UploadController Extends Controller {

    var $helper;
    protected $security;
    protected $upload;
    protected $token;

    public function __construct() {
        parent::__construct();
        $this->helper = new Helper();
        $this->security = new Security();
        $this->upload = new Upload();
        $this->token =  $this->getToken();
    }

    public function UploadAuditImageAction($id) {
        
        $client = $this->token->user->client;
        
        $location = (string)"images/" . ($client == 0?"000":$client) . "/Audits/".$id;
        
        return $this->upload->image(
//                        "/var/www/html/portal.solutionhost.co.uk/web/Filestore", "images/" . $this->token->user->client . "/Audits/" . $id . "/Assets/", $_FILES
//                        "/var/www/html/Filestore/", "images/" . $this->token->user->client . "/Audits/" . $_POST['audit_id'] . "/Assets/" . $_POST['asset_id'], $_FILES
                        "/home/git/htmlp/html/doug/portal.solutionhost.co.uk/web/apps/Audit/Filestore/", $location, $_FILES
        );
    }

    public function UploadAssetImageAction() {
        $this->token = $this->security->DecodeSecurityToken($_POST['token']);
        return $this->upload->image(
//                        "/home/git/htmlp/html/doug/portal.solutionhost.co.uk/web/apps/Audit/Filestore/", "images/" . $this->token->user->client . "/Assets", $_FILES
                        "/var/www/html/portal.solutionhost.co.uk/web/Filestore/", "images/" . $this->token->user->client . "/Assets", $_FILES
        );
    }

}
