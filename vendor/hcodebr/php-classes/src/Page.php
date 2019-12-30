<?php 

namespace Hcode;

use Rain\Tpl;

class Page{

    private $tpl;
    private $options = [];
    private $defaults = [
        "data"=>[]
    ];

    public function __construct($opts = array()){

        $this->options = array_merge($this->defaults, $opts);
        // config
        $config = array(
            "tpl_dir"       => $_SERVE["DOCUMENT_ROOT"]."/views/",
            "cache_dir"     => $_SERVE["DOCUMENT_ROOT"]."/views-cache/",
            "debug"         => false // set to false to improve the speed
        );

        Tpl::configure( $config );

        $this->$tpl = new Tpl;

        foreach ($this->options["data"] as $key => $value) {
            $this->tpl->assign($key, $value);
        }

        $this->draw("header");
    }

    public function __destruct(){

    }

}

?>