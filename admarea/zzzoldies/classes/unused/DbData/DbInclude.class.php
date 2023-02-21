<?php
namespace DbData;

class DbInclude{
    function __construct() {
        include_once (Server_ROOT.ConfigFile);
    }

}
