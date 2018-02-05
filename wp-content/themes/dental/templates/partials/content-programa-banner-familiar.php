<?php 

$price = get_post_meta( get_the_ID(), '_regular_price', true );

?>

<div id="wa-container-wrapper-jckzd1z96qe554" >
    <div id="wa-container-jckzd1z96qe554" class="container  " >
      <div id="wa-row-jc10aq088reyw8" class="row  ">
        <div class="col-xl-12 wa-item-rowspacer"></div>
      </div>
      <div class="wa-container-vspacer col-xl-12"></div>
      <div id="wa-row-jc0xnbl12dglv4" class="row row-align  ">
        <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-5 col-md-5 col-lg-5 " >
          <div id="wa-sub-container-jckzd1z95m0io8">
            <div id="wa-row-jc0xnbl12dglgw" class="row row-align  ">
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                <div id="wa-comptext-padwrapper-jchszisr5ry8cw" class="wa-comptext-padwrapper">
                  <div id="wa-comptext-jchszisr5ry8cw" class="wa-comptext clearfix">
                    <p><img style="margin: 10px auto; display: block;" src="<?= get_the_post_thumbnail_url( get_the_ID() ) ?>" width="469" height="391" alt="" title="" /></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix visible-xs "></div>
        <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-7 col-md-7 col-lg-7 " >
          <div id="wa-sub-container-jckzd1zb5m0etc">
            <div id="wa-row-jc0xnbl12dgkds" class="row row-align  ">
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                <div id="wa-comptext-jc0xnbl12fe4g0" class="wa-comptext clearfix">
                  <p><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 40px;"><span style="color: #ffffff;">Prevenção Odontológica </span></span></strong></p>
                  <p><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 40px;"><span style="color: #ffffff;"><?= $post->post_title ?>. </span></span></strong></p>
                </div>
              </div>
            </div>
            <div class="wa-container-vspacer col-xl-12"></div>
            <div id="wa-row-jc0xnbl12dgm5s" class="row row-align  ">
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                <div id="wa-comptext-jc0xnbl12fdugw" class="wa-comptext clearfix">
                  <p><span style="color: #ffffff; font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: large;"><?= get_field( 'frase_de_chamada', get_the_ID() ) ?></span></p>
                </div>
              </div>
            </div>
            <div class="wa-container-vspacer col-xl-12"></div>
            <div id="wa-row-jc0xpiql9r4ojk" class="row row-align  ">
              <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-8 col-md-8 col-lg-8 " >
                <div id="wa-sub-container-jckzd1zd5m08n4">
                  <div id="wa-row-jc0xsr2varmx2g" class="row row-align  ">
                    <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                      <div id="wa-comptext-jc0xst3v2fe9fk" class="wa-comptext clearfix">
                        <p style="text-align: center;"><span style="color: #ffffff; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">POR APENAS</span></p>
                        <p style="text-align: center;"><span style="font-size: 80px; color: #ffffff; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;"><span style="font-size: 40px;">R$</span><strong><span style="font-size: 80px;"><?= explode( '.', $price )[0] ?></span></strong><strong style="font-size: 80px;"><span style="font-size: 50px;"><strong>,</strong><?= explode( '.', $price )[1] ?></span></strong></span></p>
                        <p style="text-align: center;"><span style="font-size: 16px;"><strong><span style="color: #ffffff; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Programa de prevenção para 3 pessoas. </span></strong></span></p>
                        <p style="text-align: center;"><span style="font-size: 16px;"><strong><span style="color: #ffffff; font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;">Incluimos também crianças de 0 à 5 anos.</span></strong></span></p>
                        <p style="text-align: center;"><span style="font-size: 25px;"><strong><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif;"> </span></strong></span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="clearfix visible-xs "></div>
              <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
                <div id="wa-sub-container-jckzd1ze5m0fl4">
                  <div id="wa-row-jc0xsrj0armu3s" class="row row-align  ">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>