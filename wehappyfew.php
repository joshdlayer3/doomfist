<?php
defined('_JEXEC') or die ('Restricted access');
$app	= JFactory::getApplication();
$doc = JFactory::getDocument();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="google-site-verification" content="oOVP_B9CEpkgPwvqtTgbYpM_ZIjNyYg9dAk23XuF098" />
    <style>
        @font-face
        {
            font-family:'renner_light';
            font-weight:400;
            font-style:Italic;
            /* src:url('../../juliacourt_test_t44a/Fonts/renner_light/renner-light.otf'); */
            /* src:url('http://www.juliacourt.co.uk/templates/juliacourt_test_t44a/Fonts/renner_light/renner-light.otf'); */
            src: url('http://www.juliacourt.co.uk/templates/juliacourt_test_t44a/Fonts/renner_light/renner-light.otf') format('truetype');
        }
    </style>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php global $template_path;
    $template_path = JURI::base() . 'templates/' . $app->getTemplate(); ?>
    <?php JLoader::import( 'joomla.version' );
    $version = new JVersion();
    if (version_compare( $version->RELEASE, "2.5", "<=")) {
        if(JFactory::getApplication()->get('jquery') !== true) {
            $document = JFactory::getDocument();
            $headData = $this->getHeadData();
            reset($headData['scripts']);
            $newHeadData = $headData['scripts'];
            $jquery = array(JURI::base() .'/templates/' . $this->template . '/js/jquery.js' => array('mime' => 'text/javascript', 'defer' => FALSE, 'async' => FALSE));
            $newHeadData = $jquery + $newHeadData;
            $headData['scripts'] = $newHeadData;
            $this->setHeadData($headData);
            $doc->addScript(JURI::base() .'/templates/' . $this->template . '/js/jui/bootstrap.min.js', 'text/javascript');
        }
    } else {
        JHtml::_('jquery.framework');
        JHtml::_('bootstrap.framework');
    } ?>
    <?php
    if (version_compare( $version->RELEASE, "2.5", "<")) {
        JHtml::_('jquery.ui');
    }
    $doc = JFactory::getDocument();
    $doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css');
    $doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
    $style = $this->params->get('custom_css');
    if (($style || $style == Null) && !empty($style)) {
        $doc->addStyleDeclaration($style);
    }
    ?>
    <?php
    $doc->addScript($template_path.'/js/Customjs.js');
    ?>
    <?php $str = JURI::base(); ?>
    <!--
<style type="text/css">
@media only screen and (min-width : 1025px) {
<?php $bg = $this->params->get('header_background');
    if(!empty($bg)){ ?>
header#ttr_header{
background: url('<?php echo $str.$this->params->get('header_background');?>') no-repeat
<?php
        $stretch = "";
        $stretch_option = $this->params->get('header_stretch');
        if($stretch_option == "Uniform"){
            $stretch = "/ contain";
        }else if($stretch_option == "Uniform to fill"){
            $stretch = "/ cover";
        }
        else {
            $stretch = " / 100% 100% ";
        }
        echo $this->params->get('header_horizontal_alignment') ." " . $this->params->get('header_vertical_alignment'). $stretch ."!important; }";
    } ?>
.ttr_title_style, header .ttr_title_style a, header .ttr_title_style a:link, header .ttr_title_style a:visited, header .ttr_title_style a:hover {
font-size:<?php echo $this->params->get('Site_Title_FontSize'); ?>px;
color:<?php echo $this->params->get('site_title_color');?>;
}
.ttr_slogan_style {
font-size:<?php echo $this->params->get('Site_Slogan_FontSize'); ?>px;
color:<?php echo $this->params->get('site_slogan_color');?>;
}
h1.ttr_block_heading, h2.ttr_block_heading, h3.ttr_block_heading, h4.ttr_block_heading, h5.ttr_block_heading, h6.ttr_block_heading, p.ttr_block_heading {
font-size:<?php echo $this->params->get('block_heading_font_size'); ?>px;
color:<?php echo $this->params->get('block_heading_color');?>;
}
h1.ttr_verticalmenu_heading, h2.ttr_verticalmenu_heading, h3.ttr_verticalmenu_heading, h4.ttr_verticalmenu_heading, h5.ttr_verticalmenu_heading, h6.ttr_verticalmenu_heading, p.ttr_verticalmenu_heading {
font-size:<?php echo $this->params->get('sidebar_menu_font_size'); ?>px;
color:<?php echo $this->params->get('sidebar_menu_heading_color');?>;
}
#ttr_copyright a {
font-size:<?php echo $this->params->get('Copyright_FontSize'); ?>px;
color:<?php echo $this->params->get('footer_copyright_color');?>;
}
#ttr_footer_designed_by_links{
font-size:<?php echo $this->params->get('Designed_By_FontSize'); ?>px;
color:<?php echo $this->params->get('footer_designed_by_color');?>;
}
#ttr_footer_designed_by_links a, #ttr_footer_designed_by_links a:link, #ttr_footer_designed_by_links a:visited, #ttr_footer_designed_by_links a:hover {
font-size:<?php echo $this->params->get('Designed_By_Link_FontSize'); ?>px;
color:<?php echo $this->params->get('footer_designed_by_link_color');?>;
}
}
</style>
-->
    <?php
    $doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
    ?>
    <!--[if lte IE 8]>
    <link rel="stylesheet"  href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/menuie.css" type="text/css"/>
    <link rel="stylesheet"  href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/vmenuie.css" type="text/css"/>
    <![endif]-->
    <!--[if IE 7]>
    <style type="text/css" media="screen">
        #ttr_vmenu_items  li.ttr_vmenu_items_parent {display:inline;}
    </style>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo $template_path?>/js/html5shiv.js">
    </script>
    <script type="text/javascript" src="<?php echo $template_path?>/js/respond.min.js">
    </script>
    <![endif]-->
