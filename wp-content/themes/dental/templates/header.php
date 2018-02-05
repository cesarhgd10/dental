<!-- <div id="preloader"></div> -->
<a id="wa-anchor-top"></a>
<div id="wa-container-wrapper-jcl02tvp5m0e1k" >
  <div id="wa-container-jcl02tvp5m0e1k" class="container  " >
    <div id="wa-row-jc4urj332lukbk" class="row row-align  ">
      <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-8 col-md-8 col-lg-8 " >
        <div id="wa-sub-container-jcl02tvp5m0etc">
          <div id="wa-row-jc4us1mn548isg" class="row row-align  ">
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
              <div id="wa-comptext-jcdiqy217pasxk" class="wa-comptext clearfix">
                <p style="text-align: left;"><strong style="color: #5c5c5c; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; font-size: 20px;"><img style="color: #333333; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; margin: 10px;" src="wa_images/untitled-2_2.png?v=1d5pvbf" width="29" height="27" alt="" title="" /><span style="font-size: 10px; color: #28173f; font-family: Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;"> </span></strong><span style="font-size: 12px; font-family: Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;"><span style="color: #28173f;"><strong>Atendimento Parangaba</strong>: 98956.9455/ </span><span style="color: #5c5c5c;"><strong>85 </strong></span>3483-575 | </span><span style="font-size: 12px; font-family: Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;"><span style="color: #28173f;"><strong>Atendimento Centro</strong> : 98956.9454/ </span><span style="color: #5c5c5c;"><strong>85 </strong></span>3122.2887</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix visible-xs "></div>
      <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
        <div id="wa-sub-container-jcl02tvr5m0fl4">
          <div id="wa-row-jc4us2jb548k4g" class="row row-align  ">
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
              <div id="wa-comptext-jc83iq1c4hl9ps" class="wa-comptext clearfix">
                <p style="text-align: right;"><img style="margin: 10px;" src="wa_images/boneco.png?v=1d5a9v2" width="15" height="16" alt="" title="" /><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;"> Minha conta</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="wa-container-wrapper-jcl02tvs5m0gcw" >
  <div id="wa-container-jcl02tvs5m0gcw" class="container  " >
    <div id="wa-row-jbzetzft2d109k" class="row row-align  ">
      <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 wa-valign-middle " >
        <div id="wa-compmenu-jbzi21vc7nhkhc" class="wa-compmenu wa-menu-init">
          <nav class="navbar navbar-default wa-always-on-top wa-aot-fluid" style="margin:0px;">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#wa-collapse-wa-compmenu-jbzi21vc7nhkhc" aria-expanded="false">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <?php if ( has_custom_logo() ): ?>
                  <?php
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                  ?>

                 <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" style="font-weight:700; line-height: 74px;">
                  <img class="wa-brand-logo" alt="brand-logo" style="display:inline-block;height:74px;" src="<?= $image[0] ?>">
                  <span >Sobre a Bem Estar</span>
                 </a>
                <?php endif; ?>

                <!-- <a href="page5.html"  class="navbar-brand"  style="font-weight:700" >

                  <img class="wa-brand-logo" alt="brand-logo" style="display:inline-block;height:74px;" src="wa_images/logo.png">
                  <span >Sobre a Bem Estar</span>
                </a> -->
              </div>
              <div class="collapse navbar-collapse" id="wa-collapse-wa-compmenu-jbzi21vc7nhkhc">
                <?php
                  if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
                  endif;
                ?>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
      </div>
    </div>
    <div class="wa-container-vspacer col-xl-12"></div>
    <div id="wa-row-jbzi5uak7ce2aw" class="row  ">
      <div class="col-xl-12 wa-item-rowspacer"></div>
    </div>
  </div>
</div>
