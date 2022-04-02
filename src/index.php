<?php

require_once "./conf.php";
include "./functions.php";

if (loged()) {
    include ROOT."./dashboard.php";
} else {
    include  ROOT."/log_reg/login.php";
}