</head>
<body>
<div id="ttr_page" class="container">
    <div class="ttr_banner_menu">
        <?php
        if(  $this->countModules('MAModulePosition00')||  $this->countModules('MAModulePosition01')||  $this->countModules('MAModulePosition02')||  $this->countModules('MAModulePosition03')):
            ?>
            <div class="ttr_banner_menu_inner_above0">
                <?php
                $showcolumn= $this->countModules('MAModulePosition00');
                ?>
                <?php if($showcolumn): ?>
                    <div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                        <div class="menuabovecolumn1">
                            <jdoc:include type="modules" name="MAModulePosition00" style="<?php if(($this->params->get('mamoduleposition00') == 'block') || ($this->params->get('mamoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                        &nbsp;
                    </div>
                <?php endif; ?>
                <div class="clearfix visible-xs-block">
                </div>
                <?php
                $showcolumn= $this->countModules('MAModulePosition01');
                ?>
                <?php if($showcolumn): ?>
                    <div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                        <div class="menuabovecolumn2">
                            <jdoc:include type="modules" name="MAModulePosition01" style="<?php if(($this->params->get('mamoduleposition01') == 'block') || ($this->params->get('mamoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                        &nbsp;
                    </div>
                <?php endif; ?>
                <div class="clearfix visible-sm-block visible-md-block visible-xs-block">
                </div>
                <?php
                $showcolumn= $this->countModules('MAModulePosition02');
                ?>
                <?php if($showcolumn): ?>
                    <div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                        <div class="menuabovecolumn3">
                            <jdoc:include type="modules" name="MAModulePosition02" style="<?php if(($this->params->get('mamoduleposition02') == 'block') || ($this->params->get('mamoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                        &nbsp;
                    </div>
                <?php endif; ?>
                <div class="clearfix visible-xs-block">
                </div>
                <?php
                $showcolumn= $this->countModules('MAModulePosition03');
                ?>
                <?php if($showcolumn): ?>
                    <div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                        <div class="menuabovecolumn4">
                            <jdoc:include type="modules" name="MAModulePosition03" style="<?php if(($this->params->get('mamoduleposition03') == 'block') || ($this->params->get('mamoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                        &nbsp;
                    </div>
                <?php endif; ?>
                <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
                </div>
            </div>
            <div class="clearfix"></div>
        <?php endif; ?>
    </div>
    <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
    <?php if ($this->countModules('Menu')):?>
        <nav id="ttr_menu" class="navbar-default navbar">
            <div id="ttr_menu_inner_in">
                <div class="menuforeground">
                </div>
                <div class="ttr_menushape1">
                    <div class="html_content"><p><span style="font-family:'Proxima Nova Condensed','Arial';font-style:italic;font-weight:250;font-size:3.571em;color:rgba(51,51,51,1);">Julia Court</span></p></div>
                </div>
                <div id="navigationmenu">
                    <div class="navbar-header">
                        <button id="nav-expander" data-target=".nav-menu" data-toggle="collapse" class="navbar-toggle" type="button">
