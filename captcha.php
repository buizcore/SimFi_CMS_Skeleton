<?php
include 'conf/env_router.php';
$conf = Conf::getActive();

include PATH_ROOT.Conf::getActive()->fw_root.'/vendor/securimage/securimage.php';
$securimage = new Securimage();
$securimage->image_height = 40; // height in pixels of the image
$securimage->image_width = 90; // a good formula for image size based on the height
$securimage->num_lines = 2;
$securimage->perturbation = .45;
$securimage->case_sensitive = false;
$securimage->code_length = 4;
$securimage->text_color = new Securimage_Color("#1E1E1E");
$securimage->line_color = new Securimage_Color("#1E1E1E");
$securimage->show();




