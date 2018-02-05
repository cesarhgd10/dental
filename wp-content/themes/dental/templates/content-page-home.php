<?php
global $post;

$secao_beneficios             = 'secao_beneficios';
$secao_programas              = get_field( 'secao_programas', $post->ID );
$secao_categoria_de_programas = 'secao_categoria_de_programas';
$banner                       = get_the_post_thumbnail_url( $post->ID );

?>

<div id="wa-container-wrapper-jcl02tvt5m0h4o" >
  <div id="wa-container-jcl02tvt5m0h4o" class="container  " >
    <div id="wa-row-jbzetjwx1qnu3c" class="row row-align  ">
      <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-6 col-md-6 col-lg-6 " >
        <div id="wa-sub-container-jcl02tvt5m0hwg">
          <div id="wa-row-jbzetqt01qnu3c" class="row row-align  ">
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
              <div id="wa-comptext-jbzetszr1tl7ko" class="wa-comptext clearfix">
                <p style="text-align: left;"> </p>
                <p style="text-align: left;"> </p>
                <p style="text-align: left;"> </p>
                <p style="text-align: left;"> </p>
                <p style="text-align: left;"> </p>
                <p style="text-align: left;"> </p>
                <p style="text-align: left;"><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; font-size: 50px;"><strong><span style="color: #ffffff;">O melhor</span></strong></span></p>
                <p style="text-align: left;"><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; font-size: 50px;"><strong><span style="color: #ffffff;">Programa </span></strong></span></p>
                <p style="text-align: left;"><span style="font-family: Verdana, 'DejaVu Sans', 'Bitstream Vera Sans', Geneva, sans-serif; font-size: 50px;"><strong><span style="color: #ffffff;">de </span><span style="color: #ffffff;">Ortodontia.</span></strong></span></p>
                <p> </p>
                <p style="text-align: left;"><span style="color: #ffffff; font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 18px;">Seu dia começa muito melhor</span></p>
                <p style="text-align: left;"><span style="color: #ffffff; font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 18px;">com um sorriso.</span></p>
                <p style="text-align: left;"> </p>
              </div>
            </div>
          </div>
          <div class="wa-container-vspacer col-xl-12"></div>
          <div id="wa-row-jbzewzkw5phvc0" class="row row-align  ">
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
              <div id="wa-compbutton-jbzex1qy3jyqaw-halign">	<a id="wa-compbutton-jbzex1qy3jyqaw" href="/ortodontia"  class="btn btn-primary wa-compbutton"  >Encontre o programa ideal para você</a>
              </div></div>
            </div>
          </div>
        </div>
        <div class="clearfix visible-xs "></div>
        <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-6 col-md-6 col-lg-6 " >
          <div id="wa-sub-container-jcl02tvv5m0io8">
            <div id="wa-row-jbzetqxg1qnu3c" class="row row-align  ">
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 "  data-ratioWidth="450" data-ratioHeight="657" >
                <div id="wa-compimage-padwrapper-jbzetvd02d4mxs" class="wa-compimage-padwrapper">

                  <img id="wa-compimage-jbzetvd02d4mxs" alt="" class="wa-image-component " src="<?= $banner ?>">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if( have_rows( $secao_beneficios ) ): ?>

    <div id="wa-container-wrapper-jcl02tvw5m073k" >
      <div id="wa-container-jcl02tvw5m073k" class="container  " >
        <div id="wa-row-jbzenf373fcm8" class="row  ">
          <div class="col-xl-12 wa-item-rowspacer"></div>
        </div>
      </div>
    </div>
    <div id="wa-container-wrapper-jcl02tvw5m07vc" >
      <div id="wa-container-jcl02tvw5m07vc" class="container  " >

        <?php while( have_rows( $secao_beneficios ) ) : the_row(); ?>

          <?php if( get_row_layout() == 'section_header' ): ?>
            <div id="wa-row-jbzexsdu7sk6aw" class="row row-align  ">
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                <div id="wa-comptext-jbzf0bbu3kfhiw" class="wa-comptext clearfix">
                  <p style="text-align: center;"><img style="margin: 10px;" src="<?= get_sub_field( 'section_image' )['url']; ?>" width="200" height="293" alt="" title="" /></p>
                  <p style="text-align: center;"><span style="font-family: Tahoma, Geneva, Kalimati, sans-serif; color: #0fadf0;"><strong><span style="font-size: 40px;"><?= get_sub_field( 'section_title' ); ?></span></strong></span></p>
                </div>
              </div>
            </div>

          <?php elseif( get_row_layout() == 'beneficios_layout' ): ?>
            <div class="wa-container-vspacer col-xl-12"></div>
            <div id="wa-row-jbzf0fu83jv3eg" class="row row-align  ">
              <?php
              $beneficios = get_sub_field( 'beneficios' );
              foreach( $beneficios as $beneficio ):
                ?>
                <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
                  <div id="wa-sub-container-jcl02tvx5m08n4">
                    <div id="wa-row-jbzf0gmq75mbc0" class="row row-align  ">
                      <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                        <div id="wa-comptext-jbzf2ap67d6zow" class="wa-comptext clearfix">
                          <p><img style="margin: 10px auto; display: block;" src="<?= $beneficio['icone']['url'] ?>" width="112" height="112" alt="" title="" /></p>
                          <p style="text-align: center;"><span style="font-size: 16px; font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;"><?= remove_tags( $beneficio['texto'] ) ?></span></p>
                          <p style="text-align: center;"> </p>
                          <p style="text-align: center;"> </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clearfix visible-xs "></div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        <?php endwhile; ?>

        <div class="wa-container-vspacer col-xl-12"></div>
        <div id="wa-row-jc12gdp44iioow" class="row  ">
          <div class="col-xl-12 wa-item-rowspacer"></div>
        </div>
        <div class="wa-container-vspacer col-xl-12"></div>
        <div id="wa-row-jbzf5icz7zwkzs" class="row row-align  ">
          <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 wa-valign-middle " >
            <div id="wa-compbutton-jbzf5lhm2ck1wo-halign">	<a id="wa-compbutton-jbzf5lhm2ck1wo" href="/beneficios"  class="btn btn-primary wa-compbutton"  >Descubra todos os benefícios</a>
            </div></div>
          </div>
          <div class="wa-container-vspacer col-xl-12"></div>
          <div id="wa-row-jbzf9r013ndmwg" class="row  ">
            <div class="col-xl-12 wa-item-rowspacer"></div>
          </div>

        </div>
      </div>

    <?php endif; ?>

    <?php if( $secao_programas ): ?>
      <div id="wa-container-wrapper-jcl02tw15m0ayg" >
        <div id="wa-container-jcl02tw15m0ayg" class="container  " >
          <div id="wa-row-jbzfz2kg7cgyx4" class="row  ">
            <div class="col-xl-12 wa-item-rowspacer"></div>
          </div>
          <div class="wa-container-vspacer col-xl-12"></div>
          <div id="wa-row-jbzf9or37gid48" class="row row-align  ">
            <?php foreach ($secao_programas as $programa): ?>
              <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
                <div id="wa-sub-container-jcl02tw15m0bq8">
                  <div id="wa-row-jbzfd1m98kmusw" class="row row-align  ">
                    <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                      <div id="wa-comptext-jbzfdgp489av68" class="wa-comptext clearfix">
                        <p><img style="margin: 10px auto; display: block;" src="<?= $programa['imagem']['url'] ?>" width="123" height="122" alt="" title="" /></p>
                        <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff; font-size: 16px;"><?= remove_tags( $programa['texto'] ) ?></span></p>
                        <p style="text-align: center;"> </p>
                        <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; color: #ffffff; font-size: 16px;">______________________________</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="clearfix visible-xs "></div>
            <?php endforeach; ?>

          </div>
          <div class="wa-container-vspacer col-xl-12"></div>
          <div id="wa-row-jbzgtsng5phwio" class="row  ">
            <div class="col-xl-12 wa-item-rowspacer"></div>
          </div>
          <div class="wa-container-vspacer col-xl-12"></div>
          <div id="wa-row-jbzflx3u7lfmjk" class="row row-align  ">
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
              <div id="wa-compbutton-jbzflz4k79g1eg-halign">	<a id="wa-compbutton-jbzflz4k79g1eg" href="/para-voce"  class="btn btn-primary wa-compbutton"  >Escolha já o seu programa</a>
              </div></div>
            </div>
            <div class="wa-container-vspacer col-xl-12"></div>
            <div id="wa-row-jbzfz6yw5n3ytk" class="row  ">
              <div class="col-xl-12 wa-item-rowspacer"></div>
            </div>
          </div>
        </div>
      <?php endif; ?>


      <?php if( have_rows( $secao_categoria_de_programas ) ): ?>

        <?php while( have_rows( $secao_categoria_de_programas ) ) : the_row(); ?>


          <?php  if( get_row_layout() == 'section_header' ): ?>
            <div id="wa-container-wrapper-jcl02tw66owuwg" >
              <div id="wa-container-jcl02tw66owuwg" class="container  " >
                <div id="wa-row-jbzfvpbt3okkm8" class="row  ">
                  <div class="col-xl-12 wa-item-rowspacer"></div>
                </div>
                <div class="wa-container-vspacer col-xl-12"></div>
                <div id="wa-row-jbzfnnx88nwjb4" class="row row-align  ">
                  <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                    <div id="wa-comptext-jbzfuqz63muw3s" class="wa-comptext clearfix">
                      <p style="text-align: center;"><span style="font-size: 40px; color: #3778fc; font-family: Tahoma, Geneva, Kalimati, sans-serif;"><strong>A maneira mais inteligente de</strong></span></p>
                      <p style="text-align: center;"><span style="font-size: 40px; color: #3778fc;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;"><span style="font-family: Tahoma, Geneva, Kalimati, sans-serif;">cuidar da sua saúde bucal é prevenind</span>o.</span></strong></span></p>
                      <p style="text-align: center;"> </p>
                    </div>
                  </div>
                </div>
                <div class="wa-container-vspacer col-xl-12"></div>
                <div id="wa-row-jbzfy29d78vpww" class="row row-align  ">
                  <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                    <div id="wa-comptext-jbzfy3001tl8tk" class="wa-comptext clearfix">
                      <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 20px;">E a <strong>Bem Estar Dental</strong> pode deixar tudo ainda mais simples, acessível e do seu jeito. </span></p>
                      <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 20px;">Conheça os nossos programas de prevenção:</span></p>
                    </div>
                  </div>
                </div>
                <div class="wa-container-vspacer col-xl-12"></div>
                <div id="wa-row-jbzgchzn3ndttc" class="row  ">
                  <div class="col-xl-12 wa-item-rowspacer"></div>
                </div>
              </div>
            </div>

          <?php elseif( get_row_layout() == 'categoria_de_programas' ): ?>
            <div id="wa-container-wrapper-jcl02tw86owrtc" >
              <div id="wa-container-jcl02tw86owrtc" class="container  " >
                <div id="wa-row-jbzfnock8nwkcg" class="row row-align  ">
                  <?php
                  $categorias = get_sub_field('categorias');

                  foreach( $categorias as $categoria ):
                    ?>
                    <div class="wa-subcontainer-wrapper  col-xs-12 col-sm-4 col-md-4 col-lg-4 " >
                      <div id="wa-sub-container-jcl02tw86owvo8">
                        <div id="wa-row-jbzg7i3e5p773k" class="row row-align  ">
                          <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                            <div id="wa-comptext-jbzg7i3e5u8e08" class="wa-comptext clearfix">
                              <p style="text-align: center;"><img style="margin: 10px;" src="<?= $categoria['imagem']['url'] ?>" width="136" height="183" alt="" title="" /></p>
                            </div>
                          </div>
                        </div>
                        <div class="wa-container-vspacer col-xl-12"></div>
                        <div id="wa-row-jbzg7i3e5p76sw" class="row row-align  ">
                          <div class="hidden-xs col-xs-12 col-sm-2 col-md-2 col-lg-2 " >
                          </div>
                          <div class=" col-xs-12 col-sm-8 col-md-8 col-lg-8 " >
                            <div id="wa-compbutton-jbzg7i3e8e5qds-halign">	<a id="wa-compbutton-jbzg7i3e8e5qds" href="<?= $categoria['url_do_botao'] ?>"  class="btn btn-primary wa-compbutton"  ><?= remove_tags($categoria['texto_do_botao']) ?></a>
                            </div></div>
                            <div class="hidden-xs col-xs-12 col-sm-2 col-md-2 col-lg-2 " >
                            </div>
                          </div>
                          <div class="wa-container-vspacer col-xl-12"></div>
                          <div id="wa-row-jbzgdkj578vots" class="row row-align  ">
                            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                              <div id="wa-comptext-jbzgdyl05sthhc" class="wa-comptext clearfix">
                                <p style="text-align: center;"><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif; font-size: 16px;"><?= remove_tags($categoria['texto']) ?> </span></p>
                                <p style="text-align: center;"> </p>
                                <p style="text-align: center;"> </p>
                              </div>
                            </div>
                          </div>
                          <div class="wa-container-vspacer col-xl-12"></div>
                          <div id="wa-row-jcde7rfx5iv7s8" class="row  ">
                            <div class="col-xl-12 wa-item-rowspacer"></div>
                          </div>
                        </div>
                      </div>
                      <div class="clearfix visible-xs "></div>
                    <?php endforeach; ?>
                  </div>
                  <div class="wa-container-vspacer col-xl-12"></div>
                  <div id="wa-row-jbzghnch1rjvow" class="row  ">
                    <div class="col-xl-12 wa-item-rowspacer"></div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>


        <div id="wa-container-wrapper-jcl02twh6ox12o" >
          <div id="wa-container-jcl02twh6ox12o" class="container  " >
            <div id="wa-row-jbzenf373fcm8" class="row  ">
              <div class="col-xl-12 wa-item-rowspacer"></div>
            </div>
          </div>
        </div>
        <div id="wa-container-wrapper-jcl02twh6ox0aw" >
          <div id="wa-container-jcl02twh6ox0aw" class="container  " >
            <div id="wa-row-jcdacguw5tc5i8" class="row  ">
              <div class="col-xl-12 wa-item-rowspacer"></div>
            </div>
            <div class="wa-container-vspacer col-xl-12"></div>
            <div id="wa-row-jcdabz2146xtsw" class="row row-align  ">
              <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
                <div id="wa-comptext-jcdaj4ss4xzdko" class="wa-comptext clearfix">
                  <p style="text-align: center;"><span style="font-size: 40px; color: #ffffff; font-family: Tahoma, Geneva, Kalimati, sans-serif;"><strong>A maneira mais inteligente de</strong></span></p>
                  <p style="text-align: center;"><span style="font-size: 40px; color: #ffffff;"><strong><span style="font-family: 'Open Sans', Arial, Helvetica, 'Liberation Sans', FreeSans, sans-serif;"><span style="font-family: Tahoma, Geneva, Kalimati, sans-serif;">cuidar da sua saúde bucal é prevenind</span>o.</span></strong></span></p>
                  <p style="text-align: center;"><span style="color: #ffffff;"> </span></p>
                </div>
              </div>
            </div>
            <div class="wa-container-vspacer col-xl-12"></div>
            <div id="wa-row-jcdacigo5tc5wg" class="row  ">
              <div class="col-xl-12 wa-item-rowspacer"></div>
            </div>
          </div>
        </div>