<span class="sr-only">
</span>
                            <span class="icon-bar">
</span>
                            <span class="icon-bar">
</span>
                            <span class="icon-bar">
</span>
                        </button>
                        <a href="http://www.juliacourt.co.uk/" target="_self">
                            <img src="<?php echo (JURI::base() . 'templates/' . $app->getTemplate().'/menulogo.png')?>" class="ttr_menu_logo" alt="Menulogo" />
                        </a>
                    </div>
                    <div class="menu-center collapse navbar-collapse nav-menu">
                        <jdoc:include type="modules" name="Menu" style="none"/>
                    </div>
                </div>
            </div>
        </nav>
    <?php endif; ?>
    <div class="ttr_banner_menu">
        <?php
        if(  $this->countModules('MBModulePosition00')||  $this->countModules('MBModulePosition01')||  $this->countModules('MBModulePosition02')||  $this->countModules('MBModulePosition03')):
            ?>
            <div class="ttr_banner_menu_inner_below0">
                <?php
                $showcolumn= $this->countModules('MBModulePosition00');
                ?>
                <?php if($showcolumn): ?>
                    <div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                        <div class="menubelowcolumn1">
                            <jdoc:include type="modules" name="MBModulePosition00" style="<?php if(($this->params->get('mbmoduleposition00') == 'block') || ($this->params->get('mbmoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                        &nbsp;
                    </div>
                <?php endif; ?>
                <div class="clearfix visible-xs-block">
                </div>
                <?php
                $showcolumn= $this->countModules('MBModulePosition01');
                ?>
                <?php if($showcolumn): ?>
                    <div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                        <div class="menubelowcolumn2">
                            <jdoc:include type="modules" name="MBModulePosition01" style="<?php if(($this->params->get('mbmoduleposition01') == 'block') || ($this->params->get('mbmoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                        &nbsp;
                    </div>
                <?php endif; ?>
                <div class="clearfix visible-sm-block visible-md-block visible-xs-block">
                </div>
                <?php
                $showcolumn= $this->countModules('MBModulePosition02');
                ?>
                <?php if($showcolumn): ?>
                    <div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                        <div class="menubelowcolumn3">
                            <jdoc:include type="modules" name="MBModulePosition02" style="<?php if(($this->params->get('mbmoduleposition02') == 'block') || ($this->params->get('mbmoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                        &nbsp;
                    </div>
                <?php endif; ?>
                <div class="clearfix visible-xs-block">
                </div>
                <?php
                $showcolumn= $this->countModules('MBModulePosition03');
                ?>
                <?php if($showcolumn): ?>
                    <div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                        <div class="menubelowcolumn4">
                            <jdoc:include type="modules" name="MBModulePosition03" style="<?php if(($this->params->get('mbmoduleposition03') == 'block') || ($this->params->get('mbmoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                        &nbsp;
                    </div>
                <?php endif; ?>
                <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
                </div>
            </div>
            <div class="clearfix"></div>
        <?php endif; ?>
    </div>
    <div id="ttr_content_and_sidebar_container">
        <div id="ttr_content">
            <div id="ttr_content_margin">
                <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                <?php
                if(  $this->countModules('Top Column 1')||  $this->countModules('Top Column 2')||  $this->countModules('Top Column 3')||  $this->countModules('Top Column 4')):
                    ?>
                    <div class="contenttopcolumn0">
                        <?php
                        $showcolumn= $this->countModules('Top Column 1');
                        ?>
                        <?php if($showcolumn): ?>
                            <div class="cell1 col-lg-4 col-md-4 col-sm-4  col-xs-12">
                                <div class="topcolumn1">
                                    <jdoc:include type="modules" name="Top Column 1" style="<?php if(($this->params->get('top column 1') == 'block') || ($this->params->get('top column 1') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="cell1 col-lg-4 col-md-4 col-sm-4  col-xs-12"  style="background-color:transparent;">
                                Test Test gggg sorry ttttt
                                &nbsp;
                            </div>
                        <?php endif; ?>
                        <div class="clearfix visible-xs-block">
                        </div>
                        <?php
                        $showcolumn= $this->countModules('Top Column 2');
                        ?>
                        <?php if($showcolumn): ?>
                            <div class="cell2 col-lg-8 col-md-8 col-sm-8  col-xs-12">
                                <div class="topcolumn2">
                                    <jdoc:include type="modules" name="Top Column 2" style="<?php if(($this->params->get('top column 2') == 'block') || ($this->params->get('top column 2') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="cell2 col-lg-8 col-md-8 col-sm-8  col-xs-12"  style="background-color:transparent;">
                                &nbsp;
                            </div>
                        <?php endif; ?>
                        <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
                        </div>
                        <?php
                        $showcolumn= $this->countModules('Top Column 3');
                        ?>
                        <?php if($showcolumn): ?>
                            <div class="cell3 col-lg-6 col-md-12 col-sm-12  col-xs-12">
                                <div class="topcolumn3">
                                    <jdoc:include type="modules" name="Top Column 3" style="<?php if(($this->params->get('top column 3') == 'block') || ($this->params->get('top column 3') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="cell3 col-lg-6 col-md-12 col-sm-12  col-xs-12"  style="background-color:transparent;">
                                &nbsp;
                            </div>
                        <?php endif; ?>
                        <div class="clearfix visible-sm-block visible-md-block visible-xs-block">
                        </div>
                        <?php
                        $showcolumn= $this->countModules('Top Column 4');
                        ?>
                        <?php if($showcolumn): ?>
                            <div class="cell4 col-lg-6 col-md-12 col-sm-12  col-xs-12">
                                <div class="topcolumn4">
                                    <jdoc:include type="modules" name="Top Column 4" style="<?php if(($this->params->get('top column 4') == 'block') || ($this->params->get('top column 4') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="cell4 col-lg-6 col-md-12 col-sm-12  col-xs-12"  style="background-color:transparent;">
                                &nbsp;
                            </div>
                        <?php endif; ?>
                        <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php endif; ?>
                <jdoc:include type="message" style="width:100%;"/>
                <jdoc:include type="component" />
                <?php
                if(  $this->countModules('Bottom Column 1')||  $this->countModules('Bottom Column 2')||  $this->countModules('Bottom Column 3')||  $this->countModules('Bottom Column 4')):
                    ?>
                    <div class="contentbottomcolumn0">
                        <?php
                        $showcolumn= $this->countModules('Bottom Column 1');
                        ?>
                        <?php if($showcolumn): ?>
                            <div class="cell1 col-lg-6 col-md-12 col-sm-12  col-xs-12">
                                <div class="bottomcolumn1">
                                    <jdoc:include type="modules" name="Bottom Column 1" style="<?php if(($this->params->get('bottom column 1') == 'block') || ($this->params->get('bottom column 1') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="cell1 col-lg-6 col-md-12 col-sm-12  col-xs-12"  style="background-color:transparent;">
                                &nbsp;
                            </div>
                        <?php endif; ?>
                        <div class="clearfix visible-sm-block visible-md-block visible-xs-block">
                        </div>
                        <?php
                        $showcolumn= $this->countModules('Bottom Column 2');
                        ?>
                        <?php if($showcolumn): ?>
                            <div class="cell2 col-lg-6 col-md-12 col-sm-12  col-xs-12">
                                <div class="bottomcolumn2">
                                    <jdoc:include type="modules" name="Bottom Column 2" style="<?php if(($this->params->get('bottom column 2') == 'block') || ($this->params->get('bottom column 2') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="cell2 col-lg-6 col-md-12 col-sm-12  col-xs-12"  style="background-color:transparent;">
                                &nbsp;
                            </div>
                        <?php endif; ?>
                        <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
                        </div>
                        <?php
                        $showcolumn= $this->countModules('Bottom Column 3');
                        ?>
                        <?php if($showcolumn): ?>
                            <div class="cell3 col-lg-6 col-md-12 col-sm-12  col-xs-12">
                                <div class="bottomcolumn3">
                                    <jdoc:include type="modules" name="Bottom Column 3" style="<?php if(($this->params->get('bottom column 3') == 'block') || ($this->params->get('bottom column 3') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="cell3 col-lg-6 col-md-12 col-sm-12  col-xs-12"  style="background-color:transparent;">
                                &nbsp;
                            </div>
                        <?php endif; ?>
                        <div class="clearfix visible-sm-block visible-md-block visible-xs-block">
                        </div>
                        <?php
                        $showcolumn= $this->countModules('Bottom Column 4');
                        ?>
                        <?php if($showcolumn): ?>
                            <div class="cell4 col-lg-6 col-md-12 col-sm-12  col-xs-12">
                                <div class="bottomcolumn4">
                                    <jdoc:include type="modules" name="Bottom Column 4" style="<?php if(($this->params->get('bottom column 4') == 'block') || ($this->params->get('bottom column 4') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="cell4 col-lg-6 col-md-12 col-sm-12  col-xs-12"  style="background-color:transparent;">
                                &nbsp;
                            </div>
                        <?php endif; ?>
                        <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php endif; ?>
                <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
            </div>
        </div>
        <div style="clear:both;">
        </div>
    </div>
    <div class="footer-widget-area">
        <div class="footer-widget-area_inner">
            <?php
            if(  $this->countModules('FAModulePosition00')||  $this->countModules('FAModulePosition01')||  $this->countModules('FAModulePosition02')||  $this->countModules('FAModulePosition03')):
                ?>
                <div class="ttr_footer-widget-area_inner_above0">
                    <?php
                    $showcolumn= $this->countModules('FAModulePosition00');
                    ?>
                    <?php if($showcolumn): ?>
                        <div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                            <div class="footerabovecolumn1">
                                <jdoc:include type="modules" name="FAModulePosition00" style="<?php if(($this->params->get('famoduleposition00') == 'block') || ($this->params->get('famoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                            &nbsp;
                        </div>
                    <?php endif; ?>
                    <div class="clearfix visible-xs-block">
                    </div>
                    <?php
                    $showcolumn= $this->countModules('FAModulePosition01');
                    ?>
                    <?php if($showcolumn): ?>
                        <div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                            <div class="footerabovecolumn2">
                                <jdoc:include type="modules" name="FAModulePosition01" style="<?php if(($this->params->get('famoduleposition01') == 'block') || ($this->params->get('famoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                            &nbsp;
                        </div>
                    <?php endif; ?>
                    <div class="clearfix visible-sm-block visible-md-block visible-xs-block">
                    </div>
                    <?php
                    $showcolumn= $this->countModules('FAModulePosition02');
                    ?>
                    <?php if($showcolumn): ?>
                        <div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                            <div class="footerabovecolumn3">
                                <jdoc:include type="modules" name="FAModulePosition02" style="<?php if(($this->params->get('famoduleposition02') == 'block') || ($this->params->get('famoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                            &nbsp;
                        </div>
                    <?php endif; ?>
                    <div class="clearfix visible-xs-block">
                    </div>
                    <?php
                    $showcolumn= $this->countModules('FAModulePosition03');
                    ?>
                    <?php if($showcolumn): ?>
                        <div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                            <div class="footerabovecolumn4">
                                <jdoc:include type="modules" name="FAModulePosition03" style="<?php if(($this->params->get('famoduleposition03') == 'block') || ($this->params->get('famoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                            &nbsp;
                        </div>
                    <?php endif; ?>
                    <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
                    </div>
                </div>
                <div class="clearfix"></div>
            <?php endif; ?>
        </div>
    </div>
    <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
    <footer id="ttr_footer">
        <div id="ttr_footer_top_for_widgets">
            <div class="ttr_footer_top_for_widgets_inner">
                <?php
                if($this->countModules('LeftFooterArea') || $this->countModules('CenterFooterArea') || $this->countModules('RightFooterArea')):
                    ?>
                    <div class="footer-widget-area_fixed">
                        <div style="margin:0 auto;">
                            <?php if($this->countModules('LeftFooterArea')): ?>
                                <div id="first" class="widget-area col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <jdoc:include type="modules" name="LeftFooterArea" style="<?php if(($this->params->get('leftfooterarea') == 'block') || ($this->params->get('leftfooterarea') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                                <div class="clearfix visible-xs"></div>
                            <?php else: ?>
                                <div id="first" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                                    &nbsp;
                                </div>
                                <div class="clearfix visible-xs"></div>
                            <?php endif; ?>
                            <?php if($this->countModules('CenterFooterArea')): ?>
                                <div id="second" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <jdoc:include type="modules" name="CenterFooterArea" style="<?php if(($this->params->get('centerfooterarea') == 'block') || ($this->params->get('centerfooterarea') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                                <div class="clearfix visible-xs"></div>
                            <?php else: ?>
                                <div id="second" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    &nbsp;
                                </div>
                                <div class="clearfix visible-xs"></div>
                            <?php endif; ?>
                            <?php if($this->countModules('RightFooterArea')): ?>
                                <div id="third" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <jdoc:include type="modules" name="RightFooterArea" style="<?php if(($this->params->get('rightfooterarea') == 'block') || ($this->params->get('rightfooterarea') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                                </div>
                                <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
                            <?php else: ?>
                                <div id="third" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    &nbsp;
                                </div>
                                <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="ttr_footer_bottom_footer">
            <div class="ttr_footer_bottom_footer_inner">
                <?php if (($this->params->get('enable_Copyright_Text')) || ($this->params->get('enable_Copyright_Text') == Null)): ?>
                    <div id="ttr_copyright">
                        <a <?php if ($this->params->get('Copyright_Url')): ?> href="<?php echo $this->params->get('Copyright_Url');?>" <?php else: ?> href="<?php echo $app->getCfg('live_site');?>" <?php endif; ?>>
                            <?php $copy = 'Copyright@example.com';
                            $temp = $this->params->get('Copyright_Text');
                            if($temp != Null)
                                $copy = $temp;
                            echo $copy; ?>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if (($this->params->get('enable_Designed_By')) || ($this->params->get('enable_Designed_By') == Null)): ?>
                    <div id="ttr_footer_designed_by_links">
                        <a <?php if ($this->params->get('Designed_By')): ?> href="<?php echo $this->params->get('Designed_By');?>"<?php else: ?> href="<?php echo $app->getCfg('live_site');?>"<?php endif; ?> >
                            Designed by L3webdesign
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </footer>
    <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
    <div class="footer-widget-area">
        <div class="footer-widget-area_inner">
            <?php
            if(  $this->countModules('FBModulePosition00')||  $this->countModules('FBModulePosition01')||  $this->countModules('FBModulePosition02')||  $this->countModules('FBModulePosition03')):
                ?>
                <div class="ttr_footer-widget-area_inner_below0">
                    <?php
                    $showcolumn= $this->countModules('FBModulePosition00');
                    ?>
                    <?php if($showcolumn): ?>
                        <div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                            <div class="footerbelowcolumn1">
                                <jdoc:include type="modules" name="FBModulePosition00" style="<?php if(($this->params->get('fbmoduleposition00') == 'block') || ($this->params->get('fbmoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                            &nbsp;
                        </div>
                    <?php endif; ?>
                    <div class="clearfix visible-xs-block">
                    </div>
                    <?php
                    $showcolumn= $this->countModules('FBModulePosition01');
                    ?>
                    <?php if($showcolumn): ?>
                        <div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                            <div class="footerbelowcolumn2">
                                <jdoc:include type="modules" name="FBModulePosition01" style="<?php if(($this->params->get('fbmoduleposition01') == 'block') || ($this->params->get('fbmoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                            &nbsp;
                        </div>
                    <?php endif; ?>
                    <div class="clearfix visible-sm-block visible-md-block visible-xs-block">
                    </div>
                    <?php
                    $showcolumn= $this->countModules('FBModulePosition02');
                    ?>
                    <?php if($showcolumn): ?>
                        <div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                            <div class="footerbelowcolumn3">
                                <jdoc:include type="modules" name="FBModulePosition02" style="<?php if(($this->params->get('fbmoduleposition02') == 'block') || ($this->params->get('fbmoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                            &nbsp;
                        </div>
                    <?php endif; ?>
                    <div class="clearfix visible-xs-block">
                    </div>
                    <?php
                    $showcolumn= $this->countModules('FBModulePosition03');
                    ?>
                    <?php if($showcolumn): ?>
                        <div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
                            <div class="footerbelowcolumn4">
                                <jdoc:include type="modules" name="FBModulePosition03" style="<?php if(($this->params->get('fbmoduleposition03') == 'block') || ($this->params->get('fbmoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
                            &nbsp;
                        </div>
                    <?php endif; ?>
                    <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
                    </div>
                </div>
                <div class="clearfix"></div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if ($this->countModules('debug')){ ?>
    <jdoc:include type="modules" name="debug" style="<?php if(($this->params->get('debug') == 'block') || ($this->params->get('debug') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
<?php } ?>

<script>
    /* jQuery('#ttr_slideshow_inner').TTSlider({slideShowSpeed:999999999, begintime:999999999,cssPrefix: 'ttr_'}); */
    jQuery( document ).ready(function() {
        jQuery(document).on("click", ".ba-gallery-items",function() {
            var divCap = jQuery(this).find(".short-description");
            console.log(divCap.html());
            jQuery(".ba-modal-title h3").append("<br><span>" + divCap.html() + "</span>");
        });
    });
</script>
</body>

</html>
